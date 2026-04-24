<?php
// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_after_login'] = '/orders';
    header('Location: /login');
    exit;
}

// Lấy danh sách đơn hàng
require_once BASE_PATH . '/config/database.php';
$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("
    SELECT o.*, 
           (SELECT COUNT(*) FROM order_items WHERE order_id = o.id) as item_count
    FROM orders o 
    WHERE o.user_id = :user_id 
    ORDER BY o.created_at DESC
");
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Status labels
$statusLabels = [
    'pending' => ['label' => 'Chờ xác nhận', 'color' => '#ff9800'],
    'confirmed' => ['label' => 'Đã xác nhận', 'color' => '#2196f3'],
    'shipping' => ['label' => 'Đang giao', 'color' => '#9c27b0'],
    'delivered' => ['label' => 'Đã giao', 'color' => '#4caf50'],
    'cancelled' => ['label' => 'Đã hủy', 'color' => '#f44336']
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của tôi - Tierra</title>
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
        
        /* Orders */
        .orders-list { display: flex; flex-direction: column; gap: 20px; }
        .order-card { border: 1px solid #e0e0e0; border-radius: 12px; overflow: hidden; transition: all 0.3s; }
        .order-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        
        .order-header { display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; background: #f9f9f9; border-bottom: 1px solid #e0e0e0; }
        .order-id { font-weight: 600; color: #333; }
        .order-date { font-size: 13px; color: #999; }
        .order-status { padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; color: #fff; }
        
        .order-body { padding: 20px; }
        .order-info { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 16px; }
        .order-info-item { }
        .order-info-label { font-size: 12px; color: #999; margin-bottom: 4px; }
        .order-info-value { font-size: 14px; color: #333; font-weight: 500; }
        
        .order-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 16px; border-top: 1px solid #f0f0f0; }
        .order-total { font-size: 18px; font-weight: 700; color: #c9a84c; }
        .order-actions { display: flex; gap: 8px; }
        .btn-order { padding: 8px 16px; border: 1px solid #ddd; background: #fff; border-radius: 6px; font-size: 13px; cursor: pointer; transition: all 0.2s; }
        .btn-order:hover { background: #f9f9f9; }
        .btn-order.primary { background: #c9a84c; color: #fff; border-color: #c9a84c; }
        .btn-order.primary:hover { background: #a88a3d; }
        
        .empty-orders { text-align: center; padding: 60px 20px; }
        .empty-orders i { font-size: 64px; color: #ddd; margin-bottom: 20px; }
        .empty-orders h3 { font-size: 20px; margin-bottom: 12px; }
        .empty-orders p { color: #666; margin-bottom: 24px; }
        .btn-shop { display: inline-block; padding: 12px 32px; background: #c9a84c; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; }
        .btn-shop:hover { background: #a88a3d; }
        
        @media (max-width: 768px) {
            .account-grid { grid-template-columns: 1fr; }
            .order-header { flex-direction: column; align-items: flex-start; gap: 8px; }
            .order-info { grid-template-columns: 1fr; }
            .order-footer { flex-direction: column; align-items: flex-start; gap: 12px; }
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

    <!-- Orders Page -->
    <section class="account-page">
        <div class="account-container">
            <div class="account-grid">
                <!-- Sidebar -->
                <aside class="account-sidebar">
                    <div class="account-user">
                        <div class="account-avatar"><?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?></div>
                        <div class="account-user-info">
                            <h3><?= htmlspecialchars($_SESSION['user_name']) ?></h3>
                            <p><?= htmlspecialchars($_SESSION['user_email']) ?></p>
                        </div>
                    </div>
                    <ul class="account-menu">
                        <li><a href="/account"><i class="fas fa-user"></i> Thông tin tài khoản</a></li>
                        <li><a href="/orders" class="active"><i class="fas fa-shopping-bag"></i> Đơn hàng của tôi</a></li>
                        <li><a href="/wishlist"><i class="fas fa-heart"></i> Sản phẩm yêu thích</a></li>
                        <li><a href="/addresses"><i class="fas fa-map-marker-alt"></i> Địa chỉ</a></li>
                        <li><a href="/change-password"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
                        <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                    </ul>
                </aside>

                <!-- Content -->
                <main class="account-content">
                    <div class="account-header">
                        <h1 class="account-title">Đơn hàng của tôi</h1>
                        <p class="account-subtitle">Quản lý và theo dõi đơn hàng của bạn</p>
                    </div>

                    <?php if (empty($orders)): ?>
                    <div class="empty-orders">
                        <i class="fas fa-shopping-bag"></i>
                        <h3>Chưa có đơn hàng nào</h3>
                        <p>Bạn chưa có đơn hàng nào. Hãy khám phá và mua sắm ngay!</p>
                        <a href="/products?category=trang-suc" class="btn-shop">Khám phá sản phẩm</a>
                    </div>
                    <?php else: ?>
                    <div class="orders-list">
                        <?php foreach ($orders as $order): 
                            $status = $statusLabels[$order['status']] ?? ['label' => 'Không xác định', 'color' => '#999'];
                        ?>
                        <div class="order-card">
                            <div class="order-header">
                                <div>
                                    <div class="order-id">Đơn hàng #<?= $order['id'] ?></div>
                                    <div class="order-date"><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></div>
                                </div>
                                <span class="order-status" style="background: <?= $status['color'] ?>">
                                    <?= $status['label'] ?>
                                </span>
                            </div>
                            <div class="order-body">
                                <div class="order-info">
                                    <div class="order-info-item">
                                        <div class="order-info-label">Người nhận</div>
                                        <div class="order-info-value"><?= htmlspecialchars($order['customer_name']) ?></div>
                                    </div>
                                    <div class="order-info-item">
                                        <div class="order-info-label">Số điện thoại</div>
                                        <div class="order-info-value"><?= htmlspecialchars($order['customer_phone']) ?></div>
                                    </div>
                                    <div class="order-info-item">
                                        <div class="order-info-label">Số sản phẩm</div>
                                        <div class="order-info-value"><?= $order['item_count'] ?> sản phẩm</div>
                                    </div>
                                </div>
                                <div class="order-footer">
                                    <div class="order-total"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</div>
                                    <div class="order-actions">
                                        <button class="btn-order primary" onclick="window.location.href='/order?id=<?= $order['id'] ?>'">
                                            Xem chi tiết
                                        </button>
                                        <?php if ($order['status'] === 'pending'): ?>
                                        <button class="btn-order" onclick="cancelOrder(<?= $order['id'] ?>)">
                                            Hủy đơn
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </main>
            </div>
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
    function cancelOrder(orderId) {
        if (confirm('Bạn có chắc muốn hủy đơn hàng này?')) {
            // TODO: Implement cancel order
            alert('Chức năng hủy đơn hàng đang được phát triển');
        }
    }
    </script>
</body>
</html>
