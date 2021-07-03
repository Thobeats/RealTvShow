<?php
ob_start();
require_once "scripts/functions.php"; $link = connect();
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

        <link rel="stylesheet" href="css/icon-font.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="sass/main.scss">
        <link rel="shortcut icon" type="image.png" href="img/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script type="text/javascript" src="js/reality.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <title> RealityTV | RealityTVregistry.com</title>

    </head>
    <body>

<?php  

  if(isset($_GET['pass'])){
$email = $_GET['email'];
$auth = utf8_encode($_GET['pass']);
  $checkActivation = mysqli_query($link, "Select * from realtv_users where email = '$email' and token = '$auth'");

    if($checkActivation->num_rows == 1){
      $activateUser = mysqli_query($link, "update realtv_users set activated = '1' where email='$email' and token = '$auth'");

?>

      <main>
          <div class="signup__container">

              <div class="signup__logo">
                  <div class="section-one">
                      <a href="index.php"><img src="img/logo.png" alt="Logo" class="signup__logo-box" height="75rem" width="180rem"></a>
                  </div>
              </div>

            <div class="section-two">
              <p class="signup__container--text"> Your account has been activated, <a href="login.php">Click here </a> to Login</p>
            </div>
      </main>



<?php
    }else {
      set_message('error', "Authentication error");
      header('location : index.php');  
    }

  }else{


?>



    <?= get_message("success"); ?>

      <main>
          <div class="signup__container">

              <div class="signup__logo">
                  <div class="section-one">
                      <a href="index.php"><img src="img/logo.png" alt="Logo" class="signup__logo-box" height="75rem" width="180rem"></a>
                  </div>
              </div>

            <div class="section-two">
              <p class="signup__container--text"> Thank You for joinig us. </br> Kindly check your email to confirm and complete the Sign Up Process.</p>
            </div>
      </main>


<?php } ?>
     
  </body>
</html>
