<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile List</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- AdminPage css -->
    <link rel="stylesheet" href="./assets/css/adminprofileuserlist.css">
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
                <div class="bin__content-box">
                    <div class="bin__content-body">
                        <div class="content-body__user">
                            <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);">
                            </div>
                            <div class="content-body__user-N-BD">
                                <div class="content-body__user-Name">Nicol del rey</div>
                                <div class="content-body__user-BirthDate">15/06/2003</div>
                            </div>
                        </div>
                        <div class="content-body__followers">
                            <div class="followers-num">32</div>
                            <div class="followers-text">Followers</div>
                        </div>
                        <div class="content-body__operating-status">
                            <div class="operating-status">online</div>
                        </div>
                        <div class="content-body__profile">
                            <a href="adminprofileuser.php" class="profile-button btn-icon"
                                style="background-color: blue; background-image: url(./assets/img/user_white.png)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>