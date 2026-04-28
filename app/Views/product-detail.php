<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?> - Tierra</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/auth-dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .pd-page { padding: 40px 0 60px; }
        .pd-grid { display: grid; grid-template-columns: 100px 1fr 420px; gap: 32px; align-items: start; }
        .pd-thumbs { display: flex; flex-direction: column; gap: 10px; }
        .pd-thumbs img { width: 90px; height: 90px; object-fit: contain; border: 1px solid #eee; padding: 6px; cursor: pointer; border-radius: 4px; }
        .pd-thumbs img.active, .pd-thumbs img:hover { border-color: #c9a84c; }
        .pd-main-img { display: flex; align-items: center; justify-content: center; min-height: 400px; }
        .pd-main-img img { width: 100%; max-height: 500px; object-fit: contain; }
        .pd-info h1 { font-size: 20px; font-weight: 600; margin-bottom: 12px; line-height: 1.4; }
        .pd-price { font-size: 26px; color: #c9a84c; font-weight: 700; margin-bottom: 4px; }
        .pd-price-old { font-size: 13px; color: #999; text-decoration: line-through; margin-bottom: 4px; }
        .pd-price-note { font-size: 12px; color: #c9a84c; font-style: italic; margin-bottom: 16px; }
        .pd-specs { border-top: 1px solid #eee; padding-top: 12px; margin-bottom: 16px; }
        .pd-spec-row { display: flex; justify-content: space-between; align-items: center; padding: 9px 0; border-bottom: 1px solid #f5f5f5; font-size: 13px; }
        .pd-spec-label { color: #666; }
        .pd-spec-value { font-weight: 500; color: #333; }
        .color-opts { display: flex; gap: 8px; }
        .color-dot { width: 26px; height: 26px; border-radius: 50%; cursor: pointer; border: 2px solid transparent; }
        .color-dot:hover, .color-dot.active { border-color: #555; }
        .mat-opts { display: flex; gap: 6px; }
        .mat-btn { padding: 3px 10px; border: 1px solid #ddd; background: #fff; font-size: 12px; cursor: pointer; border-radius: 3px; }
        .mat-btn:hover, .mat-btn.active { border-color: #c9a84c; background: #c9a84c; color: #fff; }
        .stone-tag { display: inline-block; padding: 3px 10px; background: #f5f5f5; border: 1px solid #ddd; font-size: 12px; border-radius: 3px; }
        .btn-buy { width: 100%; padding: 15px; background: #5c3d2e; color: #fff; border: none; font-size: 15px; font-weight: 600; letter-spacing: 1px; cursor: pointer; margin: 18px 0 10px; border-radius: 2px; }
        .btn-buy:hover { background: #4a3025; }
        .pd-hotline { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #333; margin-bottom: 14px; }
        .pd-footnote { font-size: 11px; color: #999; line-height: 1.7; border-top: 1px solid #eee; padding-top: 10px; }
        .pd-wishlist { background: none; border: none; cursor: pointer; font-size: 22px; color: #ccc; margin-top: 6px; }
        .pd-wishlist:hover { color: #e74c3c; }

        /* Policy */
        .pd-policy { background: #fafafa; padding: 36px 0; margin: 40px 0 0; }
        .pd-policy h2 { text-align: center; font-size: 18px; margin-bottom: 28px; }
        .pd-policy-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 24px; text-align: center; }
        .pd-policy-item i { font-size: 30px; color: #c9a84c; margin-bottom: 10px; }
        .pd-policy-item h4 { font-size: 13px; font-weight: 600; margin-bottom: 6px; }
        .pd-policy-item p { font-size: 12px; color: #888; line-height: 1.6; }

        /* Related */
        .pd-related { padding: 40px 0; }
        .pd-related h2 { text-align: center; font-size: 18px; margin-bottom: 28px; }
        .pd-related-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 20px; }
        .pd-related-card { text-align: center; cursor: pointer; }
        .pd-related-card img { width: 100%; aspect-ratio: 1; object-fit: contain; background: #f9f9f9; padding: 14px; margin-bottom: 10px; }
        .pd-related-card .badge { font-size: 10px; color: #c9a84c; font-weight: 600; letter-spacing: 1px; }
        .pd-related-card h4 { font-size: 12px; font-weight: 500; margin: 4px 0; line-height: 1.4; }
        .pd-related-card .price { font-size: 13px; color: #333; }
        .pd-related-card:hover img { opacity: 0.85; }
    </style>
</head>
<body>
    <!-- Top Banner -->
    <div class="top-banner">
        <p>Giảm 30% cho đơn hàng từ 3.000.000đ - Áp dụng tự động khi thanh toán. <a href="#">*Xem điều kiện</a></p>
    </div>

    <!-- Header (copy từ products.php) -->
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

    <!-- Product Detail -->
    <section class="pd-page">
        <div class="container">
            <div class="pd-grid">
                <!-- Thumbnails -->
                <div class="pd-thumbs">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="thumb 1" class="active" onclick="changeMainImg(this)">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="thumb 2" onclick="changeMainImg(this)">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="thumb 3" onclick="changeMainImg(this)">
                </div>

                <!-- Main Image -->
                <div class="pd-main-img">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" id="mainImg">
                </div>

                <!-- Info -->
                <div class="pd-info">
                    <h1><?= htmlspecialchars($product['name']) ?></h1>
                    <div class="pd-price"><?= number_format($product['price'], 0, ',', '.') ?> đ*</div>
                    <?php if (!empty($product['sale_price'])): ?>
                    <div class="pd-price-old"><?= number_format($product['sale_price'], 0, ',', '.') ?> đ</div>
                    <?php endif; ?>
                    <div class="pd-price-note">(Giá niêm yết cho vỏ trang sức)</div>

                    <div class="pd-specs">
                        <div class="pd-spec-row">
                            <span class="pd-spec-label">Ni tay</span>
                            <span class="pd-spec-value">12</span>
                        </div>
                        <div class="pd-spec-row">
                            <span class="pd-spec-label">Kiểu viên chủ</span>
                            <span class="pd-spec-value"><?= htmlspecialchars(ucfirst($product['border_type'] ?? 'Round')) ?></span>
                        </div>
                        <div class="pd-spec-row">
                            <span class="pd-spec-label">Kích thước viên chủ (*)</span>
                            <span class="pd-spec-value"><?= htmlspecialchars($product['size'] ?? '7.2') ?></span>
                        </div>
                        <div class="pd-spec-row">
                            <span class="pd-spec-label">Kiểu dáng nhẫn</span>
                            <span class="pd-spec-value"><?= htmlspecialchars(ucfirst($product['ring_style'] ?? $product['style'] ?? 'Halo')) ?></span>
                        </div>
                        <div class="pd-spec-row">
                            <span class="pd-spec-label">Màu Kim Loại</span>
                            <span class="pd-spec-value">
                                <div class="color-opts">
                                    <div class="color-dot active" style="background:#e8d5a3;" title="Vàng vàng"></div>
                                    <div class="color-dot" style="background:#e8b4a0;" title="Vàng hồng"></div>
                                    <div class="color-dot" style="background:#c0c0c0;" title="Vàng trắng"></div>
                                </div>
                            </span>
                        </div>
                        <div class="pd-spec-row">
                            <span class="pd-spec-label">Đá tâm</span>
                            <span class="pd-spec-value">
                                <span class="stone-tag"><?= htmlspecialchars(ucfirst($product['stone_type'] ?? 'Kim Cương')) ?></span>
                            </span>
                        </div>
                        <div class="pd-spec-row">
                            <span class="pd-spec-label">Chất liệu</span>
                            <span class="pd-spec-value">
                                <div class="mat-opts">
                                    <button class="mat-btn active">14K</button>
                                    <button class="mat-btn">18K</button>
                                    <button class="mat-btn">Bạch kim</button>
                                </div>
                            </span>
                        </div>
                    </div>

                    <button class="btn-buy" onclick="addToCart(<?= $product['id'] ?>)">MUA NGAY</button>

                    <div class="pd-hotline">
                        <i class="fas fa-phone-alt"></i>
                        <span>1900 232 354</span>
                    </div>

                    <div class="pd-footnote">
                        (*) Giá niêm yết trên đây là GIÁ THAM KHẢO dành cho vỏ trang sức với các thông số tiêu chuẩn. Giá chưa bao gồm giá viên chủ kim cương nếu có và có thể thay đổi trên thực tế tùy thuộc vào thông số cụ thể theo ni tay và yêu cầu riêng của từng khách hàng.
                    </div>

                    <button class="pd-wishlist" onclick="addToWishlist(<?= $product['id'] ?>)"><i class="far fa-heart"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Policy Section -->
    <div class="pd-policy">
        <div class="container">
            <h2>Chính sách của Tierra</h2>
            <div class="pd-policy-grid">
                <div class="pd-policy-item">
                    <i class="fas fa-truck"></i>
                    <h4>Giao hàng toàn quốc</h4>
                    <p>Giao hàng nhanh chóng, an toàn đến tận tay khách hàng trên toàn quốc.</p>
                </div>
                <div class="pd-policy-item">
                    <i class="fas fa-exchange-alt"></i>
                    <h4>Thu đổi cạnh tranh</h4>
                    <p>Thu đổi trang sức với mức giá cạnh tranh nhất thị trường.</p>
                </div>
                <div class="pd-policy-item">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Bảo hành trọn đời</h4>
                    <p>Cam kết bảo hành trọn đời, dịch vụ làm sạch miễn phí định kỳ.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <?php if (!empty($related)): ?>
    <section class="pd-related">
        <div class="container">
            <h2>Có thể bạn quan tâm</h2>
            <div class="pd-related-grid">
                <?php foreach (array_slice($related, 0, 4) as $rel): ?>
                <?php if ($rel['id'] == $product['id']) continue; ?>
                <a href="/product?id=<?= $rel['id'] ?>" class="pd-related-card" style="text-decoration:none; color:inherit;">
                    <div class="badge">Best Selling</div>
                    <img src="<?= htmlspecialchars($rel['image']) ?>" alt="<?= htmlspecialchars($rel['name']) ?>">
                    <h4><?= htmlspecialchars($rel['name']) ?></h4>
                    <div class="price"><?= number_format($rel['price'], 0, ',', '.') ?> đ</div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Consultation Form -->
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
    <script src="/js/wishlist.js?v=1"></script>
    <script src="/js/search.js?v=1"></script>
    <script src="/js/auth-dropdown.js?v=1"></script>
    <script>
    function changeMainImg(thumb) {
        document.getElementById('mainImg').src = thumb.src;
        document.querySelectorAll('.pd-thumbs img').forEach(t => t.classList.remove('active'));
        thumb.classList.add('active');
    }
    document.querySelectorAll('.mat-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.mat-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
    document.querySelectorAll('.color-dot').forEach(dot => {
        dot.addEventListener('click', function() {
            document.querySelectorAll('.color-dot').forEach(d => d.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Kiểm tra trạng thái wishlist khi trang load
    checkWishlistStatus(<?= $product['id'] ?>);
    </script>
</body>
</html>
