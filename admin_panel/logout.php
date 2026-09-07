<?php
/**
 * Admin Logout
 * Destroys the session and redirects to the customer login page.
 */
session_start();
session_unset();
session_destroy();

// Redirect to the shared login page
header('Location: ../PHP/login.php');
exit;

