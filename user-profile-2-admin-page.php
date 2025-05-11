<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Profile-2-Admin-Page</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- Admin Page user profile css -->
    <link rel="stylesheet" href="./assets/css/style_user-profile-2-admin-page.css">
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
                        <img src="./assets/img/dash board.svg" alt="Dash board">
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

            <section class="content-section">
                <div class="profile-container">
                    <div class="profile-header">
                        <div class="profile-info">
                            <img class="profile-image" src="./assets/img/Profile.svg" alt="Profile" />
                            <div class="profile-details">
                                <p class="profile-name">Anasik Waterman</p>
                                <p class="profile-status">Online</p>
                            </div>
                        </div>
                        <div class="profile-status-icons">
                            <img src="./assets/img/Status Icons.svg" alt="Status Icons" class="status-icons" />
                        </div>
                    </div>

                    <div class="main-area"></div>
                    <div class="card-grid">
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                    </div>

                    <div class="info-fields">
                        <div class="info-field"><span class="info-label">ID</span>
                            <span class="info-value">097586</span>
                        </div>
                        <div class="info-field">
                            <div class="info-label">Name</div>
                            <div class="info-value">Jasa Mark</div>
                        </div>
                        <div class="info-field"><span class="info-label">Date</span><span
                                class="info-value">25/03/2003</span></div>
                        <div class="info-field"><span class="info-label">Email</span><span
                                class="info-value">jack2302@gmail.com</span></div>
                        <div class="info-field"><span class="info-label">Hooby💕</span><span class="info-value">don't
                                have</span></div>
                        <div class="info-field"><span class="info-label">Looking for</span><span
                                class="info-value">don't have</span></div>
                    </div>
                </div>
        </div>
        </section>
        </main>
</body>

</html>