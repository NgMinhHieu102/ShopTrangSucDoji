<?php

require_once BASE_PATH . '/app/Models/Product.php';
require_once BASE_PATH . '/config/database.php';

class CheckoutController {
    private $productModel;
    private $conn;
    
    public function __construct() {
        $this->productModel = new Product();
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    
    // Hiển thị trang thanh toán
    public function index() {
        $cart = $_SESSION['cart'] ?? [];
        
        if (empty($cart)) {
            header('Location: /cart');
            exit;
        }
        
        $cartItems = [];
        $total = 0;
        
        foreach ($cart as $productId => $quantity) {
            $product = $this->productModel->getById($productId);
            if ($product) {
                $subtotal = $product['price'] * $quantity;
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal
                ];
                $total += $subtotal;
            }
        }
        
        require BASE_PATH . '/app/Views/checkout.php';
    }
    
    // Xử lý đặt hàng
    public function process() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /checkout');
            exit;
        }
        
        $cart = $_SESSION['cart'] ?? [];
        
        if (empty($cart)) {
            header('Location: /cart');
            exit;
        }
        
        try {
            $this->conn->beginTransaction();
            
            // Lấy thông tin từ form
            $customerName = $_POST['name'] ?? '';
            $customerEmail = $_POST['email'] ?? '';
            $customerPhone = $_POST['phone'] ?? '';
            $shippingAddress = $_POST['address'] ?? '';
            $city = $_POST['city'] ?? '';
            $district = $_POST['district'] ?? '';
            $ward = $_POST['ward'] ?? '';
            $notes = $_POST['notes'] ?? '';
            $paymentMethod = $_POST['payment_method'] ?? 'cod';
            
            // Tính tổng tiền
            $totalAmount = 0;
            $orderItems = [];
            
            foreach ($cart as $productId => $quantity) {
                $product = $this->productModel->getById($productId);
                if ($product) {
                    $subtotal = $product['price'] * $quantity;
                    $totalAmount += $subtotal;
                    $orderItems[] = [
                        'product_id' => $product['id'],
                        'product_name' => $product['name'],
                        'product_image' => $product['image'],
                        'price' => $product['price'],
                        'quantity' => $quantity,
                        'subtotal' => $subtotal
                    ];
                }
            }
            
            // Tạo đơn hàng
            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
            $stmt = $this->conn->prepare("
                INSERT INTO orders (user_id, customer_name, customer_email, customer_phone, shipping_address, city, district, ward, total_amount, payment_method, notes)
                VALUES (:user_id, :customer_name, :customer_email, :customer_phone, :shipping_address, :city, :district, :ward, :total_amount, :payment_method, :notes)
            ");
            
            $stmt->execute([
                'user_id' => $user_id,
                'customer_name' => $customerName,
                'customer_email' => $customerEmail,
                'customer_phone' => $customerPhone,
                'shipping_address' => $shippingAddress,
                'city' => $city,
                'district' => $district,
                'ward' => $ward,
                'total_amount' => $totalAmount,
                'payment_method' => $paymentMethod,
                'notes' => $notes
            ]);
            
            $orderId = $this->conn->lastInsertId();
            
            // Thêm chi tiết đơn hàng
            $stmt = $this->conn->prepare("
                INSERT INTO order_items (order_id, product_id, product_name, product_image, price, quantity, subtotal)
                VALUES (:order_id, :product_id, :product_name, :product_image, :price, :quantity, :subtotal)
            ");
            
            foreach ($orderItems as $item) {
                $stmt->execute([
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['product_name'],
                    'product_image' => $item['product_image'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal']
                ]);
            }
            
            $this->conn->commit();
            
            // Xóa giỏ hàng
            unset($_SESSION['cart']);
            
            // Chuyển đến trang thành công
            header('Location: /checkout?action=success&order_id=' . $orderId);
            exit;
            
        } catch (Exception $e) {
            $this->conn->rollBack();
            $_SESSION['error'] = 'Có lỗi xảy ra: ' . $e->getMessage();
            header('Location: /checkout');
            exit;
        }
    }
    
    // Trang đặt hàng thành công
    public function success() {
        $orderId = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;
        
        if ($orderId > 0) {
            $stmt = $this->conn->prepare("SELECT * FROM orders WHERE id = :id");
            $stmt->execute(['id' => $orderId]);
            $order = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($order) {
                require BASE_PATH . '/app/Views/checkout-success.php';
                return;
            }
        }
        
        header('Location: /');
        exit;
    }
}
