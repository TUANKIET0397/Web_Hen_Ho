<?php 
include_once "./assets/php/config.php";
session_start();
if (!isset($_SESSION['user_id'])) {
header("Location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_deleted'])) {
    $user_deleted = mysqli_real_escape_string($conn, $_POST['user_deleted']);

    // Kiểm tra user tồn tại trong bảng userinformation
    $sql = mysqli_query($conn, "SELECT * FROM userinformation WHERE ID = '{$user_deleted}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_id = $row["ID"];

        // Kiểm tra xem user đã có trong bảng bin chưa
        $check_bin = mysqli_query($conn, "SELECT * FROM bin WHERE UserID = '{$user_id}'");
        if (mysqli_num_rows($check_bin) == 0) {
            $user_name = mysqli_real_escape_string($conn, $row["UserName"]);
            $birth_date = mysqli_real_escape_string($conn, $row["BirthDate"]);
            $email = mysqli_real_escape_string($conn, $row["Email"]);
            $password_Hash = mysqli_real_escape_string($conn, $row["passwordHash"]);
            $phone_number = mysqli_real_escape_string($conn, $row["PhoneNumber"]);
            $age = mysqli_real_escape_string($conn, $row["Age"]);
            $gender = mysqli_real_escape_string($conn, $row["Gender"]);
            $insert_query = mysqli_query(
                $conn, 
                "INSERT INTO bin(UserID, UserName, BirthDate, Email, passwordHash, PhoneNumber) VALUES ('{$user_id}', '{$user_name}', '{$birth_date}', '{$email}', '{$password_Hash}', '{$phone_number}')"
            );
        }

        // Xóa bản ghi user từ bảng userinformation (không ảnh hưởng đến bảng bin)
        $delete_related = mysqli_query($conn, "DELETE FROM userreport WHERE ReportedID = '{$user_deleted}'");
        $delete_query = mysqli_query($conn, "DELETE FROM userinformation WHERE ID = '{$user_deleted}'");

        if ($delete_query) {
            echo "User deleted successfully, moved to bin.";
        } else {
            echo "Error deleting user.";
        }
    } else {
        echo "User not found.";
    }

    // Chuyển hướng về trang adminbin sau khi xử lý
    header("Location: adminbin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_restore'])) {
    $user_restore = mysqli_real_escape_string($conn, $_POST['user_restore']);

    // Kiểm tra user tồn tại trong bảng userinformation
    $sql2 = mysqli_query($conn, "SELECT * FROM Bin WHERE UserID = '{$user_restore}'");
    if (mysqli_num_rows($sql2) > 0) {
        $row2 = mysqli_fetch_assoc($sql2);
        $user_id2 = $row2["UserID"];

        // Kiểm tra xem user đã có trong bảng bin chưa
        $check_userinfo = mysqli_query($conn, "SELECT * FROM userinformation WHERE ID = '{$user_id2}'");
        if (mysqli_num_rows($check_userinfo) == 0) {
            $user_name2 = mysqli_real_escape_string($conn, $row2["UserName"]);
            $birth_date2 = mysqli_real_escape_string($conn, $row2["BirthDate"]);
            $email2 = mysqli_real_escape_string($conn, $row2["Email"]);
            $password_Hash2 = mysqli_real_escape_string($conn, $row2["PasswordHash"]);
            $phone_number2 = mysqli_real_escape_string($conn, $row2["PhoneNumber"]);
            $age2 = mysqli_real_escape_string($conn, $row["Age"]);
            $gender2 = mysqli_real_escape_string($conn, $row["Gender"]);
            $insert_query = mysqli_query(
                $conn, 
                "INSERT INTO userinformation (ID, UserName, BirthDate, Email, PhoneNumber, Age, Gender) VALUES ('{$user_id2}', '{$user_name2}', '{$birth_date2}', '{$email2}', '{$phone_number2}', '{$age}', '{$gender}')"
            );
            $insert_query2 = mysqli_query(
                $conn, 
                "INSERT INTO account (UserID, Email, PasswordHash) VALUES ('{$user_id2}', '{$email2}', '{$password_Hash2}')"
            );
        }

        // Xóa bản ghi user từ bảng bin
        $delete_query2 = mysqli_query($conn, "DELETE FROM bin WHERE UserID = '{$user_restore}'");

        if ($delete_query2) {
            echo "User restored successfully, moved to userinformation.";
        } else {
            echo "Error restoring user.";
        }
    } else {
        echo "User not found.";
    }

    // Chuyển hướng về trang adminbin sau khi xử lý
    header("Location: adminprofileuser.php");
    exit();
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Bin</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- AdminPage css -->
    <link rel="stylesheet" href="./assets/css/adminbin.css">
</head>

<body>
    <div class="container">
        <!-- wrap nav -->
        <aside class="aside">
            <!-- Logo -->
            <div class="logo">
                <img src="./assets/img/logo.svg" alt="Flirt Zone">
                <div class="logo-desc">
                    <img src="./assets/img/logo-desc1.svg" alt="Flirt Zone">
                    <img src="./assets/img/logo-desc2.svg" alt="Flirt Zone">
                </div>
            </div>

            <!-- Mangage -->
            <h2 class="title">Manage</h2>

            <!-- nav -->
            <nav class="nav">
                <div class="nav-item">
                    <div class="icon">
                        <img src="./assets/icons/taskAdmin1.svg" alt="Dash board">
                    </div>
                    <p><a class="task" style="text-decoration: none;" href="adminpage.php">Dash board</a></p>
                </div>

                <div class="nav-item">
                    <div class="icon">
                        <img src="./assets/icons/taskAdmin2.svg" alt="User profile">
                    </div>
                    <p><a class="task" style="text-decoration: none;" href="adminprofileuser.php">User
                            profile</a></p>
                </div>

                <div class="nav-item">
                    <div class="icon">
                        <img src="./assets/icons/taskAdmin3.svg" alt="Bin">
                    </div>
                    <p><a class="task" style="text-decoration: none;" href="adminbin.php">Bin</a></p>
                </div>
            </nav>
        </aside>

        <!-- wrap content -->
        <div class="wrap">
            <!-- Header -->
            <header class="header">
                <div class="title-intro">
                    <h1 class="title">Hey there!😘</h1>
                    <p class="desc">Here’s what happen your stored today</p>
                </div>
                <form class="bar-search">
                    <input type="text" size="31" placeholder="what are you looking for?" class="looking" id="word"
                        name="word">
                    <button>
                        <img src="./assets/icons/search.svg" alt="Search" class="icon-search">
                    </button>
                </form>
            </header>
            <div class="wrap-content">
                <div class="bin__content-head">
                    <div class="bin__firstcontent">UserName</div>
                    <div class="bin__secondcontent">Follow</div>
                    <div class="bin__thirdcontent">Delete Date</div>
                    <div class="bin__fourthcontent">Restore</div>
                </div>
                <div class="bin__content-box">
                    <?php 
                        $bin_un = "SELECT * FROM bin";
                        $bin_date ="select DATE(NOW()) AS currentDate";
                        $kq1 = mysqli_query($conn,$bin_un);
                        $kq2 = mysqli_query($conn,$bin_date);
                        
                        $currentDate = "";
                        if ($row = mysqli_fetch_assoc($kq2)) {
                            $currentDate = $row['currentDate'];
                        }

                        $ad_fl="select * from followers";
                        $kq_ad_fl = mysqli_query($conn,$ad_fl);

                        $listfollowers = [];
                        while($row = mysqli_fetch_array($kq_ad_fl)) {
                            $listfollowers[] = $row;
                        }
                    ?>
                    <?php 
                        while ($a = mysqli_fetch_array($kq1)) 
                        {
                            ?>
                            <div class="bin__content-body">
                                <div class="content-body__user">
                                    <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);">
                                    </div>
                                
                                    <div class="content-body__user-N-BD">
                                        <div class="content-body__user-Name"><?php echo $a["UserName"];?></div>
                                        <div class="content-body__user-BirthDate"><?php echo $a["BirthDate"];?></div>
                                     </div>
                                </div>
                                <div class="content-body__followers">
                                    <div class="followers-num">
                                        <?php
                                            $fl_count = 0;                                               
                                            foreach($listfollowers as $b) {
                                            if ($b["FollowerID"] == $a["UserID"] ) {
                                                $fl_count += 1;
                                            } 
                                        }
                                        echo $fl_count;
                                        ?>
                                    </div>
                                    <div class="followers-text">Followers</div>
                                </div>
                                <div class="content-body__deletedate">
                                        <div class="DeleteDate"><?php echo $currentDate ?></div>
                                </div>
                                <div class="content-body__restore">
                                    <a href="user-profile-2-admin-page.php" class="profile-button btn-icon"
                                        style="background-color: blue; background-image: url(./assets/img/user_white.png)"></a>
                                    <form action="adminbin.php" method="POST">
                                        <input type="hidden" name="user_restore" value="<?php echo htmlspecialchars($a['UserID']);?>">
                                        <input type="submit" value="" class="chat-button btn-icon"
                                            style="background-color: yellow; background-image: url(./assets/img/restore.png);">
                                    </form>
                                </div>
                            </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>