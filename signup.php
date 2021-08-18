<?php 
require_once "scripts/functions.php";
require "scripts/header_two.php";

?>

<style>
  .sign_up_wrapper{
    height : 80vh;
  }

  a{
    color : #f8f9fa!important;
  }

  .card{
    cursor : pointer;
    transition : linear 0.5s;
  }

  .card:hover{
    transform : scale(1.02);
  }

  .h3{
    text-transform : uppercase;
    font-family : 'Poppins', serif;
    font-weight : 300;
  }

  .icon{
    font-size : 70px;
  }

  @media only screen and (max-width: 768px) {
    
    .sign_up_wrapper{
      height : 50vh;
    }

    .h3{
      font-size : 25px;
  }

  .icon{
    font-size : 50px;
  }

}


@media only screen and (max-width: 425px) {
  .sign_up_wrapper{
    height : auto;
  }

  .card{
    width : 65%;
    margin : auto;
  }
  

  .h3{
      font-size : 20px;
  }

  .icon{
    font-size : 30px;
  }


}
</style>
<section class="d-flex flex-column justify-content-center bg-light sign_up_wrapper" >
  <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 p-4">
        <a href="contestant_signup.php"><div class="card bg-primary text-light">
          <div class="card-body text-center">
            <h3 class="h3">contestant sign up</h3>
            <p class="icon">  
              <i class="bi bi-play-circle"></i>  
            </p>
          </div></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12  p-4">
        <a href="executive_signup.php"><div class="card bg-warning text-light">
          <div class="card-body text-center">
            <h3 class="h3">executive sign up</h3>
            <p class="icon">  
              <i class="bi bi-camera-reels"></i>  
            </p>         
          </div>
        </div></a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 p-4">
        <a href="wregistration.php"><div class="card bg-dark text-light">
          <div class="card-body text-center">
          <h3 class="h3">author sign up</h3>
            <p class="icon">  
              <i class="bi bi-pen"></i>  
            </p> 
          </div>
        </div></a>
      </div>
    </div>
</section>

    
<?php require_once "scripts/footer_two.php"; ?>