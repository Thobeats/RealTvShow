<?php 
require "scripts/functions.php";
require "scripts/header.php"; 

//var_dump($_SESSION);
?>

<?php get_message("error"); get_message('success') ?>

                <div class="header">
                    <div class="header__text-box">
                        <h1 class="heading-primary">
                            <span class="heading-primary--main">Reality Tv</span>
                            <span class="heading-primary--sub">cache of unique formats & talent</span>
                        </h1>        
                    </div>
                </div> 

                <section class="section-features">
                    <div class="row">
                        <div class="col-1-of-3">
                            <div class="feature-box">
                                <img src="img/act4.jpg" alt="feature-pic" class="feature-box__img">
                                <h2 class="heading-secondary"><a href="contestantsreg.php" class="feature-box__img--text">CONTESTANT & TALENT REGISTRATION</a></h2>
                            </div>
                        </div>

                        <div class="col-1-of-3">
                            <div class="feature-box">
                                <img src="img/shoot00.jpg" alt="feature-pic" class="feature-box__img">
                                <h2 class="heading-secondary"><a href="Eprojectsreg.php" class="feature-box__img--text">INDUSTRY TV EXECUTIVE REGISTRATION</a></h2>
                            </div>
                        </div>

                        <div class="col-1-of-3">
                            <div class="feature-box">
                                <img src="img/writer02.jpg" alt="feature-pic" class="feature-box__img">
                                <h2 class="heading-secondary"><a href="Wpromotingyou.php" class="feature-box__img--text">INDUSTRY WRITER'S REGISTRATION</a></h2>
                            </div>
                        </div>
                    </div>
                </section> 

                <section class="section-realities">
                    <div class="u-center-text u-margin-bottom-medium">
                        <h2 class="heading-tertiary">
                            Synopsis of 12 Realities
                        </h2>
                    </div>
                    <!-- <div class="row"> -->
                    <?php 
                            $movie_query = mysqli_query($link, "Select * from realtv_movies limit 9");

                            
                            $num_rows = $movie_query->num_rows;
                            if($num_rows > 0){
                                $row = ceil($num_rows / 3);
                                $row += 1;
                                $rowCount = 1; 
                                $start = 1;
                                

                                while ($rowCount < $row){
                                    $movie_multiple = 3 * $rowCount; 
                                
                                    //echo $rowCount;
                                //mysqli_data_seek($movie_query, $movie_multiple);
                            ?>
                            <div class="row"> 
                            <?php
                                $cardCount = $start; 
                            
                                while($cardCount < $movie_multiple+1){
                                    
                                    $movies = mysqli_fetch_assoc($movie_query);

                                    if($movies != NULL){
                                    $img = $movies['movie_pic']; $title = $movies['movie_title'];


                            ?>
                            <div class="col-1-of-3">
                                <div class="card">
                                    <div class="card__side card__side--front">
                                        <div class="card__picture card__picture--1">
                                            <img src="img/uploads/<?=$img ?>" alt="card-pic" class="card__img">
                                        </div>
                                        <h4 class="card__heading">
                                            <span class="card__heading-span card__heading-span--1"><?= $title ?></span>    
                                        </h4>
                                    </div>
                                    <div class="card__side card__side--back card__side--back-1">
                                        <div class="card__cta">
                                            <a href="signup.php" class="bttn bttn--white">Check It Out Now</a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php 
                            }

                            
                            
                            
                                $cardCount++;
                                if($cardCount % 3 == 0){
                                    $start = $cardCount + 1;
                                }
                            }

                            
                            
                            ?>
                            </div>
                        <?php $rowCount++;  //$start += $cardCount;
                            }
                        
                        } else { 
                        
                        
                       ?>
                     <div class="row">
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--4">
                                        <img src="img/oldwar.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--4">Battles of Foreign Lands</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-4">
                                    <div class="card__cta">
                                        <a href="signup.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--5">
                                        <img src="img/act3.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--5">Modelled to Market</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-5">
                                    <div class="card__cta">
                                        <a href="signup.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--6">
                                        <img src="img/shark2.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--6">Sharks on Wallstreet</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-6">
                                    <div class="card__cta"> 
                                        <a href="signup.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="u-center-text u-margin-top-big">
                        <a href="projects.php" class="btnn bttn--blue">Discover all realities</a>
                    </div>
                </section>

                <section class="section-slideshows">
                    <div class="u-center-text u-margin-bottom-medium">
                        <h2 class="heading-tertiary">
                            Reality TV member's benefits
                        </h2>
                    </div>

                    <button class="w3-button w3-display-left" onclick="plusSlides(-1)">&#10094;</button>
                    <button class="w3-button w3-display-right" onclick="plusSlides(+1)">&#10095;</button>
                        <div class="row">
                                <div class="slideshows" onclick="currentSlide(1)">
                                    <div class="col-1-of-2">
                                        <q class="slideshows__paragraph"> Inclusion of your credentials on the RealityTVRegistry platform </q>
                                    </div>
                                    <div class="col-1-of-2">
                                        <img class="slideshows__slides--img" src="img/write01.jpg">
                                    </div>
                                </div>
                            
                                <div class="slideshows" style= "display:none;" onclick="currentSlide(2)">
                                    <div class="col-1-of-2">
                                        <q class="slideshows__paragraph"> Priority status to participate in the production of your choice </q>
                                    </div>
                                    <div class="col-1-of-2">
                                        <img class="slideshows__slides--img" src="img/shoot2.jpg" >
                                    </div>
                                </div>
                            
                                <div class="slideshows" style= "display:none;" onclick="currentSlide(3)">
                                    <div class="col-1-of-2">
                                        <q class="slideshows__paragraph"> Your private account access, to view and edit your credentials </q>
                                    </div>
                                    <div class="col-1-of-2">
                                        <img class="slideshows__slides--img" src="img/Executive.jpg">
                                    </div>
                                </div>

                                <div class="slideshows" style= "display:none;" onclick="currentSlide(4)">
                                    <div class="col-1-of-2">
                                        <q class="slideshows__paragraph"> Promote your individual talents to producers and TV executives </q>
                                    </div>
                                    <div class="col-1-of-2">
                                        <img class="slideshows__slides--img" src="img/act000.jpg">
                                    </div>
                                </div>

                                <div class="slideshows" style= "display:none;" onclick="currentSlide(5)">
                                    <div class="col-1-of-2">
                                        <q class="slideshows__paragraph"> Casting companies access your info. and initiate contact  </q>
                                    </div>
                                    <div class="col-1-of-2">
                                        <img class="slideshows__slides--img" src="img/studio0.jpg">
                                    </div>
                                </div>

                                <div class="slideshows" style= "display:none;" onclick="currentSlide(6)">
                                    <div class="col-1-of-2">
                                        <q class="slideshows__paragraph"> Exposure to talent scouts with opportunity to be discovered</q>
                                    </div>
                                    <div class="col-1-of-2">
                                        <img class="slideshows__slides--img" src="img/write5.jpg">
                                    </div>
                                </div>

                                <div class="slideshows" style="display:none;" onclick="currentSlide(7)">
                                    <div class="col-1-of-2">
                                        <q class="slideshows__paragraph"> Keep you apprised of future reality productions</q>
                                    </div>
                                    <div class="col-1-of-2">
                                        <img class="slideshows__slides--img" src="img/write3.jpg">
                                    </div>
                                </div>
                        </div>  

                </section>

                <section class="section-billboard">
                    <div class="container">
                        <div class="row">
                            <div class="col-1-of-2">
                                <div class="billboard__group">
                                    <p class="billboard__paragraph">
                                        Registered members have <i class="billboard__link">priority</i> to be selected as <i class="billboard__link">participants</i> and to be represented in our Reality TV promotional campaigns.
                                    </p>
                                    <div class="billboard__cta"> 
                                        <a href="signup.php" class="butn butn--white">Get Started</a>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-1-of-2">
                                    <img src="img/act02.jpg" alt="card-pic" class="billboard__img">
                            </div>
                        </div>
                    </div>
                </section>
        </main>


                <!--
                <section class="grid-test">
                        <div class="row">
                            <div class="col-1-of-2">
                                Col 1 of 2
                            </div>
                            <div class="col-1-of-2">
                                Col 1 of 2
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1-of-3">
                                Col 1 of 3
                            </div>
                            <div class="col-1-of-3">
                                Col 1 of 3
                            </div>
                            <div class="col-1-of-3">
                                Col 1 of 3
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1-of-3">
                                Col 1 of 3
                            </div>
                            <div class="col-2-of-3">
                                Col 2 of 3
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1-of-4">
                                Col 1 of 4
                            </div>
                            <div class="col-1-of-4">
                                Col 1 of 4
                            </div>
                            <div class="col-1-of-4">
                                Col 1 of 4
                            </div>
                            <div class="col-1-of-4">
                                Col 1 of 4
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1-of-4">
                                Col 1 of 4
                            </div>
                            <div class="col-1-of-4">
                                Col 1 of 4
                            </div>
                            <div class="col-2-of-4">
                                Col 2 of 4
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1-of-4">
                                Col 1 of 4
                            </div>
                            <div class="col-3-of-4">
                                Col 3 of 4
                            </div>
                        </div>
                </section>
            -->
<?php require "scripts/footer.php"; ?>

                    
    