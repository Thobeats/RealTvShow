<?php
ob_start();
require_once "scripts/functions.php"; $link = connect();
session_start(); 
$logo = true;
require_once "scripts/header_two.php";
?>
<style>
  p{
    font-family: 'Poppins', serif;
    font-size : 20px;
    font-weight : 300;
  }

  @media only screen and (max-width: 768px) {    
    p{
      font-size: 15px;
    }
}
</style>
<?php  

  if(isset($_GET['pass'])){
$email = $_GET['email'];
$auth = utf8_encode($_GET['pass']);
    $ip = $_SERVER['REMOTE_ADDR'];
  $checkActivation = mysqli_query($link, "Select * from realtv_users where email = '$email' and token = '$auth'");

    if($checkActivation->num_rows == 1){
      $activateUser = mysqli_query($link, "update realtv_users set activated = '1', ip_address = '$ip' where email='$email' and token = '$auth'");

?>

      <section class="bg-light d-flex flex-column justify-content-center border-bottom" style="height:70vh;">
        <div class="welcome text-center">
          <p>Your account has been activated, <a href="login.php">Click here </a> to Login</p>
        </div>
      </section>



<?php
    }else {
      set_message('error', "Authentication error");
      header('location : index.php');  
    }

  }else{


?>



    <?= get_message("success"); ?>

   <section class="bg-light d-flex flex-column justify-content-center border-bottom" style="height:70vh;">
     <div class="welcome text-center">
       <p>Thank you for joining Reality TV Registry <br> Kindly Check Your Email to Complete the Sign Up Process</p>
     </div>
   </section>


<?php } ?>
     
  </body>
</html>