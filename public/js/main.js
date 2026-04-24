// Main JavaScript file

// Mobile menu toggle
function toggleMobileMenu() {
    const navMenu = document.getElementById('navMenu');
    const toggleButton = document.querySelector('.mobile-menu-toggle i');
    
    navMenu.classList.toggle('active');
    
    // Change icon
    if (navMenu.classList.contains('active')) {
        toggleButton.className = 'fas fa-times';
    } else {
        toggleButton.className = 'fas fa-bars';
    }
}

// Close mobile menu when clicking outside
document.addEventListener('click', function(event) {
    const navMenu = document.getElementById('navMenu');
    const toggleButton = document.querySelector('.mobile-menu-toggle');
    
    if (navMenu && toggleButton) {
        if (!navMenu.contains(event.target) && !toggleButton.contains(event.target)) {
            navMenu.classList.remove('active');
            document.querySelector('.mobile-menu-toggle i').className = 'fas fa-bars';
        }
    }
});

// Load featured products on home page
document.addEventListener('DOMContentLoaded', function() {
    const featuredContainer = document.getElementById('featured-products');
    
    if (featuredContainer) {
        loadFeaturedProducts();
    }
});

// Load featured products from API
async function loadFeaturedProducts() {
    try {
        const response = await fetch('/api/products');
        const data = await response.json();
        
        if (data.success) {
            displayFeaturedProducts(data.data.slice(0, 3)); // Chỉ hiển thị 3 sản phẩm
        }
    } catch (error) {
        console.error('Error loading products:', error);
        document.getElementById('featured-products').innerHTML = 
            '<p class="loading">Không thể tải sản phẩm. Vui lòng thử lại sau.</p>';
    }
}

// Display featured products
function displayFeaturedProducts(products) {
    const container = document.getElementById('featured-products');
    
    if (products.length === 0) {
        container.innerHTML = '<p class="loading">Không có sản phẩm nào.</p>';
        return;
    }
    
    container.innerHTML = products.map(product => `
        <div class="product-card">
            <div class="product-image">
                <img src="${product.image}" alt="${product.name}">
                <div class="product-overlay">
                    <button class="btn-icon" onclick="addToCart(${product.id})">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <button class="btn-icon" onclick="addToWishlist(${product.id})">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
            </div>
            <div class="product-details">
                <span class="product-category">${product.category}</span>
                <h3 class="product-name">${product.name}</h3>
                <p class="product-description">${product.description}</p>
                <div class="product-footer">
                    <span class="product-price">${formatPrice(product.price)}đ</span>
                    <button class="btn-buy" onclick="buyNow(${product.id})">Mua ngay</button>
                </div>
            </div>
        </div>
    `).join('');
}

// Format price
function formatPrice(price) {
    return new Intl.NumberFormat('vi-VN').format(price);
}

// Add to cart
function addToCart(productId) {
    // Lấy giỏ hàng từ localStorage
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    
    // Kiểm tra sản phẩm đã có trong giỏ chưa
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ id: productId, quantity: 1 });
    }
    
    // Lưu lại vào localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Cập nhật badge
    updateCartBadge();
    
    alert('Đã thêm sản phẩm vào giỏ hàng!');
}

// Add to wishlist
function addToWishlist(productId) {
    let wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');
    
    if (!wishlist.includes(productId)) {
        wishlist.push(productId);
        localStorage.setItem('wishlist', JSON.stringify(wishlist));
        updateWishlistBadge();
        alert('Đã thêm vào danh sách yêu thích!');
    } else {
        alert('Sản phẩm đã có trong danh sách yêu thích!');
    }
}

// Buy now
function buyNow(productId) {
    addToCart(productId);
    // Redirect to checkout page (sẽ làm sau)
    alert('Chức năng thanh toán đang được phát triển!');
}

// Update cart badge
function updateCartBadge() {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    
    const badges = document.querySelectorAll('.fa-shopping-bag + .badge');
    badges.forEach(badge => {
        badge.textContent = totalItems;
    });
}

// Update wishlist badge
function updateWishlistBadge() {
    const wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');
    
    const badges = document.querySelectorAll('.fa-heart + .badge');
    badges.forEach(badge => {
        badge.textContent = wishlist.length;
    });
}

// Initialize badges on page load
updateCartBadge();
updateWishlistBadge();

// News Slider functionality (disabled for grid layout)
function slideNews(direction) {
    // Disabled for 3-column grid layout
    return;
}

// Auto slide disabled for grid layout
