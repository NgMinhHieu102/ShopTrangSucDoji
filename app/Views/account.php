<?php
// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_after_login'] = '/account';
    header('Location: /login');
    exit;
}

// Lấy thông tin user
require_once BASE_PATH . '/config/database.php';
$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản của tôi - DOJI</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/css/auth-dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .account-page { padding: 60px 0; min-height: 60vh; background: #f9f9f9; }
        .account-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .account-grid { display: grid; grid-template-columns: 280px 1fr; gap: 30px; }
        
        /* Sidebar */
        .account-sidebar { background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .account-user { display: flex; align-items: center; gap: 16px; padding-bottom: 20px; border-bottom: 1px solid #eee; margin-bottom: 20px; }
        .account-avatar { 
            width: 60px; 
            height: 60px; 
            min-width: 60px;
            border-radius: 50%; 
            background: linear-gradient(135deg, #c9a84c, #a88a3d); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: #fff; 
            font-size: 24px; 
            font-weight: 600;
            flex-shrink: 0;
        }
        .account-user-info h3 { font-size: 16px; font-weight: 600; margin-bottom: 4px; }
        .account-user-info p { font-size: 13px; color: #666; word-break: break-all; overflow-wrap: break-word; }
        
        .account-menu { list-style: none; padding: 0; margin: 0; }
        .account-menu li { margin-bottom: 4px; }
        .account-menu a { display: flex; align-items: center; gap: 12px; padding: 12px 16px; color: #666; text-decoration: none; border-radius: 8px; transition: all 0.2s; }
        .account-menu a:hover { background: #f9f9f9; color: #333; }
        .account-menu a.active { background: #c9a84c; color: #fff; }
        .account-menu i { width: 20px; text-align: center; }
        
        /* Content */
        .account-content { background: #fff; border-radius: 12px; padding: 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .account-header { margin-bottom: 32px; }
        .account-title { font-size: 24px; font-weight: 600; margin-bottom: 8px; }
        .account-subtitle { color: #666; font-size: 14px; }
        
        .info-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
        .info-item { padding: 20px; background: #f9f9f9; border-radius: 8px; }
        .info-label { font-size: 12px; color: #999; text-transform: uppercase; margin-bottom: 8px; font-weight: 600; }
        .info-value { font-size: 15px; color: #333; font-weight: 500; word-break: break-all; overflow-wrap: break-word; }
        
        .btn-edit { display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: #c9a84c; color: #fff; border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s; margin-top: 24px; }
        .btn-edit:hover { background: #a88a3d; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(201, 168, 76, 0.3); }
        
        @media (max-width: 768px) {
            .account-grid { grid-template-columns: 1fr; }
            .info-grid { grid-template-columns: 1fr; }
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
            <div class="logo"><a href="/"><img src="https://chatgpt.com/backend-api/estuary/public_content/enc/eyJpZCI6Im1fNjlmMGQ4OGM2NmQ4ODE5MTlmNDg3OWQxMTA2OWFhNDA6ZmlsZV8wMDAwMDAwMGQwZTA3MjA5OTMxZGFjNmI2YTMxMmVjOCIsInRzIjoiMjA1NzEiLCJwIjoicHlpIiwiY2lkIjoiMSIsInNpZyI6ImU2Mjc0NTY3YjBiYjQyNzMxNjM1M2M0MTEwY2JiMzA0ZTk1OTExNjFiYjk3NmJhYmUzOTc5NTQwYmQ3YjhiM2QiLCJ2IjoiMCIsImdpem1vX2lkIjpudWxsLCJjcyI6bnVsbCwiY2RuIjpudWxsLCJjcCI6bnVsbCwibWEiOm51bGx9" alt="DOJI"></a></div>
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
                        <div class="auth-dropdown-user">
                            <i class="fas fa-user-circle"></i>
                            <span><?= htmlspecialchars($_SESSION['user_name']) ?></span>
                        </div>
                        <div class="auth-divider"></div>
                        <a href="/account" class="auth-dropdown-item"><i class="fas fa-user-cog"></i> Tài khoản</a>
                        <a href="/orders" class="auth-dropdown-item"><i class="fas fa-shopping-bag"></i> Đơn hàng</a>
                        <a href="/logout" class="auth-dropdown-item"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
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
                    <input type="text" class="search-input" id="searchInput" placeholder="Tìm kiếm sản phẩm ..." oninput="debounceSearch()" onkeypress="handleSearchKeypress(event)">
                    <button class="search-submit" onclick="performSearch()"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="search-results" id="searchResults"></div>
        </div>
    </div>

    <!-- Account Page -->
    <section class="account-page">
        <div class="account-container">
            <div class="account-grid">
                <!-- Sidebar -->
                <aside class="account-sidebar">
                    <div class="account-user">
                        <div class="account-avatar"><?= strtoupper(substr($user['full_name'], 0, 1)) ?></div>
                        <div class="account-user-info">
                            <h3><?= htmlspecialchars($user['full_name']) ?></h3>
                            <p><?= htmlspecialchars($user['email']) ?></p>
                        </div>
                    </div>
                    <ul class="account-menu">
                        <li><a href="/account" class="active"><i class="fas fa-user"></i> Thông tin tài khoản</a></li>
                        <li><a href="/orders"><i class="fas fa-shopping-bag"></i> Đơn hàng của tôi</a></li>
                        <li><a href="/wishlist"><i class="fas fa-heart"></i> Sản phẩm yêu thích</a></li>
                        <li><a href="/addresses"><i class="fas fa-map-marker-alt"></i> Địa chỉ</a></li>
                        <li><a href="/change-password"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
                        <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                    </ul>
                </aside>

                <!-- Content -->
                <main class="account-content">
                    <div class="account-header">
                        <h1 class="account-title">Thông tin tài khoản</h1>
                        <p class="account-subtitle">Quản lý thông tin cá nhân của bạn</p>
                    </div>

                    <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success" style="margin-bottom: 24px; padding: 12px 16px; background: #d4edda; color: #155724; border-radius: 8px;">
                        <i class="fas fa-check-circle"></i> <?= htmlspecialchars($_SESSION['success']) ?>
                    </div>
                    <?php unset($_SESSION['success']); endif; ?>

                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Họ và tên</div>
                            <div class="info-value"><?= htmlspecialchars($user['full_name']) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value"><?= htmlspecialchars($user['email']) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Số điện thoại</div>
                            <div class="info-value"><?= $user['phone'] ? htmlspecialchars($user['phone']) : '<span style="color:#999">Chưa cập nhật</span>' ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Địa chỉ</div>
                            <div class="info-value"><?= $user['address'] ? htmlspecialchars($user['address']) : '<span style="color:#999">Chưa cập nhật</span>' ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Ngày tạo tài khoản</div>
                            <div class="info-value"><?= date('d/m/Y', strtotime($user['created_at'])) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Cập nhật lần cuối</div>
                            <div class="info-value"><?= date('d/m/Y H:i', strtotime($user['updated_at'])) ?></div>
                        </div>
                    </div>

                    <button class="btn-edit" onclick="window.location.href='/account-edit'">
                        <i class="fas fa-edit"></i> Chỉnh sửa thông tin
                    </button>
                </main>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="footer-logo">DOJI</div>
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
