<?php 
require_once "scripts/functions.php";
$link = connect();


// handle register
if(isset($_POST['register'])){
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $email = $_POST['email'];
  $password = trim($_POST['password']);
  $role = $_POST['role'];


  register_new_user($firstname, $lastname, $email, $password, $role);


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

        <script type="text/javascript" src="js/reality.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title> RealityTV | RealityTVregistry.com</title>

    </head>
    <body>
    <?php get_message("error"); get_message('success') ?>
      <main>
          <div class="signup__container">

              <div class="signup__logo">
                  <div class="section-one">
                      <a href="index.php"><img src="img/logo.png" alt="Logo" class="signup__logo-box" height="75rem" width="180rem"></a>
                  </div>
              </div>

              <div class="section-two">
                  <p class="signup__container--text">Sign Up</p>
                <div class="social-links">
                  <div class="signup__container--facebook">
                    <span> SIGNUP WITH GOOGLE </span>
                      <!-- <svg class="signup__container--icon">
                          <use xlink:href="img/sprite.svg#icon-facebook2"></use>  
                      </svg>  -->
                    <div class="signup__container--icon">
                      <img class="signup__container--image" src="svgs/google.svg" alt="" />
                    </div>
                  </div>
                  <div class="signup__container--twitter">
                    <div class="signup__container--icon">
                      <img class="signup__container--image" src="svgs/linkedin.svg" alt="" srcset="" />
                    </div> 
                    <!-- <svg class="signup__container--icon">
                          <use xlink:href="img/sprite.svg#icon-twitter1"></use>
                      </svg>  -->
                    <span> SIGNUP WITH LINKEDIN </span> 
                  </div>
                </div>

                <form action="" method="POST">
                  <div class="main__form">
                    <div class="main__form--input">
                        <input class="main__form--input-1" type="firstname" name="firstname" placeholder="First Name" required/>
                        <input class="main__form--input-1" type="lastname" name="lastname" placeholder="Last Name" required/>
                    </div>

                    <div class="main__form--input">
                        <input class="main__form--input-1" type="email" name="email" placeholder="Email" required/>
                        
                        <select class="main__form--input-1" name="role" id="" required>
                          <option value="00000">Select Role</option>

                          <?php 
                            $roles = mysqli_query($link, "Select * from realtv_roles"); 
                            while($role = mysqli_fetch_object($roles)):
                          ?>
                          <option value="<?= $role->id ?>"><?= ucfirst($role->role_name) ?></option>
                          <?php endwhile; ?>
                        </select>
                    </div>
                    <input class="main__form--input-1 password" id="pass" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                           title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                           placeholder="Password" required/>
                    <input class="main__form--input-1 cpassword" id="pass" type="password" name="cpassword" placeholder="Confirm Password" readonly required/>

                    <div class="signup__container--checkbox">
                        <div class="signup__container--checkbox-1">
                            <label> <input class="checkbox" type="checkbox" checked="checked" name="remember">Remember me </label>
                        </div>
                        <div class="signup__container--checkbox-1">
                            <label> <input class="checkbox" type="checkbox" checked="checked" name="remember"> Agree to Terms and Conditions </label>
                        </div>
                    </div>

                    <!-- <p class="signup__container--text-1">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
                    <p class="signup__container--text-1">Already have an account?<a href="login.php">Login</a></p>
                    <div class="signup__button">
                        <button name="register">Register</button>
                        <button name="cancel">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </main>

      <script>
        let password = document.querySelector(".password");
        let cpassword = document.querySelector(".cpassword");

        password.addEventListener("blur", function(){
          cpassword.value = password.value;
        });

        
      
      
      </script>
  </body>
</html>