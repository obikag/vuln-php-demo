<?php
require 'scripts/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Connect to SQLite database
    $db = new SQLite3('database/acme.db');

    // Query the database for the user
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username AND role = 'user'");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['user'] = $username;
        redirect('products.php');
    } else if (count($user) > 0) {
        // User exists but password is incorrect
        $error = "Invalid Password!";
    } else {
        //User does not exists
        $error = "Invalid login credentials!";
    }
}

include 'includes/header.php';
?>

<h1>User Login</h1>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <button type="submit">Login</button>
</form>

<?php include 'includes/footer.php'; ?>
