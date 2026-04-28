<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}

require_once BASE_PATH . '/config/database.php';
$db = new Database();
$conn = $db->getConnection();

// Lấy danh sách địa chỉ
$stmt = $conn->prepare("SELECT * FROM addresses WHERE user_id = :user_id ORDER BY is_default DESC, created_at DESC");
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->execute();
$addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Địa chỉ của tôi - Tierra</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/css/auth-dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .account-page { padding: 60px 0; min-height: 60vh; background: #f9f9f9; }
        .account-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .account-grid { display: grid; grid-template-columns: 280px 1fr; gap: 30px; }
        .account-sidebar { background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .account-user { display: flex; align-items: center; gap: 16px; padding-bottom: 20px; border-bottom: 1px solid #eee; margin-bottom: 20px; }
        .account-avatar { width: 60px; height: 60px; min-width: 60px; border-radius: 50%; background: linear-gradient(135deg, #c9a84c, #a88a3d); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 24px; font-weight: 600; flex-shrink: 0; }
        .account-user-info h3 { font-size: 16px; font-weight: 600; margin-bottom: 4px; }
        .account-user-info p { font-size: 13px; color: #666; word-break: break-all; overflow-wrap: break-word; }
        .account-menu { list-style: none; padding: 0; margin: 0; }
        .account-menu li { margin-bottom: 4px; }
        .account-menu a { display: flex; align-items: center; gap: 12px; padding: 12px 16px; color: #666; text-decoration: none; border-radius: 8px; transition: all 0.2s; }
        .account-menu a:hover { background: #f9f9f9; color: #333; }
        .account-menu a.active { background: #c9a84c; color: #fff; }
        .account-menu i { width: 20px; text-align: center; }
        .account-content { background: #fff; border-radius: 12px; padding: 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .account-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; }
        .account-title { font-size: 24px; font-weight: 600; }
        .btn-add { padding: 12px 24px; background: #c9a84c; color: #fff; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; }
        .btn-add:hover { background: #a88a3d; }
        
        .addresses-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .address-card { border: 2px solid #e0e0e0; border-radius: 12px; padding: 20px; position: relative; transition: all 0.3s; }
        .address-card:hover { border-color: #c9a84c; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .address-card.default { border-color: #c9a84c; background: #fffbf0; }
        .address-badge { position: absolute; top: 16px; right: 16px; padding: 4px 12px; background: #c9a84c; color: #fff; border-radius: 12px; font-size: 11px; font-weight: 600; }
        .address-name { font-size: 16px; font-weight: 600; margin-bottom: 8px; }
        .address-phone { font-size: 14px; color: #666; margin-bottom: 12px; }
        .address-text { font-size: 14px; color: #333; line-height: 1.6; margin-bottom: 16px; }
        .address-actions { display: flex; gap: 8px; }
        .btn-action { padding: 8px 16px; border: 1px solid #ddd; background: #fff; border-radius: 6px; font-size: 13px; cursor: pointer; }
        .btn-action:hover { background: #f9f9f9; }
        .btn-action.primary { background: #c9a84c; color: #fff; border-color: #c9a84c; }
        
        .empty-state { text-align: center; padding: 60px 20px; }
        .empty-state i { font-size: 64px; color: #ddd; margin-bottom: 20px; }
        
        /* Modal */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; }
        .modal.active { display: flex; }
        .modal-content { background: #fff; border-radius: 16px; padding: 32px; max-width: 500px; width: 90%; max-height: 90vh; overflow-y: auto; }
        .modal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
        .modal-title { font-size: 20px; font-weight: 600; }
        .modal-close { background: none; border: none; font-size: 24px; cursor: pointer; color: #999; }
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; font-size: 14px; font-weight: 500; margin-bottom: 8px; }
        .form-group input, .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; }
        .form-group textarea { resize: vertical; min-height: 80px; }
        .form-checkbox { display: flex; align-items: center; gap: 8px; }
        .btn-submit { width: 100%; padding: 14px; background: #c9a84c; color: #fff; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; }
        
        @media (max-width: 768px) {
            .account-grid { grid-template-columns: 1fr; }
            .addresses-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="top-banner"><p>Giảm 30% cho đơn hàng từ 3.000.000đ</p></div>
    <header class="header">
        <div class="container">
            <div class="logo"><a href="/"><img src="https://chatgpt.com/backend-api/estuary/public_content/enc/eyJpZCI6Im1fNjlmMGQ4OGM2NmQ4ODE5MTlmNDg3OWQxMTA2OWFhNDA6ZmlsZV8wMDAwMDAwMGQwZTA3MjA5OTMxZGFjNmI2YTMxMmVjOCIsInRzIjoiMjA1NzEiLCJwIjoicHlpIiwiY2lkIjoiMSIsInNpZyI6ImU2Mjc0NTY3YjBiYjQyNzMxNjM1M2M0MTEwY2JiMzA0ZTk1OTExNjFiYjk3NmJhYmUzOTc5NTQwYmQ3YjhiM2QiLCJ2IjoiMCIsImdpem1vX2lkIjpudWxsLCJjcyI6bnVsbCwiY2RuIjpudWxsLCJjcCI6bnVsbCwibWEiOm51bGx9" alt="Tierra"></a></div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="/products?category=nhan-cau-hon">Nhẫn cầu hôn</a></li>
                    <li><a href="/products?category=nhan-cuoi">Nhẫn cưới</a></li>
                    <li><a href="/products?category=kim-cuong">Kim Cương</a></li>
                    <li><a href="/products?category=trang-suc-cao-cap">Trang sức cao cấp</a></li>
                    <li><a href="/products?category=trang-suc">Trang sức</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <a href="/account" class="header-link">Tài khoản</a>
            </div>
        </div>
    </header>

    <section class="account-page">
        <div class="account-container">
            <div class="account-grid">
                <aside class="account-sidebar">
                    <div class="account-user">
                        <div class="account-avatar"><?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?></div>
                        <div class="account-user-info">
                            <h3><?= htmlspecialchars($_SESSION['user_name']) ?></h3>
                            <p><?= htmlspecialchars($_SESSION['user_email']) ?></p>
                        </div>
                    </div>
                    <ul class="account-menu">
                        <li><a href="/account"><i class="fas fa-user"></i> Thông tin tài khoản</a></li>
                        <li><a href="/orders"><i class="fas fa-shopping-bag"></i> Đơn hàng của tôi</a></li>
                        <li><a href="/wishlist"><i class="fas fa-heart"></i> Sản phẩm yêu thích</a></li>
                        <li><a href="/addresses" class="active"><i class="fas fa-map-marker-alt"></i> Địa chỉ</a></li>
                        <li><a href="/change-password"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
                        <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                    </ul>
                </aside>

                <main class="account-content">
                    <div class="account-header">
                        <h1 class="account-title">Địa chỉ của tôi</h1>
                        <button class="btn-add" onclick="openAddModal()"><i class="fas fa-plus"></i> Thêm địa chỉ</button>
                    </div>

                    <?php if (empty($addresses)): ?>
                    <div class="empty-state">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Chưa có địa chỉ nào</h3>
                        <p>Thêm địa chỉ để thanh toán nhanh hơn</p>
                    </div>
                    <?php else: ?>
                    <div class="addresses-grid">
                        <?php foreach ($addresses as $addr): ?>
                        <div class="address-card <?= $addr['is_default'] ? 'default' : '' ?>">
                            <?php if ($addr['is_default']): ?>
                            <span class="address-badge">Mặc định</span>
                            <?php endif; ?>
                            <div class="address-name"><?= htmlspecialchars($addr['full_name']) ?></div>
                            <div class="address-phone"><i class="fas fa-phone"></i> <?= htmlspecialchars($addr['phone']) ?></div>
                            <div class="address-text"><?= htmlspecialchars($addr['address']) ?>, <?= htmlspecialchars($addr['ward']) ?>, <?= htmlspecialchars($addr['district']) ?>, <?= htmlspecialchars($addr['city']) ?></div>
                            <div class="address-actions">
                                <?php if (!$addr['is_default']): ?>
                                <button class="btn-action primary" onclick="setDefault(<?= $addr['id'] ?>)">Đặt mặc định</button>
                                <?php endif; ?>
                                <button class="btn-action" onclick="editAddress(<?= $addr['id'] ?>)">Sửa</button>
                                <button class="btn-action" onclick="deleteAddress(<?= $addr['id'] ?>)">Xóa</button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </main>
            </div>
        </div>
    </section>

    <!-- Modal Add/Edit -->
    <div class="modal" id="addressModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle">Thêm địa chỉ mới</h2>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <form id="addressForm" method="POST" action="/addresses?action=save">
                <input type="hidden" name="id" id="addressId">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" name="full_name" id="fullName" required>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="tel" name="phone" id="phone" required>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <textarea name="address" id="address" required></textarea>
                </div>
                <div class="form-group">
                    <label>Phường/Xã</label>
                    <input type="text" name="ward" id="ward" required>
                </div>
                <div class="form-group">
                    <label>Quận/Huyện</label>
                    <input type="text" name="district" id="district" required>
                </div>
                <div class="form-group">
                    <label>Tỉnh/Thành phố</label>
                    <input type="text" name="city" id="city" required>
                </div>
                <div class="form-group">
                    <label class="form-checkbox">
                        <input type="checkbox" name="is_default" id="isDefault" value="1">
                        <span>Đặt làm địa chỉ mặc định</span>
                    </label>
                </div>
                <button type="submit" class="btn-submit">Lưu địa chỉ</button>
            </form>
        </div>
    </div>

    <script>
    function openAddModal() {
        document.getElementById('modalTitle').textContent = 'Thêm địa chỉ mới';
        document.getElementById('addressForm').reset();
        document.getElementById('addressId').value = '';
        document.getElementById('addressModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('addressModal').classList.remove('active');
    }

    function setDefault(id) {
        if (confirm('Đặt địa chỉ này làm mặc định?')) {
            window.location.href = '/addresses?action=set-default&id=' + id;
        }
    }

    function deleteAddress(id) {
        if (confirm('Bạn có chắc muốn xóa địa chỉ này?')) {
            window.location.href = '/addresses?action=delete&id=' + id;
        }
    }

    function editAddress(id) {
        // TODO: Load address data and fill form
        alert('Chức năng sửa đang được phát triển');
    }
    
    // Close modal when clicking outside
    document.getElementById('addressModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    </script>
</body>
</html>
