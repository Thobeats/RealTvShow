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
    $proposal = "<b class='heading'>Proposal: </b>" . $movie_data['movie_title']; 
    $copyright = "<b class='heading'>Copyright: </b>" . $movie_data['copyright']; 
    $reality = "<b class='heading'>Reality: </b>" . $movie_data['reality']; 
    $purpose = "<b class='heading'>Purpose: </b>" . $movie_data['purpose'];
    $pay_range = "<b class='heading'>Pay Range: </b>" . $movie_data['pay_range']; 
    $when_n_where = "<b class='heading'>When / Where: </b>" . $movie_data['when_and_where']; 
    $limited_to = "<b class='heading'>Limited To: </b>" . $movie_data['limited_to']; 

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
}.card{
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
}.features{
    margin-left : 150px;
    font-size : 13pt;
    padding-left : 50px;
}

.seeking{
   margin : 0px 30px;
   font-size : larger;
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
    font-size : 18pt;
    margin-top : 5px;
}
.movie_img{
    text-align : left;
}
.movie_img img{
    width : 100%;
}.r{
    text-align : right;
}
.top{
    padding : 0 50px;
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


    <div class="col-lg-12 col-md-12 col-sm-12 mt-4 feat">                    
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
                        <?= $purpose ?>
                    </p>
                    
                    <p class="col-12">
                        <?= $when_n_where ?>
                    </p>
                    <p class="col-12">
                        <?= $pay_range ?>
                    </p>
                    
                    <p class="col-12">
                        <?= $limited_to ?>
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
                    <img src="img/uploads/<?= mysqli_fetch_object($pic_query)->movie_pic ?>" width="100%">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3 text-center">
                    <h4 class="text-center zilla">Join our team today!</h4>
                    <a href="payment.php?contestant=<?= $uni ?>&id=<?= $movie_data['id'] ?>&price=<?= $movie_data['reg_fee'] ?>&sng=1" class="btn btn-warning mt-2">EZ $<?= $movie_data['reg_fee'] ?? "55" ?> to Register</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3 text-center">
                    <img src="img/uploads/<?= mysqli_fetch_object($pic_query)->movie_pic ?>" width="100%">
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
                                
                                    Big 93% advantage to be cast when promoted by a business 
                                    
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

    <div class="col-12 mt-4">
        <div class="row p-2">
            <h2 class="promote_you_header pl-3">Promoting You </h2>
        </div>
        <div class="row p-2">
            <div class="col-12 pl-3">
                <p class="writer_side_para">
                    Diverse groups of industry professionals gather here, to explore the possibility of discovery and growth. Casting companies are able to review the credentials of individuals registered for their interest in casting assignments and prospective rolls. 
                    Identified as television industry's marketplace for talent and creation, the Reality TV Registry platform is accessed by decision-makers of leading Production Companies and TV Networks seeking talent and original TV programming ideas and scripts. Their scope of interest embraces all genres of Reality TV programming. 
                </p>

                <p class="writer_side_para">
                    From the RTVR platform we promote your individual talents to producers, talent scouts, and network executives for all major networks and cable networks. Individuals from these companies have active casting assignments for a diversity of rolls to fill. The Reality TV Registry platform is just one of the many mediums implemented in our strategic approach to promotional campaigns. Social Media is one our mediums to fill casting assignments and rolls. 
                    Yes, it is true that at times, the likelihood of one’s success may be hinged on who you know. This reality cannot be truer, in the entertainment industry. With this in mind, your potential success is greatly leveraged when we campaign on your behalf.  
                </p>

                <p class="writer_side_para">
                    Have you ever experienced someone of great talent performing in an obscure or tiny venue and thought to yourself; why aren’t they performing in Vegas or in a pack filled arena. Or maybe on TV. Most often, the reason is simply that their talent wasn’t adequately promoted. 
                    Assuming one has great skill, success generally stems from PROMOTION. 
                </p>

                <p class="writer_side_para">
                    Performers, whether it be actors, musicians, dancers, special acts or routines are rarely schooled in effective marketing and promotional techniques. Consequently, some of the greatest talent is never cast or seen in acting rolls. 
                    There are tens-of-thousands of individuals who are yet to break through and achieve recognition and success in which they are so deserving. 
                </p>

                <p class="writer_side_para">
                    Meeting your expectations: When you register to be a member of the RealityTVRegistry, you expect that our firm will deliver as promised. As the founder of this company, it is my personal belief that our success will be directly measured by your success. There rests, our duty to perform.
                    The Reality TV Registry site has been developed as a promotional platform that lists promising reality shows by promising writers. As a member, talent or contestant, you have first priority and opportunity to be participate in their productions.  Producers and Networks seek fresh ideas in programming and the talent associated in support of a successful show. 
                </p>
            </div>
        </div>
    </div>
</section>    

       <?php require "scripts/footer_two.php"; }?>