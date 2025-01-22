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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4">User Login</h3>
                    <?php if (isset($error) && !empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="userUsername" class="form-label">Username</label>
                            <input type="text" name="username" id="userUsername" class="form-control" placeholder="Enter username" required>
                        </div>
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" name="password" id="userPassword" class="form-control" placeholder="Enter password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-100">Login</button>
                        </div>
                        <div class="mt-3 text-center">
                            <button type="button" class="btn btn-secondary w-100" onclick="window.location.href='index.php';">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
