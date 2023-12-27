<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Remove all cookies by setting their expiration to the past
setcookie('username', '', time() - 3600, '/');
setcookie('password', '', time() - 3600, '/');

// Redirect the user to the login page or any other appropriate page
header("Location: index.php");
exit();
