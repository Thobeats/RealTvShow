<?php
$logo = true;
    require "scripts/functions.php";



    if(is_loggedIn()){
        $navBar = true;
    require "scripts/header_two.php";



    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $movie_query = mysqli_query($link, "select * from realtv_movies where id = '$id'");

        $movie_data = mysqli_fetch_assoc($movie_query);
    }


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

.synopsis_content{
    letter-spacing : 1px;
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
        .title{
            font-size : 20px;
            text-align : left;
        }
        .synopsis{ font-size : 20px;}
        .res{
            font-size : 15px;
        }
        .features p{
            font-size : 12px;
        }.r{
            text-align : center;
        }.movie_img{
            text-align : center;
        }
    }

</style>


        <section class="row my-4 p-2 movie-dets">
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
                                    Option/Acquisition
                                </p>
                                <p class="col-8 ">
                                    : <?= isset($movie_data['acquisition']) ? $movie_data['acquisition'] : 'Negotiable/$300,000' ?>
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
            </div>     
            
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="p-2">
                    <h3 class="synopsis">
                        Synopsis
                        <hr>
                    </h3>

                    <div class="res">
                        <?php
                        
                         $synopsis = $movie_data['synopsis'];

                         $trimmed = str_replace(array('<p>&nbsp;</p>'), array(''), $synopsis);
                         $trimmed = str_replace(array('&nbsp;'), array(''), $synopsis);
                         echo $trimmed;
                        
                        ?>
                    </div>
                </div>
            </div>

        </section>       

        <?php 

        require "scripts/footer_two.php";

        }else{
        header("Location: login.php");
        }



?>
