<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa Hàng Trang Sức Cao Cấp - Tierra</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/auth-dropdown.css">
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
                        <div class="dropdown-menu">
                            <div class="dropdown-content">
                                <div class="dropdown-column">
                                    <h4>Phong cách</h4>
                                    <ul>
                                        <li><a href="/products?style=thanh-lich">Thanh lịch</a></li>
                                        <li><a href="/products?style=hien-dai">Hiện đại</a></li>
                                        <li><a href="/products?style=quyen-ru">Quyến rũ</a></li>
                                        <li><a href="/products?style=doi-cac">Đôi các</a></li>
                                        <li><a href="/products?style=ngot-ngao">Ngọt ngào</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Kiểu dáng</h4>
                                    <ul>
                                        <li><a href="/products?style=solitaire"><i class="fas fa-gem"></i> Solitaire</a></li>
                                        <li><a href="/products?style=cathedral"><i class="fas fa-gem"></i> Cathedral</a></li>
                                        <li><a href="/products?style=halo"><i class="fas fa-gem"></i> Halo</a></li>
                                        <li><a href="/products?style=bridge-accent"><i class="fas fa-gem"></i> Bridge Accent</a></li>
                                        <li><a href="/products?style=twist"><i class="fas fa-gem"></i> Twist</a></li>
                                        <li><a href="/products?style=royal"><i class="fas fa-gem"></i> Royal</a></li>
                                        <li><a href="/products?style=threestone"><i class="fas fa-gem"></i> ThreeStone</a></li>
                                        <li><a href="/products?style=trellis"><i class="fas fa-gem"></i> Trellis</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Kiểu viền chủ</h4>
                                    <ul>
                                        <li><a href="/products?border=round"><i class="far fa-circle"></i> Round</a></li>
                                        <li><a href="/products?border=heart"><i class="fas fa-heart"></i> Heart</a></li>
                                        <li><a href="/products?border=pear"><i class="fas fa-tint"></i> Pear</a></li>
                                        <li><a href="/products?border=princess"><i class="far fa-square"></i> Princess</a></li>
                                        <li><a href="/products?border=emerald"><i class="far fa-square"></i> Emerald</a></li>
                                        <li><a href="/products?border=oval"><i class="fas fa-circle"></i> Oval</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Bộ sưu tập</h4>
                                    <ul>
                                        <li><a href="/products?collection=before-forever">Before Forever</a></li>
                                        <li><a href="/products?collection=spark-of-heaven">Spark Of Heaven</a></li>
                                        <li><a href="/products?collection=blooming">Blooming</a></li>
                                        <li><a href="/products?collection=petite-bridal">Petite Bridal</a></li>
                                        <li><a href="/products?collection=bridal-gown">Bridal Gown</a></li>
                                        <li><a href="/products?collection=my-princess">My Princess</a></li>
                                        <li><a href="/products?collection=holding-you">Holding You</a></li>
                                        <li><a href="/products?collection=tender-love">Tender Love</a></li>
                                        <li><a href="/products?collection=eternal-promise">Eternal Promise</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Top tìm kiếm</h4>
                                    <ul>
                                        <li><a href="/products?top=best-selling">Best-Selling</a></li>
                                        <li><a href="/products?top=signature">Signature Collection</a></li>
                                        <li><a href="/products?top=huong-dan">Hướng dẫn đo ni tay</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-image">
                                    <img src="https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg" alt="Nhẫn cầu hôn">
                                    <div class="dropdown-image-footer">
                                        <a href="/products?category=engagement" class="dropdown-link">
                                            Tất cả sản phẩm <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <a href="/products?category=engagement&featured=true" class="dropdown-link">
                                            Top nhẫn cầu hôn bán chạy <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-dropdown">
                        <a href="/products?category=wedding">Nhẫn cưới</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-content">
                                <div class="dropdown-column">
                                    <h4>Loại nhẫn</h4>
                                    <ul>
                                        <li><a href="/products?type=nhan-cuoi-cap">Nhẫn cưới cặp</a></li>
                                        <li><a href="/products?type=nhan-cuoi-nam">Nhẫn cưới nam</a></li>
                                        <li><a href="/products?type=nhan-cuoi-nu">Nhẫn cưới nữ</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Chất liệu</h4>
                                    <ul>
                                        <li><a href="/products?material=18k">18K</a></li>
                                        <li><a href="/products?material=14k">14K</a></li>
                                        <li><a href="/products?material=18k-kim-cuong">18K Kim cương</a></li>
                                        <li><a href="/products?material=14k-kim-cuong">14K Kim cương</a></li>
                                        <li><a href="/products?material=platinum">Platinum</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Phong cách</h4>
                                    <ul>
                                        <li><a href="/products?style=truyen-thong">Truyền thống</a></li>
                                        <li><a href="/products?style=hien-dai">Hiện đại</a></li>
                                        <li><a href="/products?style=kim-cuong">Kim Cương</a></li>
                                        <li><a href="/products?style=eternity">Eternity</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Bộ sưu tập</h4>
                                    <ul>
                                        <li><a href="/products?collection=shape-of-love">Shape Of Love</a></li>
                                        <li><a href="/products?collection=vang-son">Vàng son</a></li>
                                        <li><a href="/products?collection=flower-of-joy">Flower Of Joy</a></li>
                                        <li><a href="/products?collection=sweet-sour">Sweet & Sour</a></li>
                                        <li><a href="/products?collection=our-story">Our Story</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Top tìm kiếm</h4>
                                    <ul>
                                        <li><a href="/products?top=best-selling">Best-selling</a></li>
                                        <li><a href="/products?top=signature">Signature Collections</a></li>
                                        <li><a href="/products?top=huong-dan">Hướng dẫn đo ni tay</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-image">
                                    <img src="https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg" alt="Nhẫn cưới">
                                    <div class="dropdown-image-footer">
                                        <a href="/products?category=wedding" class="dropdown-link">
                                            Tất cả sản phẩm <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <a href="/products?category=wedding&featured=true" class="dropdown-link">
                                            Top nhẫn cưới bán chạy <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-dropdown">
                        <a href="/products?category=kim-cuong">Kim Cương</a>
                        <div class="dropdown-menu dropdown-diamond">
                            <div class="dropdown-content-diamond">
                                <div class="dropdown-column">
                                    <h4>Dạng</h4>
                                    <ul>
                                        <li><a href="/products?shape=round"><i class="far fa-circle"></i> Round</a></li>
                                        <li><a href="/products?shape=princess"><i class="far fa-square"></i> Princess</a></li>
                                        <li><a href="/products?shape=oval"><i class="fas fa-circle"></i> Oval</a></li>
                                        <li><a href="/products?shape=pear"><i class="fas fa-tint"></i> Pear</a></li>
                                        <li><a href="/products?shape=emerald"><i class="far fa-square"></i> Emerald</a></li>
                                        <li><a href="/products?shape=heart"><i class="fas fa-heart"></i> Heart</a></li>
                                        <li><a href="/products?shape=radiant"><i class="far fa-square"></i> Radiant</a></li>
                                        <li><a href="/products?shape=marquise"><i class="fas fa-gem"></i> Marquise</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Bảng giá kim cương</h4>
                                    <ul>
                                        <li><a href="/products?price=3ly6">Kim cương 3ly6</a></li>
                                        <li><a href="/products?price=4ly5">Kim cương 4ly5</a></li>
                                        <li><a href="/products?price=5ly">Kim cương 5ly</a></li>
                                        <li><a href="/products?price=5ly4">Kim cương 5ly4</a></li>
                                        <li><a href="/products?price=6ly">Kim cương 6ly</a></li>
                                        <li><a href="/products?price=6ly3">Kim cương 6ly3</a></li>
                                        <li><a href="/products?price=7ly2">Kim cương 7ly2</a></li>
                                        <li><a href="/products?price=8ly1">Kim cương 8ly1</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Giá tiền</h4>
                                    <ul>
                                        <li><a href="/products?price=duoi-20-trieu">Dưới 20 triệu</a></li>
                                        <li><a href="/products?price=20-50-trieu">Từ 20 triệu đến 50 triệu</a></li>
                                        <li><a href="/products?price=50-100-trieu">Từ 50 triệu đến 100 triệu</a></li>
                                        <li><a href="/products?price=100-200-trieu">Từ 100 triệu đến 200 triệu</a></li>
                                        <li><a href="/products?price=200-500-trieu">Từ 200 triệu đến 500 triệu</a></li>
                                        <li><a href="/products?price=tren-500-trieu">Trên 500 triệu</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Trang sức kim cương</h4>
                                    <ul>
                                        <li><a href="/products?type=nhan-kim-cuong">Nhẫn kim cương</a></li>
                                        <li><a href="/products?type=bong-tai-kim-cuong">Bông tai kim cương</a></li>
                                        <li><a href="/products?type=mat-day-kim-cuong">Mặt dây kim cương</a></li>
                                        <li><a href="/products?type=vong-tay-kim-cuong">Vòng tay kim cương</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-image-diamond">
                                    <img src="https://cdn.pnj.io/images/promo/284/thong-tin-gia-vang.png" alt="Kim cương">
                                    <div class="dropdown-image-footer">
                                        <a href="/diamond-guide" class="dropdown-link">
                                            Tìm kim cương theo ý của bạn <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <a href="/diamond-promotion" class="dropdown-link">
                                            Xem chi tiết chương trình <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="/products?category=trang-suc-cao-cap">Trang sức cao cấp</a></li>
                    <li class="nav-dropdown">
                        <a href="/products?category=trang-suc">Trang sức</a>
                        <div class="dropdown-menu dropdown-jewelry">
                            <div class="dropdown-content-jewelry">
                                <div class="dropdown-column">
                                    <h4>Loại trang sức</h4>
                                    <ul>
                                        <li class="has-submenu">
                                            <a href="/products?type=nhan">Nhẫn <i class="fas fa-chevron-down"></i></a>
                                            <div class="submenu">
                                                <ul>
                                                    <li><a href="/products?type=nhan-nu">Nhẫn nữ</a></li>
                                                    <li><a href="/products?type=nhan-nam">Nhẫn nam</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="/products?type=bong-tai">Bông tai</a></li>
                                        <li><a href="/products?type=mat-day-chuyen">Mặt dây chuyền</a></li>
                                        <li><a href="/products?type=vong-tay">Vòng tay</a></li>
                                        <li><a href="/products?type=trang-suc-quy-ong">Trang sức Quý Ông</a></li>
                                        <li class="has-submenu">
                                            <a href="/products?type=trang-suc-thoi-trang">Trang sức thời trang <i class="fas fa-chevron-down"></i></a>
                                            <div class="submenu">
                                                <ul>
                                                    <li><a href="/products?type=bong-tai-thoi-trang">Bông tai</a></li>
                                                    <li><a href="/products?type=mat-day-chuyen-thoi-trang">Mặt dây chuyền</a></li>
                                                    <li><a href="/products?type=day-chuyen-thoi-trang">Dây chuyền</a></li>
                                                    <li><a href="/products?type=nhan-thoi-trang">Nhẫn thời trang</a></li>
                                                    <li><a href="/products?type=vang-than-tai">Vàng thần tài</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="/products?type=the-vang-24k">Thẻ vàng 24K</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Chất liệu</h4>
                                    <ul>
                                        <li><a href="/products?material=18k">18K</a></li>
                                        <li><a href="/products?material=14k">14K</a></li>
                                        <li><a href="/products?material=platinum">Platinum</a></li>
                                        <li><a href="/products?material=kim-cuong">Kim cương</a></li>
                                        <li><a href="/products?material=da-quy-khac">Đá quý khác</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Bộ sưu tập</h4>
                                    <ul>
                                        <li><a href="/products?collection=diamond-light">Diamond Light</a></li>
                                        <li><a href="/products?collection=true-north">True North</a></li>
                                        <li><a href="/products?collection=the-hearts">The Hearts</a></li>
                                        <li><a href="/products?collection=accessories">Accessories</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Top tìm kiếm</h4>
                                    <ul>
                                        <li><a href="/products?top=best-selling">Best Selling</a></li>
                                        <li><a href="/products?top=signature">Signature Collections</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-image-jewelry">
                                    <img src="https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg" alt="Trang sức">
                                    <div class="dropdown-image-footer">
                                        <a href="/products?category=trang-suc" class="dropdown-link">
                                            Tất cả sản phẩm <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/news">Tin tức</a>
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
                <a href="/wishlist" class="header-icon">
                    <i class="fas fa-heart"></i>
                    <span class="badge" id="wishlist-count">0</span>
                </a>
                <a href="/cart" class="header-icon">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="badge" id="cart-count">0</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Search Overlay -->
    <div class="search-overlay" id="searchOverlay">
        <button class="search-close" onclick="closeSearch()">&times;</button>
        <div class="search-overlay-content">
            <div class="search-box">
                <div class="search-input-wrapper">
                    <input 
                        type="text" 
                        class="search-input" 
                        id="searchInput" 
                        placeholder="Tìm kiếm sản phẩm ..."
                        oninput="debounceSearch()"
                        onkeypress="handleSearchKeypress(event)"
                    >
                    <button class="search-submit" onclick="performSearch()">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="search-results" id="searchResults">
                <!-- Kết quả tìm kiếm sẽ hiển thị ở đây -->
            </div>
        </div>
    </div>

    <!-- Promo Banner -->
    <section class="promo-banner" style="background-image: url('https://www.tierra.vn/wp-content/uploads/2026/04/BANNER-TRANG-CHU-1.jpg'); background-size: cover; background-position: center;">
    </section>

    <!-- Slider Section -->
    <section class="hero-slider">
        <div class="slider-container">
            <div class="slide active">
                <div class="slide-grid">
                    <!-- Left Side -->
                    <div class="slide-item slide-left">
                        <img src="https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg" alt="Trang Sức Nam">
                        <div class="slide-content">
                            <h3>Trang Sức Nam</h3>
                            <p>Mạnh mẽ & Lịch lãm</p>
                            <button class="btn-shop" onclick="window.location.href='/products?category=men'">SHOP MEN</button>
                        </div>
                    </div>
                    <!-- Right Side -->
                    <div class="slide-item slide-right">
                        <img src="https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg" alt="Trang Sức Nữ">
                        <div class="slide-content">
                            <h3>Trang Sức Nữ</h3>
                            <p>Quyến rũ & Sang trọng</p>
                            <button class="btn-shop" onclick="window.location.href='/products?category=women'">SHOP WOMEN</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide">
                <div class="slide-grid">
                    <!-- Left Side -->
                    <div class="slide-item slide-left">
                        <img src="https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg" alt="Bộ Sưu Tập Kim Cương">
                        <div class="slide-content">
                            <h3>Nhẫn Kim Cương Nam</h3>
                            <p>Đẳng cấp vượt thời gian</p>
                            <button class="btn-shop" onclick="window.location.href='/products?category=men'">SHOP MEN</button>
                        </div>
                    </div>
                    <!-- Right Side -->
                    <div class="slide-item slide-right">
                        <img src="https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg" alt="Bộ Sưu Tập Vàng">
                        <div class="slide-content">
                            <h3>Dây Cổ Vàng 18K</h3>
                            <p>Tôn vinh vẻ đẹp của bạn</p>
                            <button class="btn-shop" onclick="window.location.href='/products?category=women'">SHOP WOMEN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="slider-progress">
            <div class="progress-bar"></div>
        </div>

        <!-- Pause/Play Button -->
        <button class="slider-control" id="sliderControl">
            <i class="fas fa-pause"></i>
        </button>
    </section>

    <!-- Category Section -->
    <section class="category-section">
        <div class="container">
            <div class="category-grid">
                <div class="category-card">
                    <img src="images/mens.png" alt="Nhẫn Cầu Hôn">
                    <div class="category-overlay">
                        <span class="category-label">NHẪN CẦU HÔN</span>
                    </div>
                </div>
                <div class="category-card">
                    <img src="https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg" alt="Nhẫn Cưới">
                    <div class="category-overlay">
                        <span class="category-label">NHẪN CƯỚI</span>
                    </div>
                </div>
                <div class="category-card">
                    <img src="images/womens.png" alt="Kim Cương">
                    <div class="category-overlay">
                        <span class="category-label">KIM CƯƠNG</span>
                    </div>
                </div>
                <div class="category-card">
                    <img src="images/bestselleer.png" alt="Trang Sức Cao Cấp">
                    <div class="category-overlay">
                        <span class="category-label">TRANG SỨC CAO CẤP</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals Section -->
    <section class="new-arrivals-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title-left">TRANG SỨC MỚI NHẤT</h2>
                <div class="slider-arrows">
                    <button class="arrow-btn prev-btn" onclick="scrollProducts('left')">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="arrow-btn next-btn" onclick="scrollProducts('right')">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="products-slider" id="productsSlider">
                <?php 
                $badges = ['BEST SELLER', 'NEW', 'HOT', 'NEW'];
                $badgeIndex = 0;
                foreach ($latestProducts as $product): 
                    $badge = $badges[$badgeIndex % count($badges)];
                    $badgeIndex++;
                ?>
                <a href="/product?id=<?= $product['id'] ?>" class="product-item" style="text-decoration: none; color: inherit;">
                    <div class="product-badge"><?= $badge ?></div>
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="product-info-card">
                        <h4><?= htmlspecialchars($product['name']) ?></h4>
                        <p class="product-variant"><?= htmlspecialchars($product['category_name'] ?? 'Trang Sức') ?></p>
                        <div class="product-footer-card">
                            <div class="color-options">
                                <span class="color-dot" style="background-color: #C0C0C0;"></span>
                                <span class="color-dot" style="background-color: #FFD700;"></span>
                            </div>
                            <span class="product-price-card"><?= number_format($product['price'], 0, ',', '.') ?>đ</span>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Featured Collection Section -->
    <section class="featured-collection-section">
        <div class="container">
            <h2 class="section-title-center">Dòng hàng nổi bật</h2>
            <div class="collection-content">
                <!-- Left Image -->
                <div class="collection-image">
                    <img src="https://cdn.pnj.io/images/promo/284/thong-tin-gia-vang.png" alt="Trang sức Kim Cương">
                </div>
                
                <!-- Right Content -->
                <div class="collection-info">
                    <!-- Filter Buttons -->
                    <div class="filter-buttons">
                        <button class="filter-btn active">Trang Sức Kim Cương</button>
                        <button class="filter-btn">Trang Sức Ngọc Trai</button>
                        <button class="filter-btn">Trang Sức ECZ</button>
                        <button class="filter-btn">Trang Sức Dây chuyền</button>
                        <button class="filter-btn">Trang Sức CZ</button>
                        <button class="filter-btn">Trang Sức Đá màu</button>
                        <button class="filter-btn">Trang Sức Bạc</button>
                        <button class="filter-btn">Trang Sức Y</button>
                        <button class="filter-btn">Trang Sức Vỏ</button>
                        <button class="filter-btn">Trang Sức Không gắn đá</button>
                    </div>
                    
                    <!-- Description -->
                    <div class="collection-description">
                        <p><strong>Mẫu Premium:</strong> Khi thành công hiện hữu qua những thành tựu kiệu hạnh, <strong>trang sức kim cương</strong> chính là lời xác nhận uy quyền cho vị thế của bạn. Mỗi giác cắt hoàn hảo ghi dấu một cột mốc thăng hoa, biến món trang sức thành "huan chương" dành giá tôn vinh bạn lĩnh của người đàn đầu. Đây là sự tượng trưng xứng tầm cho nỗi tại vàng chất và tầm vóc của những tâm hồn luôn thấu hiểu giá trị chính mình.</p>
                        
                        <p><strong>Mẫu Entry:</strong> Khởi đầu chương mới bằng những tuyệt tác <strong>trang sức kim cương</strong> tinh giản và sắc sảo, sẵn sàng cùng bạn tỏa sáng mỗi ngày. Đây là món quà đầu tiên, là sự tượng trưng xứng tầm cho những nỗ lực không ngừng trên hành trình chính phục bản lĩnh. Mỗi thiết kế tiền đại không chỉ mang tính ứng dụng cao mà còn là cột mốc thăng hoa, tôn vinh khi chất của thế hệ dẫn đầu luôn thấu hiểu giá trị bản thân.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Store Locator Banner -->
    <section class="store-locator-banner">
        <div class="container">
            <div class="store-banner-wrapper" onclick="window.location.href='/stores'">
                <img src="https://cdn.pnj.io/images/2024/rebuild/Frame%2055926%20(4).png?1731491049647" alt="Hệ thống cửa hàng">
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title-center">Tin tức</h2>
            
            <div class="news-slider-wrapper">
                <button class="news-nav-btn news-prev" onclick="slideNews('prev')">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <div class="news-slider-container">
                    <div class="news-card-item">
                        <div class="news-card-image">
                            <img src="images/tintuc1.png" alt="Mộc Nguyên">
                            <span class="news-badge">Tierra</span>
                        </div>
                        <div class="news-card-info">
                            <h3 class="news-card-title">Tierra Ra Mắt BST Tháng 3 "Mộc Nguyên" – Vẻ Đẹp Mộc Mạc Cho Mọi Khởi Đầu Mới!</h3>
                            <p class="news-card-desc">Ra mắt vào tháng 3 – tháng của sự yêu thương và lãn mạn phép đẹp – "Mộc Nguyên" như một lời chào đầu dành gửi đến những người phụ nữ yêu trang sức tinh tế...</p>
                            <a href="#" class="news-card-link">Xem thêm</a>
                        </div>
                    </div>
                    
                    <div class="news-card-item">
                        <div class="news-card-image">
                            <img src="images/tintuc2.png" alt="Quà Tết">
                            <span class="news-badge">Tierra</span>
                        </div>
                        <div class="news-card-info">
                            <h3 class="news-card-title">"QUÀ TẾT TRAO TAY - NHẬN NGAY ÁO MỚI" - Tierra tặng áo thun cho hóa đơn từ 1 triệu 2</h3>
                            <p class="news-card-desc">Với mỗi hóa đơn 1 triệu 2 (sau khi áp dụng đối điểm), các nàng sẽ được TẶNG NGAY một chiếc ÁO THUN siêu xinh khi mua trang sức!</p>
                            <a href="#" class="news-card-link">Xem thêm</a>
                        </div>
                    </div>
                    
                    <div class="news-card-item">
                        <div class="news-card-image">
                            <img src="https://cdn.pnj.io/images/promo/284/thong-tin-gia-vang.png" alt="Khúc Xuân Thi">
                            <span class="news-badge">Tierra</span>
                        </div>
                        <div class="news-card-info">
                            <h3 class="news-card-title">Tierra ra mắt bộ sưu tập xuân "Khúc Xuân Thi" – Sở thiết kế trang sức vàng đầm xinh đẹp</h3>
                            <p class="news-card-desc">Lấy cảm hứng từ chính khoảnh khắc giao mùa đầy thì vị của mùa Xuân, Tierra chính thức ra mắt bộ sưu tập trang sức xuân mang đậm chất thơ mộng...</p>
                            <a href="#" class="news-card-link">Xem thêm</a>
                        </div>
                    </div>
                </div>
                
                <button class="news-nav-btn news-next" onclick="slideNews('next')">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            
            <div class="text-center" style="margin-top: 40px;">
                <a href="/news" class="btn-view-all">Xem tất cả</a>
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
    <script src="js/cart.js?v=2"></script>
    <script src="js/wishlist.js?v=1"></script>
    <script src="js/search.js?v=1"></script>
    <script src="js/auth-dropdown.js?v=1"></script>
    <script src="js/slider.js"></script>
    <script src="js/products-slider.js"></script>
    <script src="js/collection-filter.js"></script>
</body>
</html>
