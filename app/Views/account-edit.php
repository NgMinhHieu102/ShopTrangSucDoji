<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}

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
    <title>Chỉnh sửa thông tin - DOJI</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/css/auth-dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .edit-page { padding: 60px 0; min-height: 60vh; background: #f9f9f9; }
        .edit-container { max-width: 600px; margin: 0 auto; padding: 0 20px; }
        .edit-box { background: #fff; border-radius: 12px; padding: 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .edit-header { margin-bottom: 32px; }
        .edit-title { font-size: 24px; font-weight: 600; margin-bottom: 8px; }
        .edit-subtitle { color: #666; font-size: 14px; }
        .alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 24px; display: flex; align-items: center; gap: 8px; }
        .alert-error { background: #f8d7da; color: #721c24; }
        .alert-success { background: #d4edda; color: #155724; }
    </style>
</head>
<body>
    <div class="top-banner"><p>Giảm 30% cho đơn hàng từ 3.000.000đ</p></div>
    <header class="header">
        <div class="container">
            <div class="logo"><a href="/"><img src="https://chatgpt.com/backend-api/estuary/public_content/enc/eyJpZCI6Im1fNjlmMGQ4OGM2NmQ4ODE5MTlmNDg3OWQxMTA2OWFhNDA6ZmlsZV8wMDAwMDAwMGQwZTA3MjA5OTMxZGFjNmI2YTMxMmVjOCIsInRzIjoiMjA1NzEiLCJwIjoicHlpIiwiY2lkIjoiMSIsInNpZyI6ImU2Mjc0NTY3YjBiYjQyNzMxNjM1M2M0MTEwY2JiMzA0ZTk1OTExNjFiYjk3NmJhYmUzOTc5NTQwYmQ3YjhiM2QiLCJ2IjoiMCIsImdpem1vX2lkIjpudWxsLCJjcyI6bnVsbCwiY2RuIjpudWxsLCJjcCI6bnVsbCwibWEiOm51bGx9" alt="DOJI"></a></div>
            <div class="header-right">
                <a href="/account" class="header-link">← Quay lại</a>
            </div>
        </div>
    </header>

    <section class="edit-page">
        <div class="edit-container">
            <div class="edit-box">
                <div class="edit-header">
                    <h1 class="edit-title">Chỉnh sửa thông tin</h1>
                    <p class="edit-subtitle">Cập nhật thông tin cá nhân của bạn</p>
                </div>

                <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($_SESSION['error']) ?>
                </div>
                <?php unset($_SESSION['error']); endif; ?>

                <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?= htmlspecialchars($_SESSION['success']) ?>
                </div>
                <?php unset($_SESSION['success']); endif; ?>

                <form action="/account-edit" method="POST" class="auth-form">
                    <div class="form-group">
                        <label for="full_name">Họ và tên <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" id="full_name" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                        </div>
                        <small class="form-hint">Email dùng để đăng nhập</small>
                    </div>

                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <div class="input-wrapper">
                            <i class="fas fa-phone"></i>
                            <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <div class="input-wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" id="address" name="address" value="<?= htmlspecialchars($user['address']) ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Lưu thay đổi
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="footer-logo">DOJI</div>
                    <p class="footer-tagline">happiness bespoke</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
