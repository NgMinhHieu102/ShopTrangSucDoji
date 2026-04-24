<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức - Tierra</title>
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
                <a href="/"><img src="https://www.tierra.vn/wp-content/uploads/2025/11/tierra-logo.webp" alt="Tierra"></a>
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
                <a href="/">Trang chủ</a> / <a href="/news">Tin tức</a> / <span><?= $article['title'] ?></span>
            </nav>
        </div>
    </section>

    <!-- News Detail Page -->
    <section class="news-detail-page">
        <div class="container">
            <div class="news-detail-layout">
                <!-- Main Content -->
                <div class="news-detail-main">
                    <h1 class="news-detail-title"><?= $article['title'] ?></h1>
                    <?php if (isset($article['date'])): ?>
                    <div class="news-detail-meta" style="color: #999; font-size: 14px; margin-bottom: 20px;">
                        <i class="fas fa-calendar"></i> <?= $article['date'] ?>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Featured Image -->
                    <div class="news-detail-featured">
                        <img src="<?= $article['image'] ?>" alt="<?= $article['title'] ?>">
                    </div>

                    <!-- Article Content -->
                    <div class="news-detail-content">
                        <?= $article['content'] ?>

                        <div class="news-detail-cta">
                            <a href="/products?category=trang-suc" class="btn-primary">Xem bộ sưu tập</a>
                        </div>
                    </div>

                    <!-- Share Section -->
                    <div class="news-detail-share">
                        <span>Chia sẻ:</span>
                        <div class="share-buttons">
                            <a href="#" class="share-btn facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="share-btn pinterest"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" class="share-btn linkedin"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <!-- Related News -->
                    <div class="related-news">
                        <h3 class="related-news-title">Tin tức liên quan</h3>
                        <div class="related-news-grid">
                            <article class="related-news-item">
                                <div class="related-news-image">
                                    <img src="images/tintuc1.png" alt="Hải Nhiên">
                                </div>
                                <div class="related-news-content">
                                    <h4>BỘ SƯU TẬP MỚI "HẢI NHIÊN"</h4>
                                    <a href="/news/hai-nhien" class="related-news-link">Xem thêm →</a>
                                </div>
                            </article>

                            <article class="related-news-item">
                                <div class="related-news-image">
                                    <img src="https://cdn.pnj.io/images/promo/284/thong-tin-gia-vang.png" alt="Quà Tết">
                                </div>
                                <div class="related-news-content">
                                    <h4>"QUÀ TẾT TRAO TAY - NHẬN NGAY ÁO MỚI"</h4>
                                    <a href="/news/qua-tet" class="related-news-link">Xem thêm →</a>
                                </div>
                            </article>

                            <article class="related-news-item">
                                <div class="related-news-image">
                                    <img src="https://www.pnj.com.vn/blog/wp-content/uploads/2022/10/kim-cuong-roi-la-gi-co-nen-mua-kim-cuong-roi-tai-pnj-thumb1.jpg" alt="Khúc Xuân Thi">
                                </div>
                                <div class="related-news-content">
                                    <h4>Bộ sưu tập xuân "Khúc Xuân Thi"</h4>
                                    <a href="/news/khuc-xuan-thi" class="related-news-link">Xem thêm →</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="news-detail-sidebar">
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Sản Phẩm Nổi Bật</h3>
                        
                        <div class="sidebar-products">
                            <?php 
                            // Fallback to static products if no products from database
                            if (empty($featuredProducts)) {
                                $featuredProducts = [
                                    [
                                        'slug' => 'nhan-kim-cuong-royal-collection',
                                        'image' => '/images/trang-suc-cao-cap1.png',
                                        'code' => 'TSCC-001',
                                        'name' => 'Nhẫn Kim Cương Royal Collection',
                                        'price' => 15500000
                                    ],
                                    [
                                        'slug' => 'nhan-vang-celestial',
                                        'image' => '/images/trang-suc-cao-cap2.png',
                                        'code' => 'TSCC-005',
                                        'name' => 'Nhẫn Vàng Celestial',
                                        'price' => 9800000
                                    ]
                                ];
                            }
                            ?>
                            <?php if (!empty($featuredProducts)): ?>
                                <?php foreach ($featuredProducts as $index => $product): ?>
                                <div class="sidebar-product" style="<?= $index > 0 ? 'display: none;' : '' ?>">
                                    <div class="sidebar-product-nav">
                                        <button class="sidebar-nav-btn prev" onclick="prevSidebarProduct()">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button class="sidebar-nav-btn next" onclick="nextSidebarProduct()">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                    <div class="sidebar-product-image">
                                        <a href="/product?slug=<?= htmlspecialchars($product['slug']) ?>">
                                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                        </a>
                                    </div>
                                    <div class="sidebar-product-info">
                                        <p class="sidebar-product-code"><?= htmlspecialchars($product['code']) ?></p>
                                        <p class="sidebar-product-price"><?= number_format($product['price'], 0, ',', '.') ?> đ</p>
                                        <p class="sidebar-product-name"><?= htmlspecialchars($product['name']) ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </aside>
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
                <p>&copy; 2026 Tierra. All rights reserved.</p>
                <div class="footer-payment">
                    <span>Phương thức thanh toán:</span>
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- Chat Button -->
    <div class="chat-button">
        <button onclick="alert('Chức năng chat đang được phát triển!')">
            <i class="fas fa-comments"></i> Chat
        </button>
    </div>

    <script src="js/main.js"></script>
    <script>
        // Sidebar product slider
        let currentSidebarProduct = 0;
        const sidebarProducts = document.querySelectorAll('.sidebar-product');

        function showSidebarProduct(index) {
            sidebarProducts.forEach((product, i) => {
                product.style.display = i === index ? 'block' : 'none';
            });
        }

        function nextSidebarProduct() {
            currentSidebarProduct = (currentSidebarProduct + 1) % sidebarProducts.length;
            showSidebarProduct(currentSidebarProduct);
        }

        function prevSidebarProduct() {
            currentSidebarProduct = (currentSidebarProduct - 1 + sidebarProducts.length) % sidebarProducts.length;
            showSidebarProduct(currentSidebarProduct);
        }
    </script>
    
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
    
    <script src="/js/cart.js?v=2"></script>
    <script src="/js/wishlist.js?v=1"></script>
    <script src="/js/search.js?v=1"></script>
    <script src="/js/auth-dropdown.js?v=1"></script>
</body>
</html>