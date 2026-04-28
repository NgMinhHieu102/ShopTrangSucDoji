<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin DOJI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: #1a1a1a;
            color: white;
            padding: 20px 0;
            z-index: 1000;
        }
        
        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        
        .sidebar-header h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .sidebar-header p {
            font-size: 13px;
            opacity: 0.8;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #333;
            border-left: 4px solid #c9a84c;
        }
        
        .sidebar-menu i {
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }
        
        /* Header */
        .header {
            background: white;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            font-size: 28px;
            color: #333;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #1a1a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .btn-logout {
            padding: 8px 16px;
            background: #f44336;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .btn-logout:hover {
            background: #d32f2f;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }
        
        .stat-card.revenue::before { background: #4caf50; }
        .stat-card.orders::before { background: #2196f3; }
        .stat-card.customers::before { background: #ff9800; }
        .stat-card.products::before { background: #9c27b0; }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        .stat-card.revenue .stat-icon { background: #e8f5e9; color: #4caf50; }
        .stat-card.orders .stat-icon { background: #e3f2fd; color: #2196f3; }
        .stat-card.customers .stat-icon { background: #fff3e0; color: #ff9800; }
        .stat-card.products .stat-icon { background: #f3e5f5; color: #9c27b0; }
        
        .stat-label {
            font-size: 13px;
            color: #999;
            margin-bottom: 8px;
        }
        
        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }
        
        .stat-change {
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .stat-change.up { color: #4caf50; }
        .stat-change.down { color: #f44336; }
        
        /* Charts */
        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .chart-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .chart-card canvas {
            max-height: 350px;
        }
        
        .chart-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .chart-header h3 {
            font-size: 18px;
            color: #333;
        }
        
        /* Tables */
        .table-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .table-header h3 {
            font-size: 18px;
            color: #333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background: #f9f9f9;
        }
        
        th {
            padding: 12px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
        }
        
        td {
            padding: 15px 12px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }
        
        tbody tr:hover {
            background: #f9f9f9;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-pending { background: #fff3e0; color: #ff9800; }
        .status-confirmed { background: #e3f2fd; color: #2196f3; }
        .status-shipping { background: #f3e5f5; color: #9c27b0; }
        .status-delivered { background: #e8f5e9; color: #4caf50; }
        .status-cancelled { background: #ffebee; color: #f44336; }
        
        .product-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .product-img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
        }
        
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>DOJI Admin</h2>
            <p>Jewelry Management</p>
        </div>
        
        <ul class="sidebar-menu">
            <li><a href="/admin" class="active"><i class="fas fa-chart-line"></i> Dashboard</a></li>
            <li><a href="/admin?action=orders"><i class="fas fa-shopping-bag"></i> Đơn hàng</a></li>
            <li><a href="/admin?action=products"><i class="fas fa-gem"></i> Sản phẩm</a></li>
            <li><a href="/admin?action=luxury-products"><i class="fas fa-crown"></i> SP Cao cấp</a></li>
            <li><a href="/admin?action=customers"><i class="fas fa-users"></i> Khách hàng</a></li>
            <li><a href="/admin?action=reports"><i class="fas fa-file-alt"></i> Báo cáo</a></li>
            <li><a href="/admin?action=settings"><i class="fas fa-cog"></i> Cài đặt</a></li>
        </ul>
    </aside>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Dashboard</h1>
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
        
        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card revenue">
                <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
                <div class="stat-label">Tổng doanh thu</div>
                <div class="stat-value"><?= number_format($stats['total_revenue'], 0, ',', '.') ?>đ</div>
                <div class="stat-change up">
                    <i class="fas fa-arrow-up"></i>
                    Tháng này: <?= number_format($stats['month_revenue'], 0, ',', '.') ?>đ
                </div>
            </div>
            
            <div class="stat-card orders">
                <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                <div class="stat-label">Tổng đơn hàng</div>
                <div class="stat-value"><?= number_format($stats['total_orders']) ?></div>
                <div class="stat-change up">
                    <i class="fas fa-arrow-up"></i>
                    Tháng này: <?= number_format($stats['month_orders']) ?>
                </div>
            </div>
            
            <div class="stat-card customers">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <div class="stat-label">Khách hàng</div>
                <div class="stat-value"><?= number_format($stats['total_customers']) ?></div>
                <div class="stat-change up">
                    <i class="fas fa-arrow-up"></i>
                    Mới: <?= number_format($stats['new_customers']) ?>
                </div>
            </div>
            
            <div class="stat-card products">
                <div class="stat-icon"><i class="fas fa-gem"></i></div>
                <div class="stat-label">Sản phẩm</div>
                <div class="stat-value"><?= number_format($stats['total_products']) ?></div>
                <div class="stat-change">
                    <i class="fas fa-check"></i>
                    Đang hoạt động
                </div>
            </div>
        </div>
        
        <!-- Charts -->
        <div class="charts-grid">
            <div class="chart-card">
                <div class="chart-header">
                    <h3><i class="fas fa-chart-line"></i> Doanh thu 12 tháng</h3>
                </div>
                <canvas id="revenueChart"></canvas>
            </div>
            
            <div class="chart-card">
                <div class="chart-header">
                    <h3><i class="fas fa-chart-pie"></i> Trạng thái đơn hàng</h3>
                </div>
                <canvas id="orderStatusChart"></canvas>
            </div>
        </div>
        
        <!-- Recent Orders -->
        <div class="table-card">
            <div class="table-header">
                <h3><i class="fas fa-shopping-bag"></i> Đơn hàng gần đây</h3>
                <a href="/admin?action=orders" style="color: #667eea; text-decoration: none; font-size: 14px;">Xem tất cả →</a>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentOrders as $order): 
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
                        <td>#<?= $order['id'] ?></td>
                        <td><?= htmlspecialchars($order['customer_name'] ?? 'N/A') ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></td>
                        <td style="font-weight: 600; color: #4caf50;"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</td>
                        <td><span class="status-badge <?= $statusClass ?>"><?= $statusLabel ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Top Products -->
        <div class="table-card">
            <div class="table-header">
                <h3><i class="fas fa-fire"></i> Sản phẩm bán chạy</h3>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Đã bán</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($topProducts as $product): ?>
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="<?= htmlspecialchars($product['image']) ?>" alt="" class="product-img">
                                <span><?= htmlspecialchars($product['name']) ?></span>
                            </div>
                        </td>
                        <td><?= number_format($product['price'], 0, ',', '.') ?>đ</td>
                        <td style="font-weight: 600;"><?= number_format($product['total_sold']) ?></td>
                        <td style="font-weight: 600; color: #4caf50;"><?= number_format($product['total_revenue'], 0, ',', '.') ?>đ</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <script>
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueData = <?= json_encode($revenueData) ?>;
        
        const months = revenueData.map(item => {
            const [year, month] = item.month.split('-');
            return `Tháng ${month}/${year}`;
        });
        const revenues = revenueData.map(item => item.revenue);
        const orders = revenueData.map(item => item.orders);
        
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Doanh thu (VNĐ)',
                    data: revenues,
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 2.5,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString('vi-VN') + 'đ';
                            }
                        }
                    }
                }
            }
        });
        
        // Order Status Chart
        const statusCtx = document.getElementById('orderStatusChart').getContext('2d');
        
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Chờ xác nhận', 'Đã xác nhận', 'Đang giao', 'Đã giao', 'Đã hủy'],
                datasets: [{
                    data: [<?= $stats['month_orders'] * 0.2 ?>, <?= $stats['month_orders'] * 0.3 ?>, <?= $stats['month_orders'] * 0.15 ?>, <?= $stats['month_orders'] * 0.3 ?>, <?= $stats['month_orders'] * 0.05 ?>],
                    backgroundColor: [
                        '#ff9800',
                        '#2196f3',
                        '#9c27b0',
                        '#4caf50',
                        '#f44336'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1.5,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>
