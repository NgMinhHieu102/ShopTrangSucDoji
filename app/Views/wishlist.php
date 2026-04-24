<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách yêu thích - Tierra</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/css/auth-dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .wishlist-page { padding: 60px 0; min-height: 60vh; }
        .wishlist-header { text-align: center; margin-bottom: 40px; }
        .wishlist-header h1 { font-size: 28px; font-weight: 600; margin-bottom: 8px; }
        .wishlist-header p { color: #666; font-size: 14px; }
        
        .wishlist-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-bottom: 40px; }
        
        .wishlist-item { background: #fff; border: 1px solid #eee; border-radius: 8px; overflow: hidden; position: relative; transition: all 0.3s; }
        .wishlist-item:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.1); transform: translateY(-2px); }
        
        .wishlist-item-img { position: relative; padding-top: 100%; background: #f9f9f9; }
        .wishlist-item-img img { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 20px; }
        
        .wishlist-remove { position: absolute; top: 12px; right: 12px; width: 32px; height: 32px; background: #fff; border: none; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1); z-index: 10; }
        .wishlist-remove:hover { background: #f44336; color: #fff; }
        
        .wishlist-item-info { padding: 16px; }
        .wishlist-item-name { font-size: 14px; font-weight: 500; margin-bottom: 8px; line-height: 1.4; min-height: 40px; }
        .wishlist-item-price { font-size: 16px; color: #c9a84c; font-weight: 600; margin-bottom: 12px; }
        
        .wishlist-actions { display: flex; gap: 8px; }
        .btn-add-cart { flex: 1; padding: 10px; background: #5c3d2e; color: #fff; border: none; font-size: 13px; cursor: pointer; border-radius: 4px; }
        .btn-add-cart:hover { background: #4a3025; }
        .btn-view { flex: 1; padding: 10px; background: #fff; color: #5c3d2e; border: 1px solid #5c3d2e; font-size: 13px; cursor: pointer; border-radius: 4px; }
        .btn-view:hover { background: #f5f5f5; }
        
        .wishlist-empty { text-align: center; padding: 80px 20px; }
        .wishlist-empty i { font-size: 64px; color: #ddd; margin-bottom: 20px; }
        .wishlist-empty h2 { font-size: 20px; margin-bottom: 12px; color: #333; }
        .wishlist-empty p { color: #666; margin-bottom: 24px; }
        .btn-shop { display: inline-block; padding: 12px 32px; background: #5c3d2e; color: #fff; text-decoration: none; border-radius: 4px; }
        .btn-shop:hover { background: #4a3025; }
        
        @media (max-width: 1024px) {
            .wishlist-grid { grid-template-columns: repeat(3, 1fr); }
        }
        
        @media (max-width: 768px) {
            .wishlist-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
        }
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
    <!-- Wishlist Content -->
    <section class="wishlist-page">
        <div class="container">
            <div class="wishlist-header">
                <h1>Danh sách yêu thích</h1>
                <p>Các sản phẩm bạn đã lưu</p>
            </div>

            <?php if (empty($wishlistItems)): ?>
            <div class="wishlist-empty">
                <i class="far fa-heart"></i>
                <h2>Danh sách yêu thích trống</h2>
                <p>Bạn chưa có sản phẩm nào trong danh sách yêu thích</p>
                <a href="/products?category=trang-suc" class="btn-shop">Khám phá sản phẩm</a>
            </div>
            <?php else: ?>
            <div class="wishlist-grid">
                <?php foreach ($wishlistItems as $item): ?>
                <div class="wishlist-item" data-product-id="<?= $item['id'] ?>">
                    <button class="wishlist-remove" onclick="removeFromWishlist(<?= $item['id'] ?>)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="wishlist-item-img">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                    </div>
                    <div class="wishlist-item-info">
                        <div class="wishlist-item-name"><?= htmlspecialchars($item['name']) ?></div>
                        <div class="wishlist-item-price"><?= number_format($item['price'], 0, ',', '.') ?> đ</div>
                        <div class="wishlist-actions">
                            <button class="btn-add-cart" onclick="addToCartFromWishlist(<?= $item['id'] ?>)">
                                <i class="fas fa-shopping-bag"></i> Thêm vào giỏ
                            </button>
                            <a href="/product?id=<?= $item['id'] ?>" class="btn-view">Xem</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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
</body>
</html>
