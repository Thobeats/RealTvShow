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
.movie-dets{
    padding : 0px 15px;
    margin : 0px 15px;
}.zilla{
    font-family: 'Zilla Slab', serif;    
}.poppins{
    font-family: 'Poppins', sans-serif;
}
.features p {
    margin : 1px 0px;
}.member-benefits{
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
}

.m-title{
    font-size : 35px;
    letter-spacing : 2px;
    font-weight : 800;
}

.seeking{
   margin : 0px 30px;
}
.title{
    text-align : right;
}
.movie_img{
    text-align : left;
}
.movie_img img{
    width : 70%;
}.r{
    text-align : right;
}

    @media only screen and (max-width: 768px) {
        .movie_img{
            text-align : center;
            
        }
        .movie_img img{
            width : 70%;
            margin-top: 35px;
        }
    }

    @media only screen and (max-width: 425px) {
        .carousel{
            height : auto;
        }
        .title{
            font-size : 20px;
        }
        .res{
            font-size : 16px;
        }
        .features p{
            font-size : 12px;
        }.r{
            text-align : center;
        }
       .quotes{
        font-size: 12px;
        letter-spacing : 0px;
       }

       .card{
          margin-top: 50px;
       }

       .fa{
           font-size: 15px;
       }
       .title{
            text-align : left;
        }.movie_img{
            text-align : center;
        }
        .seeking{
            margin : 0px 5px;
            font-size : 13px;
        }.member-benefits img{
            display : none;
        }.quotes{
            width : 80%;
            font-size : 10px;
            font-weight : 300;
        }
    }

</style>
        
        <section class="row my-5 p-2 movie-dets">
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


            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12 p-0">
                           <div class="row features">
                                <p class="col-4 r">
                                    Proposal
                                </p>
                                <p class="col-8">
                                : <?= isset($movie_data['movie_title']) ? $movie_data['movie_title'] : 'Epic - Battles on Foreign Lands [in the US]' ?>

                                </p>
                                <p class="col-4 r">
                                    Copyright
                                </p>
                                <p class="col-8">
                                : <?= isset($movie_data['copyright']) ? $movie_data['copyright'] : 'US Copywright Office Title 17 - April 27, 2021' ?>

                                </p>
                                <p class="col-4 r">
                                    Reality
                                </p>
                                <p class="col-8 ">
                                : <?= isset($movie_data['reality']) ? $movie_data['reality'] : 'Unscripted Format/12-episodes arc series' ?>

                                </p>
                                <p class="col-4 r">
                                    Purpose
                                </p>
                                <p class="col-8">
                                : <?= isset($movie_data['purpose']) ? $movie_data['purpose'] : 'Filming pre-production sizzle reels & qualifying' ?>

                                </p>
                                <p class="col-4 r">
                                    When / Where
                                </p>
                                <p class="col-8">
                                : <?= isset($movie_data['when_and_where']) ? $movie_data['when_and_where'] : 'July 2021 - Los Angeles and Las Vegas' ?>
                                </p>
                                <p class="col-4 r">
                                    Pay Range
                                </p>
                                <p class="col-8">
                                : <?= isset($movie_data['pay_range']) ? $movie_data['pay_range'] : 'Pre-production $50.00/hr.' ?>
                                </p>
                                <p class="col-4 r">
                                   Limited To
                                </p>
                                <p class="col-8">
                                : <?= isset($movie_data['limited_to']) ? $movie_data['limited_to'] : '350 propective contestants' ?>
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

            <div class="col-12 mt-3 text-center seeking">
                <p class="mt-4 ">
                    <?= $movie_data['seeking']; ?>
                </p>
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
                    <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                        <div class="carousel-inner ">
                            <div class="carousel-item active">
                                <div class="card mt-0">
                                    <div class="card-body d-flex justify-content-center">
                                        <div class="quotes zilla text-center">
                                        
                                            Big 93% advantage to be casted when promoted by a business 
                                            
                                        </div>
                                            <img class="" src="img/write01.jpg" width="350px">

                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card mt-0">
                                    <div class="card-body d-flex justify-content-center">
                                        <div class="quotes text-center">
                                        
                                            Priority status to participate in the production of your choice
                                                                            
                                        </div>
                                            <img class="" src="img/shoot2.jpg" width="350px">

                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card mt-0">
                                    <div class="card-body d-flex justify-content-center">
                                        <div class="quotes text-center">
                                    
                                            Your private account access, to view and edit your credentials 
                                                                                
                                        </div>
                                            <img class="" src="img/Executive.jpg" width="350px">

                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card mt-0">
                                    <div class="card-body d-flex justify-content-center">
                                        <div class="quotes text-center">
                                        
                                            Promote your individual talents to producers and TV executives 
                                                                                
                                        </div>
                                            <img class="" src="img/act000.jpg" width="350px">

                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card mt-0">
                                    <div class="card-body d-flex justify-content-center">
                                        <div class="quotes text-center">
                                        
                                            Casting companies access your info. and initiate contact
                                                                                    
                                        </div>
                                            <img class="" src="img/studio0.jpg" width="350px">

                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card mt-0">
                                    <div class="card-body d-flex justify-content-center">
                                        <div class="quotes text-center">
                                    
                                            Exposure to talent scouts with opportunity to be discovered
                                                                                    
                                        </div>
                                            <img class="" src="img/write5.jpg" width="350px">

                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card mt-0">
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