<?php 
require_once "scripts/functions.php";
require "scripts/header_two.php";

?>

<style>
  .sign_up_wrapper{
    height : 50vh;
  }

  @media only screen and (max-width: 768px) {
    
    .sign_up_wrapper{
      height : 50vh;
    }

}


@media only screen and (max-width: 425px) {
  .sign_up_wrapper{
    height : auto;
  }


}
</style>
<section class="d-flex flex-column justify-content-center bg-light sign_up_wrapper" >
  <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 p-4">
        <div class="card">
          <div class="card-body text-center">
            <p>contestant sign up</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12  p-4">
      <div class="card">
          <div class="card-body text-center">
            <p>executive sign up</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 p-4">
      <div class="card">
          <div class="card-body text-center">
            <p>writer or author sign up</p>
          </div>
        </div>
      </div>
    </div>
</section>

    
<?php require_once "scripts/footer_two.php"; ?>