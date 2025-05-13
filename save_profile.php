<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

// Kết nối cơ sở dữ liệu
$link = mysqli_connect("localhost", "root", "", "dating_app") or die("Không thể kết nối cơ sở dữ liệu");

// Kiểm tra nếu form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_SESSION['user_id']; // ID người dùng hiện tại (cần thay đổi theo session)
    $uploadDir = 'uploads/'; // Thư mục lưu file
    // Kiểm tra nếu thư mục uploads không tồn tại thì tạo mới
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    // Nhận dữ liệu từ form
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $dob = mysqli_real_escape_string($link, $_POST['dob']);
    $location = mysqli_real_escape_string($link, $_POST['location']);
    $gender = mysqli_real_escape_string($link, $_POST['gender']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $story = mysqli_real_escape_string($link, $_POST['story']);

   // Xử lý các hình ảnh khác
for ($i = 1; $i <= 6; $i++) {
    $inputName = "image{$i}";
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
        $fileName = uniqid() . '_' . basename($_FILES[$inputName]['name']);
        $uploadFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $uploadFile)) {
            $imageURL = $uploadFile;

            // Lấy đường dẫn ảnh cũ từ cơ sở dữ liệu
            $sqlGetOldImage = "SELECT imgPath FROM images WHERE UserID = $userID AND ID = $i";
            $result = mysqli_query($link, $sqlGetOldImage);
            if ($result && mysqli_num_rows($result) > 0) {
                $oldImage = mysqli_fetch_assoc($result)['imgPath'];

                // Xóa file ảnh cũ khỏi thư mục nếu tồn tại
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }

                // Xóa ảnh cũ khỏi cơ sở dữ liệu
                $sqlDelete = "DELETE FROM images WHERE UserID = $userID AND ID = $i";
                mysqli_query($link, $sqlDelete);
            }

            // Lưu ảnh mới vào cơ sở dữ liệu
            $sqlImage = "INSERT INTO images (UserID, imgPath, ID, IsActive) VALUES ($userID, '$imageURL', $i, 1)";
            mysqli_query($link, $sqlImage);
        }
    }
}

    // Cập nhật thông tin người dùng
    $sql = "UPDATE userinformation 
            SET UserName = '$name', BirthDate = '$dob', UserAddress = '$location', Gender = '$gender', 
                Email = '$email', PhoneNumber = '$phone', bio = '$story'
            WHERE ID = $userID";
    mysqli_query($link, $sql);

    // Xử lý sở thích
    if (isset($_POST['hobby'])) {
        $hobbies = $_POST['hobby'];
        mysqli_query($link, "DELETE FROM userhobbby WHERE UserID = $userID");
        foreach ($hobbies as $hobby) {
            $hobbyID = mysqli_fetch_assoc(mysqli_query($link, "SELECT ID FROM hobbylist WHERE HobbyName = '$hobby'"))['ID'];
            mysqli_query($link, "INSERT INTO userhobbby (UserID, HobbyID) VALUES ($userID, $hobbyID)");
        }
    }

    // Xử lý tính cách
    if (isset($_POST['personally'])) {
        $personally = $_POST['personally'];
        mysqli_query($link, "DELETE FROM userpersonally WHERE UserID = $userID");
        foreach ($personally as $trait) {
            $personallyID = mysqli_fetch_assoc(mysqli_query($link, "SELECT ID FROM personallylist WHERE PersonallyName = '$trait'"))['ID'];
            mysqli_query($link, "INSERT INTO userpersonally (UserID, PersonallyID) VALUES ($userID, $personallyID)");
        }
    }

    // Xử lý trạng thái "Looking For"
    if (isset($_POST['looking-for'])) {
        $lookingFor = mysqli_real_escape_string($link, $_POST['looking-for']);
        $lookingID = mysqli_fetch_assoc(mysqli_query($link, "SELECT ID FROM looking WHERE LookingName = '$lookingFor'"))['ID'];
        mysqli_query($link, "DELETE FROM userlooking WHERE UserID = $userID");
        mysqli_query($link, "INSERT INTO userlooking (UserID, LookingID) VALUES ($userID, $lookingID)");
    }

    // Chuyển hướng sau khi lưu
    header("Location: profileuser.php");
    exit();
}
