<?php

require_once BASE_PATH . '/config/database.php';

class Product {
    private $conn;
    private $table_name = "products";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy tất cả sản phẩm với phân trang
    public function getAll($limit = null, $offset = null) {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  ORDER BY p.created_at DESC";
        
        if ($limit !== null) {
            $query .= " LIMIT :limit";
            if ($offset !== null) {
                $query .= " OFFSET :offset";
            }
        }
        
        $stmt = $this->conn->prepare($query);
        
        if ($limit !== null) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            if ($offset !== null) {
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
        }
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo danh mục slug
    public function getByCategorySlug($slug, $limit = null) {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE c.slug = :slug
                  ORDER BY p.created_at DESC";
        
        if ($limit !== null) {
            $query .= " LIMIT :limit";
        }
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':slug', $slug);
        
        if ($limit !== null) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo danh mục
    public function getByCategory($category_id) {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE p.category_id = :category_id
                  ORDER BY p.created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm nổi bật
    public function getFeatured($limit = 10) {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE p.is_featured = 1
                  ORDER BY p.created_at DESC
                  LIMIT :limit";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo slug
    public function getBySlug($slug) {
        $query = "SELECT p.*, c.name as category_name, c.slug as category_slug
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE p.slug = :slug";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getById($id) {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE p.id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tìm kiếm sản phẩm
    public function search($keyword, $limit = 10) {
        $searchTerm = "%{$keyword}%";
        
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE p.name LIKE :keyword 
                  OR p.description LIKE :keyword
                  OR c.name LIKE :keyword
                  ORDER BY 
                    CASE 
                        WHEN p.name LIKE :exact THEN 1
                        WHEN p.name LIKE :keyword THEN 2
                        ELSE 3
                    END,
                    p.created_at DESC
                  LIMIT :limit";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':keyword', $searchTerm, PDO::PARAM_STR);
        $stmt->bindParam(':exact', $keyword, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo style
    public function getByStyle($style) {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE p.style = :style
                  ORDER BY p.created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':style', $style);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo type
    public function getByType($type) {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE p.product_type = :type
                  ORDER BY p.created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':type', $type);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm với nhiều bộ lọc và phân trang
    public function getWithFilters($filters = [], $limit = null, $offset = null) {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE 1=1";
        
        $params = [];
        
        if (!empty($filters['category_slug'])) {
            $query .= " AND c.slug = :category_slug";
            $params[':category_slug'] = $filters['category_slug'];
        }
        
        if (!empty($filters['style'])) {
            $query .= " AND p.style = :style";
            $params[':style'] = $filters['style'];
        }
        
        if (!empty($filters['type'])) {
            $query .= " AND p.product_type = :type";
            $params[':type'] = $filters['type'];
        }
        
        if (!empty($filters['ring_style'])) {
            $query .= " AND p.ring_style = :ring_style";
            $params[':ring_style'] = $filters['ring_style'];
        }
        
        if (!empty($filters['border_type'])) {
            $query .= " AND p.border_type = :border_type";
            $params[':border_type'] = $filters['border_type'];
        }
        
        if (!empty($filters['material'])) {
            $query .= " AND p.material = :material";
            $params[':material'] = $filters['material'];
        }
        
        if (!empty($filters['color'])) {
            $query .= " AND p.color = :color";
            $params[':color'] = $filters['color'];
        }
        
        if (!empty($filters['stone_type'])) {
            $query .= " AND p.stone_type = :stone_type";
            $params[':stone_type'] = $filters['stone_type'];
        }
        
        if (!empty($filters['collection'])) {
            $query .= " AND p.collection = :collection";
            $params[':collection'] = $filters['collection'];
        }
        
        if (!empty($filters['ring_type'])) {
            $query .= " AND p.ring_type = :ring_type";
            $params[':ring_type'] = $filters['ring_type'];
        }
        
        if (!empty($filters['is_featured'])) {
            $query .= " AND p.is_featured = :is_featured";
            $params[':is_featured'] = $filters['is_featured'];
        }
        
        $query .= " ORDER BY p.created_at DESC";
        
        if ($limit !== null) {
            $query .= " LIMIT :limit";
            if ($offset !== null) {
                $query .= " OFFSET :offset";
            }
        }
        
        $stmt = $this->conn->prepare($query);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        if ($limit !== null) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            if ($offset !== null) {
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
        }
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Đếm tổng số sản phẩm
    public function getCount() {
        $query = "SELECT COUNT(*) FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Đếm tổng số sản phẩm với bộ lọc
    public function getCountWithFilters($filters = []) {
        $query = "SELECT COUNT(*) 
                  FROM " . $this->table_name . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  WHERE 1=1";
        
        $params = [];
        
        if (!empty($filters['category_slug'])) {
            $query .= " AND c.slug = :category_slug";
            $params[':category_slug'] = $filters['category_slug'];
        }
        
        if (!empty($filters['style'])) {
            $query .= " AND p.style = :style";
            $params[':style'] = $filters['style'];
        }
        
        if (!empty($filters['type'])) {
            $query .= " AND p.product_type = :type";
            $params[':type'] = $filters['type'];
        }
        
        if (!empty($filters['ring_style'])) {
            $query .= " AND p.ring_style = :ring_style";
            $params[':ring_style'] = $filters['ring_style'];
        }
        
        if (!empty($filters['border_type'])) {
            $query .= " AND p.border_type = :border_type";
            $params[':border_type'] = $filters['border_type'];
        }
        
        if (!empty($filters['material'])) {
            $query .= " AND p.material = :material";
            $params[':material'] = $filters['material'];
        }
        
        if (!empty($filters['color'])) {
            $query .= " AND p.color = :color";
            $params[':color'] = $filters['color'];
        }
        
        if (!empty($filters['stone_type'])) {
            $query .= " AND p.stone_type = :stone_type";
            $params[':stone_type'] = $filters['stone_type'];
        }
        
        if (!empty($filters['collection'])) {
            $query .= " AND p.collection = :collection";
            $params[':collection'] = $filters['collection'];
        }
        
        if (!empty($filters['ring_type'])) {
            $query .= " AND p.ring_type = :ring_type";
            $params[':ring_type'] = $filters['ring_type'];
        }
        
        if (!empty($filters['is_featured'])) {
            $query .= " AND p.is_featured = :is_featured";
            $params[':is_featured'] = $filters['is_featured'];
        }
        
        $stmt = $this->conn->prepare($query);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        $stmt->execute();
        
        return $stmt->fetchColumn();
    }
}
