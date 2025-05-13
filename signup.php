<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- sign up page -->
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
                    <a href="login.php" class="btn btn-login">Login</a>
                </div>
            </div>
        </div>
    </header>




    <!-- Main Content -->
    <main class="signup-page">
        <div class="main-content signup-layout">
            <!-- Left: Form -->
            <!-- form -->
            <section class="signup-form signup">
                <h2 class="form-title">Create an account</h2>
                <p class="form-subtitle">Already have an account? <a href="#">Log in</a></p>
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                    <label for="username">User name</label>
                    <input type="text" name="username" id="username" placeholder="Full name" required />

                    <label for="email">Email address</label>
                    <input type="email" placeholder="@gmail.com" name="email" id="email" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />

                    <label for="telphone">PhoneNumber</label>
                    <input type="tel" name="telphone" id="telphone" required />

                    <label for="gender">Gender</label>
                    <input placeholder="Men or Women or Other" type="text" name="gender" id="gender" required />

                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" id="birthday" />
                    <!--Password-->
                    <label for="pass">Password</label>
                    <div class="input-password">
                        <input type="password" name="pass" id="pass" required />
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                    </div>

                    <!--Confirm Password -->
                    <label for="confirmPass">Confirm Password</label>
                    <div class="input-password">
                        <input type="password" name="confirmPass" id="confirmPass" required />
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                    </div>

                    <p class="note">Use 8 or more characters with a mix of letters, numbers & symbols</p>
                    <div class="error-text"
                        style="position: absolute;top:0;left:50%;transform:translateX(-50%);color: #721c24;
                        padding: 8px 10px;text-align: center;border-radius: 5px;
                        background: #f8d7da;border: 1px solid #f5c6cb;margin-bottom: 10px;display: none; width: calc(100% - 166px); white-space: nowrap">
                        ">
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn-submit eventButton">Create an account</button>

                    <p class="form-subnote">Already have an account? <a href="login.php">Log in</a></p>
                </form>

            </section>

            <!-- Right: Visual with image and overlays -->
            <section class="signup-visual">
                <div class="video-box">
                    <img src="./assets/img/video_call.svg" alt="Video Call" class="video-img" />

                    <!-- Notification -->
                    <div class="notification">
                        <img src="./assets/img/hero-atc.svg" alt="Notification" />

                    </div>

                    <!-- Country Filter -->
                    <div class="country-filter">
                        <img src="./assets/img/hero-world.svg" alt="Country Filter" />
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script type="text/javascript" src="./assets/js/signup.js"></script>
</body>

</html>