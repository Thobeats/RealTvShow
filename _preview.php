<?php

require "scripts/functions.php";

if(isset($_SESSION['preview'])){


$imgs = $_SESSION['imgs'];
$imgs = explode(",", $imgs);

$display_img = current($imgs);

}


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

.logline-para {
    font-size : 17px;
    font-weight : 400;
    letter-spacing : 1px;
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
    width : 100%;
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
    font-size : 18px;
}

@media only screen and (max-width: 768px) {
        .movie-title, .movie-header{
            text-align : center;
            border: 1px: solid;
        }.features{
            text-align : center;
        }
    }

@media only screen and (max-width: 425px) {

body{
    width : auto;
}
.movie-title, .movie-header{
    text-align : center;
    border: 1px: solid;
}.features-list{
    width: 100%;
}

}

</style>

<section class="row my-4 p-2 movie-dets bg-light">
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
                            <?= isset($_SESSION['title']) ? $_SESSION['title'] : 'No title' ?>                                    
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


                    <?= isset($_SESSION['logline']) ? $_SESSION['logline'] : ' No logline ' ?>
                    
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
                            <?= isset($_SESSION['title']) ? $_SESSION['title'] : 'No title' ?>
                            
                            </span>


                        </li>


                        <li class="features-list" >
                            <span class="features-title">
                                Copyright:
                            </span>

                            <span class="features-detail">
                            <?= isset($_SESSION['copyright']) ? $_SESSION['copyright'] : 'No Copyright' ?>
                            
                            </span>


                        </li>


                        <li class="features-list" >
                            <span class="features-title">
                                Reality:
                            </span>

                            <span class="features-detail">
                            <?= isset($_SESSION['reality']) ? $_SESSION['reality'] : 'No reality' ?>
                            
                            </span>


                        </li>

                        <li class="features-list" >
                            <span class="features-title">
                                Option/Acquisition:
                            </span>

                            <span class="features-detail">
                            <?= isset($_SESSION['acquisition']) ? $_SESSION['acquisition'] : 'No acquisition' ?>
                            
                            </span>


                        </li>

                        
                    </ul> 
                </div>

                <div class="col-lg-5 col-md-12 col-sm-6">
                    <div class="movie_img text-center my-2">
                        <img src="img/uploads/<?= $display_img ?>" width="50%">
                    </div>
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
                <?php
                
                    $synopsis = $_SESSION['synopsis'];

                    $trimmed = str_replace(array('<p>&nbsp;</p>'), array(''), $synopsis);
                    $trimmed = str_replace(array('&nbsp;'), array(''), $synopsis);
                    echo $trimmed;
                
                ?>
            </div>
        </div>
    </div>

</section>    
<?php

echo "</body>
</html>";
?>