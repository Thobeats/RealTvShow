<?php 
$navBar = true; $logo =true;

require "scripts/functions.php";
require "scripts/header_two.php";

$uni = unique_id();

if(!is_loggedIn() || role() != 1){
    header("Location: signup.php");
}else{

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $movieQuery = mysqli_query($link, "select * from realtv_movies where id = '$id'");
    $movie_data = mysqli_fetch_assoc($movieQuery);
}

?>


<style>
.cover-image{
    background-image: url(img/Onboard1.jpg);
    height: 100vh;
    background-size : cover;
    background-position : top left;
    color : white;
    display: flex;
    align-items : center;
}

.cover-wrapper{
    text-align : center;
    font-family: "Montserrat", sans-serif;
    width : 100%;
}

.cover-wrapper h1{
    font-weight : 600;
    letter-spacing : 3px;
    text-transform : uppercase;
}

.cover-wrapper p{
    font-weight : 300;
    letter-spacing : 3px;;
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
    text-align : left;
    color : #041e3c;
    letter-spacing : 2px;
    text-transform : uppercase;
}

.movie-title{
    padding : 2px;
    font-family: 'Zilla Slab', serif;    
    font-size : 40px;
    font-weight : 700;
    color : #041e3c;
    text-transform : uppercase;
    letter-spacing : 2px;
    text-align : left;
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

.logline-para{
    padding-top : 15px;
    font-family: 'Zilla Slab', serif;    
    font-size : 15px;
    font-weight : 400;
    letter-spacing : 2px;
}

.features {
    list-style-type : none;
    padding : 10px;
    font-family: 'Zilla Slab', serif;   
    letter-spacing : 2px;
}

.features-list{
    margin : 2px;
    width : 100%;
}

.features-title{
    font-weight : 700;
    font-size: 20px;
}

.features-detail{
    width : 700px;
}

.member-benefits{
    padding : 20px 0px;
}

.card{
    background-color : inherit;
}

.quotes{
    padding-top : 10px;
    padding-right : 10px;
    font-size: 28px;
    width: 50%;
    color : #004883;
    font-family: 'Poppins', sans-serif;
    font-weight : 400;
    letter-spacing : 3px;
}

.m-title{
    font-size : 35px;
    letter-spacing : 2px;
    font-weight : 800;
}

.seeking{
    padding-top : 10px;
    font-family: 'Zilla Slab', serif;    
    font-size : 15px;
    font-weight : 400;
    letter-spacing : 2px;
}

    @media only screen and (max-width: 768px) {

        .cover-image{
            height: 50vh;
            width : 100%;  
            background-position : top right;  
        }.cover-wrapper h1{ 
            font-size : 40px;           
            width : 100%;
        }.cover-wrapper p{
            width : 100%;
        }
        .movie-title, .movie-header{
            text-align : center;
            border: 1px: solid;
        }.features{
            text-align : center;
        }
    }

    @media only screen and (max-width: 425px) {
        .cover-image{
            height : 50vh;
            background-position : center right;
        }

          .cover-wrapper{
            width : 425px;
        }
        .cover-wrapper h1{ 
            font-size : 25px; 
            letter-spacing : 2px;
        }

        .cover-wrapper p{
             font-size : 15px;
             letter-spacing : 1px;
        }

        .movie-title, .movie-header{
            text-align : center;
        }

        .features-list{
            width: 100%;
        }

        .carousel{
            height : 50vh;
        }

       .carousel img{
           padding-top : 35px;
           width : 200px;
           height : 150px;
       }

       .quotes{
        padding-top : 20px;
        font-size: 14px;
       }

       .card{
          margin-top: 50px;
       }

       .fa{
           font-size: 15px;
       }
    }

</style>
        <section class="cover-image p-4">
             <div class="cover-wrapper m-auto d-flex flex-column justify-content-center">                
                <h1>Reality Tv</h1>
                <p class="mr-auto ml-auto">on location to a cache of unique formats & talent</p>                  
            </div>
        </section>
        
        <section class="row my-4 p-2 movie-dets">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="d-flex justify-content-center">
                    <div class="row" style="width: 100%;">
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <h1 class="movie-header pt-2 text-center">
                                        Title
                                    </h1>
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <h1 class="movie-title py-4">
                                        <?= isset($movie_data['movie_title']) ? $movie_data['movie_title'] : 'Epic - Battles of Foreign Lands (Proposed filming in the US)' ?>                                    
                                    </h1>
                                </div>
                            </div>
                        </div> 

                        <div class="col-lg-12 col-md-12 col-sm-12 mb-5">
                            <div class="logline p-2">
                                <h3 class="logline-header">
                                    Logline
                                    <hr>
                                </h3>

                                <div class="logline-para">


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
                                        Purpose:
                                    </span>

                                    <span class="features-detail">
                                    <?= isset($movie_data['purpose']) ? $movie_data['purpose'] : 'Filming pre-production sizzle reels & qualifying' ?>
                                    
                                    </span>


                                </li>

                                <li class="features-list" >
                                    <span class="features-title">
                                        When / Where:
                                    </span>

                                    <span class="features-detail">
                                    <?= isset($movie_data['when_and_where']) ? $movie_data['when_and_where'] : 'July 2021 - Los Angeles and Las Vegas' ?>
                                    
                                    </span>


                                </li>

                                <li class="features-list" >
                                    <span class="features-title">
                                        Pay range:
                                    </span>

                                    <span class="features-detail">
                                    <?= isset($movie_data['pay_range']) ? $movie_data['pay_range'] : 'Pre-production $50.00/hr.' ?> 
                                    </span>


                                </li>

                                <li class="features-list" >
                                    <span class="features-title">
                                        Limited to:
                                    </span>

                                    <span class="features-detail">
                                    <?= isset($movie_data['limited_to']) ? $movie_data['limited_to'] : '350 propective contestants' ?>
                                    
                                    </span>


                                </li>

                                
                            

                            </ul> 
                        </div>

                        <div class="col-lg-5 col-md-12 col-sm-6">
                            <div class="movie_img text-center my-2">
                              <img src="img/uploads/<?= $movie_data['movie_pic'] ?>" width="50%">
                            </div>
                        </div>
                                                
                    </div>
                    <hr>
                
            
            </div>

            <div class="col-12">
                <div class="d-flex justify-content-center seeking">
                    <p class="mt-4 ">
                        <?= $movie_data['seeking']; ?>
                    </p>
                </div>
            </div>

            <?php
    
                $pic_query = mysqli_query($link, "select * from realtv_movie_pics where movie_id = '$id'");
            ?>

            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="d-flex justify-content-center mb-4">
                    <div class="row">                           
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-3 text-center">
                            <img src="img/uploads/<?= mysqli_fetch_object($pic_query)->movie_pic; ?>" width="80%">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-3 text-center">
                            <h4 class="text-center zilla">Join our team today!</h4>
                            <a href="payment.php?contestant=<?= $uni ?>&id=<?= $movie_data['id'] ?>&price=<?= $movie_data['reg_fee'] ?>&sng=1" class="btn btn-warning mt-2">EZ $<?= $movie_data['reg_fee'] ?? "55" ?> to Register</a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-3 text-center">
                            <img src="img/uploads/<?= mysqli_fetch_object($pic_query)->movie_pic; ?>" width="80%">
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 mt-4 mb-3">
                <div class="d-flex justify-content-center">
                    <div class="row">                           
                        <div class="col-lg-12 col-md-4 col-sm-12 mt-3 text-center" style="text-transform: uppercase;">
                            <h4 class="text-center zilla"> As a Registered Member, We Campaign for Your Success</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5">
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

       <?php require "scripts/footer_two.php"; }?>