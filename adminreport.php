<?php 
  include_once "./assets/php/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Report</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- Admin report css -->
    <link rel="stylesheet" href="./assets/css/adminreport.css">
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
                    <div class="bin__thirdcontent">Report Date</div>
                    <div class="bin__fourthcontent">Status</div>
                </div>
                <?php 

                        $rp_count = "select * from userreport";
                        $kq_rp_count = mysqli_query($conn,$rp_count);
                        $listrp_count = [];
                        while($sub_rp_count = mysqli_fetch_array($kq_rp_count)) {
                            $listrp_count[] = $sub_rp_count;
                        }

                        // Follow
                        $ad_us="select ID,UserName,isActive,Avt from userinformation";
                        $ad_fl="select * from followers";
                        $kq_ad_us = mysqli_query($conn,$ad_us);
                        $kq_ad_fl = mysqli_query($conn,$ad_fl);

                        $listfollowers = [];
                        while($sub_fl = mysqli_fetch_array($kq_ad_fl)) {
                            $listfollowers[] = $sub_fl;
                        }
                        // Report
                        $us_rpt = 
                        "
                            select distinct userinformation.UserName, userinformation.ID, userinformation.BirthDate
                            from userreport
                            inner join userinformation ON userreport.ReportedID = userinformation.id
                        ";

                        $rp_content = 
                        "
                            select 
                            reporter.UserName as ReporterName,
                            reported.UserName as ReportedName,
                            userreport.ContentReport,
                            userreport.ReportedID
                        from userreport
                        inner join userinformation as reported ON userreport.ReportedID = reported.ID
                        inner join userinformation as reporter ON userreport.ReporterID = reporter.ID
                        ";
                        $ad_rp = 
                        "
                            select userreport.ReportedID,
                            case 
                                when count(*) >= 2 then max(userreport.ReportDate)  
                                else min(userreport.ReportDate)
                            end as LatestReportDate
                            from userreport
                            group by userreport.ReportedID
                        ";
                        $kq_ad_rp = mysqli_query($conn,$ad_rp);
                        $listreports = [];
                        while($sub_rp = mysqli_fetch_array($kq_ad_rp)) {
                            $listreports[] = $sub_rp;
                        }
                        $kq_us_rpt = mysqli_query($conn,$us_rpt);
                        $kq_rp_content = mysqli_query($conn,$rp_content); 
                        $listreport_content = [];
                        while($sub_rp_content = mysqli_fetch_array($kq_rp_content)) {
                            $listreport_content[] = $sub_rp_content;
                        }
                        

                ?>
                <div class="bin__content-box">
                    <?php 
                    while($q = mysqli_fetch_array($kq_us_rpt)) {?>
                    <div class="bin__content-body">
                        <div class="content-body__user">
                            <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);">
                            </div>
                             
                                <div class="content-body__user-N-BD">
                                    <div class="content-body__user-Name"> <?php echo $q["UserName"] ?></div>
                                    <div class="content-body__user-BirthDate"><?php echo $q["BirthDate"] ?></div>
                                </div>
                        </div>
                        <div class="content-body__followers">
                            <div class="followers-num">
                                <?php
                                    $fl_count = 0;                                               
                                        foreach($listreport_content as $count) {
                                            if ($count["ReportedID"] == $q["ID"]) {
                                                $fl_count += 1;
                                            } 
                                        }
                                    echo $fl_count;
                                ?>
                            </div>
                            <div class="followers-text">Followers</div>
                        </div>
                        <div class="content-body__user-report">
                            <div class="user-report"> 
                            <?php 
                            foreach($listreports as $rp) {
                                if ($rp["ReportedID"] == $q["ID"]) {
                                     echo $rp["LatestReportDate"];
                                } 
                            }
                            ?> 
                            </div>
                        </div>
                        


                        <div class="content-body__status">
                            <div class="report-button btn-icon">
                                <?php
                                    $rp_num = 0;                                               
                                        foreach($listrp_count as $num) {
                                            if ($num["ReportedID"] == $q["ID"]) {
                                                $rp_num += 1;
                                            } 
                                        }
                                    echo $rp_num;
                                ?>
                                <div class="report-list">
                                    <div class="report__list--roll"> 
                                        <?php 
                                        foreach($listreport_content as $rp_content2) {
                                            if($rp_content2["ReportedID"] == $q["ID"]) {
                                        ?>
                                            <div class="report-list-item">
                                                <div class="usrp"> 
                                                    <?php echo $rp_content2["ReporterName"]; ?>
                                                </div>
                                                <div class="rp-content">
                                                    <?php echo $rp_content2["ContentReport"]; ?>
                                                </div>
                                            </div>
                                        <?php 
                                            } // end if
                                        } // end foreach
                                        ?>
                                    </div>
                                </div>
                                    
                            </div>

                            <a href="adminchatuser.php" class="chat-button btn-icon"
                                style="background-color: #00FF4F; background-image: url(./assets/img/chat-button.png);"></a>
                            <a href="user-profile-2-admin-page.php" class="profile-button btn-icon"
                                style="background-color: blue; background-image: url(./assets/img/user_white.png)"></a>
                            <form action="adminbin.php" method="POST">
                                <input type="hidden" name="user_deleted" value="<?php echo htmlspecialchars($q['ID']);?>">
                                <input type="submit" value="" class="bin-button btn-icon"
                                    style="background-color: red; background-image: url(./assets/img/bin.png);">
                            </form>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>