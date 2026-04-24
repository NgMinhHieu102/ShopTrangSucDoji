<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công - Tierra</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .success-page { padding: 80px 0; min-height: 60vh; text-align: center; }
        .success-icon { font-size: 80px; color: #4caf50; margin-bottom: 30px; }
        .success-title { font-size: 32px; font-weight: 600; margin-bottom: 16px; }
        .success-message { font-size: 16px; color: #666; margin-bottom: 40px; line-height: 1.6; }
        .order-info { background: #f9f9f9; padding: 30px; max-width: 600px; margin: 0 auto 40px; text-align: left; }
        .order-info h3 { font-size: 18px; font-weight: 600; margin-bottom: 20px; }
        .info-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #ddd; }
        .info-row:last-child { border-bottom: none; }
        .info-label { font-weight: 500; }
        .info-value { color: #666; }
        .btn-group { display: flex; gap: 16px; justify-content: center; }
        .btn { padding: 14px 32px; font-size: 15px; font-weight: 600; text-decoration: none; border-radius: 4px; }
        .btn-primary { background: #5c3d2e; color: #fff; }
        .btn-primary:hover { background: #4a3025; }
        .btn-secondary { background: #fff; color: #5c3d2e; border: 2px solid #5c3d2e; }
        .btn-secondary:hover { background: #f5f5f5; }
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
        </div>
    </header>

    <!-- Success Page -->
    <section class="success-page">
        <div class="container">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="success-title">Đặt hàng thành công!</h1>
            <p class="success-message">
                Cảm ơn bạn đã đặt hàng tại Tierra.<br>
                Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận đơn hàng.
            </p>
            
            <div class="order-info">
                <h3>Thông tin đơn hàng</h3>
                <div class="info-row">
                    <span class="info-label">Mã đơn hàng:</span>
                    <span class="info-value">#<?= str_pad($order['id'], 6, '0', STR_PAD_LEFT) ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Người nhận:</span>
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
                <div class="info-row">
                    <span class="info-label">Địa chỉ giao hàng:</span>
                    <span class="info-value"><?= htmlspecialchars($order['shipping_address']) ?>, <?= htmlspecialchars($order['ward']) ?>, <?= htmlspecialchars($order['district']) ?>, <?= htmlspecialchars($order['city']) ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Tổng tiền:</span>
                    <span class="info-value" style="color: #c9a84c; font-weight: 600; font-size: 18px;">
                        <?= number_format($order['total_amount'], 0, ',', '.') ?>đ
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phương thức thanh toán:</span>
                    <span class="info-value">
                        <?= $order['payment_method'] === 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng' ?>
                    </span>
                </div>
            </div>
            
            <div class="btn-group">
                <a href="/" class="btn btn-primary">Về trang chủ</a>
                <a href="/products" class="btn btn-secondary">Tiếp tục mua sắm</a>
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
                    <h4 class="footer-title">Liên hệ</h4>
                    <p>Hotline: 1900 232 354</p>
                    <p>9:00 - 21:00 (kể cả Chủ Nhật)</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
