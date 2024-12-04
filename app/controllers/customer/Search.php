<?php

class Search extends Controller
{
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = array();
            $search = trim($_POST['search']); // Get the search term from the form

            if (!empty($search)) {
                $data['ptitle'] = '%' . $search . '%'; // Use wildcards for partial matching

                $db = Database::getInstance();
                $productsPerPage = isset($_GET['show']) ? $_GET['show'] : 10;  // Products per page
                $page = isset($_GET['page']) ? $_GET['page'] : 1;  // Current page

                // Calculate the OFFSET (starting position for the current page)
                $offset = ($page - 1) * $productsPerPage;

                // Query to get products matching the search term
                $sql = "SELECT * FROM products WHERE LOWER(ptitle) LIKE LOWER(:ptitle) LIMIT $productsPerPage OFFSET $offset";
                $result = $db->read($sql, $data);
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
                $totalProducts = $db->read("SELECT COUNT(*) AS total FROM products WHERE LOWER(ptitle) LIKE LOWER(:ptitle)", $data)[0]->total;
                $data['categories'] = $categories;
                $totalPages = ceil($totalProducts / $productsPerPage);

                // Pass data to the view
                $data['categories'] = $categories;
                $data['totalPages'] = $totalPages;
                $data['currentPage'] = $page;
                $data['productsPerPage'] = $productsPerPage;
                $data['rows'] = $result ? $result : []; // If no results, assign an empty array
            } else {
                $data['rows'] = []; // No search term, return empty results
            }

            // After processing, redirect to the 'allproduct' controller
            // We'll preserve search terms, pagination, and any other relevant query parameters
            $urlParams = [
                'search' => $search,
                'show' => $_GET['show'] ?? 10,
                'page' => $_GET['page'] ?? 1,
                'categories' => $_GET['categories'] ?? '',
                'price_min' => $_GET['price_min'] ?? '',
                'price_max' => $_GET['price_max'] ?? ''
            ];

            // Clean empty params
            foreach ($urlParams as $key => $value) {
                if (empty($value)) {
                    unset($urlParams[$key]);
                }
            }

            // Build the URL to redirect to 'allproduct' controller
            $url = ROOT . 'allproduct?' . http_build_query($urlParams);
            header("Location: $url"); // Redirect to the allproduct controller
            exit();
        } else {
            // If not POST request, show an empty list
            $data = ['rows' => []];
            $this->view("/customer/all_product", $data);
        }
    }
}
