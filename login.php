<?php 


require "scripts/functions.php"; 

if(isset($_POST['login'])){
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);




  log_in_user($email,$password);
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/icon-font.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="sass/main.scss">
        <link rel="shortcut icon" type="image.png" href="img/logo.png">

        <title> RealityTV | RealityTVregistry.com</title>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    <body>
    <?php get_message("error"); get_message('success') ?>

      <main>
        <div class="login__container">


            <div class="login__logo">
              <div class="section-one">
                <img src="img/logo.png" alt="Logo" class="signup__logo-box" height="75rem" width="180rem">
              </div>
            </div>
          <form method="POST" action="">
            <div class="section-two">
              <div class="social-links">
                <div class="login__container--facebook">
                  <span> LOGIN WITH FACEBOOk </span>
                  <!-- <svg class="login__container--icon">
                        <use xlink:href="img/sprite.svg#icon-facebook2"></use>  
                    </svg> -->
                  <div class="login__container--icon">
                    <img class="login__container--image" src="svgs/facebook2.svg" alt="" />
                  </div>
                </div>
                <div class="login__container--twitter">
                  <div class="login__container--icon">
                    <img class="login__container--image" src="svgs/twitter1.svg" alt="" srcset="" />
                  </div>
                  <!-- <svg class="login__container--icon">
                        <use xlink:href="img/sprite.svg#icon-twitter1"></use>
                    </svg> -->
                  <span> LOGIN WITH TWITTER </span>
                </div>
              </div>
              <div class="main-form">
                <input class="main-form--input" type="email" name="email" placeholder="Email" />
                <input class="main-form--input" type="password" name="password" placeholder="Password" />
                <a href="#">I forgot my password?</a>
                <button name="login">Login</button>
                <div class="signup__container--checkbox">
                    <label> <input class="checkbox" type="checkbox" checked="checked" name="remember">Remember me </label>
                </div>
              </div>
            </div>
      
            <div class="section-three">
              <div class="new-account">
              <a href="signup.php"><button>Create New Account</button></a>
              </div>
            </div>
          </div>
        </form>
        </div>
      </main>
  </body>
</html>
