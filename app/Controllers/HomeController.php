<?php

require_once BASE_PATH . '/app/Models/Product.php';

class HomeController {
    private $productModel;
    
    public function __construct() {
        $this->productModel = new Product();
    }
    
    public function index() {
        // Lấy sản phẩm mới nhất từ category "Trang Sức Cao Cấp"
        $latestProducts = $this->productModel->getByCategorySlug('trang-suc-cao-cap', 8);
        
        // Nếu không đủ sản phẩm từ Trang Sức Cao Cấp, lấy thêm từ các category khác
        if (count($latestProducts) < 8) {
            $additionalProducts = $this->productModel->getAll(8 - count($latestProducts));
            $latestProducts = array_merge($latestProducts, $additionalProducts);
        }
        
        require BASE_PATH . '/app/Views/home.php';
    }
}
