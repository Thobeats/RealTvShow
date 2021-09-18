<?php
$logo = true;
    require "scripts/functions.php";



    if(is_loggedIn()){
        $navBar = true;
    require "scripts/header_two.php";

    $user_id = unique_id();


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
    margin-left : 50%;
}.res{
    margin-top: 10px;
}.bookmark{
    font-size : 17px;
    font-family : 'Montserrat', serif;
    cursor: pointer;
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


        <section class="row my-4 p-2 movie-dets">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row" style="width: 100%;">                        
                    <div class="col-lg-2 col-md-2 col-2 p-0">
                        <h3 class="m-0 title">
                            Title:
                        </h3>
                    </div>
                    <div class="col-lg-10 col-md-10 col-10 p-0">
                        <h5 class="res pl-2"> 
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
        
        <div class="row my-2 text-right">
            <div class="col-12 btnContain">
                <?php 
                    $check = mysqli_query($link, "select * from realtv_executive_project where movie_id = '$id' and user_id='$user_id'");
                    if($check->num_rows == 1){
                ?>
                    <p class="p-4 bookmark"><i class="bi bi-bookmark-fill"></i> Bookmarked</p>
                <?php }else{ ?>
                    <p class="p-4 bookmark" data-id="<?= $id ?>" onclick="saveMovie(event)"> <i class="bi bi-bookmark"></i> Click to Bookmark</p>
                <?php } ?>
            </div>
        </div>



        <script>

                function saveMovie(event){
                    let id = event.target.dataset.id;
                    let url = "savemovie.php?id=" + id + "&user_id=" + '<?= $user_id ?>';

                    

                    //alert(url);

                    $.get(url, function(data){
                        if(data == 1){
                            document.querySelector(".btnContain").innerHTML = "";
                            document.querySelector(".btnContain").innerHTML = "<p class='p-4 bookmark'><i class='bi bi-bookmark-fill'></i> Bookmarked</p>";
                        }

                    }, "text");

                }

        </script>

        <?php 

        require "scripts/footer_two.php";

        }else{
        header("Location: login.php");
        }



?>
