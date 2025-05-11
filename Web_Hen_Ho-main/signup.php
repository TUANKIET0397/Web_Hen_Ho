<?php include_once "header.php"; ?>

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
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="#!">About</a>
                    </li>
                    <li>
                        <a href="support.html">Support</a>
                    </li>
                    <li>
                        <a href="SwipeProfile.html" style="color: red;">Swipe</a>
                    </li>
                </ul>
                <!-- action to call -->
                <div class="action">
                    <a href="login.html" class="btn btn-login">Login</a>
                </div>
            </div>
        </div>
    </header>




    <!-- Main Content -->
    <main class="signup-page">
        <div class="main-content signup-layout">
            <!-- Left: Form -->
            <section class="signup-form">
                <h2 class="form-title">Create an account</h2>
                <p class="form-subtitle">Already have an account? <a href="#">Log in</a></p>
                <form>
                    <label>User name</label>
                    <input type="text" />

                    <label>Email address</label>
                    <input type="email" />

                    <label>PhoneNumber</label>
                    <input type="text" />

                    <label>Gender</label>
                    <input type="text" />

                    <label>Birthday</label>
                    <input type="date" />

                    <!--Password-->
                    <label>Password</label>
                    <div class="input-password">
                        <input type="password" />
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye-slash"></i> Hide
                        </button>
                    </div>

                    <!--Confirm Password -->
                    <label>Confirm Password</label>
                    <div class="input-password">
                        <input type="password" />
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye-slash"></i> Hide
                        </button>
                    </div>

                    <p class="note">Use 8 or more characters with a mix of letters, numbers & symbols</p>

                    <!-- Submit -->
                    <button type="submit" class="btn-submit">Create an account</button>

                    <p class="form-subnote">Already have an account? <a href="#">Log in</a></p>
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
</body>

</html>