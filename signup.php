<?php 

 require_once("scripts/functions.php");
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="css/icon-font.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="sass/main.scss">
        <link rel="shortcut icon" type="image.png" href="img/logo.png">

        <script type="text/javascript" src="js/reality.js"></script>

        <title> RealityTV | RealityTVregistry.com</title>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    <body>
      <?php 

//set_message("error", "Passwords do not match");
        if(isset($_POST['sign_up'])){
          $firstname = $_POST['firstname'];
          $surname = $_POST['lastname'];
          $email = $_POST['email'];
          $role_id = $_POST['role'];

          if($_POST['password'] != $_POST['cpassword']){
            set_message("error", "Passwords do not match");
          }else {
            $password = $_POST['password'];
          }


          register_new_user($firstname,$surname,$email,$password, $role_id);
        }



      ?>
      <main>
        <div class="signup__container">
            <div class="section-one">
                <p class="signup__container--text">Please fill in this form to create an account.</p>
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
              <form method="POST" action="">
                <div class="main-form">
                  <input type="firstname" name="firstname" placeholder="First Name" required/>
                  <input type="lastname" name="lastname" placeholder="Last Name" required/>
                  <input type="email" name="email" placeholder="Email" required/>
              
                  <select name="role" id="">
                    <option value="00000">Select Role</option>
                    <option value="3">Contestant</option>
                    <option value="2">Script Writer</option>
                    <option value="1">Executive</option>
                  </select>
                  
                  <input type="password" name="password" placeholder="Password" required/>
                  <input type="password" name="cpassword" placeholder="Confirm Password" required/>

                  <div class="signup__container--checkbox">
                      <label>
                      Remember me<input class="checkbox"  type="checkbox" checked="checked" name="remember"> 
                      </label>
                  </div>
                  <p class="signup__container--text">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                  <div class="signup__button">
                      <button type="submit" name="sign_up" class="sign_up">Sign Up</button>
                      <button>Cancel</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>

      <script>
        let checkBox = document.querySelector(".checkbox");
        let signUp = document.querySelector(".sign_up");


        checkBox.addEventListener("click", function(){
          if(this.checked == true ){  //alert("teyeyey");
            signUp.removeAttribute("disabled");
          }else{ 
            signUp.setAttribute("disabled", true); 
          }
        });
        
      </script>
  </body>
</html>
