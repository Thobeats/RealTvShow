<?php

$navBar = true;
require("scripts/functions.php");

require("scripts/header_two.php");

?>

<style>
.sample{
    background-image: url(img/shoot2.jpg);
    height: 100vh;
    background-size : cover;
    background-position : top left;
    color : white;
    display: flex;
    align-items : center;
}

.sample-wrapper{
    text-align : center;
    font-family: "Montserrat", sans-serif;
    width : 100%;
}

.sample-wrapper h1{
    font-weight : 600;
    letter-spacing : 1.75rem;
    text-transform : uppercase;
}

.sample-wrapper p{
    font-weight : 300;
    letter-spacing : 1rem;
    text-transform : uppercase;
    width : 100%;
}

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
.movie-header{
    font-family: 'Zilla Slab', serif;    
    font-size : 60px;
    font-weight : 800;
    width : 250px;
    text-align : left;
    color : #041e3c;
    letter-spacing : 2px;
    text-transform : uppercase;
}

.movie-title{
    padding : 2px;
    font-family: 'Zilla Slab', serif;    
    font-size : 20px;
    font-weight : 300;
    color : #041e3c;
    letter-spacing : 2px;
}

.logline{
    position : relative;
    top : 70px;
}

.logline-header{
    font-family: 'Zilla Slab', serif;    
    font-size : 19px;
    font-weight : 600;
    letter-spacing : 2px;
}

.logline-para {
    padding-top : 10px;
    font-size : 15px;
    font-weight : 400;
    letter-spacing : 2px;
}

.logline-para p{
    font-family: 'Zilla Slab', serif;  
}

.features {
    list-style-type : none;
    padding : 10px;
    font-family: 'Zilla Slab', serif;   
    letter-spacing : 2px;
}

.features-list{
    margin : 2px;
    width : 120%;
}

.features-title{
    font-weight : 700;
    font-size: 20px;
}

.features-detail{
    width : 700px;
}

.synopsis_content{
    letter-spacing : 1px;
}

</style>

<section class="sample p-4">
    <div class="sample-wrapper m-auto d-flex flex-column justify-content-center">                
        <h1>Reality Tv</h1>
        <p class="mr-auto ml-auto">cache of unique formats & talent</p>                  
    </div>
</section>

<section class="d-flex justify-content-center p-4 mt-5 bg-light">
    <h3 class="zilla">ACTUAL DISPLAY LISTING AND IMAGE ENHANCED PITCH</h4>
</section>

<section class="sample_listings p-3">
    <div class="row">
        <?php
            $samples = mysqli_query($link, "select * from realtv_movies LIMIT 6");

            while($sample = mysqli_fetch_assoc($samples)):
        ?>
        <div class="col-lg-4 col-md-4 mt-5 card-col col-sm-6 d-flex justify-content-center">
            <div class="card movie-card" style="width: 80%; background: url(img/uploads/<?= $sample['movie_pic'] ?>); height: 200px; background-size: cover; cursor: pointer" >
                <div class="card-title mb-auto text-right text-light mt-4 d-flex justify-content-end" >
                    <p class="p-2 movieTitle"  style="background-image: linear-gradient(to right bottom, rgba(50, 149, 230, 0.85), rgba(0, 72, 131, 0.85)); width: 80%;"><?= $sample['movie_title'] ?></p> 
                </div>               
            </div>      
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php   

$random = rand(1,6);

$movie_data = mysqli_fetch_assoc(mysqli_query($link, "select * from realtv_movies where id = '$random'"));

?>
<section class="row my-4 p-2 movie-dets bg-light">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 p-5">
                    <h1 class="movie-header pt-2">
                        Title
                    </h1>
                    
                    <p class="movie-title mt-3">
                        <?= isset($movie_data['movie_title']) ? $movie_data['movie_title'] : 'Epic - Battles of Foreign Lands (Proposed filming in the US)' ?>                                    
                    </p>
                
                </div> 

                <div class="col-lg-9 col-md-12 col-sm-12 mb-5">
                    <div class="logline p-2">
                        <h3 class="logline-header">
                            Logline
                            <hr>
                        </h3>

                        <p class="logline-para">


                        <?= isset($movie_data['logline']) ? $movie_data['logline'] : 'A troop of 30 Roman Soldiers are led to battle against 30 Celti Gauls in this historically
                                                                                        significant encounter that occured, circa 525 BC. Among the destruction and burning ruins of a
                                                                                        Roman settlement, the Celtics are observed boasting until they see a troop of Roman Soldiers
                                                                                        charging at them. Combat is certain snd an Epic Battle of revenge ensues. A man-to-man clash of
                                                                                        soldiers wielding gladius type weaponry soon intensifies as antiquated pistols are drawn. In the end
                                                                                        either the Roman Soldiers or Celtic Gauls, will be declared victorious, and advance to battle again.
                                                                                        <b>Note:</b> Proprietary "BattleSafeWeaponry" is specially designed to insure non-injury conflicts)
                                                                                        ' 
                        ?>
                        
                        </p>

                        

                    </div> 
                </div>
                                        
            </div>
        
        </div>
    
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
        
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <ul class="features p-2">

                        <li class="features-list" >
                            <span class="features-title">
                                Proposal:
                            </span>

                            <span class="features-detail">
                            <?= isset($movie_data['movie_title']) ? $movie_data['movie_title'] : 'Epic - Battles on Foreign Lands [in the US]' ?>
                            
                            </span>


                        </li>


                        <li class="features-list" >
                            <span class="features-title">
                                Copyright:
                            </span>

                            <span class="features-detail">
                            <?= isset($movie_data['copyright']) ? $movie_data['copyright'] : 'US Copywright Office Title 17 - April 27, 2021' ?>
                            
                            </span>


                        </li>


                        <li class="features-list" >
                            <span class="features-title">
                                Reality:
                            </span>

                            <span class="features-detail">
                            <?= isset($movie_data['reality']) ? $movie_data['reality'] : 'Unscripted Format/12-episodes arc series' ?>
                            
                            </span>


                        </li>

                        <li class="features-list" >
                            <span class="features-title">
                                Option/Acquisition:
                            </span>

                            <span class="features-detail">
                            <?= isset($movie_data['acquisition']) ? $movie_data['acquisition'] : 'Negotiable/$300,000' ?>
                            
                            </span>


                        </li>

                        
                    </ul> 
                </div>

                <div class="col-lg-5 col-md-12 col-sm-6">
                    <img src="img/uploads/<?= $movie_data['movie_pic'] ?>" width="80%">
                </div>
                                        
            </div>
        
    
    </div>     
    
    <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
        <div class="synopsis p-2">
            <h3 class="logline-header">
                Synopsis
                <hr>
            </h3>

            <div class="synopsis_content zilla">
                <?= $movie_data['synopsis'] ?>
            </div>
        </div>
    </div>

</section>    

<section class="d-flex justify-content-end p-4">
    <a name="" id="" class="btn btn-warning" href="wregistration.php" role="button">Register Now</a>
</section>







<?php

require("scripts/footer_two.php");
?>