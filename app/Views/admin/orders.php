<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng - Admin DOJI</title>
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
        
        .filter-bar {
            background: white; padding: 20px; border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 20px;
            display: flex; gap: 15px; align-items: center; flex-wrap: wrap;
        }
        .filter-bar select, .filter-bar input {
            padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px;
        }
        .btn-filter {
            padding: 10px 20px; background: #1a1a1a; color: white; border: none;
            border-radius: 8px; cursor: pointer; font-size: 14px;
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
        
        .status-badge {
            padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;
        }
        .status-pending { background: #fff3e0; color: #ff9800; }
        .status-confirmed { background: #e3f2fd; color: #2196f3; }
        .status-shipping { background: #f3e5f5; color: #9c27b0; }
        .status-delivered { background: #e8f5e9; color: #4caf50; }
        .status-cancelled { background: #ffebee; color: #f44336; }
        
        .btn-action {
            padding: 6px 12px; border: 1px solid #ddd; background: white;
            border-radius: 6px; cursor: pointer; font-size: 12px; margin-right: 5px;
        }
        .btn-action:hover { background: #f5f5f5; }
        .btn-action.primary { background: #1a1a1a; color: white; border-color: #1a1a1a; }
        .btn-action.primary:hover { background: #333; }
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
            <li><a href="/admin?action=orders" class="active"><i class="fas fa-shopping-bag"></i> Đơn hàng</a></li>
            <li><a href="/admin?action=products"><i class="fas fa-gem"></i> Sản phẩm</a></li>
            <li><a href="/admin?action=customers"><i class="fas fa-users"></i> Khách hàng</a></li>
            <li><a href="/admin?action=reports"><i class="fas fa-file-alt"></i> Báo cáo</a></li>
            <li><a href="/admin?action=settings"><i class="fas fa-cog"></i> Cài đặt</a></li>
        </ul>
    </aside>
    
    <main class="main-content">
        <div class="header">
            <h1>Quản lý đơn hàng</h1>
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
        
        <div class="filter-bar">
            <select>
                <option value="">Tất cả trạng thái</option>
                <option value="pending">Chờ xác nhận</option>
                <option value="confirmed">Đã xác nhận</option>
                <option value="shipping">Đang giao</option>
                <option value="delivered">Đã giao</option>
                <option value="cancelled">Đã hủy</option>
            </select>
            <input type="date" placeholder="Từ ngày">
            <input type="date" placeholder="Đến ngày">
            <input type="text" placeholder="Tìm kiếm..." style="flex: 1; min-width: 200px;">
            <button class="btn-filter"><i class="fas fa-filter"></i> Lọc</button>
        </div>
        
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): 
                        $statusClass = [
                            'pending' => 'status-pending',
                            'confirmed' => 'status-confirmed',
                            'shipping' => 'status-shipping',
                            'delivered' => 'status-delivered',
                            'cancelled' => 'status-cancelled'
                        ][$order['status']] ?? 'status-pending';
                        
                        $statusLabel = [
                            'pending' => 'Chờ xác nhận',
                            'confirmed' => 'Đã xác nhận',
                            'shipping' => 'Đang giao',
                            'delivered' => 'Đã giao',
                            'cancelled' => 'Đã hủy'
                        ][$order['status']] ?? 'Không xác định';
                    ?>
                    <tr>
                        <td><strong>#<?= $order['id'] ?></strong></td>
                        <td><?= htmlspecialchars($order['customer_name']) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></td>
                        <td style="font-weight: 600; color: #4caf50;"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</td>
                        <td><span class="status-badge <?= $statusClass ?>"><?= $statusLabel ?></span></td>
                        <td>
                            <button class="btn-action primary" onclick="viewOrder(<?= $order['id'] ?>)">
                                <i class="fas fa-eye"></i> Xem
                            </button>
                            <?php if ($order['status'] === 'pending'): ?>
                            <button class="btn-action" onclick="updateStatus(<?= $order['id'] ?>, 'confirmed')">
                                <i class="fas fa-check"></i> Xác nhận
                            </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <script>
        function viewOrder(id) {
            window.location.href = '/order?id=' + id;
        }
        
        function updateStatus(id, status) {
            if (confirm('Xác nhận thay đổi trạng thái đơn hàng?')) {
                alert('Chức năng đang phát triển');
            }
        }
    </script>
</body>
</html>
