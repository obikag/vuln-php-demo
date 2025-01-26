<?php
session_start();
require 'scripts/functions.php';

// Check if admin is logged in
if (!isAdmin()) {
    redirect('admin.php');
}

include 'includes/header.php';
include 'includes/nav.php';

// Connect to SQLite3 database
$db = new SQLite3('database/acme.db');
?>

<div class="container mt-5">
    <h2>Admin Dashboard</h2>

    <div class="mt-4">
        <a href="admin-dashboard.php?cmd=ls images/products | wc -l" class="btn btn-primary">Show Number of Products</a>
    </div>

    <?php
    // Check if the button was clicked
    if (isset($_GET['cmd'])) {
        echo '<div class="mt-4">';
        echo '<p>There are ';
        executeSystemCommand();
        echo ' products on the Products Page.</p>';
        echo '</div>';
    }

    // Handle deletion of contact submissions
    if (isset($_POST['delete_contact_id'])) {
        $delete_contact_id = intval($_POST['delete_contact_id']);
        $delete_query = "DELETE FROM contact_submissions WHERE id = $delete_contact_id";
        $db->exec($delete_query);
        echo '<div class="alert alert-success">Contact submission deleted successfully.</div>';
    }

    // Fetch all contact submissions
    $contact_query = "SELECT * FROM contact_submissions";
    $contact_result = $db->query($contact_query);

    // Display contact submissions
    echo '<div class="mt-4">';
    echo '<h4>Contact Submissions</h4>';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>Message</th>';
    echo '<th>Submitted At</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($contact = $contact_result->fetchArray(SQLITE3_ASSOC)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($contact['id']) . '</td>';
        echo '<td>' . $contact['name'] . '</td>';
        echo '<td>' . htmlspecialchars($contact['email']) . '</td>';
        echo '<td>' . htmlspecialchars($contact['message']) . '</td>';
        echo '<td>' . htmlspecialchars($contact['submitted_at']) . '</td>';
        echo '<td>';
        echo '<form method="POST" style="display:inline;">';
        echo '<input type="hidden" name="delete_contact_id" value="' . htmlspecialchars($contact['id']) . '">';
        echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    // Close the database connection
    $db->close();
    ?>
</div>

<?php include 'includes/footer.php'; ?>
