<?php
require 'scripts/functions.php';

// Check if user is logged in
if (!isLoggedIn()) {
    redirect('login.php');
}

include 'includes/header.php';
include 'includes/nav.php';
?>

<h1>Our Products</h1>
<ul>
    <li>Pipe Fittings</li>
    <li>Hydraulic Joints</li>
    <li>Custom Solutions</li>
</ul>

<?php include 'includes/footer.php'; ?>
