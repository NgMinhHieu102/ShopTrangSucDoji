<?php
$pageTitle = 'Giỏ hàng';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> - Tierra</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/css/auth-dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .cart-page { padding: 60px 0; min-height: 60vh; }
        .cart-title { font-size: 28px; font-weight: 600; margin-bottom: 40px; text-align: center; }
        .cart-container { display: grid; grid-template-columns: 1fr 380px; gap: 40px; }
        .cart-items { background: #fff; }
        .cart-item { display: grid; grid-template-columns: 120px 1fr 120px 100px 40px; gap: 20px; padding: 24px; border-bottom: 1px solid #eee; align-items: center; }
        .cart-item-img { width: 120px; height: 120px; object-fit: contain; background: #f9f9f9; padding: 10px; }
        .cart-item-info h3 { font-size: 16px; font-weight: 600; margin-bottom: 8px; }
        .cart-item-info p { font-size: 13px; color: #888; }
        .cart-item-price { font-size: 18px; font-weight: 600; color: #c9a84c; }
        .cart-item-qty { display: flex; align-items: center; gap: 8px; }
        .qty-btn { width: 32px; height: 32px; border: 1px solid #ddd; background: #fff; cursor: pointer; font-size: 16px; }
        .qty-btn:hover { background: #f5f5f5; }
        .qty-input { width: 50px; height: 32px; text-align: center; border: 1px solid #ddd; }
        .cart-item-remove { background: none; border: none; color: #999; cursor: pointer; font-size: 18px; }
        .cart-item-remove:hover { color: #e74c3c; }
        
        .cart-summary { background: #f9f9f9; padding: 24px; height: fit-content; position: sticky; top: 20px; }
        .cart-summary h3 { font-size: 18px; font-weight: 600; margin-bottom: 20px; }
        .summary-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #eee; }
        .summary-row.total { font-size: 20px; font-weight: 600; color: #c9a84c; border-bottom: none; padding-top: 20px; }
        .btn-checkout { width: 100%; padding: 16px; background: #5c3d2e; color: #fff; border: none; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; }
        .btn-checkout:hover { background: #4a3025; }
        .btn-continue { width: 100%; padding: 14px; background: #fff; color: #5c3d2e; border: 2px solid #5c3d2e; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 12px; }
        .btn-continue:hover { background: #f5f5f5; }
        
        .empty-cart { text-align: center; padding: 80px 20px; }
        .empty-cart i { font-size: 80px; color: #ddd; margin-bottom: 20px; }
        .empty-cart h3 { font-size: 22px; margin-bottom: 12px; }
        .empty-cart p { color: #888; margin-bottom: 30px; }
        .empty-cart a { display: inline-block; padding: 14px 40px; background: #5c3d2e; color: #fff; text-decoration: none; font-weight: 600; }
        .empty-cart a:hover { background: #4a3025; }
    </style>
</head>
<body>
    <!-- Top Banner -->
    <div class="top-banner">
        <p>Giảm 30% cho đơn hàng từ 3.000.000đ - Áp dụng tự động khi thanh toán. <a href="#">*Xem điều kiện</a></p>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo"><a href="/"><img src="https://www.tierra.vn/wp-content/uploads/2025/11/tierra-logo.webp" alt="Tierra"></a></div>
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()"><i class="fas fa-bars"></i></button>
            <nav class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="/products?category=nhan-cau-hon">Nhẫn cầu hôn</a></li>
                    <li><a href="/products?category=nhan-cuoi">Nhẫn cưới</a></li>
                    <li><a href="/products?category=kim-cuong">Kim Cương</a></li>
                    <li><a href="/products?category=trang-suc-cao-cap">Trang sức cao cấp</a></li>
                    <li><a href="/products?category=trang-suc">Trang sức</a></li>
                    <li><a href="/news">Tin tức</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <a href="/about" class="header-link">About</a>
                <a href="#" class="header-icon" onclick="toggleSearch(); return false;"><i class="fas fa-search"></i></a>
                <div class="auth-dropdown">
                    <a href="#" class="header-icon" onclick="toggleAuthDropdown(event)"><i class="fas fa-user"></i></a>
                    <div class="auth-dropdown-menu" id="authDropdown">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <div class="auth-dropdown-user">
                                <i class="fas fa-user-circle"></i>
                                <span><?= htmlspecialchars($_SESSION['user_name']) ?></span>
                            </div>
                            <div class="auth-divider"></div>
                            <a href="/account" class="auth-dropdown-item"><i class="fas fa-user-cog"></i> Tài khoản</a>
                            <a href="/orders" class="auth-dropdown-item"><i class="fas fa-shopping-bag"></i> Đơn hàng</a>
                            <a href="/logout" class="auth-dropdown-item"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        <?php else: ?>
                            <a href="/login" class="auth-dropdown-item"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                            <a href="/register" class="auth-dropdown-item"><i class="fas fa-user-plus"></i> Đăng ký</a>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="/wishlist" class="header-icon"><i class="fas fa-heart"></i><span class="badge" id="wishlist-count">0</span></a>
                <a href="/cart" class="header-icon"><i class="fas fa-shopping-bag"></i><span class="badge" id="cart-count">0</span></a>
            </div>
        </div>
    </header>

    <!-- Search Overlay -->
    <div class="search-overlay" id="searchOverlay">
        <button class="search-close" onclick="closeSearch()">&times;</button>
        <div class="search-overlay-content">
            <div class="search-box">
                <div class="search-input-wrapper">
                    <input 
                        type="text" 
                        class="search-input" 
                        id="searchInput" 
                        placeholder="Tìm kiếm sản phẩm ..."
                        oninput="debounceSearch()"
                        onkeypress="handleSearchKeypress(event)"
                    >
                    <button class="search-submit" onclick="performSearch()">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="search-results" id="searchResults">
                <!-- Kết quả tìm kiếm sẽ hiển thị ở đây -->
            </div>
        </div>
    </div>

    <!-- Cart Page -->
    <section class="cart-page">
        <div class="container">
            <h1 class="cart-title">Giỏ hàng của bạn</h1>
            
            <?php if (empty($cartItems)): ?>
                <div class="empty-cart">
                    <i class="fas fa-shopping-bag"></i>
                    <h3>Giỏ hàng trống</h3>
                    <p>Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                    <a href="/products?category=trang-suc">Tiếp tục mua sắm</a>
                </div>
            <?php else: ?>
                <div class="cart-container">
                    <!-- Cart Items -->
                    <div class="cart-items">
                        <?php foreach ($cartItems as $item): ?>
                        <div class="cart-item" data-product-id="<?= $item['product']['id'] ?>">
                            <img src="<?= htmlspecialchars($item['product']['image']) ?>" alt="<?= htmlspecialchars($item['product']['name']) ?>" class="cart-item-img">
                            
                            <div class="cart-item-info">
                                <h3><?= htmlspecialchars($item['product']['name']) ?></h3>
                                <p><?= htmlspecialchars($item['product']['description']) ?></p>
                            </div>
                            
                            <div class="cart-item-price">
                                <?= number_format($item['product']['price'], 0, ',', '.') ?>đ
                            </div>
                            
                            <div class="cart-item-qty">
                                <button class="qty-btn" onclick="updateQuantity(<?= $item['product']['id'] ?>, -1)">-</button>
                                <input type="number" class="qty-input" value="<?= $item['quantity'] ?>" min="1" readonly>
                                <button class="qty-btn" onclick="updateQuantity(<?= $item['product']['id'] ?>, 1)">+</button>
                            </div>
                            
                            <button class="cart-item-remove" onclick="removeItem(<?= $item['product']['id'] ?>)">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Cart Summary -->
                    <div class="cart-summary">
                        <h3>Tóm tắt đơn hàng</h3>
                        <div class="summary-row">
                            <span>Tạm tính</span>
                            <span id="subtotal"><?= number_format($total, 0, ',', '.') ?>đ</span>
                        </div>
                        <div class="summary-row">
                            <span>Phí vận chuyển</span>
                            <span>Miễn phí</span>
                        </div>
                        <div class="summary-row total">
                            <span>Tổng cộng</span>
                            <span id="total"><?= number_format($total, 0, ',', '.') ?>đ</span>
                        </div>
                        
                        <button class="btn-checkout" onclick="window.location.href='/checkout'">
                            Thanh toán
                        </button>
                        <button class="btn-continue" onclick="window.location.href='/products'">
                            Tiếp tục mua sắm
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="footer-logo">Tierra</div>
                    <p class="footer-tagline">happiness bespoke</p>
                </div>
                <div class="footer-column">
                    <h4 class="footer-title">Sản phẩm</h4>
                    <ul class="footer-links">
                        <li><a href="/products?category=nhan-cau-hon">Nhẫn cầu hôn</a></li>
                        <li><a href="/products?category=nhan-cuoi">Nhẫn cưới</a></li>
                        <li><a href="/products?category=kim-cuong">Kim cương</a></li>
                        <li><a href="/products?category=trang-suc">Trang sức</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4 class="footer-title">Hỗ trợ</h4>
                    <ul class="footer-links">
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Hướng dẫn đo ni</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4 class="footer-title">Liên hệ</h4>
                    <p>Hotline: 1900 232 354</p>
                    <p>9:00 - 21:00 (kể cả Chủ Nhật)</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/main.js"></script>
    <script src="/js/cart.js?v=2"></script>
    <script src="/js/wishlist.js?v=1"></script>
    <script src="/js/search.js?v=1"></script>
    <script src="/js/auth-dropdown.js?v=1"></script>
    <script>
    function updateQuantity(productId, change) {
        const item = document.querySelector(`.cart-item[data-product-id="${productId}"]`);
        const input = item.querySelector('.qty-input');
        let newQty = parseInt(input.value) + change;
        
        if (newQty < 1) newQty = 1;
        
        fetch('/cart?action=update', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `product_id=${productId}&quantity=${newQty}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
    
    function removeItem(productId) {
        if (confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
            fetch('/cart?action=remove', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: `product_id=${productId}`
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    }
    
    // Update cart count
    fetch('/cart?action=count')
        .then(res => res.json())
        .then(data => {
            document.getElementById('cart-count').textContent = data.count;
        });
    </script>
</body>
</html>
