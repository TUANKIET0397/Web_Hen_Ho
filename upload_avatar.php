<?php
// Kết nối cơ sở dữ liệu
$link = @mysqli_connect("localhost", "root", "", "dating_app") or die("Không thể kết nối cơ sở dữ liệu");

// Kiểm tra nếu có file được upload
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $userID = 1; // ID người dùng (cần thay đổi theo logic của bạn)
    $uploadDir = './uploads/avatars/'; // Thư mục lưu ảnh
    $fileName = basename($_FILES['avatar']['name']);
    $fileTmpPath = $_FILES['avatar']['tmp_name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Kiểm tra định dạng file
    if (in_array($fileExtension, $allowedExtensions)) {
        // Tạo tên file duy nhất
       $newFileName = 'avatar_' . $userID . '_' . time() . '.' . $fileExtension;
$destination = $uploadDir . $newFileName;

        // Di chuyển file vào thư mục đích
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($fileTmpPath, $destination)) {
            // Cập nhật đường dẫn ảnh vào cơ sở dữ liệu
            $avatarPath = $destination;
            $sql = "UPDATE userinformation SET Avt = '$avatarPath' WHERE ID = $userID";
            if (mysqli_query($link, $sql)) {
                echo "Avatar uploaded and updated successfully!";
            } else {
                echo "Failed to update avatar in database.";
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
    }
} else {
    echo "No file uploaded or an error occurred.";
}
?>