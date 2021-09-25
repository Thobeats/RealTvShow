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
.heading{
    display:inline-block;
    width : 100px;
}
.title{
    font-size : 18pt;
    font-weight : 800;
    font-family : 'Poppins', serif;
}
.logline{
    font-size : 16pt;
    margin-top : 5px;
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
    font-size : 13pt;
    padding-left : 50px;
}
.feat_heading{
    display:inline-block;
    width : 180px;
}.synopsis{
    font-size : 16pt;
}.synopsis img{
    width : 80px !important;
    height : 80px !important;
    margin-left : 50%;
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
//Title 
$movie_title = isset($movie_data['movie_title']) ? $movie_data['movie_title'] : 'Epic - Battles of Foreign Lands (Proposed filming in the US)';
$title = "<b class='heading'>Title:</b> ". $movie_title;

//Logline
$movie_logline = isset($movie_data['logline']) ? $movie_data['logline'] : 'A troop of 30 Roman Soldiers are led to battle against 30 Celti Gauls in this historically
                                                                                        significant encounter that occured, circa 525 BC. Among the destruction and burning ruins of a
                                                                                        Roman settlement, the Celtics are observed boasting until they see a troop of Roman Soldiers
                                                                                        charging at them. Combat is certain snd an Epic Battle of revenge ensues. A man-to-man clash of
                                                                                        soldiers wielding gladius type weaponry soon intensifies as antiquated pistols are drawn. In the end
                                                                                        either the Roman Soldiers or Celtic Gauls, will be declared victorious, and advance to battle again.
                                                                                        <b>Note:</b> Proprietary "BattleSafeWeaponry" is specially designed to insure non-injury conflicts)
                                                                                        ' ;
$logline = preg_replace("/<p>/", "<p><b class='heading'>Logline:</b>  ",$movie_logline, 1);

//Features
$proposal = "<b class='feat_heading'>Proposal: </b>" . $movie_data['movie_title']; 
$copyright = "<b class='feat_heading'>Copyright: </b>" . $movie_data['copyright']; 
$reality = "<b class='feat_heading'>Reality: </b>" . $movie_data['reality']; 
$option = "<b class='feat_heading'>Option/Acquisition: </b>" . $movie_data['acquisition'];


//Synopsis
$movie_synopsis = $movie_data['synopsis'];

$trimmed = str_replace(array('<p>&nbsp;</p>', '&nbsp;'), array('',''), $movie_synopsis);
$synopsis = preg_replace("/<p>/", "<p><b class='heading'>Synopsis:</b>  ",$trimmed, 1);

?>
<section class="row my-5 p-2 movie-dets">
    <div class="col-lg-12 col-md-12 col-sm-12 top">
        <div class="row mx-auto" style="width: 100%;">                        
            <div class="col-12 p-0">
                <div class="mx-auto title"> 
                    <?= $title ?>                                    
                </div>
            </div>   
        </div>
        <div class="row mx-auto" style="width: 100%;"> 
            <div class="col-12 mt-2 p-0">
                <div class="logline">
                    <?= $logline   ?>
                </div>
            </div>                              
        </div>    
    </div>


            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">                    
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 p-0">
                        <div class="row features">
                            <p class="col-12">
                                <?= $proposal ?>
                            </p>
                            
                            <p class="col-12">
                            <?= $copyright ?>
                            </p>
                            
                            <p class="col-12">
                                <?= $reality ?>
                            </p>
                            
                            <p class="col-12">
                                <?= $option ?>
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
             <div class="col-12 mt-2 p-0">   
                <div class="synopsis">
                    <?= $synopsis  ?>
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