<?php 
session_start();
include 'includes/header.php';
?> 

<?php 
$db = new SQLite3("database/acme.db");
$stmt = $db->prepare("SELECT COUNT(*) as num_users FROM users WHERE role = 'user'");
$result = $stmt->execute();
$user_cnt = $result->fetchArray();
$stmt = $db->prepare("SELECT COUNT(*) as num_users FROM users WHERE role = 'admin'");
$result = $stmt->execute();
$admin_cnt = $result->fetchArray();
?>

<h1>Secret Testing Page</h1>
<p>There are currently <?php echo $user_cnt['num_users']; ?> users enrolled in this application</p>
<p>There are currently <?php echo $admin_cnt['num_users']; ?> admins</p>

<!-- <a href="admin.php">Goto Admin Page</a> -->

<?php include 'includes/footer.php'; ?>