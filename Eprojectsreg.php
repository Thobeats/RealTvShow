<?php
    $navBar = true; $logo=true;
    require "scripts/functions.php";


    if(is_loggedIn() && role() == '3'){
        require "scripts/header_two.php"; 

        //var_dump($_SESSION);
        ?>
        
        <?php get_message("error"); get_message('success') ?>
        
        
        <section class="landing-page-movie">
            <div class="landing-synopsis text-center ">
                <h2 class="landing-header">synopsis of 12 realities</h2>
            </div>
        
            <div class="row py-5">
                <?php 
                    $movie_query = mysqli_query($link, "Select * from realtv_movies");
        
                    while($movie = mysqli_fetch_object($movie_query)):
        
                        $moviePic = $movie->movie_pic;
                ?>
                <div class="col-lg-4 col-md-4 mt-5 col-sm-6">
                    <div class="card movie-card border-0 mx-auto" style="cursor: pointer; background-color: inherit">
                        <div class="card-body p-0" style="height: 70%;">
                            <img src="img/uploads/<?= $moviePic ?>" class="movie-card-body"  alt="">
                        </div>
                        <div class=" movieTitle my-0 p-2">
                            <p><?= $movie->movie_title ?></p>
                            <a href="Eviewpage.php?id=<?= $movie->id ?>" class="bg-warning check text-dark">Check it out</a>
                        </div>
                    </div>     
                </div>
                <?php endwhile; ?>
            </div>
            
         
        </section>
        
        <section class="py-4 note">
            <div class="col-12">
                <p class="text-center p-4">
                With great enthusiasm, RealityTVRegistry recommends these 15 projects. All have copyright protection and are available for option and acquisition. Additional proposals are being developed and may be viewable in mid-August.
                </p>
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
        
        <script>
            let movieCard = document.querySelectorAll(".movie-card");
        
            movieCard.forEach((card)=>{
                card.addEventListener("mouseover", function(){
        
                    let cardTitle = this.querySelector(".movieTitle");
                    let checkout = this.querySelector(".check-out");
        
              //      cardTitle.classList.add("animate-show");
                    checkout.classList.add("animate-show");
        
                });
        
                card.addEventListener("mouseleave", function(){
        
                    let cardTitle = this.querySelector(".movieTitle");
                    let checkout = this.querySelector(".check-out");
        
                   // cardTitle.classList.remove("animate-show");
                    checkout.classList.remove("animate-show");
        
                });
            })
        </script>
 <?php
         require "scripts/footer_two.php";

    }elseif(is_loggedIn() && role() != '3'){
        set_message("error", "Not Authorized");
        header("Location: index.php");
    }else{
        header("Location: login.php");
    }



?>