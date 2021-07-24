<?php
    require "scripts/functions.php";


    if(is_loggedIn()){
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

       

<?php 

        require "scripts/footer.php";

    }else{
        header("Location: signup.php");
    }



?>
