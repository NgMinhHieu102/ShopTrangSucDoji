<?php

class AdminController {
    private $db;
    
    public function __construct() {
        require_once BASE_PATH . '/config/database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function dashboard() {
        // Kiểm tra đăng nhập admin
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }
        
        // Lấy thống kê tổng quan
        $stats = $this->getDashboardStats();
        
        // Lấy dữ liệu biểu đồ doanh thu
        $revenueData = $this->getRevenueData();
        
        // Lấy đơn hàng gần đây
        $recentOrders = $this->getRecentOrders();
        
        // Lấy sản phẩm bán chạy
        $topProducts = $this->getTopProducts();
        
        require_once BASE_PATH . '/app/Views/admin/dashboard.php';
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Kiểm tra admin (username: admin, password: admin123)
            if ($username === 'admin' && $password === 'admin123') {
                $_SESSION['admin_id'] = 1;
                $_SESSION['admin_name'] = 'Administrator';
                header('Location: /admin/dashboard');
                exit;
            } else {
                $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
            }
        }
        
        require_once BASE_PATH . '/app/Views/admin/login.php';
    }
    
    public function logout() {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        header('Location: /admin/login');
        exit;
    }
    
    private function getDashboardStats() {
        $stats = [];
        
        // Tổng doanh thu
        $stmt = $this->db->query("SELECT SUM(total_amount) as total_revenue FROM orders WHERE status != 'cancelled'");
        $stats['total_revenue'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_revenue'] ?? 0;
        
        // Doanh thu tháng này
        $stmt = $this->db->query("SELECT SUM(total_amount) as month_revenue FROM orders WHERE status != 'cancelled' AND MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())");
        $stats['month_revenue'] = $stmt->fetch(PDO::FETCH_ASSOC)['month_revenue'] ?? 0;
        
        // Tổng đơn hàng
        $stmt = $this->db->query("SELECT COUNT(*) as total_orders FROM orders");
        $stats['total_orders'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_orders'] ?? 0;
        
        // Đơn hàng tháng này
        $stmt = $this->db->query("SELECT COUNT(*) as month_orders FROM orders WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())");
        $stats['month_orders'] = $stmt->fetch(PDO::FETCH_ASSOC)['month_orders'] ?? 0;
        
        // Tổng khách hàng
        $stmt = $this->db->query("SELECT COUNT(*) as total_customers FROM users");
        $stats['total_customers'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_customers'] ?? 0;
        
        // Khách hàng mới tháng này
        $stmt = $this->db->query("SELECT COUNT(*) as new_customers FROM users WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())");
        $stats['new_customers'] = $stmt->fetch(PDO::FETCH_ASSOC)['new_customers'] ?? 0;
        
        // Tổng sản phẩm
        $stmt = $this->db->query("SELECT COUNT(*) as total_products FROM products");
        $stats['total_products'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_products'] ?? 0;
        
        return $stats;
    }
    
    private function getRevenueData() {
        // Doanh thu 12 tháng gần nhất
        $stmt = $this->db->query("
            SELECT 
                DATE_FORMAT(created_at, '%Y-%m') as month,
                SUM(total_amount) as revenue,
                COUNT(*) as orders
            FROM orders 
            WHERE status != 'cancelled' 
                AND created_at >= DATE_SUB(CURRENT_DATE(), INTERVAL 12 MONTH)
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY month ASC
        ");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    private function getRecentOrders() {
        $stmt = $this->db->query("
            SELECT o.*, u.full_name as customer_name
            FROM orders o
            LEFT JOIN users u ON o.user_id = u.id
            ORDER BY o.created_at DESC
            LIMIT 10
        ");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    private function getTopProducts() {
        $stmt = $this->db->query("
            SELECT 
                p.id,
                p.name,
                p.image,
                p.price,
                SUM(oi.quantity) as total_sold,
                SUM(oi.subtotal) as total_revenue
            FROM order_items oi
            JOIN products p ON oi.product_id = p.id
            GROUP BY p.id
            ORDER BY total_sold DESC
            LIMIT 5
        ");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
