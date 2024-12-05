<?php

class Search extends Controller
{
    public function index()
    {
        $db = Database::getInstance();
        
        // Get search keyword from POST or GET
        $search = isset($_POST['search']) ? trim($_POST['search']) : (isset($_GET['search']) ? trim($_GET['search']) : '');
        if (empty($search)) {
            // If no search term, redirect to an empty product page or handle accordingly
            $this->view("/customer/all_product", ['rows' => []]);
            return;
        }

        // Get URL parameters with default values
        $productsPerPage = isset($_GET['show']) ? (int)$_GET['show'] : 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
        $sortBy = ($sortOrder === 'newest') ? 'DESC' : 'ASC';
        $filterCategories = isset($_GET['categories']) ? explode(',', $_GET['categories']) : [];
        
        $priceMin = isset($_GET['price_min']) ? (int)$_GET['price_min'] : 0;
        $priceMax = isset($_GET['price_max']) ? (int)$_GET['price_max'] : PHP_INT_MAX;

        // Calculate OFFSET for pagination
        $offset = ($page - 1) * $productsPerPage;

        // Build the main query with search and filters
        $query = "SELECT * FROM products WHERE LOWER(ptitle) LIKE LOWER(?)";
        $params = ['%' . $search . '%'];

        if (!empty($filterCategories)) {
            $placeholders = implode(',', array_fill(0, count($filterCategories), '?'));
            $query .= " AND pkind IN ($placeholders)";
            $params = array_merge($params, $filterCategories);
        }
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

        // Query for total number of matching products
        $totalProductsQuery = "SELECT COUNT(*) AS total FROM products WHERE LOWER(ptitle) LIKE LOWER(?)";
        $totalParams = ['%' . $search . '%'];

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

        // Pass data to the view
        $data['rows'] = $rows;
        $data['categories'] = $categories;
        $data['totalPages'] = $totalPages;
        $data['currentPage'] = $page;
        $data['productsPerPage'] = $productsPerPage;
        $data['sort'] = $sortOrder;
        $data['searchQuery'] = $search;
        $data['priceMin'] = $priceMin;
        $data['priceMax'] = $priceMax;

        $this->view("/customer/all_product", $data);
    }
}
