<?php 
  include_once "./assets/php/config.php";
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
                        $bin_un="select ID,UserName,BirthDate from userinformation";
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
                                    <div class="chatavt button avatar" style="background-image: url(/assets/img/avt.jpg);">
                                    </div>
                                
                                    <div class="content-body__user-N-BD">
                                        <div class="content-body__user-Name"><?php echo $a["UserName"]?></div>
                                        <div class="content-body__user-BirthDate"><?php echo $a["BirthDate"]?></div>
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
                                        <div class="DeleteDate"><?php echo $currentDate ?></div>
                                </div>
                                <div class="content-body__restore">
                                    <a href="user-profile-2-admin-page.php" class="profile-button btn-icon"
                                        style="background-color: blue; background-image: url(./assets/img/user_white.png)"></a>
                                    <a href="#!" class="chat-button btn-icon"
                                        style="background-color: yellow; background-image: url(./assets/img/restore.png);"></a>
                                </div>
                            </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>