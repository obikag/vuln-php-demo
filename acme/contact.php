<?php
session_start();
include 'includes/header.php';
include 'includes/nav.php'; 
?>

<div class="mt-5">
    <h1>Contact Us</h1>
    <form action="" method="POST" class="row g-3">
        <div class="mt-3 col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mt-3 col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mt-3 col-12">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <div class="mt-3 col-12">
            <button type="submit" class="btn btn-primary">Send Message</button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
