<?php
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
.project{
    background-image: url(img/shoot2.jpg);
    height: 100vh;
    background-size : cover;
    background-position : top left;
    color : white;
    display: flex;
    align-items : center;
}

.project-wrapper{
    text-align : center;
    font-family: "Montserrat", sans-serif;
    width : 100%;
}

.project-wrapper h1{
    font-weight : 600;
    letter-spacing : 1.75rem;
    text-transform : uppercase;
}

.project-wrapper p{
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

    @media only screen and (max-width: 1024px) {
        .project{
            height: 50vh;
            width : 100%;  
            background-position : top right;  
        }

        .project-wrapper h1{ 
            font-size : 40px;           
            width : 100%;
        }

        .project-wrapper p{
            width : 100%;
        }

        

    }

    @media only screen and (max-width: 425px) {
        .project-wrapper{
            width : 425px;
        }
        .project-wrapper h1{ 
            font-size : 25px; 
        }

        .project-wrapper p{
             font-size : 15px;
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
            <section class="project p-4">
                <div class="project-wrapper m-auto d-flex flex-column justify-content-center">                
                    <h1>Reality Tv</h1>
                    <p class="mr-auto ml-auto">cache of unique formats & talent</p>                  
                </div>
            </section>

            <section class="row my-4 p-2 movie-dets">
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

        <?php 

        require "scripts/footer_two.php";

        }else{
        header("Location: login.php");
        }



?>
