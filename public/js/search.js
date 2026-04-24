// Toggle search overlay
function toggleSearch() {
    const overlay = document.getElementById('searchOverlay');
    if (overlay) {
        overlay.classList.toggle('active');
        if (overlay.classList.contains('active')) {
            // Focus vào input khi mở
            setTimeout(() => {
                const input = document.getElementById('searchInput');
                if (input) input.focus();
            }, 300);
        }
    }
}

// Đóng search overlay
function closeSearch() {
    const overlay = document.getElementById('searchOverlay');
    if (overlay) {
        overlay.classList.remove('active');
    }
}

// Xử lý tìm kiếm
function performSearch() {
    const input = document.getElementById('searchInput');
    const query = input.value.trim();
    
    if (query.length < 2) {
        showSearchResults([]);
        return;
    }
    
    // Gọi API tìm kiếm
    fetch(`/search?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            showSearchResults(data.products || []);
        })
        .catch(error => {
            console.error('Search error:', error);
            showSearchResults([]);
        });
}

// Hiển thị kết quả tìm kiếm
function showSearchResults(products) {
    const resultsContainer = document.getElementById('searchResults');
    
    if (products.length === 0) {
        resultsContainer.innerHTML = '<div class="search-no-results">Không tìm thấy sản phẩm nào</div>';
        return;
    }
    
    let html = '<div class="search-results-list">';
    products.forEach(product => {
        html += `
            <a href="/product?id=${product.id}" class="search-result-item">
                <img src="${product.image}" alt="${product.name}">
                <div class="search-result-info">
                    <div class="search-result-name">${product.name}</div>
                    <div class="search-result-price">${formatPrice(product.price)} đ</div>
                </div>
            </a>
        `;
    });
    html += '</div>';
    
    resultsContainer.innerHTML = html;
}

// Format giá
function formatPrice(price) {
    return new Intl.NumberFormat('vi-VN').format(price);
}

// Debounce function để tránh gọi API quá nhiều
let searchTimeout;
function debounceSearch() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(performSearch, 300);
}

// Xử lý phím Enter
function handleSearchKeypress(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const input = document.getElementById('searchInput');
        const query = input.value.trim();
        if (query) {
            window.location.href = `/products?search=${encodeURIComponent(query)}`;
        }
    }
}

// Đóng overlay khi click bên ngoài
document.addEventListener('click', function(event) {
    const overlay = document.getElementById('searchOverlay');
    if (overlay && overlay.classList.contains('active')) {
        if (event.target === overlay) {
            closeSearch();
        }
    }
});

// Đóng overlay khi nhấn ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeSearch();
    }
});
