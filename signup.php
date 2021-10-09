<?php 
$logo = true;
require_once "scripts/functions.php";
require "scripts/header_two.php";

?>
<!-- Modal -->
<div class="modal fade" id="contestant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <h5 class="modal-title" id="exampleModalLabel">Register to view Proposals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <form action="viewTestProposal.php" method='GET'>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Firstname:</label>
                    <input type="text" name="firstname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-xs">Check it out</button>
            </div>
      </form>      
    </div>
  </div>
</div>

<style>
  .sign_up_wrapper{
    height : 80vh;
  }

  .signup_link{
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
    font-weight : 700;
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
<section class="d-flex flex-column justify-content-center sign_up_wrapper">
  <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 p-4">
        <a class="signup_link" href="" onclick="preventDefault()" data-toggle="modal" data-target="#contestant"><div class="card text-light" style="background-color: #285097;">
          <div class="card-body text-center">
            <h3 class="h3">contestant sign up</h3>
            <p class="icon">  
              <i class="bi bi-play-circle"></i>  
            </p>
          </div></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12  p-4">
        <a class="signup_link" href="executive_signup.php"><div class="card bg-warning text-light">
          <div class="card-body text-center">
            <h3 class="h3">executive sign up</h3>
            <p class="icon">  
              <i class="bi bi-camera-reels"></i>  
            </p>         
          </div>
        </div></a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 p-4">
        <a class="signup_link" href="wregistration.php"><div class="card bg-dark text-light">
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