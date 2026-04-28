<?php
// Entry point của ứng dụng
session_start();

// Định nghĩa các đường dẫn
define('BASE_PATH', dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);

// Autoload các class
spl_autoload_register(function ($class) {
    $file = BASE_PATH . '/app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Lấy URL hiện tại
$request_uri = $_SERVER['REQUEST_URI'];
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$path = str_replace($script_name, '', $request_uri);

// Remove query string from path
$path = parse_url($path, PHP_URL_PATH);
$path = trim($path, '/');

// Parse query parameters
$query_string = parse_url($request_uri, PHP_URL_QUERY);
parse_str($query_string ?? '', $query_params);

// Routing với sub-paths
$pathSegments = explode('/', $path);
$mainPath = $pathSegments[0] ?? '';
$subPath = $pathSegments[1] ?? '';

// Debug (xóa sau khi test)
// error_log("Path: $path | MainPath: $mainPath | SubPath: $subPath");

switch ($mainPath) {
    case '':
    case 'home':
        require BASE_PATH . '/app/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
    
    case 'products':
        require BASE_PATH . '/app/Controllers/ProductController.php';
        $controller = new ProductController();
        $controller->index();
        break;

    case 'product':
        require BASE_PATH . '/app/Controllers/ProductController.php';
        $controller = new ProductController();
        $controller->detail();
        break;
    
    case 'search':
        require BASE_PATH . '/app/Controllers/SearchController.php';
        $controller = new SearchController();
        $controller->search();
        break;
    
    case 'login':
        require BASE_PATH . '/app/Controllers/AuthController.php';
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login();
        } else {
            $controller->showLogin();
        }
        break;
    
    case 'register':
        require BASE_PATH . '/app/Controllers/AuthController.php';
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->register();
        } else {
            $controller->showRegister();
        }
        break;
    
    case 'logout':
        require BASE_PATH . '/app/Controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;
    
    case 'account':
        require BASE_PATH . '/app/Views/account.php';
        break;
    
    case 'account-edit':
        require BASE_PATH . '/app/Controllers/AuthController.php';
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->updateProfile();
        } else {
            require BASE_PATH . '/app/Views/account-edit.php';
        }
        break;
    
    case 'orders':
        require BASE_PATH . '/app/Views/orders.php';
        break;
    
    case 'order':
        // Chi tiết đơn hàng
        $orderId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($orderId > 0) {
            require BASE_PATH . '/app/Views/order-detail.php';
        } else {
            header('Location: /orders');
            exit;
        }
        break;
    
    case 'change-password':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once BASE_PATH . '/config/database.php';
            $db = new Database();
            $conn = $db->getConnection();
            
            $current = $_POST['current_password'] ?? '';
            $new = $_POST['new_password'] ?? '';
            $confirm = $_POST['confirm_password'] ?? '';
            
            if ($new !== $confirm) {
                $_SESSION['error'] = 'Mật khẩu xác nhận không khớp';
                header('Location: /change-password');
                exit;
            }
            
            $stmt = $conn->prepare("SELECT password FROM users WHERE id = :id");
            $stmt->bindParam(':id', $_SESSION['user_id']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!password_verify($current, $user['password'])) {
                $_SESSION['error'] = 'Mật khẩu hiện tại không đúng';
                header('Location: /change-password');
                exit;
            }
            
            $hashed = password_hash($new, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stmt->bindParam(':password', $hashed);
            $stmt->bindParam(':id', $_SESSION['user_id']);
            $stmt->execute();
            
            $_SESSION['success'] = 'Đổi mật khẩu thành công!';
            header('Location: /change-password');
            exit;
        }
        require BASE_PATH . '/app/Views/change-password.php';
        break;
    
    case 'addresses':
        require_once BASE_PATH . '/config/database.php';
        $db = new Database();
        $conn = $db->getConnection();
        
        $action = $_GET['action'] ?? '';
        
        if ($action === 'save' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $user_id = $_SESSION['user_id'];
            $full_name = $_POST['full_name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $ward = $_POST['ward'];
            $district = $_POST['district'];
            $city = $_POST['city'];
            $is_default = isset($_POST['is_default']) ? 1 : 0;
            
            if ($is_default) {
                $conn->exec("UPDATE addresses SET is_default = 0 WHERE user_id = $user_id");
            }
            
            $stmt = $conn->prepare("INSERT INTO addresses (user_id, full_name, phone, address, ward, district, city, is_default) VALUES (:user_id, :full_name, :phone, :address, :ward, :district, :city, :is_default)");
            $stmt->execute([
                ':user_id' => $user_id,
                ':full_name' => $full_name,
                ':phone' => $phone,
                ':address' => $address,
                ':ward' => $ward,
                ':district' => $district,
                ':city' => $city,
                ':is_default' => $is_default
            ]);
            
            header('Location: /addresses');
            exit;
        } elseif ($action === 'set-default') {
            $id = $_GET['id'] ?? 0;
            $conn->exec("UPDATE addresses SET is_default = 0 WHERE user_id = {$_SESSION['user_id']}");
            $conn->exec("UPDATE addresses SET is_default = 1 WHERE id = $id AND user_id = {$_SESSION['user_id']}");
            header('Location: /addresses');
            exit;
        } elseif ($action === 'delete') {
            $id = $_GET['id'] ?? 0;
            $conn->exec("DELETE FROM addresses WHERE id = $id AND user_id = {$_SESSION['user_id']}");
            header('Location: /addresses');
            exit;
        }
        
        require BASE_PATH . '/app/Views/addresses.php';
        break;
    
    case 'cart':
        require BASE_PATH . '/app/Controllers/CartController.php';
        $controller = new CartController();
        
        // Sử dụng query parameter thay vì sub-path
        $action = $_GET['action'] ?? '';
        
        switch ($action) {
            case 'add':
                header('Content-Type: application/json');
                $controller->add();
                break;
            case 'update':
                header('Content-Type: application/json');
                $controller->update();
                break;
            case 'remove':
                header('Content-Type: application/json');
                $controller->remove();
                break;
            case 'count':
                header('Content-Type: application/json');
                $controller->count();
                break;
            default:
                $controller->index();
                break;
        }
        break;
    
    case 'wishlist':
        require BASE_PATH . '/app/Controllers/WishlistController.php';
        $controller = new WishlistController();
        
        $action = $_GET['action'] ?? '';
        
        switch ($action) {
            case 'add':
                header('Content-Type: application/json');
                $controller->add();
                break;
            case 'remove':
                header('Content-Type: application/json');
                $controller->remove();
                break;
            case 'count':
                header('Content-Type: application/json');
                $controller->count();
                break;
            case 'check':
                header('Content-Type: application/json');
                $controller->check();
                break;
            default:
                $controller->index();
                break;
        }
        break;
    
    case 'checkout':
        require BASE_PATH . '/app/Controllers/CheckoutController.php';
        $controller = new CheckoutController();
        
        $action = $_GET['action'] ?? '';
        
        switch ($action) {
            case 'process':
                $controller->process();
                break;
            case 'success':
                $controller->success();
                break;
            default:
                $controller->index();
                break;
        }
        break;
    
    case 'about':
        require BASE_PATH . '/app/Views/about.php';
        break;
    
    case 'news':
        if (isset($query_params['article'])) {
            $article_slug = $query_params['article'];
            $articles = [
                'hai-nhien' => [
                    'title' => 'BỘ SƯU TẬP MỚI "HẢI NHIÊN" - KHI VẺ ĐẸP KHÔNG CẦN LÊN TIẾNG',
                    'image' => '/images/tintuc1.png',
                    'date' => '15/03/2026',
                    'content' => '<p>Ra mắt hơn 40+ thiết kế, "Hải Nhiên" là lời gọi mở cho mùa hè: chọn những điều nhẹ nhàng hơn, những vấn đề khiến bạn cảm thấy thoải mái và tự tin.</p><p>Bộ sưu tập lấy cảm hứng từ vẻ đẹp thanh thoát của biển cả, mang đến những thiết kế tinh tế và sang trọng.</p>'
                ],
                'moc-nguyen' => [
                    'title' => 'DOJI Ra Mắt BST Tháng 3 "Mộc Nguyên" – Vẻ Đẹp Mộc Mạc Cho Mọi Khởi Đầu Mới!',
                    'image' => '/images/tintuc2.png',
                    'date' => '01/03/2026',
                    'content' => '<p>Ra mắt vào tháng 3 – tháng của sự yêu thương và lãng mạn – "Mộc Nguyên" như một lời chào đầu xuân dành gửi đến những người phụ nữ hiện đại.</p><p>Bộ sưu tập mang đậm phong cách tối giản nhưng không kém phần tinh tế, thể hiện vẻ đẹp tự nhiên và thuần khiết.</p>'
                ],
                'qua-tet' => [
                    'title' => '"QUÀ TẾT TRAO TAY - NHẬN NGAY ÁO MỚI" - DOJI tặng áo thun cho hóa đơn từ 1 triệu 2',
                    'image' => 'https://cdn.pnj.io/images/promo/284/thong-tin-gia-vang.png',
                    'date' => '20/01/2026',
                    'content' => '<p>Với mỗi hóa đơn 1 triệu 2 (sau khi áp dụng đổi điểm), các nàng sẽ được TẶNG NGAY một chiếc ÁO THUN siêu xinh!</p><p>Chương trình áp dụng trong dịp Tết Nguyên Đán, mang đến những món quà ý nghĩa cho khách hàng thân thiết.</p>'
                ],
                'khuc-xuan-thi' => [
                    'title' => 'DOJI ra mắt bộ sưu tập xuân "Khúc Xuân Thi" – Thiết kế trang sức vàng đầy xinh đẹp',
                    'image' => 'https://www.pnj.com.vn/blog/wp-content/uploads/2022/10/kim-cuong-roi-la-gi-co-nen-mua-kim-cuong-roi-tai-pnj-thumb1.jpg',
                    'date' => '10/02/2026',
                    'content' => '<p>Lấy cảm hứng từ chính khoảnh khắc giao mùa đầy thú vị của mùa Xuân, DOJI chính thức ra mắt bộ sưu tập trang sức xuân mang đậm chất thơ mộng.</p><p>Những thiết kế tinh xảo với họa tiết hoa lá mùa xuân, tạo nên vẻ đẹp tươi mới và rạng rỡ.</p>'
                ],
                'di-sac' => [
                    'title' => 'Bộ sưu tập "Dí Sắc" - Tôn vinh vẻ đẹp kim cương tinh khiết',
                    'image' => 'https://cdn.pnj.io/images/detailed/250/on-gnddddw015122-nhan-kim-cuong-vang-trang-14k-pnj-6.jpg',
                    'date' => '05/04/2026',
                    'content' => '<p>Khám phá vẻ đẹp rực rỡ của kim cương qua bộ sưu tập "Dí Sắc" với những thiết kế độc đáo và tinh tế.</p><p>Mỗi viên kim cương được chọn lọc kỹ càng, mang đến ánh sáng lung linh và vẻ đẹp vượt thời gian.</p>'
                ],
                'co-the-len' => [
                    'title' => 'Xu hướng trang sức 2026 - "Cô Thể Lên" phong cách hiện đại',
                    'image' => 'https://cdn.pnj.io/images/detailed/258/on-gcpa00y060018-day-co-vang-18k-dinh-ngoc-trai-akoya-pnj-3.jpg',
                    'date' => '25/04/2026',
                    'content' => '<p>Cập nhật những xu hướng trang sức mới nhất năm 2026 với phong cách hiện đại và tinh tế dành cho phái đẹp.</p><p>Từ những thiết kế tối giản đến những món trang sức statement, "Cô Thể Lên" mang đến sự đa dạng cho mọi phong cách.</p>'
                ]
            ];
            if (isset($articles[$article_slug])) {
                $article = $articles[$article_slug];
                
                // Load featured products from "Trang Sức Cao Cấp" category
                require_once BASE_PATH . '/app/Models/Product.php';
                $productModel = new Product();
                $featuredProducts = $productModel->getByCategory('trang-suc-cao-cap', 6);
                
                require BASE_PATH . '/app/Views/news-detail.php';
            } else {
                http_response_code(404);
                echo "404 - Article Not Found";
            }
        } else {
            require BASE_PATH . '/app/Views/news.php';
        }
        break;
    
    default:
        http_response_code(404);
        echo "404 - Page Not Found";
        break;
}
