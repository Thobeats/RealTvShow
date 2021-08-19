<?php 
require_once "scripts/functions.php";
require "scripts/header_two.php";

if(isset($_POST['submit'])){
    $firstname = mysqli_real_escape_string($link,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($link,$_POST['lastname']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $username = mysqli_real_escape_string($link,$_POST['username']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $cpass = mysqli_real_escape_string($link,$_POST['cpass']);
    $phone_no = mysqli_real_escape_string($link,$_POST['phone_no']);
    $address = mysqli_real_escape_string($link,$_POST['address']);
    $project1 = mysqli_real_escape_string($link,$_POST['project1']);
    $project2 = mysqli_real_escape_string($link,$_POST['project2']);
    $role = "1";

    $profile_pic = mysqli_real_escape_string($link,$_FILES['profile_pic']);
    $resume = mysqli_real_escape_string($link,$_FILES['resume']);

    if($password != $cpass){
        set_message("error", "Passwords do not match");      
    }else{
        register_new_user($firstname, $lastname, $email, $password, $role, $addressg, $username, $phone_no);
    }
   
}



?>
<style>
  
  .form{
      width : 40%;
      margin : auto;
      padding : 20px;
  }

  .privacy{
      font-size : 12px;
  }
  .form-check-label{
    font-size : 14px;
  }

  .form-control{
      font-size:14px;
  }

  .realbtn{
    width : 100%;
    padding : 15px;
    font-size : 15px;
  }

  label{
    font-size:14px;
    letter-spacing : 1px;
    font-family: "Poppins", serif;
    font-weight : 300;
  }

@media only screen and (max-width: 768px) {    
    .form{
        width : 50%;  
        padding : 20px;
     
    }   
    
    .realbtn{
        padding : 10px;
        font-size : 12px;
    }
}


@media only screen and (max-width: 425px) {
    .form{
        width : 90%;  
        padding : 20px;        
    }   
    .realbtn{
        padding : 10px;
        font-size : 12px;
    }


}
</style>

<?= get_message("error"); ?>
<?= get_message("success"); ?>
<section class="d-flex justify-content-center bg-light" style="height : auto;">
    
    <form action="" method="POST" class="form" autocomplete="on">
        <div class="get_started my-3 p-2">
            <h3>Get Started</h3>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Firstname" name="firstname" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Lastname" name="lastname" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="email" placeholder="Email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Username" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Confirm Password" name="c_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Phone Number" name="phone_no" class="form-control" required>
        </div>
        <div class="form-group">
            <textarea rows="4" cols="80" placeholder="Address" name="address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <select  name="project1" class="form-control"  id="" required>
                <option value="">First Project Title</option>
                <?php 
                    $movies = mysqli_query($link, "select * from realtv_movies");   

                    while($movie = mysqli_fetch_object($movies)):
                ?>
                <option value="<?= $movie->reg_fee ?>"><?= $movie->movie_title ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <select  name="project2" class="form-control"  id="">
                <option value="">Second Project Title (optional)</option>
                <?php 
                    $movies = mysqli_query($link, "select * from realtv_movies");   

                    while($movie = mysqli_fetch_object($movies)):
                ?>
                <option value="<?= $movie->reg_fee ?>"><?= $movie->movie_title ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Profile Pic</label>
            <input type="file" name="profile" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Resume</label>
            <input type="file" name="resume" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <p class="privacy">
            Please review our Contestant <a href="privacy_contes.php" target="_blank">Privacy Policy Agreement</a>, that is agreed to by all subscribing contestants, actors, models and musicians. By checking the box below as my electronic and binding signature, I confirm that I have reviewed, understand and agree to RealityTVRegistry Privacy Policy. 
            </p>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                <label class="form-check-label" for="defaultCheck1">
                    Click to Agree
                </label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="realbtn btn-warning">Register</button>            
        </div>
        <div class="form-group">
            <button type="reset" class="realbtn btn-dark">Reset</button>            
        </div>
    </form>
</section>



</body>
</html>