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
                    <div class="bin__thirdcontent">User Report</div>
                    <div class="bin__fourthcontent">Status</div>
                </div>
                <div class="bin__content-box">
                    <div class="bin__content-body">
                        <div class="content-body__user">
                            <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);">
                            </div>
                            <div class="content-body__user-N-BD">
                                <div class="content-body__user-Name">Nguyen Gia Bao</div>
                                <div class="content-body__user-BirthDate">15/06/2003</div>
                            </div>
                        </div>
                        <div class="content-body__followers">
                            <div class="followers-num">100</div>
                            <div class="followers-text">Followers</div>
                        </div>
                        <div class="content-body__user-report">
                            <div class="user-report">December 28, 2023sfdfghj</div>
                        </div>
                        <div class="content-body__status">
                            <div class="report-button btn-icon">
                                3
                                <div class="report-list">
                                    <div class="report__list--roll">
                                        <div class="report-list-item">
                                            <div class="usrp">Gia Bao</div>
                                            <div class="rp-content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga possimus libero distinctio, iste soluta eligendi deleniti suscipit delectus fugiat unde, velit corrupti quas dicta nam cumque, illum nemo. Ipsa.</div>
                                        </div>
                                        <div class="report-list-item">
                                            <div class="usrp">Manh</div>
                                            <div class="rp-content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga possimus libero distinctio, iste soluta eligendi deleniti suscipit delectus fugiat unde, velit corrupti quas dicta nam cumque, illum nemo. Ipsa.</div>
                                        </div>
                                        <div class="report-list-item">
                                            <div class="usrp">Le Tuan Kiet</div>
                                            <div class="rp-content">123</div>
                                        </div>
                                        <div class="report-list-item">
                                            <div class="usrp">Le Tuan Kiet</div>
                                            <div class="rp-content">123</div>
                                        </div>
                                        <div class="report-list-item">
                                            <div class="usrp">Le Tuan Kiet</div>
                                            <div class="rp-content">123</div>
                                        </div>
                                        <div class="report-list-item">
                                            <div class="usrp">Le Tuan Kiet</div>
                                            <div class="rp-content">123</div>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>

                            <a href="adminchatuser.php" class="chat-button btn-icon"
                                style="background-color: #00FF4F; background-image: url(./assets/img/chat-button.png);"></a>
                            <a href="user-profile-2-admin-page.php" class="profile-button btn-icon"
                                style="background-color: blue; background-image: url(./assets/img/user_white.png)"></a>
                            <a href="adminbin.php" class="bin-button btn-icon"
                                style="background-color: red; background-image: url(./assets/img/bin.png);"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>