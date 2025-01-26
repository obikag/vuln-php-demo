<?php
session_start();
require 'scripts/functions.php';

// Check if user is logged in
if (!isLoggedIn() && !isAdmin()) {
    redirect('login.php');
}

include 'includes/header.php';
include 'includes/nav.php';

// Include database connection (SQLite)
$db = new SQLite3('database/acme.db');

?>

<div class="container mt-5">
    <?php
    // Check if a product ID is provided in the URL
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id']; // Directly using input without validation or sanitization

        // SQL Query directly incorporating the user-provided input
        $query = "SELECT * FROM products WHERE id = $product_id";
        $result = $db->query($query); // Vulnerable query execution
        $product = $result->fetchArray(SQLITE3_ASSOC);

        if ($product) {
            // Display product details
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<img src="' . $product['image_path'] . '" class="card-img-top w-50" alt="Product Image">';
            echo '<h3 class="card-title">' . htmlspecialchars($product['name']) . '</h3>';
            echo '<p class="card-text">' . htmlspecialchars($product['description']) . '</p>';
            echo '<p class="card-text"><strong>Category:</strong> ' . htmlspecialchars($product['category']) . '</p>';
            echo '<p class="card-text"><strong>Price:</strong> $' . htmlspecialchars($product['price']) . '</p>';
            echo '<a href="products.php" class="btn btn-primary">Back to Products</a>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger">Product not found.</div>';
        }
    } else {
        // Fetch all products
        $query = "SELECT * FROM products";
        $result = $db->query($query);

        // Check if products exist
        if ($result) {
            echo '<div class="mt-5 text-center">';
            echo '<h1>Our Products</h1>';
            echo '<p class="lead">Premium joint fittings fashioned for quality work.</p>';
            echo '</div>';
            echo '<div class="row">';

            while ($product = $result->fetchArray(SQLITE3_ASSOC)) {
                echo '<div class="col-md-4">';
                echo '<div class="card mb-4">';
                echo '<div class="card-body">';
                echo '<img src="' . $product['image_path'] . '" class="card-img-top img-fluid" alt="Product Image">';
                echo '<h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>';
                echo '<p class="card-text"><strong>Category:</strong> ' . htmlspecialchars($product['category']) . '</p>';
                echo '<p class="card-text"><strong>Price:</strong> $' . htmlspecialchars($product['price']) . '</p>';
                echo '<a href="products.php?product_id=' . htmlspecialchars($product['id']) . '" class="btn btn-primary">View Details</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            echo '</div>';
        } else {
            echo '<div class="alert alert-info">No products available.</div>';
        }
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
