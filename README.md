# Tierra Jewelry Shop

Website bán trang sức cao cấp - Tierra

## Tính năng

- 🛍️ Danh mục sản phẩm: Nhẫn cầu hôn, Nhẫn cưới, Kim cương, Trang sức cao cấp
- 🔍 Tìm kiếm và lọc sản phẩm
- 🛒 Giỏ hàng và thanh toán
- ❤️ Danh sách yêu thích
- 👤 Đăng ký/Đăng nhập
- 📦 Quản lý đơn hàng
- 📍 Quản lý địa chỉ giao hàng
- 📰 Tin tức và blog

## Công nghệ

- **Backend**: PHP (Native)
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Design**: Responsive, Mobile-friendly

## Cài đặt

### Yêu cầu
- PHP 7.4+
- MySQL 5.7+
- Web server (Apache/Nginx) hoặc PHP built-in server

### Các bước cài đặt

1. Clone repository:
```bash
git clone https://github.com/nguyenminhhieu06878-stack/webtrangsuc.git
cd webtrangsuc
```

2. Import database:
```bash
mysql -u root -p < database/jewelry_shop.sql
```

3. Cấu hình database:
- Copy `config/database.php.example` thành `config/database.php`
- Cập nhật thông tin kết nối database

4. Chạy server:
```bash
cd public
php -S localhost:8000
```

5. Truy cập: `http://localhost:8000`

## Cấu trúc thư mục

```
jewelry-shop/
├── app/
│   ├── Controllers/    # Controllers
│   ├── Models/         # Models
│   └── Views/          # Views (HTML/PHP)
├── config/             # Configuration files
├── database/           # SQL files
├── public/             # Public files
│   ├── css/           # Stylesheets
│   ├── js/            # JavaScript files
│   ├── images/        # Images
│   └── index.php      # Entry point
└── routes/            # Routes
```

## Tác giả

Nguyễn Minh Hiếu

## License

MIT License
