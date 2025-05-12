<?php 
    session_start();
     include_once "config.php";
     $username = mysqli_real_escape_string($conn, $_POST['username']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = mysqli_real_escape_string($conn, $_POST['pass']);
     $phone = mysqli_real_escape_string($conn, $_POST['telphone']);
     $birthdate = mysqli_real_escape_string($conn, $_POST['birthday']);
     $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $confirmPass = mysqli_real_escape_string($conn, $_POST['confirmPass']);
    if ($password !== $confirmPass) {
    echo "Mật khẩu không khớp!";
    exit;
    }

    
    if (!empty($username) && !empty($email) && !empty($password) && !empty($birthdate) && !empty($phone) && !empty($gender)){
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT * FROM userinformation WHERE Email = '{$email}' or PhoneNumber = '{$phone}'");
                if (mysqli_num_rows($sql) > 0) {
                    echo "$email or $phone already exists!";
                    exit;
                }elseif ($password !== $confirmPass) {
                    echo "Mật khẩu không khớp!";
                    exit;
                } else {
                    $ran_id = rand(time(), 100000000);
                    $status = 1;
                    $encrypt_pass = password_hash($password, PASSWORD_DEFAULT);

                    $insert_query = mysqli_query($conn, "INSERT INTO userinformation(UserName, 	Email, PhoneNumber, BirthDate, Gender, IsActive) 
                                VALUES ('{$username}', '{$email}', '{$phone}', '{$birthdate}', '{$gender}', {$status})");
                         if ($insert_query) {
                            // Lấy ID vừa thêm vào
                            $last_id = mysqli_insert_id($conn);

                            // Kiểm tra xem có tồn tại dữ liệu không
                            $select_sql2 = mysqli_query($conn, "SELECT * FROM userinformation WHERE id = {$last_id}");
                                if (mysqli_num_rows($select_sql2) > 0) {
                                $result = mysqli_fetch_assoc($select_sql2);
                                $_SESSION['user_id'] = $result['ID'];
                                    
                                    $insert_account = mysqli_query($conn, "INSERT INTO account (UserID, Email, PasswordHash, IsActive) 
                                                   VALUES ({$last_id}, '{$email}', '{$encrypt_pass}', {$status})");
                                    if ($insert_account) {
                                        echo "success";
                                        exit;
                                    } else {
                                        echo "Lỗi khi thêm vào bảng `account`: " . mysqli_error($conn);
                                        exit;
                                    }

                                } else {
                                    echo "Lỗi! Không tìm thấy dữ liệu vừa thêm.";
                                    exit;
                                    }
                            }else{
                                echo "Something went wrong. Please try again!";
                                exit;
                                }
                        }
                } else {
                    echo "$email is not a valid email!";
                    exit;
                        } 
        } else {
            echo "Vui lòng nhập dữ liệu cho phù hợp!";
        }
?>