<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: loginADMIN.php");
    exit();
}
$username = $_SESSION["username"];

// Database connection
$host = 'localhost';
$database = 'db_nt3102';
$db_username = 'root';
$password = '';

$connection = new mysqli($host, $db_username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>

<!-- Rest of your dashboard HTML and CSS --> 