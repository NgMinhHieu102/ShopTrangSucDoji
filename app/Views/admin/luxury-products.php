<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm - Admin DOJI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f6fa; }
        
        .sidebar {
            position: fixed; left: 0; top: 0; width: 260px; height: 100vh;
            background: #1a1a1a; color: white; padding: 20px 0; z-index: 1000;
        }
        .sidebar-header { padding: 0 20px 20px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 20px; }
        .sidebar-header h2 { font-size: 24px; margin-bottom: 5px; }
        .sidebar-header p { font-size: 13px; opacity: 0.8; }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li { margin-bottom: 5px; }
        .sidebar-menu a {
            display: flex; align-items: center; gap: 12px; padding: 12px 20px;
            color: white; text-decoration: none; transition: all 0.3s;
        }
        .sidebar-menu a:hover, .sidebar-menu a.active { background: #333; border-left: 4px solid #c9a84c; }
        .sidebar-menu i { width: 20px; text-align: center; }
        
        .main-content { margin-left: 260px; padding: 30px; }
        .header {
            background: white; padding: 20px 30px; border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .header h1 { font-size: 28px; color: #333; }
        .header-right { display: flex; align-items: center; gap: 20px; }
        .user-info { display: flex; align-items: center; gap: 12px; }
        .user-avatar {
            width: 40px; height: 40px; border-radius: 50%; background: #1a1a1a;
            display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;
        }
        .btn-logout {
            padding: 8px 16px; background: #f44336; color: white; border: none;
            border-radius: 8px; cursor: pointer; font-size: 14px; transition: all 0.3s;
        }
        .btn-logout:hover { background: #d32f2f; }
        
        .action-bar {
            background: white; padding: 20px; border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 20px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .btn-add {
            padding: 12px 24px; background: #4caf50; color: white; border: none;
            border-radius: 8px; cursor: pointer; font-size: 14px; font-weight: 600;
        }
        .btn-add:hover { background: #45a049; }
        .search-box {
            display: flex; gap: 10px;
        }
        .search-box input {
            padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px;
            font-size: 14px; width: 300px;
        }
        
        .table-card {
            background: white; padding: 25px; border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        table { width: 100%; border-collapse: collapse; }
        thead { background: #f9f9f9; }
        th {
            padding: 12px; text-align: left; font-size: 13px; font-weight: 600;
            color: #666; text-transform: uppercase;
        }
        td { padding: 15px 12px; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
        tbody tr:hover { background: #f9f9f9; }
        
        .product-img { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
        .btn-action {
            padding: 6px 12px; border: 1px solid #ddd; background: white;
            border-radius: 6px; cursor: pointer; font-size: 12px; margin-right: 5px;
        }
        .btn-action:hover { background: #f5f5f5; }
        .btn-action.edit { color: #2196f3; border-color: #2196f3; }
        .btn-action.delete { color: #f44336; border-color: #f44336; }
        
        /* Modal */
        .modal {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); z-index: 2000; align-items: center; justify-content: center;
        }
        .modal.active { display: flex; }
        .modal-content {
            background: white; border-radius: 15px; width: 600px; max-width: 90%;
            max-height: 90vh; overflow-y: auto;
        }
        .modal-header {
            padding: 20px 25px; border-bottom: 1px solid #f0f0f0;
            display: flex; justify-content: space-between; align-items: center;
        }
        .modal-header h2 { font-size: 20px; }
        .modal-close {
            background: none; border: none; font-size: 24px; cursor: pointer; color: #999;
        }
        .modal-body { padding: 25px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%; padding: 10px 15px; border: 1px solid #ddd;
            border-radius: 8px; font-size: 14px;
        }
        .form-group textarea { min-height: 100px; resize: vertical; }
        .modal-footer {
            padding: 20px 25px; border-top: 1px solid #f0f0f0;
            display: flex; justify-content: flex-end; gap: 10px;
        }
        .btn-cancel {
            padding: 10px 20px; background: #f5f5f5; border: none;
            border-radius: 8px; cursor: pointer; font-size: 14px;
        }
        .btn-save {
            padding: 10px 20px; background: #4caf50; color: white; border: none;
            border-radius: 8px; cursor: pointer; font-size: 14px; font-weight: 600;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>DOJI Admin</h2>
            <p>Jewelry Management</p>
        </div>
        <ul class="sidebar-menu">
            <li><a href="/admin"><i class="fas fa-chart-line"></i> Dashboard</a></li>
            <li><a href="/admin?action=orders"><i class="fas fa-shopping-bag"></i> Đơn hàng</a></li>
            <li><a href="/admin?action=products"><i class="fas fa-gem"></i> Sản phẩm</a></li>
            <li><a href="/admin?action=luxury-products" class="active"><i class="fas fa-crown"></i> SP Cao cấp</a></li>
            <li><a href="/admin?action=customers"><i class="fas fa-users"></i> Khách hàng</a></li>
            <li><a href="/admin?action=reports"><i class="fas fa-file-alt"></i> Báo cáo</a></li>
            <li><a href="/admin?action=settings"><i class="fas fa-cog"></i> Cài đặt</a></li>
        </ul>
    </aside>
    
    <main class="main-content">
        <div class="header">
            <h1>Quản lý sản phẩm cao cấp</h1>
            <div class="header-right">
                <div class="user-info">
                    <div class="user-avatar">A</div>
                    <div>
                        <div style="font-weight: 600; font-size: 14px;">Administrator</div>
                        <div style="font-size: 12px; color: #999;">Admin</div>
                    </div>
                </div>
                <button class="btn-logout" onclick="window.location.href='/admin?action=logout'">
                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                </button>
            </div>
        </div>
        
        <div class="action-bar">
            <button class="btn-add" onclick="openModal()">
                <i class="fas fa-plus"></i> Thêm sản phẩm mới
            </button>
            <div class="search-box">
                <input type="text" placeholder="Tìm kiếm sản phẩm..." id="searchInput">
                <button class="btn-add" style="background: #1a1a1a;" onclick="searchProducts()">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Tồn kho</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><strong>#<?= $product['id'] ?></strong></td>
                        <td><img src="<?= htmlspecialchars($product['image']) ?>" class="product-img" alt=""></td>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['category']) ?></td>
                        <td style="font-weight: 600; color: #4caf50;"><?= number_format($product['price'], 0, ',', '.') ?>đ</td>
                        <td><?= $product['stock'] ?? 'N/A' ?></td>
                        <td>
                            <button class="btn-action edit" onclick="editProduct(<?= $product['id'] ?>)">
                                <i class="fas fa-edit"></i> Sửa
                            </button>
                            <button class="btn-action delete" onclick="deleteProduct(<?= $product['id'] ?>)">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <!-- Modal Add/Edit Product -->
    <div class="modal" id="productModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Thêm sản phẩm mới</h2>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <form id="productForm" onsubmit="saveProduct(event)">
                <div class="modal-body">
                    <input type="hidden" id="productId">
                    <div class="form-group">
                        <label>Tên sản phẩm *</label>
                        <input type="text" id="productName" required>
                    </div>
                    <div class="form-group">
                        <label>Danh mục *</label>
                        <select id="productCategory" required>
                            <option value="">Chọn danh mục</option>
                            <option value="nhan-cau-hon">Nhẫn cầu hôn</option>
                            <option value="nhan-cuoi">Nhẫn cưới</option>
                            <option value="kim-cuong">Kim cương</option>
                            <option value="trang-suc">Trang sức</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá (VNĐ) *</label>
                        <input type="number" id="productPrice" required>
                    </div>
                    <div class="form-group">
                        <label>URL Hình ảnh *</label>
                        <input type="text" id="productImage" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea id="productDescription"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Hủy</button>
                    <button type="submit" class="btn-save">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function openModal(id = null) {
            document.getElementById('productModal').classList.add('active');
            if (id) {
                document.getElementById('modalTitle').textContent = 'Chỉnh sửa sản phẩm';
                // Load product data
            } else {
                document.getElementById('modalTitle').textContent = 'Thêm sản phẩm mới';
                document.getElementById('productForm').reset();
            }
        }
        
        function closeModal() {
            document.getElementById('productModal').classList.remove('active');
        }
        
        function saveProduct(e) {
            e.preventDefault();
            alert('Chức năng đang phát triển - Sẽ lưu vào database');
            closeModal();
        }
        
        function editProduct(id) {
            openModal(id);
        }
        
        function deleteProduct(id) {
            if (confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
                alert('Chức năng đang phát triển - Sẽ xóa khỏi database');
            }
        }
        
        function searchProducts() {
            const keyword = document.getElementById('searchInput').value;
            alert('Tìm kiếm: ' + keyword);
        }
    </script>
</body>
</html>
