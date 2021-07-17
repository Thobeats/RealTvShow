<?php
    require "scripts/functions.php";

    require "scripts/header.php";


?>

            <div class="project">
                <div class="project__text-box">
                    <h1 class="heading-primary">
                        <span class="heading-primary--main">Reality Tv</span>
                        <span class="heading-primary--sub">cache of unique formats & talent</span>
                    </h1>        
                </div>
            </div>  

                <section class="section-realities">
                    <div class="u-center-text u-margin-bottom-large">
                            <h2 class="heading-tertiary">
                                Synopsis of 12 Realities
                            </h2>
                    </div>

                    <?php 
                            $movie_query = mysqli_query($link, "Select * from realtv_movies");

                            
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
                                    $movie_id = $movies['id'];


                            ?>
                            <div class="col-1-of-3">
                                <div class="card">
                                    <div class="card__side card__side--front">
                                        <div class="card__picture card__picture--1">
                                            <img src="img/uploads/<?= $img ?>" alt="card-pic" class="card__img">
                                        </div>
                                        <h4 class="card__heading">
                                            <span class="card__heading-span card__heading-span--1"><?= $title ?></span>    
                                        </h4>
                                    </div>
                                    <div class="card__side card__side--back card__side--back-1">
                                        <div class="card__cta">
                                            <a href="Eviewpage.php?id=<?= $movie_id ?>" class="bttn bttn--white">Check It Out Now</a>
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

 
                </section>
                
                <section class="section-projects">
                    <p class="Projects__paragraph">With great enthusiasm, RealityTVRegistry recommends these 15 projects. All have copyright 
                        protection and are available for option and acquisition. Additional proposals are being 
                        developed and may be viewable in mid-August.</p>
                </section>
        </main>

        <footer class="footer">
            <div class="row footer__high">
                <div class="col-1-of-2">
                        <div class="footer__logo-box">
                            <img src="img/logo.png" alt="Logo" class="footer__logo">
                        </div>
                    </div> 
                </div>
                <div class="col-1-of-2">
                     <div class="footer__navigation">
                     <h3 class="footer__heading"><b>About</b></h3>
                            <ul class="footer__list">
                                <li class="footer__item"></li><a href="reality.php" class="footer__link">Reality TV</a></li>
                                <li class="footer__item"></li><a href="faq.php" class="footer__link">Faq</a></li>
                                <li class="footer__item"></li><a href="login.php" class="footer__link">Login/signup</a></li>
                                <li class="footer__item"></li><a href="privacy.php" class="footer__link">Privacy policy</a></li>
                                <li class="footer__item"></li><a href="terms.php" class="footer__link">Terms of Service</a></li>
                            </ul>
                        <h3 class="footer__heading-2"><b>Community</b></h3>
                            <ul class="footer__list-2">
                                <li class="footer__item"></li><a href="future.php" class="footer__link">Future</a></li>
                                <li class="footer__item"></li><a href="promoteyou.php" class="footer__link">Promoting You</a></li>
                                <li class="footer__item"></li><a href="benefits.php" class="footer__link">Benefits</a></li>
                                <li class="footer__item"></li><a href="communications.php" class="footer__link">Communications</a></li>
                                <li class="footer__item"></li><a href="nda.php" class="footer__link">NDA Agreement</a></li>
                            </ul>
                        <h3 class="footer__heading-3"><b>Pages</b></h3>
                            <ul class="footer__list-3">
                                <li class="footer__item"></li><a href="index.php" class="footer__link">Home</a></li>
                                <li class="footer__item"></li><a href="aboutus.php" class="footer__link">About us</a></li>
                                <li class="footer__item"></li><a href="contactus.php" class="footer__link">Contact us</a></li>
                            </ul>
                    </div>
                    <div class="sprite">
                        <div class="sprite__icon-box">
                                <svg class="sprite__icon">
                                    <use xlink:href="img/sprite.svg#icon-accessibility"></use>
                                </svg>
                            <div class="sprite__user">
                                <span class="sprite__icon">USD</span>
                                    <svg class="sprite__icon sprite__icon-text">
                                        <use xlink:href="img/sprite.svg#icon-credit"></use>
                                    </svg>
                            </div>
                            <div class="sprite__user">
                                <span class="sprite__icon sprite__icon-text">English</span>
                                <svg class="sprite__icon sprite__icon-text">
                                    <use xlink:href="img/sprite.svg#icon-sphere"></use>
                                </svg>
                            </div>
                            <svg class="sprite__icon">
                                <use xlink:href="img/sprite.svg#icon-facebook2"></use>  
                            </svg>
                            <svg class="sprite__icon">
                                <use xlink:href="img/sprite.svg#icon-linkedin"></use>
                            </svg>
                            <svg class="sprite__icon">
                                <use xlink:href="img/sprite.svg#icon-pinterest"></use>
                            </svg>
                            <svg class="sprite__icon">
                                <use xlink:href="img/sprite.svg#icon-instagram1"></use>
                            </svg>
                            <svg class="sprite__icon">
                                <use xlink:href="img/sprite.svg#icon-twitter1"></use>
                            </svg>        
                        </div>
                    </div>
                </div>
                <p class="footer__copyright">
                        &copy;RealityTV International Limited 2021.
                    </p>
            </div>
        </footer>
    </body>
</html>