<?php 

$logo =true;
require "scripts/functions.php"; 

if(isset($_POST['login'])){
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  log_in_user($email,$password);
}


require "scripts/header_two.php";

?>
 <style>

*{
  font-family: 'Poppins', serif;
}

.order{
  display : none;
}

.show{
  display : block;
}

.button{
  background-color : #004883;
}

form{
  width : 50%;
}

 @media only screen and (max-width: 768px) {
   form{
       width : 70%;
     }

 }    

@media only screen and (max-width: 425px) {
form{
  width : 100%;
}

button{
 width : 100%;
}

}


</style>

<div>
<?php get_message('error'); get_message('success'); ?>

<div class="row mt-5 ">
  <div class="col-12 text-center">
    <h3>Log In</h3>
  </div>
</div>

<div class="row mt-1">
<div class="col-12">
 <div class="d-flex justify-content-center">
  <form action="" class="p-3" method="POST">
    

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" class="form-control" name="email" required>
        </div>
      </div>      
    </div>

     

     <div class="row">
       <div class="col-12">
         <div class="form-group">
           <label for="password">Password</label>
           <input type="password" class="form-control password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
         </div>
       </div>       
     </div>

     <div class="row">
       <div class="col-6">
         <div class="d-flex justify-content-center form-check form-check-inline">
             <input type="checkbox" class="form-check-input" id="inlineCheckbox1"> <label class="form-check-label" for="inlineCheckbox1">Remember Me</label>
         </div>
       </div>
       <div class="col-6">
         <div class="d-flex justify-content-start">
            <a href="resetPassword.php" style="color: #004883; ">Forgot your Password?</a>
         </div>
       </div>
     </div>
    

     <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-12">
         <div class="d-flex justify-content-center my-4">
           <button class="realbtn btn-lg text-light button btn-stretch" name="login" >Log In</button>
         </div>
       </div>

       <div class="col-lg-6 col-md-6 col-sm-12">
         <div class="d-flex justify-content-start my-4">
             <p>Don't have an account?  <a href="signup.php"  style="color: #004883; ">Create Account</a></p>
         </div>
       </div>
     </div>

   

     



   </form>
 </div>
</div>
</div>

<hr>







</div>
  



</body>
</html>