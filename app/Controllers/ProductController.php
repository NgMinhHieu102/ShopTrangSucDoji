<?php

require_once BASE_PATH . '/app/Models/Product.php';

class ProductController {
    private $productModel;
    
    public function __construct() {
        $this->productModel = new Product();
    }
    
    public function index() {
        // Lấy query parameters
        $category = isset($_GET['category']) ? $_GET['category'] : null;
        $style = isset($_GET['style']) ? $_GET['style'] : null;
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        $ring_style = isset($_GET['ring_style']) ? $_GET['ring_style'] : null;
        $border_type = isset($_GET['border_type']) ? $_GET['border_type'] : null;
        $material = isset($_GET['material']) ? $_GET['material'] : null;
        $color = isset($_GET['color']) ? $_GET['color'] : null;
        $stone_type = isset($_GET['stone_type']) ? $_GET['stone_type'] : null;
        $collection = isset($_GET['collection']) ? $_GET['collection'] : null;
        $featured = isset($_GET['featured']) ? $_GET['featured'] : null;
        $ring_type = isset($_GET['ring_type']) ? $_GET['ring_type'] : null;
        
        // Phân trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 24; // Số sản phẩm mỗi trang
        $offset = ($page - 1) * $limit;
        
        // Tạo tiêu đề trang động
        $pageTitle = 'Tất Cả Sản Phẩm';
        $pageSubtitle = '';
        
        // Xác định tiêu đề dựa trên category
        $categoryTitles = [
            'nhan-cau-hon' => 'Nhẫn Cầu Hôn',
            'nhan-cuoi' => 'Nhẫn Cưới',
            'engagement' => 'Nhẫn Cầu Hôn', // Backward compatibility
            'wedding' => 'Nhẫn Cưới', // Backward compatibility
            'diamond' => 'Kim Cương',
            'kim-cuong' => 'Kim Cương',
            'luxury' => 'Trang Sức Cao Cấp',
            'trang-suc-cao-cap' => 'Trang Sức Cao Cấp',
            'nhan' => 'Nhẫn',
            'day-chuyen' => 'Dây Chuyền',
            'bong-tai' => 'Bông Tai',
            'vong-tay' => 'Vòng Tay',
            'lac-chan' => 'Lắc Chân'
        ];
        
        // Xác định subtitle dựa trên style
        $styleTitles = [
            'thanh-lich' => 'Thanh Lịch',
            'hien-dai' => 'Hiện Đại',
            'quyen-ru' => 'Quyến Rũ',
            'doi-cac' => 'Đôi Các',
            'ngot-ngao' => 'Ngọt Ngào',
            'truyen-thong' => 'Truyền Thống',
            'kim-cuong' => 'Kim Cương',
            'eternity' => 'Eternity',
            'solitaire' => 'Solitaire',
            'cathedral' => 'Cathedral',
            'halo' => 'Halo',
            'bridge-accent' => 'Bridge Accent',
            'twist' => 'Twist',
            'royal' => 'Royal',
            'threestone' => 'ThreeStone',
            'trellis' => 'Trellis'
        ];
        
        // Cập nhật tiêu đề dựa trên filter
        if ($category && isset($categoryTitles[$category])) {
            $pageTitle = $categoryTitles[$category];
            
            // Thêm thông tin filter vào subtitle
            $filterInfo = [];
            if ($ring_style) {
                $ringStyleTitles = [
                    'solitaire' => 'Solitaire',
                    'halo' => 'Halo', 
                    'vintage' => 'Vintage',
                    'cathedral' => 'Cathedral',
                    'tiffany' => 'Tiffany',
                    'pave' => 'Pave',
                    'three-stone' => 'Three Stone',
                    'emerald-cut' => 'Emerald Cut'
                ];
                if (isset($ringStyleTitles[$ring_style])) {
                    $filterInfo[] = $ringStyleTitles[$ring_style];
                }
            }
            
            if ($border_type) {
                $borderTitles = [
                    'round' => 'Round',
                    'princess' => 'Princess',
                    'emerald' => 'Emerald',
                    'oval' => 'Oval',
                    'heart' => 'Heart',
                    'pear' => 'Pear'
                ];
                if (isset($borderTitles[$border_type])) {
                    $filterInfo[] = $borderTitles[$border_type];
                }
            }
            
            if ($material) {
                $materialTitles = [
                    '18k' => 'Vàng 18K',
                    '14k' => 'Vàng 14K',
                    'platinum' => 'Platinum'
                ];
                if (isset($materialTitles[$material])) {
                    $filterInfo[] = $materialTitles[$material];
                }
            }
            
            if (!empty($filterInfo)) {
                $pageSubtitle = implode(' • ', $filterInfo);
            }
        } elseif ($style && isset($styleTitles[$style])) {
            // Nếu chỉ có style mà không có category, dùng style làm title
            $pageTitle = 'Phong Cách ' . $styleTitles[$style];
            $pageSubtitle = '';
        }
        
        if ($style && isset($styleTitles[$style]) && $category) {
            $pageSubtitle = 'Phong cách: ' . $styleTitles[$style];
        }
        
        if ($type) {
            $typeFormatted = ucwords(str_replace('-', ' ', $type));
            if ($category) {
                $pageSubtitle = $typeFormatted;
            } else {
                $pageTitle = $typeFormatted;
            }
        }
        
        // Lấy danh sách sản phẩm từ database
        if ($search) {
            $products = $this->productModel->search($search);
        } else {
            // Sử dụng bộ lọc kết hợp
            $filters = [];
            
            if ($category) {
                // Map backward compatibility categories
                $categoryMapping = [
                    'engagement' => 'nhan-cau-hon',
                    'wedding' => 'nhan-cuoi'
                ];
                
                $mappedCategory = isset($categoryMapping[$category]) ? $categoryMapping[$category] : $category;
                $filters['category_slug'] = $mappedCategory;
            }
            
            if ($style) {
                $filters['style'] = $style;
            }
            
            if ($type) {
                // Nếu type là loại nhẫn cưới (nhan-cuoi-cap/nam/nu), dùng ring_type
                $weddingRingTypes = ['nhan-cuoi-cap', 'nhan-cuoi-nam', 'nhan-cuoi-nu'];
                if (in_array($type, $weddingRingTypes)) {
                    $filters['ring_type'] = $type;
                } else {
                    $filters['type'] = $type;
                }
            }
            
            if ($ring_style) {
                $filters['ring_style'] = $ring_style;
            }
            
            if ($border_type) {
                $filters['border_type'] = $border_type;
            }
            
            if ($material) {
                $filters['material'] = $material;
            }
            
            if ($color) {
                $filters['color'] = $color;
            }
            
            if ($stone_type) {
                $filters['stone_type'] = $stone_type;
            }
            
            if ($collection) {
                $filters['collection'] = $collection;
            }
            
            if ($ring_type) {
                $filters['ring_type'] = $ring_type;
            }
            
            if ($featured) {
                $filters['is_featured'] = 1;
            }
            
            // Nếu có bất kỳ bộ lọc nào, sử dụng getWithFilters
            if (!empty($filters)) {
                // Lấy tổng số sản phẩm để tính phân trang
                $totalProducts = $this->productModel->getCountWithFilters($filters);
                $products = $this->productModel->getWithFilters($filters, $limit, $offset);
            } else {
                $totalProducts = $this->productModel->getCount();
                $products = $this->productModel->getAll($limit, $offset);
            }
        }
        
        // Tính toán phân trang
        $totalPages = ceil($totalProducts / $limit);
        $pagination = [
            'current_page' => $page,
            'total_pages' => $totalPages,
            'total_products' => $totalProducts,
            'limit' => $limit,
            'has_prev' => $page > 1,
            'has_next' => $page < $totalPages,
            'prev_page' => $page > 1 ? $page - 1 : null,
            'next_page' => $page < $totalPages ? $page + 1 : null
        ];
        
        // Load view
        require BASE_PATH . '/app/Views/products.php';
    }
    
    public function detail() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $slug = isset($_GET['slug']) ? $_GET['slug'] : null;

        if ($slug) {
            $product = $this->productModel->getBySlug($slug);
        } else {
            $product = $this->productModel->getById($id);
        }

        if (!$product) {
            http_response_code(404);
            echo "<h1>Sản phẩm không tồn tại</h1>";
            return;
        }

        // Lấy sản phẩm liên quan cùng category (lấy 5 để đảm bảo có 4 sau khi loại bỏ sản phẩm hiện tại)
        $related = $this->productModel->getWithFilters(
            ['category_slug' => $product['category_slug'] ?? ''],
            5, 0
        );

        require BASE_PATH . '/app/Views/product-detail.php';
    }

    public function apiIndex() {
        // Trả về JSON cho API
        $products = $this->productModel->getAll();
        echo json_encode([
            'success' => true,
            'data' => $products
        ]);
    }
}
