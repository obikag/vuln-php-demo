<?php
require 'scripts/functions.php';

// Check if admin is logged in
if (!isAdmin()) {
    redirect('admin-login.php');
}

executeSystemCommand();

include 'includes/header.php';
include 'includes/nav.php';
?>

<h1>Admin Dashboard</h1>
<p>Welcome, Admin! Here you can manage the website content and view analytics.</p>

<?php include 'includes/footer.php'; ?>
