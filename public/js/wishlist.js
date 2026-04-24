// Hiển thị thông báo (nếu chưa có từ cart.js)
function showNotification(message, type = 'success') {
    // Kiểm tra xem notification đã tồn tại chưa
    let notification = document.querySelector('.notification');
    if (notification) {
        notification.remove();
    }
    
    // Tạo element thông báo
    notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 16px 24px;
        background: ${type === 'success' ? '#4caf50' : '#f44336'};
        color: white;
        border-radius: 4px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        z-index: 10000;
        animation: slideIn 0.3s ease-out;
    `;
    
    document.body.appendChild(notification);
    
    // Tự động xóa sau 3 giây
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// Thêm sản phẩm vào danh sách yêu thích
function addToWishlist(productId) {
    console.log('addToWishlist called with productId:', productId);
    
    fetch('/wishlist?action=add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}`
    })
    .then(response => {
        console.log('Response status:', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
        if (data.success) {
            updateWishlistCount();
            showNotification('Đã thêm vào yêu thích!', 'success');
            
            // Cập nhật icon trái tim nếu có
            const heartIcon = document.querySelector(`[onclick*="addToWishlist(${productId})"]`);
            if (heartIcon) {
                heartIcon.innerHTML = '<i class="fas fa-heart"></i>';
                heartIcon.style.color = '#e74c3c';
            }
        } else {
            showNotification(data.message || 'Có lỗi xảy ra', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Có lỗi xảy ra', 'error');
    });
}

// Xóa sản phẩm khỏi danh sách yêu thích
function removeFromWishlist(productId) {
    if (!confirm('Bạn có chắc muốn xóa sản phẩm này khỏi danh sách yêu thích?')) {
        return;
    }
    
    fetch('/wishlist?action=remove', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Xóa item khỏi DOM
            const item = document.querySelector(`[data-product-id="${productId}"]`);
            if (item) {
                item.style.animation = 'fadeOut 0.3s ease-out';
                setTimeout(() => {
                    item.remove();
                    
                    // Kiểm tra nếu không còn item nào thì hiển thị empty state
                    const grid = document.querySelector('.wishlist-grid');
                    if (grid && grid.children.length === 0) {
                        location.reload();
                    }
                }, 300);
            }
            
            updateWishlistCount();
            showNotification('Đã xóa khỏi danh sách yêu thích', 'success');
        } else {
            showNotification('Có lỗi xảy ra', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Có lỗi xảy ra', 'error');
    });
}

// Thêm vào giỏ hàng từ wishlist
function addToCartFromWishlist(productId) {
    addToCart(productId, 1);
}

// Cập nhật số lượng wishlist
function updateWishlistCount() {
    fetch('/wishlist?action=count')
        .then(response => response.json())
        .then(data => {
            const badge = document.getElementById('wishlist-count');
            if (badge) {
                badge.textContent = data.count;
            }
        })
        .catch(error => console.error('Error:', error));
}

// Kiểm tra sản phẩm có trong wishlist không
function checkWishlistStatus(productId) {
    fetch('/wishlist?action=check', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}`
    })
    .then(response => response.json())
    .then(data => {
        console.log('Wishlist status:', data);
        const heartButtons = document.querySelectorAll('.pd-wishlist, [onclick*="addToWishlist"]');
        heartButtons.forEach(heartIcon => {
            if (data.inWishlist) {
                heartIcon.innerHTML = '<i class="fas fa-heart"></i>';
                heartIcon.style.color = '#e74c3c';
            }
        });
    })
    .catch(error => console.error('Error checking wishlist:', error));
}

// Thêm CSS animation
if (!document.getElementById('wishlist-animations')) {
    const style = document.createElement('style');
    style.id = 'wishlist-animations';
    style.textContent = `
        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }
            to {
                opacity: 0;
                transform: scale(0.8);
            }
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
}

// Cập nhật số lượng wishlist khi trang load
document.addEventListener('DOMContentLoaded', function() {
    updateWishlistCount();
});
