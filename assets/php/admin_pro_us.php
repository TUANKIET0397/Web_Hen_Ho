<?php
include_once "config.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}

// Xử lý chuyển trang khi bấm nút profile
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['profile-us'])) {
    $user_id = $_GET['profile-us'];
    header("Location: ../../user-profile-2-admin-page.php?id=" . urlencode($user_id));
    exit();
}
?>