<?php
require_once('../config.php');

$sql = "SELECT * FROM users WHERE username = '{$_SESSION['username']}';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$user_role = $row['user_role'];

if(!isset($_SESSION['username']) || $user_role != 'administrator') {
    redirect('login.php');
}

if ($_SERVER['REQUEST_URI'] == '/prime-pizza/admin/') {
    include ('dashboard.php');
}