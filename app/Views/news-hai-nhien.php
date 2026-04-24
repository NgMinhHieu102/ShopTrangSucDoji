<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bộ Sưu Tập Mới "Hải Nhiên" - Tierra</title>
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
            <div class="logo">
                <a href="/"><img src="https://www.tierra.vn/wp-content/uploads/2025/11/tierra-logo.webp" alt="Tierra"></a>
            </div>
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
            <nav class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="/products?category=engagement">Nhẫn cầu hôn</a></li>
                    <li><a href="/products?category=wedding">Nhẫn cưới</a></li>
                    <li><a href="/products?category=kim-cuong">Kim Cương</a></li>
                    <li><a href="/products?category=trang-suc-cao-cap">Trang sức cao cấp</a></li>
                    <li><a href="/products?category=trang-suc">Trang sức</a></li>
                    <li><a href="/news" class="active">Tin tức</a></li>
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

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav class="breadcrumb">
                <a href="/">Trang chủ</a> / <a href="/news">Tin tức</a> / <span>Bộ Sưu Tập Mới "Hải Nhiên"</span>
            </nav>
        </div>
    </section>

    <!-- News Detail Page -->
    <section class="news-detail-page">
        <div class="container">
            <div class="news-detail-layout">
                <div class="news-detail-main">
                    <h1 class="news-detail-title">BỘ SƯU TẬP MỚI "HẢI NHIÊN" - KHI VẺ ĐẸP KHÔNG CẦN LÊN TIẾNG</h1>
                    
                    <div class="news-detail-featured">
                        <img src="images/tintuc1.png" alt="Hải Nhiên">
                    </div>

                    <div class="news-detail-content">
                        <p>Ra mắt hơn 40+ thiết kế, "Hải Nhiên" là lời gọi mở cho mùa hè: chọn những điều nhẹ nhàng hơn, những vấn đề khiến năng cảm thấy thoải mái và tự tin với chính mình.</p>

                        <p>Bộ sưu tập "Hải Nhiên" lấy cảm hứng từ vẻ đẹp thanh thoát, dịu dàng của biển cả và những làn sóng nhẹ nhàng. Mỗi món trang sức trong bộ sưu tập đều mang trong mình sự tinh tế, sang trọng nhưng không kém phần hiện đại.</p>

                        <h2>Điểm nổi bật của bộ sưu tập</h2>

                        <p><strong>Thiết kế thanh lịch:</strong> Các món trang sức được thiết kế với đường nét mềm mại, uyển chuyển như những con sóng biển, tạo nên vẻ đẹp nhẹ nhàng nhưng đầy cuốn hút.</p>

                        <p><strong>Chất liệu cao cấp:</strong> Sử dụng vàng 18K kết hợp với kim cương thiên nhiên và ngọc trai Akoya, mang đến vẻ đẹp sang trọng và quý phái.</p>

                        <p><strong>Phong cách đa dạng:</strong> Từ những thiết kế tối giản cho đến những mẫu trang sức cầu kỳ, "Hải Nhiên" phù hợp với mọi phong cách và hoàn cảnh.</p>

                        <h2>Bộ sưu tập dành cho ai?</h2>

                        <p>"Hải Nhiên" là lựa chọn hoàn hảo cho những người phụ nữ hiện đại, yêu thích sự thanh lịch và tinh tế. Đây cũng là món quà ý nghĩa dành tặng cho người thân yêu trong những dịp đặc biệt.</p>

                        <p>Hãy ghé thăm các cửa hàng Tierra trên toàn quốc để trải nghiệm trực tiếp vẻ đẹp của bộ sưu tập "Hải Nhiên"!</p>

                        <div class="news-detail-cta">
                            <a href="/products?category=trang-suc" class="btn-primary">Xem bộ sưu tập</a>
                        </div>
                    </div>

                    <div class="news-detail-share">
                        <span>Chia sẻ:</span>
                        <div class="share-buttons">
                            <a href="#" class="share-btn facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="share-btn pinterest"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" class="share-btn linkedin"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <div class="related-news">
                        <h3 class="related-news-title">Tin tức liên quan</h3>
                        <div class="related-news-grid">
                            <article class="related-news-item" onclick="window.location.href='/news?article=moc-nguyen'">
                                <div class="related-news-image">
                                    <img src="images/tintuc2.png" alt="Mộc Nguyên">
                                </div>
                                <div class="related-news-content">
                                    <h4>BST "Mộc Nguyên"</h4>
                                    <a href="/news?article=moc-nguyen" class="related-news-link">Xem thêm →</a>
                                </div>
                            </article>
                            <article class="related-news-item" onclick="window.location.href='/news?article=qua-tet'">
                                <div class="related-news-image">
                                    <img src="https://cdn.pnj.io/images/promo/284/thong-tin-gia-vang.png" alt="Quà Tết">
                                </div>
                                <div class="related-news-content">
                                    <h4>"QUÀ TẾT TRAO TAY"</h4>
                                    <a href="/news?article=qua-tet" class="related-news-link">Xem thêm →</a>
                                </div>
                            </article>
                            <article class="related-news-item" onclick="window.location.href='/news?article=khuc-xuan-thi'">
                                <div class="related-news-image">
                                    <img src="https://www.pnj.com.vn/blog/wp-content/uploads/2022/10/kim-cuong-roi-la-gi-co-nen-mua-kim-cuong-roi-tai-pnj-thumb1.jpg" alt="Khúc Xuân Thi">
                                </div>
                                <div class="related-news-content">
                                    <h4>BST "Khúc Xuân Thi"</h4>
                                    <a href="/news?article=khuc-xuan-thi" class="related-news-link">Xem thêm →</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <aside class="news-detail-sidebar">
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Sản Phẩm Nổi Bật</h3>
                        <div class="sidebar-products">
                            <div class="sidebar-product">
                                <div class="sidebar-product-nav">
                                    <button class="sidebar-nav-btn prev" onclick="prevSidebarProduct()"><i class="fas fa-chevron-left"></i></button>
                                    <button class="sidebar-nav-btn next" onclick="nextSidebarProduct()"><i class="fas fa-chevron-right"></i></button>
                                </div>
                                <div class="sidebar-product-image">
                                    <img src="https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg" alt="Product">
                                </div>
                                <div class="sidebar-product-info">
                                    <p class="sidebar-product-code">TI186-31</p>
                                    <p class="sidebar-product-price">8.500.000 đ</p>
                                    <p class="sidebar-product-name">Nhẫn kim cương vàng trắng 14K</p>
                                </div>
                            </div>
                            <div class="sidebar-product" style="display: none;">
                                <div class="sidebar-product-nav">
                                    <button class="sidebar-nav-btn prev" onclick="prevSidebarProduct()"><i class="fas fa-chevron-left"></i></button>
                                    <button class="sidebar-nav-btn next" onclick="nextSidebarProduct()"><i class="fas fa-chevron-right"></i></button>
                                </div>
                                <div class="sidebar-product-image">
                                    <img src="https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg" alt="Product">
                                </div>
                                <div class="sidebar-product-info">
                                    <p class="sidebar-product-code">TI187-42</p>
                                    <p class="sidebar-product-price">12.750.000 đ</p>
                                    <p class="sidebar-product-name">Dây cổ vàng 18K đính ngọc trai Akoya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <?php include BASE_PATH . '/app/Views/partials/footer.php'; ?>

    <script src="js/main.js"></script>
    <script>
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