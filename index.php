<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- styles home page -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="./assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <!-- Header -->
    <header class="header fixed-header">
        <div class="main-content">
            <div class="body">
                <!-- logo -->
                <div class="logo">
                    <img src="./assets/img/logo.svg" alt="Flirt Zone">
                    <div class="logo-desc">
                        <img src="./assets/img/logo-desc1.svg" alt="Flirt Zone">
                        <img src="./assets/img/logo-desc2.svg" alt="Flirt Zone">
                    </div>
                </div>
                <!-- nav -->
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#about-section">About</a>
                    </li>
                    <li>
                        <a href="support.php">Support</a>
                    </li>
                    <li>
                        <a href="SwipeProfile.php" style="color: red;">Swipe</a>
                    </li>
                </ul>
                <!-- action to call -->
                <div class="action">
                    <a href="login.php" class="action-btn btn" id="loginBtn">Login</a>
                    <a href="#!" class="avatar" style="background-image: url(/assets/img/avt.jpg);"></a>
                    <div class="menu-nav-avt" id="userMenu">
                        <a href="Profileuser.php" class="dropdown-item">Xem trang cá nhân</a>
                        <a href="#!" class="dropdown-item">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero -->
        <div class="hero-wrap">
            <div class="main-content">
                <div class="info">
                    <h1 class="title">
                        <span class="title-1">Smart Matching</span>
                        <span class="title-2"> Made Simple</span>
                    </h1>
                    <p class="sub-title">We respect your privacy and make sure your data stays safe. You control how
                        much you share and with whom. Your comfort and safety are our top priorities.</p>
                    <div class="btn-cta">
                        <div class="cta3 btn"><a href="./SwipeProfile.php" style='color: #FFFFFF'>Swipe right if you like</a> </div>
                    </div>
                </div>
                <div class="hero-img">
                    <img src="./assets/img/hero.svg" alt="Smart Matching Made Simple" class="hero-big">
                    <img src="./assets/img/hero-atc.svg" alt="Smart Matching Made Simple" class="hero-small1">
                    <img src="./assets/img/hero-world.svg" alt="Smart Matching Made Simple" class="hero-small2">
                </div>
            </div>
        </div>

        <!-- Intoduce -->
        <div class="intro" id="about-section">
            <div class="main-content">
                <div class="btn btn-cta">Reach people like you</div>
                <h2 class="title">Say Hello to Spontaneous Moments</h2>
                <p class="desc">Every meaningful connection begins with a simple "Hi." Our platform brings the spark
                    back to meeting people by combining spontaneous chats with interest-based matching. Whether you’re
                    here for deep convos or casual fun, there’s always someone new to meet.</p>
            </div>
        </div>

        <!-- Introduce-sub -->
        <div class="intro-sub">
            <div class="main-content">
                <div class="intro-wrap">
                    <h2 class="title">
                        <span class="title-sub">Swipe</span>
                        When You're Feeling Curious
                    </h2>
                    <p class="desc">Not in the mood for video? No problem. Swipe through profiles curated just for you.
                        Like
                        what you see? Swipe right to start the conversation. Not vibing? Swipe left and keep
                        discovering. No
                        pressure. No awkwardness. Just possibilities.</p>
                    <!-- <div class="btn btn-intro-sub">Swipe right if you like</div> Xóa nút -->
                </div>
                <div class="intro-sub-img">
                    <img src="./assets/img/tele.svg" alt="" class="intro-img">
                    <img src="./assets/img/tele-contact.svg" alt="" class="intro-img_sub">
                </div>
            </div>
        </div>

        <!-- Space-contact -->
        <div class="space">
            <div class="main-content">
                <h2 class="title">Designed for Comfort, Built for
                    <span class="title-space">Connection</span>
                </h2>

                <div class="space-wrap">
                    <div class="space-wrap-sub">
                        <p class="desc">Dating doesn't have to be awkward. We’ve created a space that feels less like an
                            app
                            and more like a real-life moment. Talk to strangers. Discover stories. Fall in love—or just
                            enjoy the journey.</p>
                        <!-- <div class="btn btn-space">Start with new chat</div> Xóa nút -->
                    </div>
                    <div class="space-img">
                        <img src="./assets/img/space-contact.svg" alt="Designed for Comfort, Built for Connection"
                            class="space-img-imp">
                        <img src="./assets/img/hero-atc.svg" alt="Designed for Comfort, Built for Connection"
                            class="space-img-sub">
                    </div>
                </div>
            </div>
        </div>

        <!-- video-Contact -->
        <div class="video-contact">
            <div class="main-content">
                <div class="wrap-row">
                    <h2 class="title">Go Beyond
                        <span style="color: #2AE765">Text</span> –
                        <span style="color: #2C9CFB">See</span>,
                        <span style="color: #9849B9;">Hear</span>, and
                        <span style="color: #F3AA88">Feel</span> the Connection
                    </h2>
                    <p class="desc">Words are powerful, but facial expressions say even more. With our built-in video
                        chat
                        feature, you can instantly meet people face-to-face from anywhere in the world. Whether you're
                        looking for sparks to fly or just someone to share your thoughts with, a live video call makes
                        every
                        interaction more meaningful.</p>
                    <!-- <div class="btn btn-act-video">Start with video chat</div> Xóa nút -->
                </div>
                <div class="wrap-video">
                    <img src="./assets/img/Rectangle 21.svg" alt="Video chat" class="video1">
                    <img src="./assets/img/Rectangle 22.svg" alt="Video chat" class="video2">
                </div>
                <div class="wrap-atc">
                    <div class="wrap-atc-slay">
                        <h3 class="title-slay">Stay in the loop</h3>
                        <p class="desc-slay">Join our Gmail Server to get updates before anyone else.</p>
                    </div>
                    <div class="btn btn-act-slay">Contact us</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="body">
            <!-- logo -->
            <div class="logo">
                <img src="./assets/img/logo.svg" alt="Flirt Zone">
                <div class="logo-desc">
                    <img src="./assets/img/logo-desc1.svg" alt="Flirt Zone">
                    <img src="./assets/img/logo-desc2.svg" alt="Flirt Zone">
                </div>
            </div>

            <!-- List label -->
            <ul>
                <li>
                    <a href="#!">Term Of Service</a>
                </li>
                <li>
                    <a href="#!">Privacy Policy</a>
                </li>
                <li>
                    <a href="#!">Community Guidelines</a>
                </li>
                <li>
                    <a href="#!">Refund Policy</a>
                </li>
            </ul>

            <!-- Gmail contact -->
            <div class="icon-contact">
                <img src="./assets/icons/gmail.svg" alt="Gmail actact">
                <img src="./assets/icons/gmail.svg" alt="Gmail actact">
            </div>
        </div>

        <!-- End page -->
        <div class="wrap-footer">
            <p class="content-footer">All rights reserved. BeFriendsWith LTD.</p>
        </div>
    </footer>

    <script>
        //nut avt 
        const loginBtn = document.getElementById('loginBtn');
        const avatar = document.querySelector('.avatar');
        const menu = document.getElementById('userMenu');
        const items = document.querySelectorAll('.dropdown-item');

        avatar.addEventListener('click', (e) => {
            e.stopPropagation();
            menu.style.display = (menu.style.display === 'flex') ? 'none' : 'flex';
        });

        document.addEventListener('click', () => {
            menu.style.display = 'none';
        });

        menu.addEventListener('click', (e) => {
            e.stopPropagation();
        });
        items.forEach(item => {
            item.addEventListener('click', () => {
                menu.style.display = 'none';
            });
        });

        loginBtn.addEventListener('click', () => {
            loginBtn.style.display = 'none'; // Ẩn nút Login
            avatar.style.display = 'block'; // Hiện avatar
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

</html>