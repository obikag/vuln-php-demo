<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <?php if (isLoggedIn()): ?>
            <li><a href="products.php">Products</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php elseif (isAdmin()): ?>
            <li><a href="admin-dashboard.php">Admin Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">User Login</a></li>
        <?php endif; ?>
    </ul>
</nav>
