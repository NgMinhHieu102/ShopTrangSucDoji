<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Tierra</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                <a href="/" class="header-link">Trang chủ</a>
                <a href="/cart" class="header-icon"><i class="fas fa-shopping-bag"></i><span class="badge" id="cart-count">0</span></a>
            </div>
        </div>
    </header>

    <!-- Register Page -->
    <section class="auth-page">
        <div class="auth-container">
            <div class="auth-box">
                <h1 class="auth-title">Đăng ký tài khoản</h1>
                <p class="auth-subtitle">Tạo tài khoản để trải nghiệm mua sắm tốt hơn</p>

                <!-- Progress Steps -->
                <div class="steps-indicator">
                    <div class="step active" data-step="1">
                        <div class="step-number">1</div>
                        <div class="step-label">Thông tin</div>
                    </div>
                    <div class="step-line"></div>
                    <div class="step" data-step="2">
                        <div class="step-number">2</div>
                        <div class="step-label">Mật khẩu</div>
                    </div>
                </div>

                <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= htmlspecialchars($_SESSION['error']) ?>
                </div>
                <?php unset($_SESSION['error']); endif; ?>

                <form action="/register" method="POST" class="auth-form multi-step-form" id="registerForm">
                    <!-- Step 1: Basic Info -->
                    <div class="form-step active" data-step="1">
                        <div class="form-group">
                            <label for="full_name">Họ và tên <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" id="full_name" name="full_name" placeholder="Nguyễn Văn A" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-envelope"></i>
                                <input type="email" id="email" name="email" placeholder="example@email.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <div class="input-wrapper">
                                <i class="fas fa-phone"></i>
                                <input type="tel" id="phone" name="phone" placeholder="0123456789">
                            </div>
                        </div>

                        <button type="button" class="btn-submit" onclick="nextStep()">
                            Tiếp theo <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Step 2: Password -->
                    <div class="form-step" data-step="2">
                        <div class="form-group">
                            <label for="password">Mật khẩu <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="password" name="password" placeholder="••••••••" required minlength="6">
                                <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <small class="form-hint">Mật khẩu phải có ít nhất 6 ký tự</small>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Xác nhận mật khẩu <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('confirm_password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="agree_terms" required>
                                <span>Tôi đồng ý với <a href="/terms">Điều khoản dịch vụ</a> và <a href="/privacy">Chính sách bảo mật</a></span>
                            </label>
                        </div>

                        <div class="form-step-buttons">
                            <button type="button" class="btn-back" onclick="prevStep()">
                                <i class="fas fa-arrow-left"></i> Quay lại
                            </button>
                            <button type="submit" class="btn-submit">Đăng ký</button>
                        </div>
                    </div>
                </form>

                <div class="auth-divider">
                    <span>hoặc</span>
                </div>

                <div class="social-login">
                    <button class="btn-social btn-google">
                        <i class="fab fa-google"></i>
                        Đăng ký với Google
                    </button>
                    <button class="btn-social btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                        Đăng ký với Facebook
                    </button>
                </div>

                <p class="auth-footer">
                    Đã có tài khoản? <a href="/login">Đăng nhập ngay</a>
                </p>
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
    <script>
    let currentStep = 1;
    const totalSteps = 2;

    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const button = input.parentElement.querySelector('.toggle-password i');
        
        if (input.type === 'password') {
            input.type = 'text';
            button.classList.remove('fa-eye');
            button.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            button.classList.remove('fa-eye-slash');
            button.classList.add('fa-eye');
        }
    }

    function nextStep() {
        // Validate current step
        const currentStepElement = document.querySelector(`.form-step[data-step="${currentStep}"]`);
        const inputs = currentStepElement.querySelectorAll('input[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.focus();
                return;
            }
        });

        if (!isValid) {
            alert('Vui lòng điền đầy đủ thông tin bắt buộc');
            return;
        }

        // Validate email format
        const emailInput = document.getElementById('email');
        if (emailInput && currentStep === 1) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                alert('Email không hợp lệ');
                emailInput.focus();
                return;
            }
        }

        if (currentStep < totalSteps) {
            // Hide current step
            document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.remove('active');
            document.querySelector(`.step[data-step="${currentStep}"]`).classList.remove('active');
            document.querySelector(`.step[data-step="${currentStep}"]`).classList.add('completed');

            // Show next step
            currentStep++;
            document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.add('active');
            document.querySelector(`.step[data-step="${currentStep}"]`).classList.add('active');

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            // Hide current step
            document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.remove('active');
            document.querySelector(`.step[data-step="${currentStep}"]`).classList.remove('active');

            // Show previous step
            currentStep--;
            document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.add('active');
            document.querySelector(`.step[data-step="${currentStep}"]`).classList.add('active');
            document.querySelector(`.step[data-step="${currentStep}"]`).classList.remove('completed');

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }

    // Validate password match on submit
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Mật khẩu xác nhận không khớp!');
            document.getElementById('confirm_password').focus();
        }
    });
    </script>
</body>
</html>
