// Thêm sản phẩm vào giỏ hàng
function addToCart(productId, quantity = 1) {
    console.log('addToCart called with productId:', productId, 'quantity:', quantity);
    
    fetch('/cart?action=add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}&quantity=${quantity}`
    })
    .then(response => {
        console.log('Response status:', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
        if (data.success) {
            // Cập nhật số lượng giỏ hàng
            updateCartCount();
            
            // Hiển thị thông báo
            showNotification('Đã thêm vào giỏ hàng!', 'success');
        } else {
            showNotification(data.message || 'Có lỗi xảy ra', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Có lỗi xảy ra', 'error');
    });
}

// Cập nhật số lượng giỏ hàng
function updateCartCount() {
    fetch('/cart?action=count')
        .then(response => response.json())
        .then(data => {
            const badges = document.querySelectorAll('#cart-count, .badge');
            badges.forEach(badge => {
                if (badge.id === 'cart-count' || badge.closest('.header-icon')?.href?.includes('/cart')) {
                    badge.textContent = data.count;
                }
            });
        })
        .catch(error => console.error('Error:', error));
}

// Hiển thị thông báo
function showNotification(message, type = 'success') {
    // Tạo element thông báo
    const notification = document.createElement('div');
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
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Thêm CSS animation
const style = document.createElement('style');
style.textContent = `
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

// Cập nhật số lượng giỏ hàng khi trang load
document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
});
