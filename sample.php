<?php

$navBar = true;$logo=true;
require("scripts/functions.php");

require("scripts/header_two.php");

?>

<style>
.movie-dets{
    padding : 0px 15px;
    margin : 0px 15px;
}

.zilla{
    font-family: 'Zilla Slab', serif;    
}

.poppins{
    font-family: 'Poppins', sans-serif;
}
.title{
    text-align : right;
    font-size : 30px;
}
.movie_img{
    text-align : left;
}
.movie_img img{
    width : 70%;
}
.r{
    text-align : right;
}
.features{
    margin-left : 150px;
    font-size : larger;
    padding-left : 50px;
}

.features span{
    font-weight : 800;
}

.synopsis_content{
    letter-spacing : 1px;
}.res img{
    width : 80px !important;
    height : 80px !important;
}.res{
    margin-top: 10px;
}
    @media only screen and (max-width: 768px) {
        .title{
            text-align : right;
            font-size : 28px;
        }
        .res{
            margin-top: 0px;
            margin-left : 5px;
            margin-right : 20px;
            padding : 10px;
        }
        .features{
            margin-left : 0px;
            font-size : 15px;
        }
        .movie_img{
            text-align : center;            
        }
        .movie_img img{
            width : 70%;
            margin-top: 35px;
        }
    }

    @media only screen and (max-width: 425px) {
        .title{
            margin-bottom : 0px;
            font-size : 20px;
            text-align : left;
        }
        .synopsis{ 
            font-size : 20px;
        }
        .res{
            font-size : 15px;
            padding : 0px;
            margin : 3px 10px !important;
        }
        .features{
            margin-left : 0px;
        }
        .features p{
            font-size : 15px;
        }.r{
            text-align : right;
        }.movie_img{
            text-align : center;
        }
    }


</style>
<section class="d-flex justify-content-center p-4 mt-5 bg-dark">
    <h3 class="zilla text-light" style="text-transform: uppercase;">High Impact Home Page Display Listings And Image Enhanced Pitches</h4>
</section>

<section class="sample_listings p-3">
    <div class="row">
        <?php 
            $movie_query = mysqli_query($link, "Select * from realtv_movies limit 9");

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
                </div>
            </div>     
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php   

//$random = rand(1,6);

$movie_data = mysqli_fetch_assoc(mysqli_query($link, "select * from realtv_movies where id = '2'"));

?>
<section class="row my-4 p-2 movie-dets mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row" style="width: 100%;">                        
                    <div class="col-lg-2 col-md-2 col-2 p-0">
                        <h3 class="m-0 title">
                            Title:
                        </h3>
                    </div>
                    <div class="col-lg-10 col-md-10 col-10 p-0">
                        <h5 class="mt-1 ml-3 res"> 
                            <?= isset($movie_data['movie_title']) ? $movie_data['movie_title'] : 'Epic - Battles of Foreign Lands (Proposed filming in the US)' ?>                                    
                        </h5>
                    </div>                           

                    <div class="col-lg-2 col-md-2 col-sm-12 mt-2 title p-0">                            
                        <h3 class="m-0 title">
                            Logline:
                        </h3>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 mt-2">
                        <div class="res">
                        <?= isset($movie_data['logline']) ? $movie_data['logline'] : 'A troop of 30 Roman Soldiers are led to battle against 30 Celti Gauls in this historically
                                                                                        significant encounter that occured, circa 525 BC. Among the destruction and burning ruins of a
                                                                                        Roman settlement, the Celtics are observed boasting until they see a troop of Roman Soldiers
                                                                                        charging at them. Combat is certain snd an Epic Battle of revenge ensues. A man-to-man clash of
                                                                                        soldiers wielding gladius type weaponry soon intensifies as antiquated pistols are drawn. In the end
                                                                                        either the Roman Soldiers or Celtic Gauls, will be declared victorious, and advance to battle again.
                                                                                        <b>Note:</b> Proprietary "BattleSafeWeaponry" is specially designed to insure non-injury conflicts)
                                                                                        ' 
                        ?>

                        </div>
                    </div>
                                            
                </div>
                
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12 mt-4 feat">                    
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 p-0">
                        <div class="row features">
                            <p class="col-12">
                              <span class="text-right mr-2">Proposal:</span>  <?= isset($movie_data['movie_title']) ? $movie_data['movie_title'] : 'Epic - Battles on Foreign Lands [in the US]' ?>
                            </p>
                           
                            <p class="col-12">
                                <span class="text-right mr-2">Copyright:</span>    <?= isset($movie_data['copyright']) ? $movie_data['copyright'] : 'US Copywright Office Title 17 - April 27, 2021' ?>
                            </p>
                          
                            <p class="col-12">
                                <span class="text-right mr-2">Reality:</span> <?= isset($movie_data['reality']) ? $movie_data['reality'] : 'Unscripted Format/12-episodes arc series' ?>
                            </p>
                            
                            <p class="col-12">
                                <span class="text-right mr-2">Optional/Acquisition:</span> <?= isset($movie_data['acquisition']) ? $movie_data['acquisition'] : 'Negotiable/$300,000' ?>
                            </p>
                                
                        </div> 
                    </div>

                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="movie_img">
                        <img src="img/uploads/<?= $movie_data['movie_pic'] ?>">
                        </div>
                    </div>
                                            
                </div>            
            </div>     
            
            <div class="col-lg-2 col-md-2 col-sm-12 mt-2 p-0"> 
                <h3 class="title">
                    Synopsis:
                </h3>   
            </div>

            <div class="col-lg-10 col-md-10 col-sm-12 mt-2 p-0">   
                <div class="res px-2 mr-2">
                    <?php
                    
                        $synopsis = $movie_data['synopsis'];

                        $trimmed = str_replace(array('<p>&nbsp;</p>'), array(''), $synopsis);
                        $trimmed = str_replace(array('&nbsp;'), array(''), $synopsis);
                        echo $trimmed;
                    
                    ?>
                </div>
            </div>

        </section>        
<?php 
                        if(!is_loggedIn()){ ?>
<section class="d-flex justify-content-end p-4">
    <a name="" id="" class="realbtn btn-warning text-center" style="font-weight: 600; font-size: 20px;" href="wregistration.php" role="button">Register Now</a>
</section>
<?php } ?>







<?php

require("scripts/footer_two.php");
?>