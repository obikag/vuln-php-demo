<?php
require 'scripts/functions.php';

// Destroy session and redirect
session_start();
session_destroy();
redirect('index.php');
?>
