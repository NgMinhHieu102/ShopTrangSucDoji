// Pagination JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll to top when changing pages
    const paginationLinks = document.querySelectorAll('.pagination a');
    
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Show loading state
            const productsGrid = document.getElementById('all-products');
            if (productsGrid) {
                productsGrid.style.opacity = '0.6';
                productsGrid.style.pointerEvents = 'none';
            }
            
            // Scroll to top of products section
            const productsSection = document.querySelector('.products-page');
            if (productsSection) {
                productsSection.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Update URL without page reload for better UX
    function updateURL(params) {
        const url = new URL(window.location);
        Object.keys(params).forEach(key => {
            if (params[key]) {
                url.searchParams.set(key, params[key]);
            } else {
                url.searchParams.delete(key);
            }
        });
        window.history.pushState({}, '', url);
    }
    
    // Handle pagination via AJAX (optional enhancement)
    function loadPage(page) {
        const url = new URL(window.location);
        url.searchParams.set('page', page);
        
        fetch(url.toString())
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                // Update products grid
                const newProducts = doc.getElementById('all-products');
                const currentProducts = document.getElementById('all-products');
                if (newProducts && currentProducts) {
                    currentProducts.innerHTML = newProducts.innerHTML;
                    currentProducts.style.opacity = '1';
                    currentProducts.style.pointerEvents = 'auto';
                }
                
                // Update pagination
                const newPagination = doc.querySelector('.pagination-container');
                const currentPagination = document.querySelector('.pagination-container');
                if (newPagination && currentPagination) {
                    currentPagination.innerHTML = newPagination.innerHTML;
                }
                
                // Update URL
                updateURL({ page: page });
                
                // Scroll to top
                const productsSection = document.querySelector('.products-page');
                if (productsSection) {
                    productsSection.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            })
            .catch(error => {
                console.error('Error loading page:', error);
                // Fallback to normal page load
                window.location.href = url.toString();
            });
    }
});