<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng - Admin DOJI</title>
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
        
        .stats-row {
            display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;
        }
        .stat-box {
            background: white; padding: 20px; border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .stat-box h3 { font-size: 14px; color: #999; margin-bottom: 10px; }
        .stat-box .value { font-size: 28px; font-weight: 700; color: #333; }
        
        .action-bar {
            background: white; padding: 20px; border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 20px;
            display: flex; justify-content: space-between; align-items: center;
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
        
        .customer-avatar {
            width: 40px; height: 40px; border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 600; font-size: 16px;
        }
        .customer-info { display: flex; align-items: center; gap: 12px; }
        .btn-action {
            padding: 6px 12px; border: 1px solid #ddd; background: white;
            border-radius: 6px; cursor: pointer; font-size: 12px; margin-right: 5px;
        }
        .btn-action:hover { background: #f5f5f5; }
        .btn-action.view { color: #2196f3; border-color: #2196f3; }
        .btn-action.delete { color: #f44336; border-color: #f44336; }
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
            <li><a href="/admin?action=luxury-products"><i class="fas fa-crown"></i> SP Cao cấp</a></li>
            <li><a href="/admin?action=customers" class="active"><i class="fas fa-users"></i> Khách hàng</a></li>
            <li><a href="/admin?action=reports"><i class="fas fa-file-alt"></i> Báo cáo</a></li>
            <li><a href="/admin?action=settings"><i class="fas fa-cog"></i> Cài đặt</a></li>
        </ul>
    </aside>
    
    <main class="main-content">
        <div class="header">
            <h1>Quản lý khách hàng</h1>
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
        
        <div class="stats-row">
            <div class="stat-box">
                <h3>Tổng khách hàng</h3>
                <div class="value"><?= count($customers) ?></div>
            </div>
            <div class="stat-box">
                <h3>Khách hàng mới (tháng)</h3>
                <div class="value"><?= count(array_filter($customers, function($c) {
                    return date('Y-m', strtotime($c['created_at'])) === date('Y-m');
                })) ?></div>
            </div>
            <div class="stat-box">
                <h3>Tổng đơn hàng</h3>
                <div class="value"><?= array_sum(array_column($customers, 'total_orders')) ?></div>
            </div>
            <div class="stat-box">
                <h3>Tổng doanh thu</h3>
                <div class="value" style="font-size: 20px;"><?= number_format(array_sum(array_column($customers, 'total_spent')), 0, ',', '.') ?>đ</div>
            </div>
        </div>
        
        <div class="action-bar">
            <div></div>
            <div class="search-box">
                <input type="text" placeholder="Tìm kiếm khách hàng..." id="searchInput">
            </div>
        </div>
        
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Đơn hàng</th>
                        <th>Tổng chi tiêu</th>
                        <th>Ngày đăng ký</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td>
                            <div class="customer-info">
                                <div class="customer-avatar"><?= strtoupper(substr($customer['full_name'], 0, 1)) ?></div>
                                <strong><?= htmlspecialchars($customer['full_name']) ?></strong>
                            </div>
                        </td>
                        <td><?= htmlspecialchars($customer['email']) ?></td>
                        <td><?= htmlspecialchars($customer['phone'] ?? 'N/A') ?></td>
                        <td><strong><?= $customer['total_orders'] ?></strong> đơn</td>
                        <td style="font-weight: 600; color: #4caf50;"><?= number_format($customer['total_spent'], 0, ',', '.') ?>đ</td>
                        <td><?= date('d/m/Y', strtotime($customer['created_at'])) ?></td>
                        <td>
                            <button class="btn-action view" onclick="viewCustomer(<?= $customer['id'] ?>)">
                                <i class="fas fa-eye"></i> Xem
                            </button>
                            <button class="btn-action delete" onclick="deleteCustomer(<?= $customer['id'] ?>)">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <script>
        function viewCustomer(id) {
            alert('Xem chi tiết khách hàng #' + id);
        }
        
        function deleteCustomer(id) {
            if (confirm('Bạn có chắc muốn xóa khách hàng này?')) {
                alert('Chức năng đang phát triển');
            }
        }
    </script>
</body>
</html>
