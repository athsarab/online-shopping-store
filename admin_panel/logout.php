<?php
/**
 * Admin Logout
 * Destroys the session and redirects to the customer login page with a toast message.
 */
session_start();
session_unset();
session_destroy();

// Redirect to the shared login page with logout toast
header('Location: ../PHP/login.php?msg=' . urlencode('You have been logged out successfully.') . '&msgtype=info');
exit;
