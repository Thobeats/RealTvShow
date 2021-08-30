<?php 
require_once "scripts/functions.php";
require "scripts/header_two.php";

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
    <form action="process_executive.php" method="POST" class="form" enctype="multipart/form-data">
        <div class="get_started my-3 p-2">
            <h3>Get Started...</h3>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Firstname" name="firstname" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Lastname" name="lastname" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="email" placeholder="Direct Email (Company Domain)" name="email" class="form-control" required>
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
            <input type="text" placeholder="Position / Title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Company Name" name="company_name" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="tel" placeholder="Direct Dial Phone" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <textarea rows="4" cols="80" name="address" placeholder="Address(Street Address, City, Zip)" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <select name="genre" id="" class="form-control" required>
                <option value="">Select Genre</option>
                <?php 
                    $genreQ = mysqli_query($link, "Select * from movie_genre");
                    while($genre = mysqli_fetch_object($genreQ)) : 
                ?>

                <option value="<?= $genre->id ?>"><?= ucfirst($genre->genre_name) ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group"> 
            <label for="exampleFormControlFile1">Profile Pic</label>
            <input type="file" name="profile" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <p class="privacy">
            By typing <b>I AGREE</b> in the space provided, I understand and agree to the <a href="privacy_exec.php" target="_blank">Privacy Policy</a> and <a href="nda.php" target="_blank">Terms of Service</a> as an Industry Executive Member of RealityTVRegistry.com
            </p>
        </div>
        <div class="form-group">
            <input type="text" name="agree" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" name="executive_submit" class="realbtn btn-warning">Register</button>            
        </div>
        <div class="form-group">
            <button type="reset" class="realbtn btn-dark">Reset</button>            
        </div>
    </form>
</section>



</body>
</html>