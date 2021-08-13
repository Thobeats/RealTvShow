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
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card new">
                <img src="img/act4.jpg" alt="" >
                <div class="card-body bg-dark text-center">
                    <a href="contestantsreg.php" class="text-white card-link">Contestant and Talent Registration</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card new">
                <img src="img/shoot00.jpg" alt="" >
                <div class="card-body bg-dark text-center">
                    <a href="Eprojectsreg.php" class="text-white card-link">industry tv excutive registration</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card new">
                <img src="img/writer02.jpg" alt="" >
                <div class="card-body bg-dark text-center">
                    <a href="writersPage.php" class="text-white card-link">industry writer's registration&nbsp;</a>
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

                $moviePic = $movie->movie_pic;
        ?>
        <div class="col-lg-4 col-md-4 mt-5 card-col col-sm-6 d-flex justify-content-center">
            <div class="card movie-card" style="width: 80%; background: url(img/uploads/<?= $moviePic ?>); height: 200px; background-size: cover; cursor: pointer" >
                <div class="card-title mb-auto text-right text-light mt-4 d-flex justify-content-end" >
                   <p class="p-2 movieTitle"  style="background-image: linear-gradient(to right bottom, rgba(50, 149, 230, 0.85), rgba(0, 72, 131, 0.85)); width: 80%;"><?= $movie->movie_title ?></p> 
                </div>
                <div class="mb-2 text-center check-out">
                    <a href="signup.php" class="btn btn-light text-dark">Check This Out Now</a>
                </div>
            </div>         
          
        </div>
        <?php endwhile; ?>
    </div>
    
    <div class="row d-flex justify-content-center my-5">
        <a href="projects.php" class="btn discover">discover all realities</a>
    </div>
</section>

<section class="row mb-4">
    <div class="col-12 mt-4">
        <div class="member-benefits">
            <h3 class="text-center my-4 m-title">MEMBER BENEFITS</h3>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes zilla text-center">
                                
                                    Big 93% advantage to be casted when promoted by a business 
                                    
                                </div>
                                    <img class="" src="img/write01.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                                
                                    Priority status to participate in the production of your choice
                                                                    
                                </div>
                                    <img class="" src="img/shoot2.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                            
                                    Your private account access, to view and edit your credentials 
                                                                        
                                </div>
                                    <img class="" src="img/Executive.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                                
                                    Promote your individual talents to producers and TV executives 
                                                                        
                                </div>
                                    <img class="" src="img/act000.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                                
                                    Casting companies access your info. and initiate contact
                                                                            
                                </div>
                                    <img class="" src="img/studio0.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                            
                                    Exposure to talent scouts with opportunity to be discovered
                                                                            
                                </div>
                                    <img class="" src="img/write5.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                                
                                    Keep you apprised of future reality productions
                                                                            
                                </div>
                                    <img class="" src="img/write3.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="fa fa-arrow-circle-o-left fa-2x" aria-hidden="true" style="color : black"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="fa fa-arrow-circle-o-right fa-2x" aria-hidden="true" style="color : black"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
            
    </div>
</section>

<section class="row px-5 my-5 call_to_action">
    <div class="col-12 p-5 bg-warning d-flex flex-column justify-content-center">
        <div class="row" style="height : 100%;">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <p class="call_to_action_text"> Registered members have priority to be selected as participants and to be represented in our Reality TV </p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 text-center my-auto">
                <a href="" class="realbtn btn-info btn-lg">Get Started</a>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 call_to_action_img" style="background-image: url(img/act02.jpg); background-size: cover;">
                
            </div>
        </div>
    </div>
</section>


<script>
    let movieCard = document.querySelectorAll(".movie-card");

    movieCard.forEach((card)=>{
        card.addEventListener("mouseover", function(){

        //    let cardTitle = this.querySelector(".movieTitle");
            let checkout = this.querySelector(".check-out");

            checkout.classList.add("animate-show");

        });

        card.addEventListener("mouseleave", function(){

           // let cardTitle = this.querySelector(".movieTitle");
            let checkout = this.querySelector(".check-out");

       //     cardTitle.classList.remove("animate-show");
            checkout.classList.remove("animate-show");

        });
    })
</script>
















<?php
 require "scripts/footer_two.php";
?>