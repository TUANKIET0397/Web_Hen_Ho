<?php
include_once "./assets/php/config.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Kết nối cơ sở dữ liệu
$link = @mysqli_connect("localhost", "root", "", "dating_app") or die("Không thể kết nối cơ sở dữ liệu");

// Thiết lập header để trả về JSON response
header('Content-Type: application/json');
$response = ['success' => false, 'message' => '', 'avatar_path' => ''];

// Kiểm tra nếu có file được upload
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $userID = $_SESSION['user_id'];
    $uploadDir = './uploads/avatars/';
    $fileName = $userID . '_' . time() . '_' . basename($_FILES['avatar']['name']);
    $fileTmpPath = $_FILES['avatar']['tmp_name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $destination = $uploadDir . $fileName;

    // Kiểm tra định dạng file
    if (in_array($fileExtension, $allowedExtensions)) {
        // Tạo thư mục nếu chưa tồn tại
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($fileTmpPath, $destination)) {
            // Cập nhật đường dẫn ảnh vào cơ sở dữ liệu
            $avatarPath = mysqli_real_escape_string($link, $destination);
            $sql = "UPDATE userinformation SET Avt = '$avatarPath' WHERE ID = $userID";
            
            if (mysqli_query($link, $sql)) {
                $response['success'] = true;
                $response['message'] = "Avatar đã được cập nhật thành công!";
                $response['avatar_path'] = $avatarPath;
            } else {
                $response['message'] = "Lỗi cập nhật cơ sở dữ liệu: " . mysqli_error($link);
            }
        } else {
            $response['message'] = "Không thể di chuyển file đã upload.";
        }
    } else {
        $response['message'] = "Định dạng file không hợp lệ. Chỉ chấp nhận JPG, JPEG, PNG và GIF.";
    }
} else {
    $errorCode = isset($_FILES['avatar']) ? $_FILES['avatar']['error'] : 'No file';
    $response['message'] = "Không có file hoặc có lỗi xảy ra. Error code: " . $errorCode;
}

// Trả về kết quả dưới dạng JSON
echo json_encode($response);
exit;
?>