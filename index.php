<?php 
ob_start();
$navBar = true;
require "scripts/functions.php";

require "scripts/header_two.php"; 

?>

<?php get_message('error'); get_message('success'); ?>

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


<section class="landing-image d-flex flex-column justify-content-start flex-column">
    <div class="landing-text text-white text-center">
        <div class="">
            <img src="img/newLogo.png" alt="" class="welcome-logo">
        </div>
        <h3 class="mt-2">on location to a cache of unique formats & talent</h3>        
    </div>

</section>

<section class="landing-page-roles d-flex justify-content-center flex-column pb-3">
    <div class="row mt-10 mx-auto" style="width: 100vw;">
        <div class="col-12">
            <h3 class="text-center p-3 role-intro">dedicated registrations for contestants/talent, writers & industry TV executives</h3>
        </div>
    </div>
    <div class="row px-5 mx-auto" style="width: 100vw;">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card new">
                <img src="img/contestant.jpg" alt="" >
                <div class="card-body bg-dark text-center" >
                    <a href="" onclick="preventDefault()" data-toggle="modal" data-target="#contestant" class="text-light card-link">Contestant and Talent Registration</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card new">
                <img src="img/shoot00.jpg" alt="" >
                <div class="card-body bg-dark text-center">
                    <a href="executive_signup.php" class="text-light card-link">industry tv excutive registration</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card new">
                <img src="img/writer02.jpg" alt="" >
                <div class="card-body bg-dark text-center">
                    <a href="writersPage.php" class="text-light card-link">industry writer's registration&nbsp;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="landing-page-movie py-4">
    <div class="landing-synopsis text-center ">
        <h2 class="landing-header">reality tv proposals</h2>
    </div>

    <div class="row mx-auto" style="width: 100vw;">
        <?php 
            $movie_query = mysqli_query($link, "Select * from realtv_movies limit 9");

            while($movie = mysqli_fetch_object($movie_query)):

                $moviePic = $movie->movie_pic;
        ?>
        <div class="col-lg-4 col-md-4 mt-5 col-sm-12">
            <div class="card movie-card border-0 mx-auto" style="cursor: pointer; background-color: inherit">
                <div class="card-body p-0" style="height: 100%;">
                      <img src="img/uploads/<?= $moviePic ?>" class="movie-card-body"  alt="">
                </div>
                <div class="movieTitle">
                    <p><?= $movie->movie_title ?></p>
                </div>
                <div class="action-btns">                
                    <a href="signup.php" class="bg-warning check text-dark">Check it out</a>
                </div>
            </div>         
          
        </div>
        <?php endwhile; ?>
    </div>
    
    <div class="row d-flex justify-content-center my-5" style="width: 100vw;">
        <a href="signup.php" class="btn discover">discover all realities</a>
    </div>
</section>

<?php
 require "scripts/footer_two.php";
?>