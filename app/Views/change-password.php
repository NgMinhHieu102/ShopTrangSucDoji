<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu - Tierra</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="top-banner"><p>Giảm 30% cho đơn hàng từ 3.000.000đ</p></div>
    <header class="header">
        <div class="container">
            <div class="logo"><a href="/"><img src="https://chatgpt.com/backend-api/estuary/public_content/enc/eyJpZCI6Im1fNjlmMGQ4OGM2NmQ4ODE5MTlmNDg3OWQxMTA2OWFhNDA6ZmlsZV8wMDAwMDAwMGQwZTA3MjA5OTMxZGFjNmI2YTMxMmVjOCIsInRzIjoiMjA1NzEiLCJwIjoicHlpIiwiY2lkIjoiMSIsInNpZyI6ImU2Mjc0NTY3YjBiYjQyNzMxNjM1M2M0MTEwY2JiMzA0ZTk1OTExNjFiYjk3NmJhYmUzOTc5NTQwYmQ3YjhiM2QiLCJ2IjoiMCIsImdpem1vX2lkIjpudWxsLCJjcyI6bnVsbCwiY2RuIjpudWxsLCJjcCI6bnVsbCwibWEiOm51bGx9" alt="Tierra"></a></div>
            <div class="header-right">
                <a href="/account" class="header-link">Quay lại</a>
            </div>
        </div>
    </header>
    <section class="auth-page">
        <div class="auth-container">
            <div class="auth-box">
                <h1 class="auth-title">Đổi mật khẩu</h1>
                <p class="auth-subtitle">Cập nhật mật khẩu của bạn</p>
                <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> <?= $_SESSION['error'] ?></div>
                <?php unset($_SESSION['error']); endif; ?>
                <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><i class="fas fa-check-circle"></i> <?= $_SESSION['success'] ?></div>
                <?php unset($_SESSION['success']); endif; ?>
                <form action="/change-password" method="POST" class="auth-form">
                    <div class="form-group">
                        <label>Mật khẩu hiện tại</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="current_password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="new_password" required minlength="6">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Xác nhận mật khẩu mới</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="confirm_password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-submit">Đổi mật khẩu</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
