<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);
?>

<?php get_message("error"); get_message('success') ?>


<section class="landing-image d-flex justify-content-center flex-column ">
    <div class="landing-text text-white text-center">
        <h1>Reality TV</h1>
        <p>cache of unique formats & talent</p>
    </div>

</section>

<section class="landing-page-roles d-flex justify-content-center flex-column ">
    <div class="row p-5">
        <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
            <div class="card new">
                <img src="img/act4.jpg" alt="" >
                <div class="card-body bg-dark text-center">
                    <a href="contestantsreg.php" class="text-white card-link">Contestant and Talent Registration</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
        <div class="card new">
                <img src="img/shoot00.jpg" alt="" >
                <div class="card-body bg-dark text-center">
                    <a href="Eprojectsreg.php" class="text-white card-link">industry tv excutive registration</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
        <div class="card new">
                <img src="img/writer02.jpg" alt="" >
                <div class="card-body bg-dark text-center">
                    <a href="Wpromotingyou.php" class="text-white card-link">industry writer's registration&nbsp;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="landing-page-movie py-4">
    <div class="landing-synopsis text-center ">
        <h2 class="landing-header">synopsis of 12 realities</h2>
    </div>

    <div class="row">
        <?php 
            $movie_query = mysqli_query($link, "Select * from realtv_movies limit 9");

            while($movie = mysqli_fetch_object($movie_query)):
        ?>
        <div class="col-lg-4 col-md-4 mt-5 card-col col-sm-6 d-flex justify-content-center">
            <div class="card " style="width:70%;">
                <img src="img/act.jpg?>" alt="" srcset=""> 
            </div>         
          
        </div>
        <?php endwhile; ?>
    </div>
</section>



















<?php
 require "scripts/footer_two.php";
?>