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