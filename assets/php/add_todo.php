<?php
include_once "config.php"; // Kết nối CSDL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['todolist'])) {
        $remind = mysqli_real_escape_string($conn, $_POST['todolist']);

        $insert = mysqli_query($conn, "INSERT INTO todolist(Remind) VALUES ('$remind')");

        if ($insert) {
            // Quay lại trang chính sau khi thêm
            header("Location: ../../adminpage.php");
            exit();
        } else {
            echo "Error when add data: " . mysqli_error($conn);
        }
    } else {
        echo "Write something.";
    }
}
?>
