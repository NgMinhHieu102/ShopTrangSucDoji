<?php

require_once BASE_PATH . '/app/Models/Product.php';

class WishlistController {
    private $productModel;
    
    public function __construct() {
        $this->productModel = new Product();
    }
    
    // Hiển thị danh sách yêu thích
    public function index() {
        $wishlist = $_SESSION['wishlist'] ?? [];
        $wishlistItems = [];
        
        foreach ($wishlist as $productId) {
            $product = $this->productModel->getById($productId);
            if ($product) {
                $wishlistItems[] = $product;
            }
        }
        
        require BASE_PATH . '/app/Views/wishlist.php';
    }
    
    // Thêm sản phẩm vào danh sách yêu thích
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
            
            if ($productId > 0) {
                if (!isset($_SESSION['wishlist'])) {
                    $_SESSION['wishlist'] = [];
                }
                
                if (!in_array($productId, $_SESSION['wishlist'])) {
                    $_SESSION['wishlist'][] = $productId;
                    echo json_encode(['success' => true, 'message' => 'Đã thêm vào yêu thích']);
                } else {
                    echo json_encode(['success' => true, 'message' => 'Sản phẩm đã có trong danh sách yêu thích']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            }
        }
    }
    
    // Xóa sản phẩm khỏi danh sách yêu thích
    public function remove() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
            
            if ($productId > 0 && isset($_SESSION['wishlist'])) {
                $key = array_search($productId, $_SESSION['wishlist']);
                if ($key !== false) {
                    unset($_SESSION['wishlist'][$key]);
                    $_SESSION['wishlist'] = array_values($_SESSION['wishlist']); // Re-index array
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Sản phẩm không có trong danh sách']);
                }
            } else {
                echo json_encode(['success' => false]);
            }
        }
    }
    
    // Lấy số lượng sản phẩm trong danh sách yêu thích
    public function count() {
        $count = isset($_SESSION['wishlist']) ? count($_SESSION['wishlist']) : 0;
        echo json_encode(['count' => $count]);
    }
    
    // Kiểm tra sản phẩm có trong wishlist không
    public function check() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
            $inWishlist = isset($_SESSION['wishlist']) && in_array($productId, $_SESSION['wishlist']);
            echo json_encode(['inWishlist' => $inWishlist]);
        }
    }
}
