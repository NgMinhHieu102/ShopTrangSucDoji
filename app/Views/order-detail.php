<?php
// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header('Location: /login');
    exit;
}

// Lấy thông tin đơn hàng
require_once BASE_PATH . '/config/database.php';
$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT * FROM orders WHERE id = :id AND user_id = :user_id");
$stmt->execute(['id' => $orderId, 'user_id' => $_SESSION['user_id']]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    header('Location: /orders');
    exit;
}

// Lấy chi tiết sản phẩm
$stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = :order_id");
$stmt->execute(['order_id' => $orderId]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Status labels
$statusLabels = [
    'pending' => ['label' => 'Chờ xác nhận', 'color' => '#ff9800'],
    'confirmed' => ['label' => 'Đã xác nhận', 'color' => '#2196f3'],
    'shipping' => ['label' => 'Đang giao', 'color' => '#9c27b0'],
    'delivered' => ['label' => 'Đã giao', 'color' => '#4caf50'],
    'cancelled' => ['label' => 'Đã hủy', 'color' => '#f44336']
];
$status = $statusLabels[$order['status']] ?? ['label' => 'Không xác định', 'color' => '#999'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng #<?= $order['id'] ?> - Tierra</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/css/auth-dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .order-detail-page { padding: 60px 0; min-height: 60vh; background: #f9f9f9; }
        .order-detail-container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }
        
        .back-link { display: inline-flex; align-items: center; gap: 8px; color: #666; text-decoration: none; margin-bottom: 24px; font-size: 14px; }
        .back-link:hover { color: #c9a84c; }
        
        .order-detail-header { background: #fff; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .order-detail-title { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
        .order-detail-title h1 { font-size: 24px; font-weight: 600; }
        .order-status { padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: 600; color: #fff; }
        .order-meta { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; padding-top: 16px; border-top: 1px solid #f0f0f0; }
        .order-meta-item { }
        .order-meta-label { font-size: 12px; color: #999; margin-bottom: 4px; }
        .order-meta-value { font-size: 14px; color: #333; font-weight: 500; }
        
        .order-section { background: #fff; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .section-title { font-size: 18px; font-weight: 600; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #f0f0f0; }
        
        .order-items { }
        .order-item { display: flex; gap: 16px; padding: 16px 0; border-bottom: 1px solid #f0f0f0; }
        .order-item:last-child { border-bottom: none; }
        .item-image { width: 80px; height: 80px; object-fit: cover; border-radius: 8px; }
        .item-info { flex: 1; }
        .item-name { font-size: 15px; font-weight: 600; margin-bottom: 8px; color: #333; }
        .item-details { display: flex; gap: 24px; font-size: 14px; color: #666; }
        .item-price { font-weight: 600; color: #c9a84c; }
        
        .shipping-info { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .info-group { }
        .info-group-title { font-size: 14px; font-weight: 600; margin-bottom: 12px; color: #333; }
        .info-row { display: flex; margin-bottom: 8px; font-size: 14px; }
        .info-label { width: 120px; color: #666; }
        .info-value { flex: 1; color: #333; font-weight: 500; }
        
        .order-summary { }
        .summary-row { display: flex; justify-content: space-between; padding: 12px 0; font-size: 15px; }
        .summary-row.total { border-top: 2px solid #f0f0f0; margin-top: 12px; padding-top: 16px; font-size: 18px; font-weight: 700; color: #c9a84c; }
        
        @media (max-width: 768px) {
            .order-meta { grid-template-columns: 1fr; }
            .shipping-info { grid-template-columns: 1fr; }
            .order-item { flex-direction: column; }
            .item-details { flex-direction: column; gap: 8px; }
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
            <div class="logo"><a href="/"><img src="https://chatgpt.com/backend-api/estuary/public_content/enc/eyJpZCI6Im1fNjlmMGQ4OGM2NmQ4ODE5MTlmNDg3OWQxMTA2OWFhNDA6ZmlsZV8wMDAwMDAwMGQwZTA3MjA5OTMxZGFjNmI2YTMxMmVjOCIsInRzIjoiMjA1NzEiLCJwIjoicHlpIiwiY2lkIjoiMSIsInNpZyI6ImU2Mjc0NTY3YjBiYjQyNzMxNjM1M2M0MTEwY2JiMzA0ZTk1OTExNjFiYjk3NmJhYmUzOTc5NTQwYmQ3YjhiM2QiLCJ2IjoiMCIsImdpem1vX2lkIjpudWxsLCJjcyI6bnVsbCwiY2RuIjpudWxsLCJjcCI6bnVsbCwibWEiOm51bGx9" alt="Tierra"></a></div>
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

    <!-- Order Detail Page -->
    <section class="order-detail-page">
        <div class="order-detail-container">
            <a href="/orders" class="back-link">
                <i class="fas fa-arrow-left"></i> Quay lại đơn hàng của tôi
            </a>

            <!-- Order Header -->
            <div class="order-detail-header">
                <div class="order-detail-title">
                    <h1>Đơn hàng #<?= $order['id'] ?></h1>
                    <span class="order-status" style="background: <?= $status['color'] ?>">
                        <?= $status['label'] ?>
                    </span>
                </div>
                <div class="order-meta">
                    <div class="order-meta-item">
                        <div class="order-meta-label">Ngày đặt hàng</div>
                        <div class="order-meta-value"><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></div>
                    </div>
                    <div class="order-meta-item">
                        <div class="order-meta-label">Phương thức thanh toán</div>
                        <div class="order-meta-value">
                            <?= $order['payment_method'] === 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản' ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="order-section">
                <h2 class="section-title">Sản phẩm đã đặt</h2>
                <div class="order-items">
                    <?php foreach ($items as $item): ?>
                    <div class="order-item">
                        <img src="<?= htmlspecialchars($item['product_image']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" class="item-image">
                        <div class="item-info">
                            <div class="item-name"><?= htmlspecialchars($item['product_name']) ?></div>
                            <div class="item-details">
                                <span>Số lượng: <?= $item['quantity'] ?></span>
                                <span class="item-price"><?= number_format($item['price'], 0, ',', '.') ?>đ</span>
                            </div>
                        </div>
                        <div class="item-price" style="font-size: 16px;">
                            <?= number_format($item['subtotal'], 0, ',', '.') ?>đ
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Shipping Info -->
            <div class="order-section">
                <h2 class="section-title">Thông tin giao hàng</h2>
                <div class="shipping-info">
                    <div class="info-group">
                        <div class="info-group-title">Người nhận</div>
                        <div class="info-row">
                            <span class="info-label">Họ và tên:</span>
                            <span class="info-value"><?= htmlspecialchars($order['customer_name']) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Số điện thoại:</span>
                            <span class="info-value"><?= htmlspecialchars($order['customer_phone']) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Email:</span>
                            <span class="info-value"><?= htmlspecialchars($order['customer_email']) ?></span>
                        </div>
                    </div>
                    <div class="info-group">
                        <div class="info-group-title">Địa chỉ giao hàng</div>
                        <div class="info-row">
                            <span class="info-label">Địa chỉ:</span>
                            <span class="info-value"><?= htmlspecialchars($order['shipping_address']) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Phường/Xã:</span>
                            <span class="info-value"><?= htmlspecialchars($order['ward']) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Quận/Huyện:</span>
                            <span class="info-value"><?= htmlspecialchars($order['district']) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Tỉnh/Thành:</span>
                            <span class="info-value"><?= htmlspecialchars($order['city']) ?></span>
                        </div>
                    </div>
                </div>
                <?php if ($order['notes']): ?>
                <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #f0f0f0;">
                    <div class="info-group-title">Ghi chú</div>
                    <p style="color: #666; font-size: 14px; margin-top: 8px;"><?= nl2br(htmlspecialchars($order['notes'])) ?></p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Order Summary -->
            <div class="order-section">
                <h2 class="section-title">Tổng cộng</h2>
                <div class="order-summary">
                    <div class="summary-row">
                        <span>Tạm tính:</span>
                        <span><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</span>
                    </div>
                    <div class="summary-row">
                        <span>Phí vận chuyển:</span>
                        <span>Miễn phí</span>
                    </div>
                    <div class="summary-row total">
                        <span>Tổng cộng:</span>
                        <span><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</span>
                    </div>
                </div>
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
</body>
</html>
