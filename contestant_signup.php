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
<?= get_message("info"); ?>

<section class="d-flex justify-content-center bg-light" style="height : auto;">
    
    <form action="process_contestant.php" method="POST" class="form" enctype="multipart/form-data">
        <div class="get_started my-3 p-2">
            <h3>Get Started..</h3>
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
            <input type="tel" placeholder="Phone Number" name="phone_no" class="form-control" required>
        </div>
        <div class="form-group">
            <textarea rows="4" cols="80" placeholder="Address" name="address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <select  name="project1[]" class="form-control select2 movie"  id="" multiple required>
                <option value="">First Project Title</option>
                <?php 
                    $movies = mysqli_query($link, "select * from realtv_movies");   

                    while($movie = mysqli_fetch_assoc($movies)):
                ?>
                <option value="<?= (int)$movie['id'] ?>" data-price="<?= (int)$movie['reg_fee'] ?>"><?= $movie['movie_title'] ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend" style="height : 35px;">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" name="price" placeholder="Total Price" class="form-control price" readonly aria-label="Amount (to the nearest dollar)" required>
            <div class="input-group-append" style="height : 35px;">
                <span class="input-group-text">.00</span>
            </div>
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


<script>
    let price = 0; let l = 0;

      $(document).ready(function() {
        $('.select2').select2({
            placeholder : "Project Title",
        });

        $(".movie").change(function(){
            if($(this).val().length != 0){
                if($(this).val().length > l){
                    l = $(this).val().length;
                    price += $(this).find(':selected').data('price');
                }else{
                    price -= $(this).find(':selected').data('price');
                    l = $(this).val().length;
                }
            }else{
                
                price = 0; l = 0;
            }
            

           // console.log($(this).val());
          //  if(price < 0){ price = 0; }
            $(".price").val(price);
        });
       });

</script>



</body>
</html>