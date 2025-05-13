<?php
session_start();
include_once "config.php";

// Đảm bảo người dùng đã đăng nhập (có session user_id)
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $update_user = mysqli_query($conn, "UPDATE userinformation SET IsActive = 0 WHERE ID = {$user_id}");
    $update_account = mysqli_query($conn, "UPDATE account SET IsActive = 0 WHERE UserID = {$user_id}");

    // Kiểm tra xem cập nhật có thành công không
    if ($update_user && $update_account) {
        // Xóa toàn bộ session
        session_unset();
        session_destroy(); 
        header("Location: ../../index.php"); 
        exit;
    } else {
        echo "Lỗi khi cập nhật trạng thái: " . mysqli_error($conn);
        exit;
    }
} else {
    header("Location: ../../index.php"); 
    exit;
}
?>