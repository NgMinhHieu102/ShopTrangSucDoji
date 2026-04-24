<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Về Chúng Tôi - Tierra</title>
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
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
            
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

    <!-- About Hero Section -->
    <section class="about-hero">
        <img src="https://www.tierra.vn/wp-content/uploads/2024/04/our-story-scaled.webp" alt="Our Story">
        <div class="about-hero-overlay">
            <div class="about-hero-content">
                <p class="about-subtitle">OUR STORY</p>
                <h1 class="about-title">Striving for better is in our nature</h1>
            </div>
        </div>
    </section>

    <!-- Product Lines Section -->
    <section class="product-lines-section">
        <div class="container">
            <div class="product-lines-intro">
                <p>Tại Tierra, chúng tôi tạo tác những món trang sức đầy cảm hứng, lan tỏa những giá trị chân thành và hạnh phúc đến người trẻ hiện đại.</p>
                <div class="divider">
                    <i class="fas fa-gem"></i>
                </div>
                <h2 class="product-lines-title">Các dòng sản phẩm Tierra</h2>
            </div>
            
            <div class="product-lines-grid">
                <div class="product-line-card">
                    <img src="https://www.tierra.vn/wp-content/uploads/2024/04/cuoi-cau-hon.webp" alt="Cưới - Cầu hôn">
                    <h3 class="product-line-title">Cưới - Cầu hôn</h3>
                </div>
                <div class="product-line-card">
                    <img src="https://www.tierra.vn/wp-content/uploads/2024/04/kim-cuong.webp" alt="Trang sức kim cương">
                    <h3 class="product-line-title">Trang sức kim cương</h3>
                </div>
                <div class="product-line-card">
                    <img src="https://www.tierra.vn/wp-content/uploads/2024/04/nam.webp" alt="Trang sức nam">
                    <h3 class="product-line-title">Trang sức nam</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Brand Story Section -->
    <section class="brand-story-section">
        <div class="container">
            <div class="brand-story-grid">
                <!-- Left Side - History -->
                <div class="brand-history">
                    <div class="history-image">
                        <img src="https://www.tierra.vn/wp-content/uploads/2024/04/about-info-banner.webp" alt="Quy trình chế tác">
                    </div>
                    <div class="history-content">
                        <p>Ra đời từ năm 2016, Tierra hướng đến mục tiêu đem lại những sự lựa chọn trang sức lý tưởng. Thấu hiểu người trẻ luôn hướng đến sự thẩm mỹ cao, tìm kiếm cảm hứng mới mẻ, mong muốn sáng tạo món trang sức của riêng mình, chúng tôi theo đuổi mô hình thiết kế và chế tác "Bespoke" cùng những dịch vụ khác biệt để việc mua sắm trở thành niềm vui thích, trải nghiệm đặc sắc.</p>
                    </div>
                </div>

                <!-- Right Side - Video -->
                <div class="brand-video">
                    <div class="video-content">
                        <h2 class="video-title">happiness bespoken</h2>
                        <p class="video-description">Mỗi thiết kế của chúng tôi ẩn chứa câu chuyện của đam mê mang theo tâm huyết của những nghệ nhân, sự khác trong chế tác, tinh tuyển kim cương & đá quý, tất cả tạo nên sự thoải mái, cảm xúc và phong thái tự tin sáng trong cho chủ sở hữu. Đó là cách chúng tôi tô điểm cho vẻ đẹp và tình yêu của những người trẻ hiện đại thêm tươi đẹp, đầy sắc màu.</p>
                        <a href="#" class="btn-learn-more">Đặt lịch hẹn →</a>
                    </div>
                    <div class="video-wrapper">
                        <iframe 
                            width="100%" 
                            height="350" 
                            src="https://www.youtube.com/embed/f4qssbx_OqU?start=29" 
                            title="happiness bespoken" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Section -->
    <section class="journey-section">
        <div class="container">
            <div class="journey-header">
                <h2 class="journey-title">Hành trình của Tierra</h2>
                <p class="journey-subtitle">Mỗi năm Tierra tự hào đồng hành với hàng ngàn cặp đôi trẻ.</p>
            </div>
            <div class="journey-image">
                <img src="https://www.tierra.vn/wp-content/uploads/2024/04/journey-vn.webp" alt="Hành trình của Tierra">
            </div>
        </div>
    </section>

    <!-- Ideal Choice Section -->
    <section class="ideal-choice-section">
        <div class="container">
            <div class="ideal-choice-grid">
                <!-- Left Image -->
                <div class="choice-image">
                    <img src="images/about2.png" alt="Lựa chọn trang sức lý tưởng">
                </div>
                
                <!-- Right Content -->
                <div class="choice-content">
                    <h2 class="choice-title">Lựa chọn trang sức lý tưởng</h2>
                    
                    <div class="accordion">
                        <div class="accordion-item">
                            <div class="accordion-header" onclick="toggleAccordion(0)">
                                <span>Thanh lịch và tinh tế</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="accordion-content">
                                <p>Những thiết kế thanh lịch và tinh tế, phù hợp với phong cách cổ điển và sang trọng. Mỗi chi tiết được chế tác tỉ mỉ để tôn vinh vẻ đẹp tự nhiên.</p>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <div class="accordion-header" onclick="toggleAccordion(1)">
                                <span>Tạo tác từ trái tim</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="accordion-content">
                                <p>Mỗi sản phẩm được tạo ra với tình yêu và đam mê, mang trong mình câu chuyện riêng và cảm xúc chân thành từ người thợ kim hoàn.</p>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <div class="accordion-header" onclick="toggleAccordion(2)">
                                <span>Tinh tuyển tốt nhất</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="accordion-content">
                                <p>Chúng tôi chỉ sử dụng những nguyên liệu cao cấp nhất, từ kim cương thiên nhiên đến vàng 18K, đảm bảo chất lượng vượt trội.</p>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <div class="accordion-header" onclick="toggleAccordion(3)">
                                <span>An tâm, tin tường</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="accordion-content">
                                <p>Với chính sách bảo hành trọn đời và dịch vụ chăm sóc khách hàng tận tâm, bạn hoàn toàn có thể yên tâm về chất lượng sản phẩm.</p>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <div class="accordion-header" onclick="toggleAccordion(4)">
                                <span>Đồng hành trọn vẹn</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="accordion-content">
                                <p>Tierra luôn đồng hành cùng bạn trong mọi khoảnh khắc đặc biệt, từ lúc lựa chọn đến khi sở hữu và sử dụng sản phẩm.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Store Experience Section -->
    <section class="store-experience-section">
        <div class="container">
            <div class="store-experience-grid">
                <!-- Left Image -->
                <div class="store-image">
                    <img src="https://www.tierra.vn/wp-content/uploads/2024/04/store.webp" alt="Trải nghiệm cửa hàng">
                </div>
                
                <!-- Right Content -->
                <div class="store-info">
                    <h2>Trải nghiệm cửa hàng</h2>
                    <p class="store-description">
                        Trải nghiệm ngay không gian thoải mái, riêng tư và khác biệt tại cửa hàng của chúng tôi. Đội ngũ tư vấn viên tận tình chuyên nghiệp sẽ đồng hành và mang lại cho Quý khách hàng trải nghiệm mua sắm thú vị và an tâm tuyệt đối.
                    </p>
                    
                    <div class="store-details">
                        <h4>GIỜ LÀM VIỆC:</h4>
                        <p>9:00 - 21:00 (bao gồm Chủ Nhật)</p>
                        
                        <h4>HOTLINE:</h4>
                        <p>1900 232 354</p>
                    </div>
                    
                    <a href="#" class="store-link">
                        Hệ thống cửa hàng <i class="fas fa-arrow-right"></i>
                    </a>
                    
                    <div>
                        <a href="#" class="btn-appointment">ĐẶT LỊCH HẸN</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content Section -->
    <section class="about-content-section">
        <div class="container">
            <div class="about-intro">
                <h2>Câu Chuyện Của Chúng Tôi</h2>
                <p>Với hơn 30 năm kinh nghiệm trong ngành trang sức, chúng tôi tự hào là một trong những thương hiệu trang sức hàng đầu tại Việt Nam. Mỗi sản phẩm của chúng tôi đều được chế tác tỉ mỉ, mang trong mình câu chuyện và tình yêu dành cho khách hàng.</p>
            </div>

            <div class="about-values">
                <div class="value-card">
                    <i class="fas fa-gem"></i>
                    <h3>Chất Lượng</h3>
                    <p>Cam kết sử dụng nguyên liệu cao cấp, đảm bảo chất lượng vàng, bạc và đá quý đạt chuẩn quốc tế.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-certificate"></i>
                    <h3>Uy Tín</h3>
                    <p>Hơn 420 cửa hàng trên toàn quốc, phục vụ hàng triệu khách hàng với dịch vụ tận tâm.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-heart"></i>
                    <h3>Tận Tâm</h3>
                    <p>Đội ngũ tư vấn chuyên nghiệp, luôn lắng nghe và thấu hiểu nhu cầu của từng khách hàng.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultation Form Section -->
    <section class="consultation-section">
        <div class="container">
            <div class="consultation-header">
                <h2 class="consultation-title">Nhận tư vấn từ Tierra</h2>
                <p class="consultation-subtitle">Đăng ký ngay bên dưới để nhận được sự hỗ trợ từ chúng tôi.</p>
                <div class="divider">
                    <i class="fas fa-gem"></i>
                </div>
            </div>
            
            <div class="consultation-form-wrapper">
                <form class="consultation-form">
                    <div class="form-row">
                        <input type="text" placeholder="Họ và tên" class="form-input full-width" required>
                    </div>
                    
                    <div class="form-row">
                        <input type="tel" placeholder="Số điện thoại" class="form-input" required>
                        <select class="form-select" required>
                            <option value="">Chọn tỉnh thành</option>
                            <option value="hanoi">Hà Nội</option>
                            <option value="hcm">TP. Hồ Chí Minh</option>
                            <option value="danang">Đà Nẵng</option>
                            <option value="haiphong">Hải Phòng</option>
                            <option value="cantho">Cần Thơ</option>
                        </select>
                    </div>
                    
                    <div class="form-row">
                        <select class="form-select full-width" required>
                            <option value="">Sản phẩm cần tư vấn</option>
                            <option value="nhan-cuoi">Nhẫn cưới</option>
                            <option value="nhan-cau-hon">Nhẫn cầu hôn</option>
                            <option value="day-chuyen">Dây chuyền</option>
                            <option value="bong-tai">Bông tai</option>
                            <option value="vong-tay">Vòng tay</option>
                            <option value="khac">Khác</option>
                        </select>
                    </div>
                    
                    <div class="form-row">
                        <button type="submit" class="btn-consultation">TỰ VẤN NGAY</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3 class="stat-number">30+</h3>
                    <p class="stat-label">Năm Kinh Nghiệm</p>
                </div>
                <div class="stat-item">
                    <h3 class="stat-number">420+</h3>
                    <p class="stat-label">Cửa Hàng</p>
                </div>
                <div class="stat-item">
                    <h3 class="stat-number">5M+</h3>
                    <p class="stat-label">Khách Hàng</p>
                </div>
                <div class="stat-item">
                    <h3 class="stat-number">10K+</h3>
                    <p class="stat-label">Sản Phẩm</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h4 class="footer-title">Về Chúng Tôi</h4>
                    <ul class="footer-links">
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Câu chuyện thương hiệu</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
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
    <script>
        function openVideo() {
            window.open('https://youtube.com/watch?v=f4qssbx_OqU&time_continue=29&source_ve_path=NzY3NTg&embeds_referring_euri=https%3A%2F%2Fwww.tierra.vn%2F', '_blank');
        }
        
        function toggleAccordion(index) {
            const accordionItems = document.querySelectorAll('.accordion-item');
            const clickedItem = accordionItems[index];
            
            // Close all other items
            accordionItems.forEach((item, i) => {
                if (i !== index) {
                    item.classList.remove('active');
                }
            });
            
            // Toggle clicked item
            clickedItem.classList.toggle('active');
        }
    </script>
</body>
</html>
