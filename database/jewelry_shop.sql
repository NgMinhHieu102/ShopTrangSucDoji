-- Tạo database
CREATE DATABASE IF NOT EXISTS jewelry_shop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE jewelry_shop;

-- Xóa các bảng cũ nếu tồn tại (để cài đặt lại)
DROP TABLE IF EXISTS product_images;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;

-- Bảng categories (danh mục sản phẩm)
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bảng products (sản phẩm)
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    price DECIMAL(15,2) NOT NULL,
    sale_price DECIMAL(15,2),
    image VARCHAR(500),
    category_id INT,
    stock INT DEFAULT 0,
    is_featured BOOLEAN DEFAULT FALSE,
    style VARCHAR(100),
    product_type VARCHAR(100),
    design_style VARCHAR(100),
    border_type VARCHAR(100),
    collection VARCHAR(100),
    material VARCHAR(100),
    color VARCHAR(100),
    stone_type VARCHAR(100),
    ring_style VARCHAR(100),
    ring_type VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bảng product_images (hình ảnh sản phẩm)
CREATE TABLE IF NOT EXISTS product_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    image_url VARCHAR(500) NOT NULL,
    is_primary BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Thêm dữ liệu mẫu cho categories
INSERT INTO categories (name, slug, description) VALUES
('Nhẫn cầu hôn', 'nhan-cau-hon', 'Nhẫn cầu hôn kim cương cao cấp'),
('Nhẫn cưới', 'nhan-cuoi', 'Nhẫn cưới cho cặp đôi'),
('Nhẫn', 'nhan', 'Các loại nhẫn kim cương, vàng, bạc cao cấp'),
('Dây chuyền', 'day-chuyen', 'Dây chuyền vàng, bạc, kim cương'),
('Bông tai', 'bong-tai', 'Bông tai ngọc trai, kim cương, vàng'),
('Vòng tay', 'vong-tay', 'Vòng tay vàng, bạc, kim cương'),
('Lắc chân', 'lac-chan', 'Lắc chân bạc, vàng thời trang');

-- Thêm dữ liệu mẫu cho products - NHẪN CẦU HÔN (15 sản phẩm)
INSERT INTO products (name, slug, description, price, image, category_id, stock, is_featured, style, product_type) VALUES
-- Nhẫn cầu hôn cao cấp
('Nhẫn Cầu Hôn Solitaire Kim Cương 1 Carat', 'nhan-cau-hon-solitaire-1ct', 'Nhẫn cầu hôn Solitaire kim cương 1 carat vàng trắng 18K', 85000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 1, 10, TRUE, 'solitaire', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Halo Kim Cương', 'nhan-cau-hon-halo-kim-cuong', 'Nhẫn cầu hôn Halo kim cương vàng trắng 14K', 65000000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 1, 15, TRUE, 'halo', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Vintage Kim Cương', 'nhan-cau-hon-vintage-kim-cuong', 'Nhẫn cầu hôn phong cách Vintage kim cương', 72000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 1, 12, TRUE, 'vintage', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Three Stone', 'nhan-cau-hon-three-stone', 'Nhẫn cầu hôn Three Stone kim cương vàng hồng', 78000000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 1, 8, TRUE, 'three-stone', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Cathedral Kim Cương', 'nhan-cau-hon-cathedral', 'Nhẫn cầu hôn Cathedral kim cương platinum', 95000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 1, 6, TRUE, 'cathedral', 'nhan-cau-hon'),

-- Nhẫn cầu hôn tầm trung
('Nhẫn Cầu Hôn Solitaire 0.5 Carat', 'nhan-cau-hon-solitaire-05ct', 'Nhẫn cầu hôn Solitaire kim cương 0.5 carat', 45000000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 1, 20, TRUE, 'solitaire', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Tiffany Setting', 'nhan-cau-hon-tiffany-setting', 'Nhẫn cầu hôn Tiffany Setting kim cương', 58000000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 1, 18, TRUE, 'tiffany', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Pave Kim Cương', 'nhan-cau-hon-pave', 'Nhẫn cầu hôn Pave kim cương vàng trắng', 52000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 1, 16, TRUE, 'pave', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Princess Cut', 'nhan-cau-hon-princess-cut', 'Nhẫn cầu hôn Princess Cut kim cương', 48000000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 1, 14, TRUE, 'princess', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Emerald Cut', 'nhan-cau-hon-emerald-cut', 'Nhẫn cầu hôn Emerald Cut kim cương', 55000000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 1, 12, TRUE, 'emerald-cut', 'nhan-cau-hon'),

-- Nhẫn cầu hôn phổ thông
('Nhẫn Cầu Hôn Solitaire 0.3 Carat', 'nhan-cau-hon-solitaire-03ct', 'Nhẫn cầu hôn Solitaire kim cương 0.3 carat', 28000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 1, 25, FALSE, 'solitaire', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Vàng Hồng Đơn Giản', 'nhan-cau-hon-vang-hong-don-gian', 'Nhẫn cầu hôn vàng hồng 14K đơn giản', 22000000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 1, 30, FALSE, 'classic', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Twist Band', 'nhan-cau-hon-twist-band', 'Nhẫn cầu hôn Twist Band kim cương', 35000000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 1, 22, FALSE, 'twist', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Split Shank', 'nhan-cau-hon-split-shank', 'Nhẫn cầu hôn Split Shank kim cương', 42000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 1, 18, FALSE, 'split-shank', 'nhan-cau-hon'),
('Nhẫn Cầu Hôn Bezel Setting', 'nhan-cau-hon-bezel-setting', 'Nhẫn cầu hôn Bezel Setting hiện đại', 38000000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 1, 20, FALSE, 'bezel', 'nhan-cau-hon');

-- NHẪN THÔNG THƯỜNG (10 sản phẩm) - category_id = 3
INSERT INTO products (name, slug, description, price, image, category_id, stock, is_featured, style, product_type) VALUES
('Nhẫn Kim Cương Vàng Trắng', 'nhan-kim-cuong-vang-trang', 'Nhẫn kim cương vàng trắng 14K cao cấp', 15000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 3, 50, TRUE, 'thanh-lich', 'nhan'),
('Nhẫn Vàng 18K Đính Đá', 'nhan-vang-18k-dinh-da', 'Nhẫn vàng 18K đính đá quý', 8500000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 3, 40, FALSE, 'quyen-ru', 'nhan'),
('Nhẫn Bạc 925 Đính Zircon', 'nhan-bac-925-dinh-zircon', 'Nhẫn bạc 925 đính đá Zircon', 2500000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 3, 100, FALSE, 'ngot-ngao', 'nhan'),
('Nhẫn Vàng Hồng 14K', 'nhan-vang-hong-14k', 'Nhẫn vàng hồng 14K thiết kế hiện đại', 6800000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 3, 60, FALSE, 'hien-dai', 'nhan'),
('Nhẫn Nam Vàng Trắng', 'nhan-nam-vang-trang', 'Nhẫn nam vàng trắng 18K mạnh mẽ', 9200000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 3, 35, FALSE, 'doi-cac', 'nhan-nam'),
('Nhẫn Đôi Tình Yêu', 'nhan-doi-tinh-yeu', 'Nhẫn đôi tình yêu vàng 18K', 14500000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 3, 25, TRUE, 'thanh-lich', 'nhan'),
('Nhẫn Ngọc Trai Akoya', 'nhan-ngoc-trai-akoya', 'Nhẫn đính ngọc trai Akoya cao cấp', 7800000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 3, 45, FALSE, 'cathedral', 'nhan-nu'),
('Nhẫn Emerald Xanh Lục', 'nhan-emerald-xanh-luc', 'Nhẫn đính đá Emerald xanh lục quý hiếm', 18900000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 3, 15, TRUE, 'halo', 'nhan'),
('Nhẫn Sapphire Xanh Dương', 'nhan-sapphire-xanh-duong', 'Nhẫn đính đá Sapphire xanh dương', 16500000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 3, 20, TRUE, 'eternity', 'nhan'),
('Nhẫn Ruby Đỏ Rực', 'nhan-ruby-do-ruc', 'Nhẫn đính đá Ruby đỏ rực rỡ', 19800000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 3, 18, TRUE, 'royal', 'nhan');

-- NHẪN CƯỚI (10 sản phẩm) - category_id = 2
INSERT INTO products (name, slug, description, price, image, category_id, stock, is_featured, style, product_type, ring_type, material, color, collection) VALUES
('Nhẫn Cưới Platinum Đôi', 'nhan-cuoi-platinum-doi', 'Nhẫn cưới platinum đính kim cương cho đôi', 24000000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 2, 30, TRUE, 'hien-dai', 'nhan-cuoi', 'nhan-cuoi-cap', 'platinum', 'platinum', 'shape-of-love'),
('Nhẫn Cưới Vàng Trắng Classic', 'nhan-cuoi-vang-trang-classic', 'Nhẫn cưới vàng trắng 18K kiểu cổ điển', 18000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 2, 40, TRUE, 'truyen-thong', 'nhan-cuoi', 'nhan-cuoi-cap', '18k', 'vang-trang', 'shape-of-love'),
('Nhẫn Cưới Vàng Hồng Romantic', 'nhan-cuoi-vang-hong-romantic', 'Nhẫn cưới vàng hồng 14K lãng mạn', 15500000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 2, 35, TRUE, 'hien-dai', 'nhan-cuoi', 'nhan-cuoi-cap', '14k', 'vang-hong', 'vang-son'),
('Nhẫn Cưới Eternity Band', 'nhan-cuoi-eternity-band', 'Nhẫn cưới Eternity Band kim cương', 32000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 2, 20, TRUE, 'eternity', 'nhan-cuoi', 'nhan-cuoi-cap', '18k', 'vang-trang', 'sweet-sour'),
('Nhẫn Cưới Nam Vàng Trắng', 'nhan-cuoi-nam-vang-trang', 'Nhẫn cưới nam vàng trắng 18K mạnh mẽ', 21000000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 2, 25, TRUE, 'hien-dai', 'nhan-cuoi', 'nhan-cuoi-nam', '18k', 'vang-trang', 'our-story'),
('Nhẫn Cưới Nam Vàng Vàng Classic', 'nhan-cuoi-nam-vang-vang-classic', 'Nhẫn cưới nam vàng 18K phong cách cổ điển', 19500000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 2, 28, FALSE, 'truyen-thong', 'nhan-cuoi', 'nhan-cuoi-nam', '18k', 'vang-vang', 'our-story'),
('Nhẫn Cưới Nam Platinum Minimalist', 'nhan-cuoi-nam-platinum-minimalist', 'Nhẫn cưới nam Platinum tối giản hiện đại', 28000000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 2, 22, FALSE, 'hien-dai', 'nhan-cuoi', 'nhan-cuoi-nam', 'platinum', 'platinum', 'flower-of-joy'),
('Nhẫn Cưới Nữ Vàng Hồng Tinh Tế', 'nhan-cuoi-nu-vang-hong-tinh-te', 'Nhẫn cưới nữ vàng hồng 14K tinh tế', 16800000, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', 2, 32, FALSE, 'hien-dai', 'nhan-cuoi', 'nhan-cuoi-nu', '14k', 'vang-hong', 'vang-son'),
('Nhẫn Cưới Nữ Kim Cương Eternity', 'nhan-cuoi-nu-kim-cuong-eternity', 'Nhẫn cưới nữ kim cương Eternity sang trọng', 35000000, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', 2, 18, TRUE, 'eternity', 'nhan-cuoi', 'nhan-cuoi-nu', '18k', 'vang-trang', 'flower-of-joy'),
('Nhẫn Cưới Nữ Vàng Trắng Engraved', 'nhan-cuoi-nu-vang-trang-engraved', 'Nhẫn cưới nữ vàng trắng khắc tên cá nhân hóa', 14800000, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', 2, 38, FALSE, 'truyen-thong', 'nhan-cuoi', 'nhan-cuoi-nu', '14k', 'vang-trang', 'sweet-sour');

-- DÂY CHUYỀN (10 sản phẩm) - category_id = 4
INSERT INTO products (name, slug, description, price, image, category_id, stock, is_featured, style, product_type) VALUES
('Dây Chuyền Vàng 18K Ngọc Trai', 'day-chuyen-vang-18k-ngoc-trai', 'Dây chuyền vàng 18K đính ngọc trai Akoya', 12750000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 40, TRUE, 'thanh-lich', 'day-chuyen'),
('Dây Chuyền Bạc 925 Thiết Kế', 'day-chuyen-bac-925-thiet-ke', 'Dây chuyền bạc 925 thiết kế tinh xảo', 2500000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 80, FALSE, 'hien-dai', 'day-chuyen'),
('Dây Chuyền Kim Cương Tự Nhiên', 'day-chuyen-kim-cuong-tu-nhien', 'Dây chuyền kim cương tự nhiên cao cấp', 28500000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 20, TRUE, 'kim-cuong', 'mat-day-kim-cuong'),
('Dây Chuyền Vàng Hồng Trái Tim', 'day-chuyen-vang-hong-trai-tim', 'Dây chuyền vàng hồng mặt trái tim', 8900000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 50, FALSE, 'ngot-ngao', 'day-chuyen'),
('Dây Chuyền Platinum Đính Đá', 'day-chuyen-platinum-dinh-da', 'Dây chuyền Platinum đính đá quý', 15600000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 30, TRUE, 'quyen-ru', 'day-chuyen'),
('Dây Chuyền Bạc Đính Zircon', 'day-chuyen-bac-dinh-zircon', 'Dây chuyền bạc đính đá Zircon lấp lánh', 3200000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 70, FALSE, 'hien-dai', 'day-chuyen'),
('Dây Chuyền Vàng Trắng Hoa', 'day-chuyen-vang-trang-hoa', 'Dây chuyền vàng trắng mặt hoa tinh tế', 11400000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 35, FALSE, 'thanh-lich', 'mat-day-chuyen'),
('Dây Chuyền Sapphire Xanh', 'day-chuyen-sapphire-xanh', 'Dây chuyền đính đá Sapphire xanh', 22800000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 25, TRUE, 'eternity', 'day-chuyen'),
('Dây Chuyền Vàng 24K Rồng', 'day-chuyen-vang-24k-rong', 'Dây chuyền vàng 24K hình rồng phong thủy', 18700000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 40, FALSE, 'truyen-thong', 'day-chuyen'),
('Dây Chuyền Ruby Đỏ Sang Trọng', 'day-chuyen-ruby-do-sang-trong', 'Dây chuyền đính đá Ruby đỏ sang trọng', 26500000, 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg', 4, 18, TRUE, 'royal', 'day-chuyen');

-- BÔNG TAI (10 sản phẩm) - category_id = 5
INSERT INTO products (name, slug, description, price, image, category_id, stock, is_featured, style, product_type) VALUES
('Bông Tai Ngọc Trai Thiên Nhiên', 'bong-tai-ngoc-trai-thien-nhien', 'Bông tai ngọc trai thiên nhiên cao cấp', 3500000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 60, TRUE, 'thanh-lich', 'bong-tai'),
('Bông Tai Kim Cương Tròn', 'bong-tai-kim-cuong-tron', 'Bông tai kim cương tròn lấp lánh', 18500000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 30, TRUE, 'kim-cuong', 'bong-tai-kim-cuong'),
('Bông Tai Vàng 18K Hoa Hồng', 'bong-tai-vang-18k-hoa-hong', 'Bông tai vàng 18K hình hoa hồng', 7800000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 3, 45, FALSE, 'ngot-ngao', 'bong-tai'),
('Bông Tai Bạc 925 Dài', 'bong-tai-bac-925-dai', 'Bông tai bạc 925 dáng dài thanh lịch', 2200000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 3, 90, FALSE, 'thanh-lich', 'bong-tai'),
('Bông Tai Emerald Xanh Lục', 'bong-tai-emerald-xanh-luc', 'Bông tai đính đá Emerald xanh lục', 15600000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 3, 25, TRUE, 'quyen-ru', 'bong-tai'),
('Bông Tai Vàng Hồng Giọt Nước', 'bong-tai-vang-hong-giot-nuoc', 'Bông tai vàng hồng hình giọt nước', 9400000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 3, 40, FALSE, 'hien-dai', 'bong-tai'),
('Bông Tai Platinum Đính Đá', 'bong-tai-platinum-dinh-da', 'Bông tai Platinum đính đá quý', 12800000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 3, 35, TRUE, 'royal', 'bong-tai'),
('Bông Tai Sapphire Xanh Dương', 'bong-tai-sapphire-xanh-duong', 'Bông tai đính đá Sapphire xanh dương', 19200000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 3, 22, TRUE, 'eternity', 'bong-tai'),
('Bông Tai Vàng Trắng Bướm', 'bong-tai-vang-trang-buom', 'Bông tai vàng trắng hình bướm xinh xắn', 8600000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 3, 50, FALSE, 'hien-dai', 'bong-tai'),
('Bông Tai Ruby Đỏ Rực', 'bong-tai-ruby-do-ruc', 'Bông tai đính đá Ruby đỏ rực rỡ', 21500000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 3, 20, TRUE, 'doi-cac', 'bong-tai');

-- VÒNG TAY (10 sản phẩm)
INSERT INTO products (name, slug, description, price, image, category_id, stock, is_featured, style, product_type) VALUES
('Vòng Tay Vàng Hồng 14K', 'vong-tay-vang-hong-14k', 'Vòng tay vàng hồng 14K sang trọng', 8500000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 50, TRUE, 'thanh-lich', 'vong-tay'),
('Vòng Tay Bạc 925 Charm', 'vong-tay-bac-925-charm', 'Vòng tay bạc 925 với charm đáng yêu', 2800000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 80, FALSE, 'ngot-ngao', 'vong-tay'),
('Vòng Tay Kim Cương Tennis', 'vong-tay-kim-cuong-tennis', 'Vòng tay kim cương Tennis cao cấp', 45000000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 15, TRUE, 'kim-cuong', 'vong-tay-kim-cuong'),
('Vòng Tay Vàng 18K Đính Đá', 'vong-tay-vang-18k-dinh-da', 'Vòng tay vàng 18K đính đá quý', 12600000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 35, FALSE, 'quyen-ru', 'vong-tay'),
('Vòng Tay Ngọc Trai Akoya', 'vong-tay-ngoc-trai-akoya', 'Vòng tay ngọc trai Akoya tự nhiên', 9800000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 40, TRUE, 'thanh-lich', 'vong-tay'),
('Vòng Tay Platinum Sang Trọng', 'vong-tay-platinum-sang-trong', 'Vòng tay Platinum sang trọng đẳng cấp', 18900000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 25, TRUE, 'royal', 'vong-tay'),
('Vòng Tay Vàng Trắng Lắc Tay', 'vong-tay-vang-trang-lac-tay', 'Vòng tay vàng trắng kiểu lắc tay', 7400000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 45, FALSE, 'hien-dai', 'vong-tay'),
('Vòng Tay Emerald Xanh Lục', 'vong-tay-emerald-xanh-luc', 'Vòng tay đính đá Emerald xanh lục', 22500000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 20, TRUE, 'eternity', 'vong-tay'),
('Vòng Tay Bạc Đính Zircon', 'vong-tay-bac-dinh-zircon', 'Vòng tay bạc đính đá Zircon lấp lánh', 3600000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 70, FALSE, 'hien-dai', 'vong-tay'),
('Vòng Tay Ruby Đỏ Quý Phái', 'vong-tay-ruby-do-quy-phai', 'Vòng tay đính đá Ruby đỏ quý phái', 28700000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 4, 18, TRUE, 'doi-cac', 'vong-tay');

-- LẮC CHÂN (10 sản phẩm)
INSERT INTO products (name, slug, description, price, image, category_id, stock, is_featured, style, product_type) VALUES
('Lắc Chân Bạc 925 Đơn Giản', 'lac-chan-bac-925-don-gian', 'Lắc chân bạc 925 phong cách trẻ trung', 1800000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 100, FALSE, 'hien-dai', 'lac-chan'),
('Lắc Chân Vàng 14K Charm', 'lac-chan-vang-14k-charm', 'Lắc chân vàng 14K với charm xinh xắn', 4500000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 60, TRUE, 'ngot-ngao', 'lac-chan'),
('Lắc Chân Bạc Đính Đá', 'lac-chan-bac-dinh-da', 'Lắc chân bạc đính đá Zircon lấp lánh', 2600000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 80, FALSE, 'thanh-lich', 'lac-chan'),
('Lắc Chân Vàng Hồng Tinh Tế', 'lac-chan-vang-hong-tinh-te', 'Lắc chân vàng hồng thiết kế tinh tế', 5800000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 50, TRUE, 'thanh-lich', 'lac-chan'),
('Lắc Chân Bạc Chuông Nhỏ', 'lac-chan-bac-chuong-nho', 'Lắc chân bạc với chuông nhỏ đáng yêu', 2200000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 90, FALSE, 'ngot-ngao', 'lac-chan'),
('Lắc Chân Vàng Trắng Sang Trọng', 'lac-chan-vang-trang-sang-trong', 'Lắc chân vàng trắng sang trọng', 6900000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 40, TRUE, 'royal', 'lac-chan'),
('Lắc Chân Bạc Hình Trái Tim', 'lac-chan-bac-hinh-trai-tim', 'Lắc chân bạc với charm trái tim', 2800000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 75, FALSE, 'ngot-ngao', 'lac-chan'),
('Lắc Chân Vàng 18K Đính Ngọc Trai', 'lac-chan-vang-18k-dinh-ngoc-trai', 'Lắc chân vàng 18K đính ngọc trai', 8500000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 35, TRUE, 'quyen-ru', 'lac-chan'),
('Lắc Chân Bạc Đa Tầng', 'lac-chan-bac-da-tang', 'Lắc chân bạc thiết kế đa tầng hiện đại', 3200000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 65, FALSE, 'hien-dai', 'lac-chan'),
('Lắc Chân Vàng Hoa Văn Cổ Điển', 'lac-chan-vang-hoa-van-co-dien', 'Lắc chân vàng hoa văn cổ điển tinh xảo', 7200000, 'https://cdn.pnj.io/images/detailed/292/on-gv0000w001018-vong-tay-vang-trang-416-10k-pnj-2.jpg', 5, 30, TRUE, 'truyen-thong', 'lac-chan');


-- ============================================
-- BẢNG USERS (Người dùng)
-- ============================================
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- BẢNG ORDERS (Đơn hàng)
-- ============================================
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(20) NOT NULL,
    shipping_address TEXT NOT NULL,
    city VARCHAR(100),
    district VARCHAR(100),
    ward VARCHAR(100),
    total_amount DECIMAL(15,2) NOT NULL,
    status ENUM('pending', 'confirmed', 'shipping', 'delivered', 'cancelled') DEFAULT 'pending',
    payment_method VARCHAR(50) DEFAULT 'cod',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- BẢNG ORDER_ITEMS (Chi tiết đơn hàng)
-- ============================================
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_image VARCHAR(500),
    price DECIMAL(15,2) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    subtotal DECIMAL(15,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- BẢNG ADDRESSES (Địa chỉ giao hàng)
-- ============================================
CREATE TABLE IF NOT EXISTS addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    ward VARCHAR(100),
    district VARCHAR(100),
    city VARCHAR(100),
    is_default TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- THÊM DANH MỤC TRANG SỨC CAO CẤP
-- ============================================
INSERT INTO categories (name, slug, description) VALUES
('Trang Sức Cao Cấp', 'trang-suc-cao-cap', 'Bộ sưu tập trang sức cao cấp độc quyền, thiết kế riêng biệt')
ON DUPLICATE KEY UPDATE name=name;

-- Lấy ID của danh mục Trang Sức Cao Cấp
SET @luxury_category_id = (SELECT id FROM categories WHERE slug = 'trang-suc-cao-cap');

-- ============================================
-- SẢN PHẨM TRANG SỨC CAO CẤP (15 sản phẩm)
-- ============================================
INSERT INTO products (name, slug, description, price, sale_price, image, category_id, stock, is_featured, style, product_type, collection) VALUES
-- Bộ sưu tập Heritage (Di sản)
('Vương Miện Nữ Hoàng Heritage', 'vuong-mien-nu-hoang-heritage', 'Vương miện kim cương thiết kế độc quyền, lấy cảm hứng từ hoàng gia châu Âu', 850000000, NULL, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', @luxury_category_id, 1, TRUE, 'royal-heritage', 'trang-suc-cao-cap', 'heritage'),
('Bộ Trang Sức Empress Sapphire', 'bo-trang-suc-empress-sapphire', 'Bộ trang sức hoàn chỉnh với sapphire xanh Kashmir hiếm có', 650000000, NULL, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', @luxury_category_id, 2, TRUE, 'imperial-elegance', 'trang-suc-cao-cap', 'heritage'),
('Dây Chuyền Rồng Phượng Hoàng Kim', 'day-chuyen-rong-phuong-hoang-kim', 'Dây chuyền vàng 24K chạm khắc rồng phượng thủ công tinh xảo', 420000000, NULL, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', @luxury_category_id, 3, TRUE, 'oriental-masterpiece', 'trang-suc-cao-cap', 'heritage'),

-- Bộ sưu tập Celestial (Thiên thể)
('Vòng Cổ Thiên Hà Diamond Cascade', 'vong-co-thien-ha-diamond-cascade', 'Vòng cổ kim cương xếp tầng như dải ngân hà, 500 viên kim cương', 780000000, NULL, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', @luxury_category_id, 2, TRUE, 'celestial-wonder', 'trang-suc-cao-cap', 'celestial'),
('Nhẫn Sao Băng Platinum Elite', 'nhan-sao-bang-platinum-elite', 'Nhẫn platinum đính kim cương 5 carat thiết kế sao băng', 520000000, NULL, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', @luxury_category_id, 3, TRUE, 'stellar-brilliance', 'trang-suc-cao-cap', 'celestial'),
('Bông Tai Ánh Trăng Moonstone Royale', 'bong-tai-anh-trang-moonstone-royale', 'Bông tai đá mặt trăng hiếm kết hợp kim cương trắng', 380000000, NULL, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', @luxury_category_id, 4, TRUE, 'lunar-elegance', 'trang-suc-cao-cap', 'celestial'),

-- Bộ sưu tập Artisan (Nghệ nhân)
('Vòng Tay Nghệ Thuật Sculptural Gold', 'vong-tay-nghe-thuat-sculptural-gold', 'Vòng tay vàng 22K điêu khắc thủ công bởi nghệ nhân đẳng cấp', 290000000, NULL, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', @luxury_category_id, 5, TRUE, 'artisan-craft', 'trang-suc-cao-cap', 'artisan'),
('Trâm Cài Phượng Hoàng Ruby Fire', 'tram-cai-phuong-hoang-ruby-fire', 'Trâm cài ruby đỏ Miến Điện hình phượng hoàng, thiết kế độc bản', 560000000, NULL, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', @luxury_category_id, 1, TRUE, 'phoenix-majesty', 'trang-suc-cao-cap', 'artisan'),
('Lắc Tay Hoa Sen Lotus Emerald', 'lac-tay-hoa-sen-lotus-emerald', 'Lắc tay emerald Colombia hình hoa sen, biểu tượng thanh cao', 470000000, NULL, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', @luxury_category_id, 3, TRUE, 'lotus-serenity', 'trang-suc-cao-cap', 'artisan'),

-- Bộ sưu tập Timeless (Vượt thời gian)
('Nhẫn Đính Hôn Eternal Promise', 'nhan-dinh-hon-eternal-promise', 'Nhẫn đính hôn kim cương 3 carat thiết kế vĩnh cửu, chứng nhận GIA', 680000000, NULL, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', @luxury_category_id, 4, TRUE, 'eternal-love', 'trang-suc-cao-cap', 'timeless'),
('Dây Chuyền Ngọc Trai Nam Dương Baroque', 'day-chuyen-ngoc-trai-nam-duong-baroque', 'Dây chuyền ngọc trai Nam Dương baroque size 18mm cực hiếm', 320000000, NULL, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', @luxury_category_id, 2, TRUE, 'baroque-pearl', 'trang-suc-cao-cap', 'timeless'),
('Bộ Trang Sức Cưới Imperial Wedding', 'bo-trang-suc-cuoi-imperial-wedding', 'Bộ trang sức cưới hoàn chỉnh: vương miện, vòng cổ, bông tai, nhẫn', 950000000, NULL, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', @luxury_category_id, 1, TRUE, 'bridal-majesty', 'trang-suc-cao-cap', 'timeless'),

-- Bộ sưu tập Modern Luxury (Xa xỉ hiện đại)
('Vòng Cổ Kiến Trúc Geometric Platinum', 'vong-co-kien-truc-geometric-platinum', 'Vòng cổ platinum thiết kế kiến trúc hiện đại với kim cương đen', 540000000, NULL, 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg', @luxury_category_id, 3, TRUE, 'modern-architecture', 'trang-suc-cao-cap', 'modern-luxury'),
('Nhẫn Cocktail Tanzanite Mystique', 'nhan-cocktail-tanzanite-mystique', 'Nhẫn cocktail đá tanzanite 15 carat cực hiếm từ Tanzania', 620000000, NULL, 'https://cdn.pnj.io/images/detailed/121/gnxmxmw002482-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-04.jpg', @luxury_category_id, 2, TRUE, 'mystical-elegance', 'trang-suc-cao-cap', 'modern-luxury'),
('Bông Tai Chandelier Diamond Waterfall', 'bong-tai-chandelier-diamond-waterfall', 'Bông tai chandelier kim cương như thác nước lấp lánh', 720000000, NULL, 'https://cdn.pnj.io/images/detailed/283/on-snxm00w060050-nhan-nam-bac-dinh-da-pnjsilver-2.jpg', @luxury_category_id, 2, TRUE, 'waterfall-glamour', 'trang-suc-cao-cap', 'modern-luxury')
ON DUPLICATE KEY UPDATE name=name;
