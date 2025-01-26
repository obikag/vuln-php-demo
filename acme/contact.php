<?php
session_start();
require 'scripts/functions.php';
include 'includes/header.php';
include 'includes/nav.php'; 
?>

<div class="container mt-5">
    <h2>Contact Us</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate form inputs
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);

        if (!empty($name) && !empty($email) && !empty($message)) {
            // Save to database
            $db = new SQLite3('database/acme.db');
            $stmt = $db->prepare('INSERT INTO contact_submissions (name, email, message) VALUES (:name, :email, :message)');
            $stmt->bindValue(':name', $name, SQLITE3_TEXT);
            $stmt->bindValue(':email', $email, SQLITE3_TEXT);
            $stmt->bindValue(':message', $message, SQLITE3_TEXT);
            $stmt->execute();

            echo '<div class="alert alert-success">Thank you for your message! We will get back to you soon.</div>';
            $db->close();
        } else {
            echo '<div class="alert alert-danger">Please fill out all fields.</div>';
        }
    }
    ?>

    <form method="POST" action="contact.php">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
