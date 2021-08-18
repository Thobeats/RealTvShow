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
<section class="d-flex justify-content-center bg-light" style="height : auto;">
    <form action="" class="form">
        <div class="form-group">
            <input type="text" placeholder="Firstname" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Lastname" class="form-control">
        </div>
        <div class="form-group">
            <input type="email" placeholder="Email" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Username" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Confirm Password" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Phone Number" class="form-control">
        </div>
        <div class="form-group">
            <textarea rows="4" cols="80" placeholder="Address" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="text" placeholder="First Project Title" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Second Project Title" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" placeholder="Credentials" multiple>
        </div>
        <div class="form-group">
            <p class="privacy">
            Please review our Contestant <a href="privacy_contes.php" target="_blank">Privacy Policy Agreement</a>, that is agreed to by all subscribing contestants, actors, models and musicians. By checking the box below as my electronic and binding signature, I confirm that I have reviewed, understand and agree to RealityTVRegistry Privacy Policy. 
            </p>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Click to Agree
                </label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="realbtn btn-warning">Register</button>            
        </div>
        <div class="form-group">
            <button type="reset" class="realbtn btn-dark">Reset</button>            
        </div>
    </form>
</section>



</body>
</html>