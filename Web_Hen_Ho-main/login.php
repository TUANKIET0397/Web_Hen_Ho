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
                    <a href="signup.html" class="btn btn-signUp">Sign up</a>
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
        <section class="form-box glassmorphism">
            <h2>Log in</h2>
            <p class="form-box__p">Log in for free to have access to in any of our products.</p>
            <form>
                <label>Email address</address></label>
                <input type="text" />

                <label>Password</label>
                <div class="input-password">
                    <input type="password" />
                    <button type="button" class="toggle-password">
                        <i class="fas fa-eye-slash"></i> Hide
                    </button>
                </div>
                <p class="note">Use 8 or more characters with a mix of letters, numbers & symbols</p>

                <button type="submit" class="btn-submit">Create an account</button>
                <p class="form-subnote">Don't have an account? <a href="#">Sign up</a></p>
            </form>
        </section>
    </main>

    </div>
</body>

</html>