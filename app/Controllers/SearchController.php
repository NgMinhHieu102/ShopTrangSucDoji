<?php

require_once BASE_PATH . '/app/Models/Product.php';

class SearchController {
    private $productModel;
    
    public function __construct() {
        $this->productModel = new Product();
    }
    
    // API tìm kiếm sản phẩm
    public function search() {
        header('Content-Type: application/json');
        
        $query = isset($_GET['q']) ? trim($_GET['q']) : '';
        
        if (strlen($query) < 2) {
            echo json_encode(['products' => []]);
            return;
        }
        
        try {
            $products = $this->productModel->search($query);
            echo json_encode(['products' => $products]);
        } catch (Exception $e) {
            echo json_encode(['products' => [], 'error' => $e->getMessage()]);
        }
    }
}
