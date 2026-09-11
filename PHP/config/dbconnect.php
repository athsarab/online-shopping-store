<?php
/**
 * Single database configuration for the storefront and admin panel.
 * Change these four values when deploying to a different host.
 */
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'sample';

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

$conn->set_charset('utf8mb4');

