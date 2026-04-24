// Products page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('category-filter');
    const sortFilter = document.getElementById('sort-filter');
    
    if (categoryFilter) {
        categoryFilter.addEventListener('change', filterProducts);
    }
    
    if (sortFilter) {
        sortFilter.addEventListener('change', sortProducts);
    }
});

// Filter products by category
function filterProducts() {
    const selectedCategory = document.getElementById('category-filter').value;
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        const category = card.getAttribute('data-category');
        
        if (selectedCategory === '' || category === selectedCategory) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Sort products
function sortProducts() {
    const sortValue = document.getElementById('sort-filter').value;
    const container = document.getElementById('all-products');
    const productCards = Array.from(container.querySelectorAll('.product-card'));
    
    productCards.sort((a, b) => {
        switch (sortValue) {
            case 'price-asc':
                return parseInt(a.getAttribute('data-price')) - parseInt(b.getAttribute('data-price'));
            
            case 'price-desc':
                return parseInt(b.getAttribute('data-price')) - parseInt(a.getAttribute('data-price'));
            
            case 'name':
                const nameA = a.querySelector('.product-name').textContent;
                const nameB = b.querySelector('.product-name').textContent;
                return nameA.localeCompare(nameB, 'vi');
            
            default:
                return 0;
        }
    });
    
    // Re-append sorted cards
    productCards.forEach(card => container.appendChild(card));
}
