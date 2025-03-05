<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header>
      <h2 class="logo">PRODIGY INFOTECH</h2>
      <nav class="navigation">
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Services</a>
        <a href="#">Contact </a>
        <button class="btnLoginpopup">Login</button>
      </nav>
    </header>
    <div class="wrapper">
      <span class="icon-close"><ion-icon name="close"></ion-icon></span>
      <div class="form-box login">
        <h2>Login</h2>
        <form action="login.php" method="POST">
          <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="username" required />
            <label>Username</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" required />
            <label>Password</label>
          </div>
          <div class="forgot">
            <a href="forgetpass.php">Forgot Password?</a>
          </div>
          <button type="submit" name="login" class="btn">Login</button>
          <div class="login1">
            <p>
              Don't have an account?<a href="#" class="register-link">Register</a>
            </p>
          </div>
        </form>
      </div>

      <div class="form-box register">
        <h2>Registration</h2>
        <form action="register.php" method="POST">
          <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="username" required />
            <label>Username</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email" name="email" required />
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" required />
            <label>Password</label>
          </div>
          <button type="submit" name="register" class="btnregister">Register</button>
          <div class="login1">
            <p>
              Already have an account?<a href="#" class="login-link">Login</a>
            </p>
          </div>
        </form>
      </div>
    </div>
    <script src="script.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>

<?php
include("conn.php");
?>
