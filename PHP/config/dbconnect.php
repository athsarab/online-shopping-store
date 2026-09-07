<?php
/**
 * Customer-side database connection (same 'sample' database as admin panel)
 */
$server   = 'localhost';
$dbuser   = 'root';
$dbpass   = '';
$db       = 'sample';

$conn = new mysqli($server, $dbuser, $dbpass, $db);
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

