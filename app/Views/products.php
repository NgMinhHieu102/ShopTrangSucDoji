<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm - Tierra</title>
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
            <div class="logo">
                <a href="/"><img src="https://chatgpt.com/backend-api/estuary/public_content/enc/eyJpZCI6Im1fNjlmMGQ4OGM2NmQ4ODE5MTlmNDg3OWQxMTA2OWFhNDA6ZmlsZV8wMDAwMDAwMGQwZTA3MjA5OTMxZGFjNmI2YTMxMmVjOCIsInRzIjoiMjA1NzEiLCJwIjoicHlpIiwiY2lkIjoiMSIsInNpZyI6ImU2Mjc0NTY3YjBiYjQyNzMxNjM1M2M0MTEwY2JiMzA0ZTk1OTExNjFiYjk3NmJhYmUzOTc5NTQwYmQ3YjhiM2QiLCJ2IjoiMCIsImdpem1vX2lkIjpudWxsLCJjcyI6bnVsbCwiY2RuIjpudWxsLCJjcCI6bnVsbCwibWEiOm51bGx9" alt="Tierra"></a>
            </div>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
            
            <nav class="nav-menu" id="navMenu">
                <ul>
                    <li class="nav-dropdown">
                        <a href="/products?category=nhan-cau-hon">Nhẫn cầu hôn</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-content">
                                <div class="dropdown-column">
                                    <h4>Phong cách</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cau-hon&style=thanh-lich">Thanh lịch</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&style=hien-dai">Hiện đại</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&style=co-dien">Cổ điển</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&style=sang-trong">Sang trọng</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Kiểu dáng</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cau-hon&ring_style=solitaire"><i class="fas fa-gem"></i> Solitaire</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&ring_style=cathedral"><i class="fas fa-gem"></i> Cathedral</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&ring_style=halo"><i class="fas fa-gem"></i> Halo</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&ring_style=bridge-accent"><i class="fas fa-gem"></i> Bridge Accent</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&ring_style=twist"><i class="fas fa-gem"></i> Twist</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&ring_style=royal"><i class="fas fa-gem"></i> Royal</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&ring_style=three-stone"><i class="fas fa-gem"></i> ThreeStone</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&ring_style=trellis"><i class="fas fa-gem"></i> Trellis</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Kiểu viền chủ</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cau-hon&border_type=round"><i class="far fa-circle"></i> Round</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&border_type=heart"><i class="fas fa-heart"></i> Heart</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&border_type=pear"><i class="fas fa-tint"></i> Pear</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&border_type=princess"><i class="far fa-square"></i> Princess</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&border_type=emerald"><i class="far fa-square"></i> Emerald</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&border_type=oval"><i class="fas fa-circle"></i> Oval</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Bộ sưu tập</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cau-hon&collection=before-forever">Before Forever</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&collection=spark-of-heaven">Spark Of Heaven</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&collection=blooming">Blooming</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&collection=petite-bridal">Petite Bridal</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&collection=bridal-gown">Bridal Gown</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&collection=my-princess">My Princess</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&collection=holding-you">Holding You</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&collection=tender-love">Tender Love</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&collection=eternal-promise">Eternal Promise</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Top tìm kiếm</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cau-hon&featured=true">Best-Selling</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&signature=true">Signature Collection</a></li>
                                        <li><a href="/products?category=nhan-cau-hon&guide=size">Hướng dẫn đo ni tay</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-image">
                                    <img src="https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg" alt="Nhẫn cầu hôn">
                                    <div class="dropdown-image-footer">
                                        <a href="/products?category=nhan-cau-hon" class="dropdown-link">
                                            Tất cả sản phẩm <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <a href="/products?category=nhan-cau-hon&featured=true" class="dropdown-link">
                                            Top nhẫn cầu hôn bán chạy <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-dropdown">
                        <a href="/products?category=nhan-cuoi">Nhẫn cưới</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-content">
                                <div class="dropdown-column">
                                    <h4>Loại nhẫn</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cuoi&type=nhan-cuoi-cap">Nhẫn cưới cặp</a></li>
                                        <li><a href="/products?category=nhan-cuoi&type=nhan-cuoi-nam">Nhẫn cưới nam</a></li>
                                        <li><a href="/products?category=nhan-cuoi&type=nhan-cuoi-nu">Nhẫn cưới nữ</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Chất liệu</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cuoi&material=18k">18K</a></li>
                                        <li><a href="/products?category=nhan-cuoi&material=14k">14K</a></li>
                                        <li><a href="/products?category=nhan-cuoi&material=18k-kim-cuong">18K Kim cương</a></li>
                                        <li><a href="/products?category=nhan-cuoi&material=14k-kim-cuong">14K Kim cương</a></li>
                                        <li><a href="/products?category=nhan-cuoi&material=platinum">Platinum</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Phong cách</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cuoi&style=truyen-thong">Truyền thống</a></li>
                                        <li><a href="/products?category=nhan-cuoi&style=hien-dai">Hiện đại</a></li>
                                        <li><a href="/products?category=nhan-cuoi&style=kim-cuong">Kim Cương</a></li>
                                        <li><a href="/products?category=nhan-cuoi&style=eternity">Eternity</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Bộ sưu tập</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cuoi&collection=shape-of-love">Shape Of Love</a></li>
                                        <li><a href="/products?category=nhan-cuoi&collection=vang-son">Vàng son</a></li>
                                        <li><a href="/products?category=nhan-cuoi&collection=flower-of-joy">Flower Of Joy</a></li>
                                        <li><a href="/products?category=nhan-cuoi&collection=sweet-sour">Sweet & Sour</a></li>
                                        <li><a href="/products?category=nhan-cuoi&collection=our-story">Our Story</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Top tìm kiếm</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan-cuoi&featured=true">Best-selling</a></li>
                                        <li><a href="/products?category=nhan-cuoi&signature=true">Signature Collections</a></li>
                                        <li><a href="/products?category=nhan-cuoi&guide=size">Hướng dẫn đo ni tay</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-image">
                                    <img src="https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg" alt="Nhẫn cưới">
                                    <div class="dropdown-image-footer">
                                        <a href="/products?category=nhan-cuoi" class="dropdown-link">
                                            Tất cả sản phẩm <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <a href="/products?category=nhan-cuoi&featured=true" class="dropdown-link">
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
                                        <li><a href="/products?category=kim-cuong&border_type=round"><i class="far fa-circle"></i> Round</a></li>
                                        <li><a href="/products?category=kim-cuong&border_type=princess"><i class="far fa-square"></i> Princess</a></li>
                                        <li><a href="/products?category=kim-cuong&border_type=oval"><i class="fas fa-circle"></i> Oval</a></li>
                                        <li><a href="/products?category=kim-cuong&border_type=pear"><i class="fas fa-tint"></i> Pear</a></li>
                                        <li><a href="/products?category=kim-cuong&border_type=emerald"><i class="far fa-square"></i> Emerald</a></li>
                                        <li><a href="/products?category=kim-cuong&border_type=heart"><i class="fas fa-heart"></i> Heart</a></li>
                                        <li><a href="/products?category=kim-cuong&shape=radiant"><i class="far fa-square"></i> Radiant</a></li>
                                        <li><a href="/products?category=kim-cuong&shape=marquise"><i class="fas fa-gem"></i> Marquise</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Bảng giá kim cương</h4>
                                    <ul>
                                        <li><a href="/products?category=kim-cuong&size=3ly6">Kim cương 3ly6</a></li>
                                        <li><a href="/products?category=kim-cuong&size=4ly5">Kim cương 4ly5</a></li>
                                        <li><a href="/products?category=kim-cuong&size=5ly">Kim cương 5ly</a></li>
                                        <li><a href="/products?category=kim-cuong&size=5ly4">Kim cương 5ly4</a></li>
                                        <li><a href="/products?category=kim-cuong&size=6ly">Kim cương 6ly</a></li>
                                        <li><a href="/products?category=kim-cuong&size=6ly3">Kim cương 6ly3</a></li>
                                        <li><a href="/products?category=kim-cuong&size=7ly2">Kim cương 7ly2</a></li>
                                        <li><a href="/products?category=kim-cuong&size=8ly1">Kim cương 8ly1</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Giá tiền</h4>
                                    <ul>
                                        <li><a href="/products?category=kim-cuong&price_range=duoi-20-trieu">Dưới 20 triệu</a></li>
                                        <li><a href="/products?category=kim-cuong&price_range=20-50-trieu">Từ 20 triệu đến 50 triệu</a></li>
                                        <li><a href="/products?category=kim-cuong&price_range=50-100-trieu">Từ 50 triệu đến 100 triệu</a></li>
                                        <li><a href="/products?category=kim-cuong&price_range=100-200-trieu">Từ 100 triệu đến 200 triệu</a></li>
                                        <li><a href="/products?category=kim-cuong&price_range=200-500-trieu">Từ 200 triệu đến 500 triệu</a></li>
                                        <li><a href="/products?category=kim-cuong&price_range=tren-500-trieu">Trên 500 triệu</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-column">
                                    <h4>Trang sức kim cương</h4>
                                    <ul>
                                        <li><a href="/products?category=nhan&stone_type=kim-cuong">Nhẫn kim cương</a></li>
                                        <li><a href="/products?category=bong-tai&stone_type=kim-cuong">Bông tai kim cương</a></li>
                                        <li><a href="/products?category=day-chuyen&stone_type=kim-cuong">Mặt dây kim cương</a></li>
                                        <li><a href="/products?category=vong-tay&stone_type=kim-cuong">Vòng tay kim cương</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-image-diamond">
                                    <img src="https://cdn.pnj.io/images/promo/284/thong-tin-gia-vang.png" alt="Kim cương">
                                    <div class="dropdown-image-footer">
                                        <a href="/products?category=kim-cuong" class="dropdown-link">
                                            Tìm kim cương theo ý của bạn <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <a href="/products?category=kim-cuong&featured=true" class="dropdown-link">
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
                    <li><a href="/news">Tin tức</a></li>
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

    <!-- Promotion Banner - Hiển thị theo category -->
    <?php if (isset($currentCategory) ? $currentCategory : ($currentCategory = isset($_GET['category']) ? $_GET['category'] : '')): ?>
    <?php endif; ?>

    <?php if ($currentCategory === 'trang-suc-cao-cap'): ?>
    <!-- Banner riêng cho Trang Sức Cao Cấp -->
    <div class="promotion-banner-slider">
        <div class="slider-container">
            <div class="slide active">
                <img src="images/panner-cao-cap.png" alt="Banner trang sức cao cấp" class="banner-image">
            </div>
        </div>
    </div>
    <!-- Sub layout 2 cột dưới banner -->
    <div style="display:flex; gap:0; max-width:1200px; margin: 24px auto; padding: 0 16px;">
        <div style="flex:1; background:#fff; display:flex; align-items:center; justify-content:center; padding: 40px;">
            <img src="images/trang-suc-cao-cap1.png" alt="Trang sức cao cấp" style="max-width:100%; max-height:400px; object-fit:contain;">
        </div>
        <div style="flex:1;">
            <img src="https://www.tierra.vn/wp-content/uploads/2025/09/Rectangle-2286-1.png" alt="Trang sức cao cấp" style="width:100%; height:100%; object-fit:cover; display:block;">
        </div>
    </div>
    <!-- Hình full width bên dưới -->
    <div style="width:100%; margin: 0 0 24px;">
        <img src="images/trang-suc-cao-cap2.png" alt="Trang sức cao cấp" style="width:100%; display:block;">
    </div>

    <?php elseif ($currentCategory === 'kim-cuong'): ?>
    <!-- Banner riêng cho Kim Cương - 1 ảnh, không slider -->
    <div class="promotion-banner-slider">
        <div class="slider-container">
            <div class="slide active">
                <img src="https://www.tierra.vn/wp-content/uploads/2025/10/BANNER-TRANG-CHU.jpg" alt="Banner kim cương" class="banner-image">
            </div>
        </div>
    </div>
    <!-- Sub banner kim cương -->
    <div style="max-width:900px; margin: 16px auto; padding: 0 16px;">
        <img src="https://www.tierra.vn/wp-content/uploads/2025/10/sub-banner-web-3.jpg" alt="Kim cương cao cấp giá bao chấp" style="width:100%; border-radius:8px; display:block;">
    </div>

    <?php else: ?>
    <!-- Banner Slider chung cho các trang khác -->
    <div class="promotion-banner-slider">
        <div class="slider-container">
            <div class="slide active">
                <img src="https://www.tierra.vn/wp-content/uploads/2026/04/KM_TopBanner_NCH_16042026_Desktop.jpg" alt="Banner khuyến mãi nhẫn cầu hôn" class="banner-image">
            </div>
            <div class="slide">
                <img src="https://www.tierra.vn/wp-content/uploads/2025/08/2160x900-5.jpg" alt="Banner khuyến mãi trang sức" class="banner-image">
            </div>
            <div class="slide">
                <img src="https://www.tierra.vn/wp-content/uploads/2026/04/cover-banner-web-bst.jpg" alt="Banner bộ sưu tập mới" class="banner-image">
            </div>
        </div>
        <div class="slider-dots">
            <span class="dot active" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
    <?php endif; ?>

    <!-- Products Page -->
    <section class="products-page">
        <div class="container">
            <?php if ($currentCategory !== 'trang-suc-cao-cap'): ?>
            <h1 class="page-title"><?= isset($pageTitle) ? $pageTitle : 'Tất Cả Sản Phẩm' ?></h1>
            <?php endif; ?>
            <?php if (isset($pageSubtitle) && !empty($pageSubtitle)): ?>
                <p class="page-subtitle" style="text-align: center; font-size: 18px; color: #666; margin-top: -20px; margin-bottom: 30px;">
                    <?= $pageSubtitle ?>
                </p>
            <?php endif; ?>

        <?php 
        $currentCategory = isset($_GET['category']) ? $_GET['category'] : '';
        if ($currentCategory === 'trang-suc-cao-cap'): ?>

            <!-- Layout riêng cho Trang Sức Cao Cấp -->
            <div style="text-align:center; margin: 40px 0 30px;">
                <p style="color:#333; font-size:20px; font-weight:600; letter-spacing:1px; margin-bottom:32px;">Khám phá các tác phẩm từ Tierra</p>
                <div style="display:flex; justify-content:center; gap:80px; margin-bottom:40px;" id="tscc-tabs">
                    <div class="tscc-tab active" data-type="nhan" onclick="filterTSCC(this)" style="cursor:pointer; text-align:center;">
                        <img src="https://www.tierra.vn/wp-content/uploads/2025/09/NKC-3-1-2.png" style="width:70px; height:70px; margin-bottom:10px; object-fit:contain;"><br>
                        <span style="font-size:14px; border-bottom:2px solid #c9a84c; padding-bottom:4px;">Nhẫn</span>
                    </div>
                    <div class="tscc-tab" data-type="bong-tai" onclick="filterTSCC(this)" style="cursor:pointer; text-align:center;">
                        <img src="https://www.tierra.vn/wp-content/uploads/2025/09/BTA-1-1.png" style="width:70px; height:70px; margin-bottom:10px; object-fit:contain;"><br>
                        <span style="font-size:14px; color:#888;">Bông tai</span>
                    </div>
                    <div class="tscc-tab" data-type="vong-tay" onclick="filterTSCC(this)" style="cursor:pointer; text-align:center;">
                        <img src="https://www.tierra.vn/wp-content/uploads/2025/09/VTA-1.png" style="width:70px; height:70px; margin-bottom:10px; object-fit:contain;"><br>
                        <span style="font-size:14px; color:#888;">Vòng tay</span>
                    </div>
                    <div class="tscc-tab" data-type="mat-day-chuyen" onclick="filterTSCC(this)" style="cursor:pointer; text-align:center;">
                        <img src="https://www.tierra.vn/wp-content/uploads/2025/09/MDA-1.png" style="width:70px; height:70px; margin-bottom:10px; object-fit:contain;"><br>
                        <span style="font-size:14px; color:#888;">Mặt dây</span>
                    </div>
                </div>
            </div>

            <!-- Sản phẩm 3 cột -->
            <div style="display:grid; grid-template-columns: repeat(3,1fr); gap:40px 30px; padding: 0 20px;" id="tscc-products">
                <?php 
                // Lấy sản phẩm từ database thay vì data tĩnh
                $tscc_products_from_db = [];
                if (isset($products) && is_array($products)) {
                    foreach ($products as $prod) {
                        $type = $prod['product_type'] ?? 'nhan';
                        if (!isset($tscc_products_from_db[$type])) {
                            $tscc_products_from_db[$type] = [];
                        }
                        $tscc_products_from_db[$type][] = [
                            'id' => $prod['id'],
                            'img' => $prod['image'],
                            'name' => $prod['name'],
                            'desc' => $prod['description'],
                            'price' => number_format($prod['price'], 0, ',', '.') . ' đ',
                            'slug' => $prod['slug']
                        ];
                    }
                }
                
                // Fallback data tĩnh nếu không có data từ DB
                $tscc_products = [
                    'nhan' => [
                        [
                            'img'   => 'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp',
                            'name'  => 'Nhẫn nữ KC Tournesol Bleu UKC2006',
                            'desc'  => 'Vàng Trắng, Kim Cương, 14K, UKC2006',
                            'price' => '56.610.000 đ',
                            'slug'  => 'nhan-cuoi-cap-01',
                        ],
                        [
                            'img'   => 'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp',
                            'name'  => 'Nhẫn nữ KC Spring Peony UKC4110',
                            'desc'  => 'Vàng Trắng, Kim Cương, 14K, UKC4110',
                            'price' => '82.860.000 đ',
                            'slug'  => 'nhan-cuoi-cap-02',
                        ],
                        [
                            'img'   => 'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp',
                            'name'  => 'Nhẫn nữ KC UKC9916',
                            'desc'  => 'Vàng Trắng, Kim Cương, 14K, UKC9916',
                            'price' => '27.880.000 đ',
                            'slug'  => 'nhan-cuoi-cap-03',
                        ],
                        [
                            'img'   => 'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp',
                            'name'  => 'Nhẫn nữ KC Signature 001',
                            'desc'  => 'Vàng Trắng, Kim Cương, 18K',
                            'price' => '48.500.000 đ',
                            'slug'  => 'nhan-cuoi-cap-04',
                        ],
                        [
                            'img'   => 'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp',
                            'name'  => 'Nhẫn nữ KC Signature 002',
                            'desc'  => 'Vàng Hồng, Kim Cương, 14K',
                            'price' => '35.200.000 đ',
                            'slug'  => 'nhan-cuoi-cap-05',
                        ],
                        [
                            'img'   => 'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp',
                            'name'  => 'Nhẫn nữ KC Signature 003',
                            'desc'  => 'Vàng Trắng, Kim Cương, Platinum',
                            'price' => '72.000.000 đ',
                            'slug'  => 'nhan-cuoi-cap-06',
                        ],
                        [
                            'img'   => 'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp',
                            'name'  => 'Nhẫn nữ KC Royal 001',
                            'desc'  => 'Vàng Trắng, Kim Cương, 18K',
                            'price' => '65.000.000 đ',
                            'slug'  => 'nhan-cuoi-cap-07',
                        ],
                        [
                            'img'   => 'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp',
                            'name'  => 'Nhẫn nữ KC Royal 002',
                            'desc'  => 'Vàng Hồng, Kim Cương, 14K',
                            'price' => '42.800.000 đ',
                            'slug'  => 'nhan-cuoi-cap-08',
                        ],
                        [
                            'img'   => 'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp',
                            'name'  => 'Nhẫn nữ KC Royal 003',
                            'desc'  => 'Vàng Trắng, Kim Cương, Platinum',
                            'price' => '88.500.000 đ',
                            'slug'  => 'nhan-cuoi-cap-01',
                        ],
                    ],
                    'bong-tai' => [
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp','name'=>'Bông Tai KC Tournesol BTA001','desc'=>'Vàng Trắng, Kim Cương, 14K, BTA001','price'=>'45.200.000 đ','slug'=>'ts-bong-tai-01'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp','name'=>'Bông Tai KC Spring BTA002','desc'=>'Vàng Trắng, Kim Cương, 14K, BTA002','price'=>'38.500.000 đ','slug'=>'ts-bong-tai-02'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp','name'=>'Bông Tai KC Royal BTA003','desc'=>'Vàng Trắng, Kim Cương, 18K, BTA003','price'=>'52.000.000 đ','slug'=>'ts-bong-tai-03'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp','name'=>'Bông Tai KC Peony BTA004','desc'=>'Vàng Hồng, Kim Cương, 14K, BTA004','price'=>'29.800.000 đ','slug'=>'ts-bong-tai-04'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp','name'=>'Bông Tai KC Bloom BTA005','desc'=>'Vàng Trắng, Kim Cương, 18K, BTA005','price'=>'41.600.000 đ','slug'=>'ts-bong-tai-05'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp','name'=>'Bông Tai KC Stella BTA006','desc'=>'Vàng Trắng, Kim Cương, Platinum, BTA006','price'=>'68.000.000 đ','slug'=>'ts-bong-tai-06'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp','name'=>'Bông Tai KC Aurora BTA007','desc'=>'Vàng Trắng, Kim Cương, 14K, BTA007','price'=>'32.500.000 đ','slug'=>'ts-bong-tai-07'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp','name'=>'Bông Tai KC Luna BTA008','desc'=>'Vàng Hồng, Kim Cương, 18K, BTA008','price'=>'55.000.000 đ','slug'=>'ts-bong-tai-08'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp','name'=>'Bông Tai KC Nova BTA009','desc'=>'Vàng Trắng, Kim Cương, Platinum, BTA009','price'=>'78.000.000 đ','slug'=>'ts-bong-tai-09'],
                    ],
                    'vong-tay' => [
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp','name'=>'Vòng Tay KC Tennis VTA001','desc'=>'Vàng Trắng, Kim Cương, 18K, VTA001','price'=>'95.000.000 đ','slug'=>'ts-vong-tay-01'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp','name'=>'Vòng Tay KC Eternity VTA002','desc'=>'Vàng Trắng, Kim Cương, Platinum, VTA002','price'=>'120.000.000 đ','slug'=>'ts-vong-tay-02'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp','name'=>'Vòng Tay KC Blossom VTA003','desc'=>'Vàng Hồng, Kim Cương, 14K, VTA003','price'=>'72.500.000 đ','slug'=>'ts-vong-tay-03'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp','name'=>'Vòng Tay KC Royal VTA004','desc'=>'Vàng Trắng, Kim Cương, 18K, VTA004','price'=>'85.000.000 đ','slug'=>'ts-vong-tay-04'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp','name'=>'Vòng Tay KC Luxe VTA005','desc'=>'Vàng Trắng, Kim Cương, Platinum, VTA005','price'=>'145.000.000 đ','slug'=>'ts-vong-tay-05'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp','name'=>'Vòng Tay KC Charm VTA006','desc'=>'Vàng Hồng, Kim Cương, 14K, VTA006','price'=>'68.000.000 đ','slug'=>'ts-vong-tay-06'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp','name'=>'Vòng Tay KC Signature VTA007','desc'=>'Vàng Trắng, Kim Cương, 18K, VTA007','price'=>'92.000.000 đ','slug'=>'ts-vong-tay-07'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp','name'=>'Vòng Tay KC Pearl VTA008','desc'=>'Vàng Trắng, Kim Cương, 14K, VTA008','price'=>'75.500.000 đ','slug'=>'ts-vong-tay-08'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp','name'=>'Vòng Tay KC Diamond VTA009','desc'=>'Vàng Trắng, Kim Cương, Platinum, VTA009','price'=>'168.000.000 đ','slug'=>'ts-vong-tay-09'],
                    ],
                    'mat-day-chuyen' => [
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp','name'=>'Mặt Dây KC Solitaire MDA001','desc'=>'Vàng Trắng, Kim Cương, 18K, MDA001','price'=>'28.500.000 đ','slug'=>'ts-mat-day-01'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp','name'=>'Mặt Dây KC Halo MDA002','desc'=>'Vàng Trắng, Kim Cương, 14K, MDA002','price'=>'35.200.000 đ','slug'=>'ts-mat-day-02'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp','name'=>'Mặt Dây KC Heart MDA003','desc'=>'Vàng Hồng, Kim Cương, 14K, MDA003','price'=>'19.800.000 đ','slug'=>'ts-mat-day-03'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp','name'=>'Mặt Dây KC Pear MDA004','desc'=>'Vàng Trắng, Kim Cương, 18K, MDA004','price'=>'42.000.000 đ','slug'=>'ts-mat-day-04'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp','name'=>'Mặt Dây KC Oval MDA005','desc'=>'Vàng Trắng, Kim Cương, Platinum, MDA005','price'=>'55.000.000 đ','slug'=>'ts-mat-day-05'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp','name'=>'Mặt Dây KC Princess MDA006','desc'=>'Vàng Trắng, Kim Cương, 14K, MDA006','price'=>'24.500.000 đ','slug'=>'ts-mat-day-06'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC2006_3_T.webp','name'=>'Mặt Dây KC Emerald MDA007','desc'=>'Vàng Trắng, Kim Cương, 18K, MDA007','price'=>'38.000.000 đ','slug'=>'ts-mat-day-07'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/11/NKC4110_3-T.webp','name'=>'Mặt Dây KC Marquise MDA008','desc'=>'Vàng Hồng, Kim Cương, 14K, MDA008','price'=>'29.800.000 đ','slug'=>'ts-mat-day-08'],
                        ['img'=>'https://www.tierra.vn/wp-content/uploads/2024/07/NCH9916_4.webp','name'=>'Mặt Dây KC Radiant MDA009','desc'=>'Vàng Trắng, Kim Cương, Platinum, MDA009','price'=>'62.000.000 đ','slug'=>'ts-mat-day-09'],
                    ],
                ];
                
                // Sử dụng data từ DB nếu có, nếu không thì dùng data tĩnh
                if (!empty($tscc_products_from_db)) {
                    $tscc_products = $tscc_products_from_db;
                }
                
                $activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'nhan';
                foreach ($tscc_products as $type => $items):
                    foreach ($items as $item):
                ?>
                <div class="tscc-product-card" data-type="<?= $type ?>" style="text-align:center; display:none;">
                    <a href="/product?slug=<?= htmlspecialchars($item['slug'] ?? '') ?>" style="text-decoration:none; color:inherit; display:block;">
                        <div style="background:#fff; padding:20px 30px 10px; margin-bottom:16px;">
                            <img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width:100%; max-height:320px; object-fit:contain;">
                        </div>
                        <h3 style="font-size:15px; font-weight:600; margin-bottom:6px; line-height:1.4;"><?= htmlspecialchars($item['name']) ?></h3>
                        <p style="font-size:12px; color:#888; margin-bottom:8px;"><?= htmlspecialchars($item['desc']) ?></p>
                        <p style="font-size:14px; color:#c9a84c; font-weight:600;"><?= htmlspecialchars($item['price']) ?></p>
                    </a>
                </div>
                <?php endforeach; endforeach; ?>
            </div>

            <script>
            const TSCC_PER_PAGE = 6;
            let tsccCurrentPage = 1;
            let tsccCurrentType = 'nhan';

            function filterTSCC(el) {
                document.querySelectorAll('.tscc-tab').forEach(t => {
                    t.querySelector('span').style.borderBottom = 'none';
                    t.querySelector('span').style.color = '#888';
                });
                el.querySelector('span').style.borderBottom = '2px solid #c9a84c';
                el.querySelector('span').style.color = '#000';

                tsccCurrentPage = 1;
                tsccCurrentType = el.getAttribute('data-type');
                applyTSCCPage();
                renderTSCCPagination();
            }

            function getCards(type) {
                return Array.from(document.querySelectorAll('.tscc-product-card[data-type="' + type + '"]'));
            }

            function applyTSCCPage() {
                // Ẩn tất cả
                document.querySelectorAll('.tscc-product-card').forEach(c => c.style.display = 'none');
                // Hiện đúng trang
                const cards = getCards(tsccCurrentType);
                const start = (tsccCurrentPage - 1) * TSCC_PER_PAGE;
                cards.slice(start, start + TSCC_PER_PAGE).forEach(c => c.style.display = '');
            }

            function renderTSCCPagination() {
                const cards = getCards(tsccCurrentType);
                const totalPages = Math.ceil(cards.length / TSCC_PER_PAGE);
                const container = document.getElementById('tscc-pagination');
                container.innerHTML = '';
                if (totalPages <= 1) return;

                const btnStyle = (active) => `
                    display:inline-flex; align-items:center; justify-content:center;
                    width:36px; height:36px; margin:0 3px;
                    border:1px solid ${active ? '#c9a84c' : '#ddd'};
                    background:${active ? '#c9a84c' : '#fff'};
                    color:${active ? '#fff' : '#333'};
                    cursor:pointer; border-radius:4px; font-size:14px;
                    font-weight:${active ? '600' : '400'};
                `;

                // Prev
                if (tsccCurrentPage > 1) {
                    const prev = document.createElement('button');
                    prev.innerHTML = '&lsaquo;';
                    prev.style.cssText = btnStyle(false);
                    prev.onclick = () => { tsccCurrentPage--; applyTSCCPage(); renderTSCCPagination(); };
                    container.appendChild(prev);
                }

                // Pages
                for (let i = 1; i <= totalPages; i++) {
                    if (totalPages > 5 && i > 3 && i < totalPages) {
                        if (i === 4) {
                            const dots = document.createElement('span');
                            dots.textContent = '...';
                            dots.style.cssText = 'margin:0 4px; line-height:36px; color:#888;';
                            container.appendChild(dots);
                        }
                        continue;
                    }
                    const btn = document.createElement('button');
                    btn.textContent = i;
                    btn.style.cssText = btnStyle(i === tsccCurrentPage);
                    btn.onclick = ((page) => () => { tsccCurrentPage = page; applyTSCCPage(); renderTSCCPagination(); })(i);
                    container.appendChild(btn);
                }

                // Next
                if (tsccCurrentPage < totalPages) {
                    const next = document.createElement('button');
                    next.innerHTML = '&rsaquo;';
                    next.style.cssText = btnStyle(false);
                    next.onclick = () => { tsccCurrentPage++; applyTSCCPage(); renderTSCCPagination(); };
                    container.appendChild(next);
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                filterTSCC(document.querySelector('.tscc-tab.active'));
            });
            </script>

            <!-- Phân trang TSCC -->
            <div id="tscc-pagination" style="text-align:center; margin: 40px 0;"></div>

        <?php else: ?>
            <!-- Filter Bar -->
            <div class="filter-bar">
                <div class="filter-left">
                    <button class="filter-btn" id="filter-toggle">
                        <i class="fas fa-filter"></i>
                        <span>Bộ lọc</span>
                    </button>
                    
                    <!-- Filter Dropdown -->
                    <div class="filter-dropdown" id="filter-dropdown">
                        <?php 
                        // Debug - kiểm tra các giá trị
                        $currentCategory = isset($_GET['category']) ? $_GET['category'] : '';
                        $currentPath = $_SERVER['REQUEST_URI'];
                        
                        if ($currentCategory === 'nhan-cau-hon' || $currentCategory === 'engagement'): ?>
                            <!-- Filter cho Nhẫn Cầu Hôn -->
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>THEO GIÁ</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="0-20000000"> Dưới 20 triệu</label>
                                        <label><input type="checkbox" value="20000000-50000000"> 20 - 50 triệu</label>
                                        <label><input type="checkbox" value="50000000-80000000"> 50 - 80 triệu</label>
                                        <label><input type="checkbox" value="80000000-999999999"> Trên 80 triệu</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>KIỂU DÁNG NHẪN</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="solitaire"> Solitaire</label>
                                        <label><input type="checkbox" value="halo"> Halo</label>
                                        <label><input type="checkbox" value="vintage"> Vintage</label>
                                        <label><input type="checkbox" value="three-stone"> Three Stone</label>
                                        <label><input type="checkbox" value="cathedral"> Cathedral</label>
                                        <label><input type="checkbox" value="tiffany"> Tiffany Setting</label>
                                        <label><input type="checkbox" value="pave"> Pave</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>KIỂU VIỀN CHỦ</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="round"> Round</label>
                                        <label><input type="checkbox" value="princess"> Princess</label>
                                        <label><input type="checkbox" value="emerald"> Emerald</label>
                                        <label><input type="checkbox" value="oval"> Oval</label>
                                        <label><input type="checkbox" value="pear"> Pear</label>
                                        <label><input type="checkbox" value="heart"> Heart</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>MÀU SẮC</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="vang-trang"> Vàng trắng</label>
                                        <label><input type="checkbox" value="vang-hong"> Vàng hồng</label>
                                        <label><input type="checkbox" value="vang-vang"> Vàng vàng</label>
                                        <label><input type="checkbox" value="platinum"> Platinum</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>BỘ SƯU TẬP</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="before-forever"> Before Forever</label>
                                        <label><input type="checkbox" value="spark-of-heaven"> Spark Of Heaven</label>
                                        <label><input type="checkbox" value="blooming"> Blooming</label>
                                        <label><input type="checkbox" value="petite-bridal"> Petite Bridal</label>
                                        <label><input type="checkbox" value="bridal-gown"> Bridal Gown</label>
                                        <label><input type="checkbox" value="my-princess"> My Princess</label>
                                        <label><input type="checkbox" value="holding-you"> Holding You</label>
                                        <label><input type="checkbox" value="tender-love"> Tender Love</label>
                                        <label><input type="checkbox" value="eternal-promise"> Eternal Promise</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>CHẤT LIỆU</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="18k"> Vàng 18K</label>
                                        <label><input type="checkbox" value="14k"> Vàng 14K</label>
                                        <label><input type="checkbox" value="platinum"> Platinum</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>PHONG CÁCH</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="thanh-lich"> Thanh lịch</label>
                                        <label><input type="checkbox" value="hien-dai"> Hiện đại</label>
                                        <label><input type="checkbox" value="co-dien"> Cổ điển</label>
                                        <label><input type="checkbox" value="sang-trong"> Sang trọng</label>
                                    </div>
                                </div>
                            </div>
                            
                        <?php elseif ($currentCategory === 'nhan-cuoi' || $currentCategory === 'wedding'): ?>
                            <!-- Filter cho Nhẫn Cưới -->
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>THEO GIÁ</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="0-20000000"> Dưới 20 triệu</label>
                                        <label><input type="checkbox" value="20000000-50000000"> 20 - 50 triệu</label>
                                        <label><input type="checkbox" value="50000000-80000000"> 50 - 80 triệu</label>
                                        <label><input type="checkbox" value="80000000-999999999"> Trên 80 triệu</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>LOẠI NHẪN</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="nhan-cuoi-cap"> Nhẫn cưới cặp</label>
                                        <label><input type="checkbox" value="nhan-cuoi-nam"> Nhẫn cưới nam</label>
                                        <label><input type="checkbox" value="nhan-cuoi-nu"> Nhẫn cưới nữ</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>CHẤT LIỆU</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="18k"> 18K</label>
                                        <label><input type="checkbox" value="14k"> 14K</label>
                                        <label><input type="checkbox" value="18k-kim-cuong"> 18K Kim cương</label>
                                        <label><input type="checkbox" value="14k-kim-cuong"> 14K Kim cương</label>
                                        <label><input type="checkbox" value="platinum"> Platinum</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>MÀU SẮC</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="vang-trang"> Vàng trắng</label>
                                        <label><input type="checkbox" value="vang-hong"> Vàng hồng</label>
                                        <label><input type="checkbox" value="vang-vang"> Vàng vàng</label>
                                        <label><input type="checkbox" value="platinum"> Platinum</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>PHONG CÁCH</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="truyen-thong"> Truyền thống</label>
                                        <label><input type="checkbox" value="hien-dai"> Hiện đại</label>
                                        <label><input type="checkbox" value="kim-cuong"> Kim Cương</label>
                                        <label><input type="checkbox" value="eternity"> Eternity</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>BỘ SƯU TẬP</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="shape-of-love"> Shape Of Love</label>
                                        <label><input type="checkbox" value="vang-son"> Vàng son</label>
                                        <label><input type="checkbox" value="flower-of-joy"> Flower Of Joy</label>
                                        <label><input type="checkbox" value="sweet-sour"> Sweet & Sour</label>
                                        <label><input type="checkbox" value="our-story"> Our Story</label>
                                    </div>
                                </div>
                            </div>
                            
                        <?php elseif ($currentCategory === 'kim-cuong'): ?>
                            <!-- Filter cho Kim Cương -->
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>THEO GIÁ</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="0-20000000"> Dưới 20 triệu</label>
                                        <label><input type="checkbox" value="20000000-50000000"> 20 - 50 triệu</label>
                                        <label><input type="checkbox" value="50000000-100000000"> 50 - 100 triệu</label>
                                        <label><input type="checkbox" value="100000000-200000000"> 100 - 200 triệu</label>
                                        <label><input type="checkbox" value="200000000-500000000"> 200 - 500 triệu</label>
                                        <label><input type="checkbox" value="500000000-999999999"> Trên 500 triệu</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>DẠNG KIM CƯƠNG</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="round"> Round</label>
                                        <label><input type="checkbox" value="princess"> Princess</label>
                                        <label><input type="checkbox" value="oval"> Oval</label>
                                        <label><input type="checkbox" value="pear"> Pear</label>
                                        <label><input type="checkbox" value="emerald"> Emerald</label>
                                        <label><input type="checkbox" value="heart"> Heart</label>
                                        <label><input type="checkbox" value="radiant"> Radiant</label>
                                        <label><input type="checkbox" value="marquise"> Marquise</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>KÍCH THƯỚC</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="3ly6"> Kim cương 3ly6</label>
                                        <label><input type="checkbox" value="4ly5"> Kim cương 4ly5</label>
                                        <label><input type="checkbox" value="5ly"> Kim cương 5ly</label>
                                        <label><input type="checkbox" value="5ly4"> Kim cương 5ly4</label>
                                        <label><input type="checkbox" value="6ly"> Kim cương 6ly</label>
                                        <label><input type="checkbox" value="6ly3"> Kim cương 6ly3</label>
                                        <label><input type="checkbox" value="7ly2"> Kim cương 7ly2</label>
                                        <label><input type="checkbox" value="8ly1"> Kim cương 8ly1</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>TRANG SỨC KIM CƯƠNG</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="nhan-kim-cuong"> Nhẫn kim cương</label>
                                        <label><input type="checkbox" value="bong-tai-kim-cuong"> Bông tai kim cương</label>
                                        <label><input type="checkbox" value="mat-day-kim-cuong"> Mặt dây kim cương</label>
                                        <label><input type="checkbox" value="vong-tay-kim-cuong"> Vòng tay kim cương</label>
                                    </div>
                                </div>
                            </div>

                        <?php elseif ($currentCategory === 'trang-suc' || $currentCategory === 'trang-suc-cao-cap'): ?>
                            <!-- Filter cho Trang Sức -->
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>LOẠI TRANG SỨC</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="nhan-nu"> Nhẫn nữ</label>
                                        <label><input type="checkbox" value="nhan-nam"> Nhẫn nam</label>
                                        <label><input type="checkbox" value="bong-tai"> Bông tai</label>
                                        <label><input type="checkbox" value="mat-day-chuyen"> Mặt dây chuyền</label>
                                        <label><input type="checkbox" value="vong-tay"> Vòng tay</label>
                                        <label><input type="checkbox" value="trang-suc-quy-ong"> Trang sức Quý Ông</label>
                                        <label><input type="checkbox" value="trang-suc-thoi-trang"> Trang sức thời trang</label>
                                        <label><input type="checkbox" value="the-vang-24k"> Thẻ vàng 24K</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>CHẤT LIỆU</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="18k"> 18K</label>
                                        <label><input type="checkbox" value="14k"> 14K</label>
                                        <label><input type="checkbox" value="platinum"> Platinum</label>
                                        <label><input type="checkbox" value="kim-cuong"> Kim cương</label>
                                        <label><input type="checkbox" value="da-quy-khac"> Đá quý khác</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>BỘ SƯU TẬP</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="diamond-light"> Diamond Light</label>
                                        <label><input type="checkbox" value="true-north"> True North</label>
                                        <label><input type="checkbox" value="the-hearts"> The Hearts</label>
                                        <label><input type="checkbox" value="accessories"> Accessories</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>THEO GIÁ</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="0-10000000"> Dưới 10 triệu</label>
                                        <label><input type="checkbox" value="10000000-30000000"> 10 - 30 triệu</label>
                                        <label><input type="checkbox" value="30000000-50000000"> 30 - 50 triệu</label>
                                        <label><input type="checkbox" value="50000000-100000000"> 50 - 100 triệu</label>
                                        <label><input type="checkbox" value="100000000-999999999"> Trên 100 triệu</label>
                                    </div>
                                </div>
                            </div>

                        <?php else: ?>
                            <!-- Filter chung cho các danh mục khác -->
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>DANH MỤC</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="Nhẫn cầu hôn"> Nhẫn cầu hôn</label>
                                        <label><input type="checkbox" value="Nhẫn cưới"> Nhẫn cưới</label>
                                        <label><input type="checkbox" value="Nhẫn"> Nhẫn</label>
                                        <label><input type="checkbox" value="Dây chuyền"> Dây chuyền</label>
                                        <label><input type="checkbox" value="Bông tai"> Bông tai</label>
                                        <label><input type="checkbox" value="Vòng tay"> Vòng tay</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <div class="filter-group-header" onclick="toggleFilterGroup(this)">
                                    <span>KHOẢNG GIÁ</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="filter-group-content">
                                    <div class="filter-options">
                                        <label><input type="checkbox" value="0-10000000"> Dưới 10 triệu</label>
                                        <label><input type="checkbox" value="10000000-30000000"> 10 - 30 triệu</label>
                                        <label><input type="checkbox" value="30000000-50000000"> 30 - 50 triệu</label>
                                        <label><input type="checkbox" value="50000000-100000000"> 50 - 100 triệu</label>
                                        <label><input type="checkbox" value="100000000-999999999"> Trên 100 triệu</label>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <button class="sort-btn" id="sort-toggle">
                        <i class="fas fa-sort"></i>
                        <span>Sắp xếp</span>
                    </button>
                    
                    <!-- Sort Dropdown -->
                    <div class="sort-dropdown" id="sort-dropdown">
                        <div class="sort-options">
                            <button class="sort-option active" data-sort="default">Mặc định</button>
                            <button class="sort-option" data-sort="price-asc">Giá: Thấp đến Cao</button>
                            <button class="sort-option" data-sort="price-desc">Giá: Cao đến Thấp</button>
                            <button class="sort-option" data-sort="name">Tên A-Z</button>
                            <button class="sort-option" data-sort="newest">Mới nhất</button>
                        </div>
                    </div>
                </div>
                
                <div class="filter-right">
                    <button class="view-btn active" id="grid-view" data-view="grid">
                        <i class="fas fa-th"></i>
                        <span>Thu gọn</span>
                    </button>
                    <button class="view-btn" id="list-view" data-view="list">
                        <i class="fas fa-list"></i>
                        <span>Chi tiết</span>
                    </button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="products-grid" id="all-products">
                <?php if (isset($products) && is_array($products) && count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                    <div class="product-card" 
                         data-category="<?= htmlspecialchars($product['category_name'] ?? 'Khác') ?>" 
                         data-price="<?= $product['price'] ?>"
                         data-style="<?= htmlspecialchars($product['style'] ?? '') ?>"
                         data-type="<?= htmlspecialchars($product['product_type'] ?? '') ?>"
                         data-ring-style="<?= htmlspecialchars($product['ring_style'] ?? '') ?>"
                         data-border-type="<?= htmlspecialchars($product['border_type'] ?? '') ?>"
                         data-material="<?= htmlspecialchars($product['material'] ?? '') ?>"
                         data-color="<?= htmlspecialchars($product['color'] ?? '') ?>"
                         data-stone-type="<?= htmlspecialchars($product['stone_type'] ?? '') ?>"
                         data-collection="<?= htmlspecialchars($product['collection'] ?? '') ?>"
                         data-ring-type="<?= htmlspecialchars($product['ring_type'] ?? '') ?>"
                         data-product-type="<?= htmlspecialchars($product['product_type'] ?? '') ?>"
                         data-size="<?= htmlspecialchars($product['size'] ?? '') ?>"
                         data-id="<?= $product['id'] ?>">
                        <div class="product-image">
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                            <div class="product-overlay">
                                <button class="btn-icon" onclick="addToCart(<?= $product['id'] ?>)">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                                <button class="btn-icon" onclick="addToWishlist(<?= $product['id'] ?>)">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-details">
                            <span class="product-category"><?= htmlspecialchars($product['category_name'] ?? 'Khác') ?></span>
                            <a href="/product?id=<?= $product['id'] ?>" style="text-decoration:none; color:inherit;">
                                <h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
                            </a>
                            <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                            <div class="product-footer">
                                <span class="product-price"><?= number_format($product['price'], 0, ',', '.') ?>đ</span>
                                <button class="btn-buy" onclick="addToCart(<?= $product['id'] ?>); event.stopPropagation();">Thêm vào giỏ</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px;">
                        <h3>Không tìm thấy sản phẩm nào</h3>
                        <p>Vui lòng thử lại hoặc <a href="/install.php">cài đặt database</a></p>
                    </div>
                <?php endif; ?>
            </div>

        <?php endif; // end else (non trang-suc-cao-cap) ?>

            <!-- Pagination -->
            <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
            <div class="pagination-container">
                <div class="pagination-info">
                    <span>Hiển thị <?= count($products) ?> trong tổng số <?= $pagination['total_products'] ?> sản phẩm</span>
                </div>
                <nav class="pagination">
                    <?php if ($pagination['has_prev']): ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $pagination['prev_page']])) ?>" class="pagination-btn prev">
                            <i class="fas fa-chevron-left"></i> Trước
                        </a>
                    <?php endif; ?>
                    
                    <div class="pagination-numbers">
                        <?php
                        $start = max(1, $pagination['current_page'] - 2);
                        $end = min($pagination['total_pages'], $pagination['current_page'] + 2);
                        
                        if ($start > 1): ?>
                            <a href="?<?= http_build_query(array_merge($_GET, ['page' => 1])) ?>" class="pagination-number">1</a>
                            <?php if ($start > 2): ?>
                                <span class="pagination-dots">...</span>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <?php for ($i = $start; $i <= $end; $i++): ?>
                            <?php if ($i == $pagination['current_page']): ?>
                                <span class="pagination-number active"><?= $i ?></span>
                            <?php else: ?>
                                <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>" class="pagination-number"><?= $i ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                        
                        <?php if ($end < $pagination['total_pages']): ?>
                            <?php if ($end < $pagination['total_pages'] - 1): ?>
                                <span class="pagination-dots">...</span>
                            <?php endif; ?>
                            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $pagination['total_pages']])) ?>" class="pagination-number"><?= $pagination['total_pages'] ?></a>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($pagination['has_next']): ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $pagination['next_page']])) ?>" class="pagination-btn next">
                            Sau <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Banner Image Placeholder - Below Pagination -->
        <?php if ($currentCategory !== 'trang-suc-cao-cap'): ?>
        <div class="banner-image-container">
            <img src="https://www.tierra.vn/wp-content/uploads/2024/04/thiet-ke-theo-yeu-cau-P9CAcUADlA.png" alt="Thiết kế theo yêu cầu" class="marketing-banner-image">
        </div>
        
        <!-- FAQ Section -->
        <div class="faq-section">
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Kinh nghiệm chọn mua nhẫn cưới cho các cặp đôi</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Chọn nhẫn cưới là quyết định quan trọng. Hãy xem xét phong cách, chất liệu, kích thước và ngân sách phù hợp với cả hai người.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Cách đo kích thước nhẫn cưới chính xác</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Đo kích thước nhẫn vào cuối ngày khi ngón tay có kích thước lớn nhất. Sử dụng thước đo nhẫn chuyên dụng để có kết quả chính xác nhất.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Nên mua nhẫn cưới vàng trắng hay bạch kim?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Vàng trắng có giá thành hợp lý, bạch kim bền hơn và không gây dị ứng. Lựa chọn tùy thuộc vào sở thích và ngân sách của bạn.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Nhẫn Cưới Thiết Kế Độc Bản</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Dịch vụ thiết kế nhẫn cưới độc bản theo yêu cầu, tạo nên những chiếc nhẫn mang dấu ấn riêng của tình yêu bạn.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Loại nhẫn, chất liệu, màu sắc hiện đại cho giới trẻ</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Xu hướng hiện đại ưa chuộng thiết kế tối giản, vàng hồng, vàng trắng và các chi tiết tinh tế phù hợp với phong cách trẻ trung.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Đa dạng các phong cách thiết kế nhẫn cưới</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Từ cổ điển đến hiện đại, từ đơn giản đến phức tạp, chúng tôi có đa dạng phong cách thiết kế để bạn lựa chọn.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Dịch vụ và chính sách bảo hành dành cho nhẫn cưới</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Chúng tôi cung cấp bảo hành trọn đời, dịch vụ làm sạch miễn phí và chính sách đổi size linh hoạt cho khách hàng.</p>
                    </div>
                </div>
            </div>
        </div>
        
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
        <?php endif; // end if not trang-suc-cao-cap ?>

        <?php if ($currentCategory === 'trang-suc-cao-cap'): ?>
        <!-- Store Experience Section -->
        <section class="store-experience-section">
            <div class="container">
                <div class="store-experience-grid">
                    <div class="store-image">
                        <img src="https://www.tierra.vn/wp-content/uploads/2024/04/store.webp" alt="Trải nghiệm cửa hàng">
                    </div>
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
                        <a href="#" class="store-link">Hệ thống cửa hàng <i class="fas fa-arrow-right"></i></a>
                        <div>
                            <a href="#" class="btn-appointment">ĐẶT LỊCH HẸN</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
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
    <script src="/js/products.js"></script>
    <script src="/js/slider.js"></script>
    <script src="/js/filter.js"></script>
    <script src="/js/pagination.js"></script>
    <script src="/js/faq.js"></script>
</body>
</html>
