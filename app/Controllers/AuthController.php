<?php

require_once BASE_PATH . '/config/database.php';

class AuthController {
    private $conn;
    
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    
    // Hiển thị trang đăng nhập
    public function showLogin() {
        require BASE_PATH . '/app/Views/login.php';
    }
    
    // Hiển thị trang đăng ký
    public function showRegister() {
        require BASE_PATH . '/app/Views/register.php';
    }
    
    // Xử lý đăng nhập
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            
            if (empty($email) || empty($password)) {
                $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
                header('Location: /login');
                exit;
            }
            
            // Tìm user theo email
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password'])) {
                // Đăng nhập thành công
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['full_name'];
                $_SESSION['success'] = 'Đăng nhập thành công!';
                
                // Redirect về trang trước đó hoặc trang chủ
                $redirect = $_SESSION['redirect_after_login'] ?? '/';
                unset($_SESSION['redirect_after_login']);
                header('Location: ' . $redirect);
                exit;
            } else {
                $_SESSION['error'] = 'Email hoặc mật khẩu không đúng';
                header('Location: /login');
                exit;
            }
        }
    }
    
    // Xử lý đăng ký
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            $full_name = trim($_POST['full_name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            
            // Validate
            if (empty($email) || empty($password) || empty($full_name)) {
                $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin bắt buộc';
                header('Location: /register');
                exit;
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Email không hợp lệ';
                header('Location: /register');
                exit;
            }
            
            if (strlen($password) < 6) {
                $_SESSION['error'] = 'Mật khẩu phải có ít nhất 6 ký tự';
                header('Location: /register');
                exit;
            }
            
            if ($password !== $confirm_password) {
                $_SESSION['error'] = 'Mật khẩu xác nhận không khớp';
                header('Location: /register');
                exit;
            }
            
            // Kiểm tra email đã tồn tại
            $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if ($stmt->fetch()) {
                $_SESSION['error'] = 'Email đã được sử dụng';
                header('Location: /register');
                exit;
            }
            
            // Tạo tài khoản mới
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("
                INSERT INTO users (email, password, full_name, phone) 
                VALUES (:email, :password, :full_name, :phone)
            ");
            
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':phone', $phone);
            
            if ($stmt->execute()) {
                $_SESSION['success'] = 'Đăng ký thành công! Vui lòng đăng nhập';
                header('Location: /login');
                exit;
            } else {
                $_SESSION['error'] = 'Có lỗi xảy ra, vui lòng thử lại';
                header('Location: /register');
                exit;
            }
        }
    }
    
    // Cập nhật thông tin tài khoản
    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];
            $email = trim($_POST['email'] ?? '');
            $full_name = trim($_POST['full_name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $address = trim($_POST['address'] ?? '');
            
            // Validate
            if (empty($email) || empty($full_name)) {
                $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin bắt buộc';
                header('Location: /account-edit');
                exit;
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Email không hợp lệ';
                header('Location: /account-edit');
                exit;
            }
            
            // Kiểm tra email đã tồn tại (trừ email của chính user)
            $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = :email AND id != :user_id");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            
            if ($stmt->fetch()) {
                $_SESSION['error'] = 'Email đã được sử dụng bởi tài khoản khác';
                header('Location: /account-edit');
                exit;
            }
            
            // Cập nhật thông tin
            $stmt = $this->conn->prepare("
                UPDATE users 
                SET email = :email, full_name = :full_name, phone = :phone, address = :address, updated_at = NOW()
                WHERE id = :user_id
            ");
            
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':user_id', $user_id);
            
            if ($stmt->execute()) {
                // Cập nhật session
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $full_name;
                $_SESSION['success'] = 'Cập nhật thông tin thành công!';
                header('Location: /account');
                exit;
            } else {
                $_SESSION['error'] = 'Có lỗi xảy ra, vui lòng thử lại';
                header('Location: /account-edit');
                exit;
            }
        }
    }
    
    // Đăng xuất
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        $_SESSION['success'] = 'Đã đăng xuất';
        header('Location: /');
        exit;
    }
}
