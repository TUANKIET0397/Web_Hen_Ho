<?php 
    session_start();
    include_once "config.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM account WHERE Email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            if(password_verify($password, $row['PasswordHash'])) {
                $status = 1;
                $sql2 = mysqli_query($conn, "UPDATE account SET IsActive = '{$status}' WHERE UserID = {$row['UserID']}");
                if($sql2){
                    $_SESSION['user_id'] = $row['UserID'];
                    echo "success";
                }else{
                    echo "Lỗi SQL: " . mysqli_error($conn);
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "Vui lòng nhập hết dữ liệu!";
    }
?>