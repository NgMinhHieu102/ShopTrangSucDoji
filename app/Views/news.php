<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức - DOJI</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/css/auth-dropdown.css">
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
            <!-- Logo -->
            <div class="logo">
                <a href="/"><img src="https://chatgpt.com/backend-api/estuary/public_content/enc/eyJpZCI6Im1fNjlmMGQ4OGM2NmQ4ODE5MTlmNDg3OWQxMTA2OWFhNDA6ZmlsZV8wMDAwMDAwMGQwZTA3MjA5OTMxZGFjNmI2YTMxMmVjOCIsInRzIjoiMjA1NzEiLCJwIjoicHlpIiwiY2lkIjoiMSIsInNpZyI6ImU2Mjc0NTY3YjBiYjQyNzMxNjM1M2M0MTEwY2JiMzA0ZTk1OTExNjFiYjk3NmJhYmUzOTc5NTQwYmQ3YjhiM2QiLCJ2IjoiMCIsImdpem1vX2lkIjpudWxsLCJjcyI6bnVsbCwiY2RuIjpudWxsLCJjcCI6bnVsbCwibWEiOm51bGx9" alt="DOJI"></a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navigation -->
            <nav class="nav-menu" id="navMenu">
                <ul>
                    <li class="nav-dropdown">
                        <a href="/products?category=engagement">Nhẫn cầu hôn</a>
                    </li>
                    <li class="nav-dropdown">
                        <a href="/products?category=wedding">Nhẫn cưới</a>
                    </li>
                    <li class="nav-dropdown">
                        <a href="/products?category=kim-cuong">Kim Cương</a>
                    </li>
                    <li><a href="/products?category=trang-suc-cao-cap">Trang sức cao cấp</a></li>
                    <li class="nav-dropdown">
                        <a href="/products?category=trang-suc">Trang sức</a>
                    </li>
                    <li>
                        <a href="/news" class="active">Tin tức</a>
                    </li>
                </ul>
            </nav>

            <!-- Right Menu -->
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

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav class="breadcrumb">
                <a href="/">Trang chủ</a> / <span>Blog</span>
            </nav>
        </div>
    </section>

    <!-- Blog Page -->
    <section class="blog-page">
        <div class="container">
            <h1 class="blog-title">Blog</h1>
            
            <!-- Blog Grid -->
            <div class="blog-grid">
                <!-- Blog Item 1 -->
                <article class="blog-item" onclick="window.location.href='/news?article=hai-nhien'">
                    <div class="blog-image">
                        <img src="images/tintuc1.png" alt="Hải Nhiên">
                        <div class="blog-badge">DOJI</div>
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-item-title">BỘ SƯU TẬP MỚI "HẢI NHIÊN" - KHI VẺ ĐẸP KHÔNG CẦN LÊN TIẾNG</h2>
                        <p class="blog-excerpt">Ra mắt hơn 40+ thiết kế, "Hải Nhiên" là lời gọi mở cho mùa hè: chọn những điều nhẹ nhàng hơn, những vấn đề khiến năng cảm thấy...</p>
                        <a href="/news?article=hai-nhien" class="blog-read-more" onclick="event.stopPropagation()">Xem thêm</a>
                    </div>
                </article>

                <!-- Blog Item 2 -->
                <article class="blog-item" onclick="window.location.href='/news?article=moc-nguyen'">
                    <div class="blog-image">
                        <img src="images/tintuc2.png" alt="Mộc Nguyên">
                        <div class="blog-badge">DOJI</div>
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-item-title">DOJI Ra Mắt BST Tháng 3 "Mộc Nguyên" – Vẻ Đẹp Mộc Mạc Cho Mọi Khởi Đầu Mới!</h2>
                        <p class="blog-excerpt">Ra mắt vào tháng 3 – tháng của sự yêu thương và lãn mạn phép đẹp – "Mộc Nguyên" như một lời chào đầu dành gửi đến những người phụ nữ...</p>
                        <a href="/news?article=moc-nguyen" class="blog-read-more" onclick="event.stopPropagation()">Xem thêm</a>
                    </div>
                </article>

                <!-- Blog Item 3 -->
                <article class="blog-item" onclick="window.location.href='/news?article=qua-tet'">
                    <div class="blog-image">
                        <img src="https://cdn.pnj.io/images/promo/284/thong-tin-gia-vang.png" alt="Quà Tết">
                        <div class="blog-badge">DOJI</div>
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-item-title">"QUÀ TẾT TRAO TAY - NHẬN NGAY ÁO MỚI" - DOJI tặng áo thun cho hóa đơn từ 1 triệu 2</h2>
                        <p class="blog-excerpt">Với mỗi hóa đơn 1 triệu 2 (sau khi áp dụng đối điểm), các nàng sẽ được TẶNG NGAY một chiếc ÁO THUN siêu xinh!</p>
                        <a href="/news?article=qua-tet" class="blog-read-more" onclick="event.stopPropagation()">Xem thêm</a>
                    </div>
                </article>

                <!-- Blog Item 4 -->
                <article class="blog-item" onclick="window.location.href='/news?article=khuc-xuan-thi'">
                    <div class="blog-image">
                        <img src="https://www.pnj.com.vn/blog/wp-content/uploads/2022/10/kim-cuong-roi-la-gi-co-nen-mua-kim-cuong-roi-tai-pnj-thumb1.jpg" alt="Khúc Xuân Thi">
                        <div class="blog-badge">DOJI</div>
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-item-title">DOJI ra mắt bộ sưu tập xuân "Khúc Xuân Thi" – Thiết kế trang sức vàng đầm xinh đẹp</h2>
                        <p class="blog-excerpt">Lấy cảm hứng từ chính khoảnh khắc giao mùa đầy thì vị của mùa Xuân, DOJI chính thức ra mắt bộ sưu tập trang sức xuân mang đậm chất thơ mộng...</p>
                        <a href="/news?article=khuc-xuan-thi" class="blog-read-more" onclick="event.stopPropagation()">Xem thêm</a>
                    </div>
                </article>

                <!-- Blog Item 5 -->
                <article class="blog-item" onclick="window.location.href='/news?article=di-sac'">
                    <div class="blog-image">
                        <img src="https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg" alt="Dí Sắc">
                        <div class="blog-badge">DOJI</div>
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-item-title">Bộ sưu tập "Dí Sắc" - Tôn vinh vẻ đẹp kim cương tinh khiết</h2>
                        <p class="blog-excerpt">Khám phá vẻ đẹp rực rỡ của kim cương qua bộ sưu tập "Dí Sắc" với những thiết kế độc đáo và tinh tế...</p>
                        <a href="/news?article=di-sac" class="blog-read-more" onclick="event.stopPropagation()">Xem thêm</a>
                    </div>
                </article>

                <!-- Blog Item 6 -->
                <article class="blog-item" onclick="window.location.href='/news?article=co-the-len'">
                    <div class="blog-image">
                        <img src="https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg" alt="Cô Thể Lên">
                        <div class="blog-badge">DOJI</div>
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-item-title">Xu hướng trang sức 2026 - "Cô Thể Lên" phong cách hiện đại</h2>
                        <p class="blog-excerpt">Cập nhật những xu hướng trang sức mới nhất năm 2026 với phong cách hiện đại và tinh tế dành cho phái đẹp...</p>
                        <a href="/news?article=co-the-len" class="blog-read-more" onclick="event.stopPropagation()">Xem thêm</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- Column 1 - About -->
                <div class="footer-column">
                    <h4 class="footer-title">Về Chúng Tôi</h4>
                    <ul class="footer-links">
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Câu chuyện thương hiệu</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>

                <!-- Column 2 - Customer Service -->
                <div class="footer-column">
                    <h4 class="footer-title">Dịch Vụ Khách Hàng</h4>
                    <ul class="footer-links">
                        <li><a href="#">Hướng dẫn mua hàng</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Chính sách vận chuyển</a></li>
                        <li><a href="#">Câu hỏi thường gặp</a></li>
                    </ul>
                </div>

                <!-- Column 3 - Products -->
                <div class="footer-column">
                    <h4 class="footer-title">Sản Phẩm</h4>
                    <ul class="footer-links">
                        <li><a href="#">Trang sức Nam</a></li>
                        <li><a href="#">Trang sức Nữ</a></li>
                        <li><a href="#">Trang sức Trẻ em</a></li>
                        <li><a href="#">Kim cương</a></li>
                        <li><a href="#">Ngọc trai</a></li>
                    </ul>
                </div>

                <!-- Column 4 - Contact -->
                <div class="footer-column">
                    <h4 class="footer-title">Liên Hệ</h4>
                    <ul class="footer-contact">
                        <li><i class="fas fa-phone"></i> Hotline: 1900 1234</li>
                        <li><i class="fas fa-envelope"></i> Email: support@jewelry.vn</li>
                        <li><i class="fas fa-map-marker-alt"></i> Hệ thống 420+ cửa hàng</li>
                    </ul>
                    <div class="footer-social">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>&copy; 2026 DOJI. All rights reserved.</p>
                <div class="footer-payment">
                    <span>Phương thức thanh toán:</span>
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
        </div>
    </footer>

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

    <!-- Chat Button -->
    <div class="chat-button">
        <button onclick="alert('Chức năng chat đang được phát triển!')">
            <i class="fas fa-comments"></i> Chat
        </button>
    </div>

    <script src="/js/main.js"></script>
    <script src="/js/cart.js?v=2"></script>
    <script src="/js/wishlist.js?v=1"></script>
    <script src="/js/search.js?v=1"></script>
    <script src="/js/auth-dropdown.js?v=1"></script>
</body>
</html>