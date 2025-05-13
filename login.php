<?php
include_once "./assets/php/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- login page -->
    <link rel="stylesheet" href="./assets/css/loginlogout.css">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
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
                        <a href="./index.php">About</a>
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
                    <a href="signup.php" class="btn btn-signUp">Sign up</a>
                </div>
            </div>
    </header>

    <!-- Main Content -->
    <main class="login-page">
        <!-- Left visual section -->
        <section class="visual-box">
            <img src="./assets/img/call.svg" alt="Phone Preview" class="phone-img" />

            <!-- Notification -->
            <div class="notification-box">
                <img src="./assets/img/hero-atc.svg" alt="Notification" />

            </div>

            <!-- Country filter -->
            <div class="country-filter-box">
                <img src="./assets/img/callvideo_all.svg" alt="Country Filter" />
            </div>
        </section>

        <!-- Right signup form -->
        <section class="form-box glassmorphism login">
            <h2>Log in</h2>
            <p class="form-box__p">Log in for free to have access to in any of our products.</p>
            <!-- form login -->
            <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                <label for="email">Email address</label>
                <input type="text" id="email" name="email" required />

                <label for="pass">Password</label>
                <div class="input-password">
                    <input type="password" id="pass" name="pass" required />
                    <button type="button" class="toggle-password">
                    </button>
                </div>
                <p class="note">Use 8 or more characters with a mix of letters, numbers & symbols</p>
                <div class="error-text" style="
                  position: absolute;top:305px;left:50%;transform:translateX(-50%);;color: #721c24;
                  padding: 8px 10px;text-align: center;border-radius: 5px;
                background: #f8d7da;border: 1px solid #f5c6cb;margin-bottom: 10px;display: none;white-space: nowrap;">
                </div>

                <!-- submit -->
                <button type="submit" class="btn-submit">Log in</button>
                <p class="form-subnote">Don't have an account? <a href="signup.php">Sign up</a></p>
            </form>
        </section>
    </main>

    </div>

    <script type="text/javascript" src="./assets/js/login.js"></script>
    <script type="text/javascript" src="./assets/js/pass-show-hide.js"></script>

</body>

</html>