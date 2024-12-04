<?php

class Allproduct extends Controller
{
    public function index()
    {
        $db = Database::getInstance();
    
        // Get URL parameters with default values
        $productsPerPage = isset($_GET['show']) ? $_GET['show'] : 10;  // Number of products per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;  // Current page
        $sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
        $sortBy = ($sortOrder == 'newest') ? 'DESC' : 'ASC';
        $filterCategories = isset($_GET['categories']) ? explode(',', $_GET['categories']) : [];
    
        // Calculate OFFSET
        $offset = ($page - 1) * $productsPerPage;

        // Build query with prepared statements
        $query = "SELECT * FROM products WHERE 1=1";
        $params = [];

        if (!empty($filterCategories)) {
            $placeholders = implode(',', array_fill(0, count($filterCategories), '?'));
            $query .= " AND pkind IN ($placeholders)";
            $params = array_merge($params, $filterCategories);
        }

        $priceMin = isset($_GET['price_min']) ? $_GET['price_min'] : 0;
        $priceMax = isset($_GET['price_max']) ? $_GET['price_max'] : PHP_INT_MAX;
        if ($priceMin) {
            $query .= " AND pprice >= ?";
            $params[] = $priceMin;
        }
        if ($priceMax < PHP_INT_MAX) {
            $query .= " AND pprice <= ?";
            $params[] = $priceMax;
        }

        $query .= " ORDER BY create_at $sortBy LIMIT $productsPerPage OFFSET $offset";

        $rows = $db->read($query, $params);

        // Total products query
        $totalProductsQuery = "SELECT COUNT(*) AS total FROM products WHERE 1=1";
        $totalParams = [];

        if (!empty($filterCategories)) {
            $totalProductsQuery .= " AND pkind IN ($placeholders)";
            $totalParams = array_merge($totalParams, $filterCategories);
        }
        if ($priceMin) {
            $totalProductsQuery .= " AND pprice >= ?";
            $totalParams[] = $priceMin;
        }
        if ($priceMax < PHP_INT_MAX) {
            $totalProductsQuery .= " AND pprice <= ?";
            $totalParams[] = $priceMax;
        }

        $totalProducts = $db->read($totalProductsQuery, $totalParams)[0]->total;

        // Categories query
        $categories = $db->read("
            SELECT 
                c.id AS id,
                c.name AS name,
                COUNT(p.id) AS total
            FROM 
                categories c
            LEFT JOIN 
                products p 
            ON 
                c.name = p.pkind
            GROUP BY 
                c.name, c.id;
        ");

        // Calculate total pages
        $totalPages = ceil($totalProducts / $productsPerPage);

        // Pass data to view
        $data['rows'] = $rows;
        $data['categories'] = $categories;
        $data['totalPages'] = $totalPages;
        $data['currentPage'] = $page;
        $data['productsPerPage'] = $productsPerPage;

        $this->view("/customer/all_product", $data);
    }
}