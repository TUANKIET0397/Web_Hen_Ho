<?php
include_once "./assets/php/config.php";

// Lấy dữ liệu từ yêu cầu POST
$likedUserId = $_POST['likedUserId'] ?? null;
$userId = 1; // ID người dùng hiện tại (cần thay đổi theo logic của bạn)

// Kiểm tra dữ liệu đầu vào
if (!$likedUserId || $userId == $likedUserId) {
    echo json_encode(['success' => false, 'message' => 'Invalid user IDs']);
    exit;
}

// Thêm bản ghi vào bảng `followers`
$queryInsert = "INSERT INTO followers (FollowerID, FollowingID) VALUES ($userId, $likedUserId)";
if (mysqli_query($conn, $queryInsert)) {
    echo json_encode(['success' => true, 'message' => 'Followed successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($conn)]);
}
?>