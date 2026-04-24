<?php
$pageTitle = 'Thanh toán';
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
        .checkout-page { padding: 60px 0; background: #f9f9f9; }
        .checkout-title { font-size: 28px; font-weight: 600; margin-bottom: 40px; text-align: center; }
        .checkout-container { display: grid; grid-template-columns: 1fr 420px; gap: 40px; }
        
        .checkout-form { background: #fff; padding: 40px; }
        .form-section { margin-bottom: 40px; }
        .form-section h3 { font-size: 18px; font-weight: 600; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #c9a84c; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 14px; font-weight: 500; margin-bottom: 8px; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ddd; font-size: 14px; }
        .form-group textarea { min-height: 80px; resize: vertical; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        
        .payment-methods { display: flex; flex-direction: column; gap: 12px; }
        .payment-method { display: flex; align-items: center; padding: 16px; border: 2px solid #ddd; cursor: pointer; }
        .payment-method input { margin-right: 12px; }
        .payment-method.selected { border-color: #c9a84c; background: #fffbf0; }
        
        .order-summary { background: #fff; padding: 30px; height: fit-content; position: sticky; top: 20px; }
        .order-summary h3 { font-size: 18px; font-weight: 600; margin-bottom: 20px; }
        .order-item { display: flex; gap: 16px; padding: 16px 0; border-bottom: 1px solid #eee; }
        .order-item-img { width: 80px; height: 80px; object-fit: contain; background: #f9f9f9; padding: 8px; }
        .order-item-info { flex: 1; }
        .order-item-info h4 { font-size: 14px; font-weight: 600; margin-bottom: 4px; }
        .order-item-info p { font-size: 12px; color: #888; }
        .order-item-price { font-size: 14px; font-weight: 600; }
        
        .summary-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #eee; }
        .summary-row.total { font-size: 20px; font-weight: 600; color: #c9a84c; border-bottom: none; padding-top: 20px; }
        
        .btn-place-order { width: 100%; padding: 16px; background: #5c3d2e; color: #fff; border: none; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; }
        .btn-place-order:hover { background: #4a3025; }
        
        .error-message { background: #fee; color: #c00; padding: 12px; margin-bottom: 20px; border-radius: 4px; }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo"><a href="/"><img src="https://www.tierra.vn/wp-content/uploads/2025/11/tierra-logo.webp" alt="Tierra"></a></div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="/products?category=nhan-cau-hon">Nhẫn cầu hôn</a></li>
                    <li><a href="/products?category=nhan-cuoi">Nhẫn cưới</a></li>
                    <li><a href="/products?category=kim-cuong">Kim Cương</a></li>
                    <li><a href="/products?category=trang-suc-cao-cap">Trang sức cao cấp</a></li>
                    <li><a href="/products">Trang sức</a></li>
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

    <!-- Checkout Page -->
    <section class="checkout-page">
        <div class="container">
            <h1 class="checkout-title">Thanh toán</h1>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message">
                    <?= htmlspecialchars($_SESSION['error']) ?>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            
            <form action="/checkout?action=process" method="POST">
                <div class="checkout-container">
                    <!-- Checkout Form -->
                    <div class="checkout-form">
                        <!-- Thông tin khách hàng -->
                        <div class="form-section">
                            <h3>Thông tin khách hàng</h3>
                            <div class="form-group">
                                <label>Họ và tên *</label>
                                <input type="text" name="name" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại *</label>
                                    <input type="tel" name="phone" required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Địa chỉ giao hàng -->
                        <div class="form-section">
                            <h3>Địa chỉ giao hàng</h3>
                            <div class="form-group">
                                <label>Địa chỉ *</label>
                                <input type="text" name="address" placeholder="Số nhà, tên đường" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Tỉnh/Thành phố *</label>
                                    <select name="city" required>
                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                        <option value="Hà Nội">Hà Nội</option>
                                        <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                                        <option value="Đà Nẵng">Đà Nẵng</option>
                                        <option value="Hải Phòng">Hải Phòng</option>
                                        <option value="Cần Thơ">Cần Thơ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Quận/Huyện *</label>
                                    <input type="text" name="district" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phường/Xã *</label>
                                <input type="text" name="ward" required>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea name="notes" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn"></textarea>
                            </div>
                        </div>
                        
                        <!-- Phương thức thanh toán -->
                        <div class="form-section">
                            <h3>Phương thức thanh toán</h3>
                            <div class="payment-methods">
                                <label class="payment-method selected">
                                    <input type="radio" name="payment_method" value="cod" checked>
                                    <div>
                                        <strong>Thanh toán khi nhận hàng (COD)</strong>
                                        <p style="font-size: 13px; color: #888; margin-top: 4px;">Thanh toán bằng tiền mặt khi nhận hàng</p>
                                    </div>
                                </label>
                                <label class="payment-method">
                                    <input type="radio" name="payment_method" value="bank_transfer">
                                    <div>
                                        <strong>Chuyển khoản ngân hàng</strong>
                                        <p style="font-size: 13px; color: #888; margin-top: 4px;">Chuyển khoản trực tiếp vào tài khoản ngân hàng</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div class="order-summary">
                        <h3>Đơn hàng (<?= count($cartItems) ?> sản phẩm)</h3>
                        
                        <?php foreach ($cartItems as $item): ?>
                        <div class="order-item">
                            <img src="<?= htmlspecialchars($item['product']['image']) ?>" alt="<?= htmlspecialchars($item['product']['name']) ?>" class="order-item-img">
                            <div class="order-item-info">
                                <h4><?= htmlspecialchars($item['product']['name']) ?></h4>
                                <p>Số lượng: <?= $item['quantity'] ?></p>
                            </div>
                            <div class="order-item-price">
                                <?= number_format($item['subtotal'], 0, ',', '.') ?>đ
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="summary-row">
                            <span>Tạm tính</span>
                            <span><?= number_format($total, 0, ',', '.') ?>đ</span>
                        </div>
                        <div class="summary-row">
                            <span>Phí vận chuyển</span>
                            <span>Miễn phí</span>
                        </div>
                        <div class="summary-row total">
                            <span>Tổng cộng</span>
                            <span><?= number_format($total, 0, ',', '.') ?>đ</span>
                        </div>
                        
                        <button type="submit" class="btn-place-order">
                            Đặt hàng
                        </button>
                    </div>
                </div>
            </form>
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
                    <h4 class="footer-title">Liên hệ</h4>
                    <p>Hotline: 1900 232 354</p>
                    <p>9:00 - 21:00 (kể cả Chủ Nhật)</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
    // Payment method selection
    document.querySelectorAll('.payment-method').forEach(method => {
        method.addEventListener('click', function() {
            document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('selected'));
            this.classList.add('selected');
            this.querySelector('input[type="radio"]').checked = true;
        });
    });
    </script>
    <script src="/js/cart.js?v=2"></script>
    <script src="/js/wishlist.js?v=1"></script>
    <script src="/js/search.js?v=1"></script>
    <script src="/js/auth-dropdown.js?v=1"></script>
</body>
</html>
