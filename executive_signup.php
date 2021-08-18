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
            <input type="email" placeholder="Direct Email (Company Domain)" class="form-control">
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
            <input type="text" placeholder="Position / Title" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Company Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Direct Dial Phone" class="form-control">
        </div>
        <div class="form-group">
            <textarea rows="4" cols="80" placeholder="Address(Street Address, City, Zip)" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Current Mandate(Genre of Projects You are Scouting)" class="form-control" required>
        </div>
        <div class="form-group">
            <p class="privacy">
            By typing <b>I AGREE</b> in the space provided, I understand and agree to the <a href="privacy_exec.php" target="_blank">Privacy Policy</a> and <a href="nda.php" target="_blank">Terms of Service</a> as an Industry Executive Member of RealityTVRegistry.com
            </p>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" required>
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