<?php 
include_once "./assets/php/config.php";
session_start();
if (!isset($_SESSION['user_id'])) {
header("Location: login.php");
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
    <link rel="stylesheet" href="./assets/css/adminprofileuserlist.css">
</head>

<body>

    <?php 
        $ad_us="select ID,BirthDate,UserName,isActive,Avt from userinformation";
        $ad_fl="select * from followers";
        $kq_ad_us = mysqli_query($conn,$ad_us);
        $kq_ad_fl = mysqli_query($conn,$ad_fl);

        $listfollowers = [];
        while($row = mysqli_fetch_array($kq_ad_fl)) {
            $listfollowers[] = $row;
        }
    ?>
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
            
                <div class="bin__content-box">
                    <?php 
                     while($a = mysqli_fetch_array($kq_ad_us))
                    { ?>
                        <div class="bin__content-body">
                            <div class="content-body__user">
                                <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);">
                                </div>
                                <div class="content-body__user-N-BD">
                                    <div class="content-body__user-Name"><?php echo $a["UserName"] ?></div>
                                    <div class="content-body__user-BirthDate"> <?php echo $a["BirthDate"] ?></div>
                                </div>
                            </div>
                            <div class="content-body__followers">
                                <div class="followers-num">
                                    <?php
                                        $fl_count = 0;                                               
                                        foreach($listfollowers as $b) {
                                            if ($b["FollowerID"] == $a["ID"] ) {
                                                $fl_count += 1;
                                            } 
                                        }
                                    echo $fl_count;
                                    ?>
                                </div>
                                <div class="followers-text">Followers</div>
                            </div>
                            <div class="content-body__deletedate">
                                <div class="DeleteDate"> <?php 
                                    if($a["isActive"] == 1)
                                    {
                                        echo "Online";
                                    }
                                    else 
                                    {
                                        echo "Offline";
                                    }
                                ?></div>
                            </div>
                            <div class="content-body__restore">
                                <a href="user-profile-2-admin-page.php" class="profile-button btn-icon"
                                style="display: block; margin-right: 48px; background-color: blue; background-image: url(./assets/img/user_white.png)"></a>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>