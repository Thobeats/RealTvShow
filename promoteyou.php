<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);
?>
<style>
.promote-you{
    height : auto;
}

.promote-you h2{
    text-transform : uppercase;
    letter-spacing: 1px;
    font-family: 'Poppins', serif;
    font-weight : 600;
}

.promote-you h4{
    text-transform : uppercase;
    letter-spacing: 1px;
    font-family: 'Poppins', serif;
    font-weight : 400;
}

.promote-you h5{
    text-transform : uppercase;
    letter-spacing: 1px;
    font-family: 'Poppins', serif;
    font-weight : 600;
}

.promote_you_header::before{
    display: inline-block;
    background-color :  #004883;
    content : " ";
    width : 10px;
    height : 23px;
    margin-right : 3px;
}


.promote-you h5::before{
    display: inline-block;
    background-color :  #004883;
    content : " ";
    width : 10px;
    height : 15px;
    margin-right : 3px;
}
.writer_side_para, .movie-para{
    font-size : 14px;
    font-family : 'Poppins', serif;
    font-weight : 300;
}

.promote_img{
    width : 300px;
    height : 250px;
    transform : scale(0.7);
}

.movie-para{
    margin-top : -30px;
}

@media only screen and (max-width: 768px) {
    .promote_img{
    width : 180px;
    height : 140px;
}

.movie-para{
    margin-top : 0px;
    margin-top : -20px;
    font-size : 10px;
    margin-right : -10px;

}
    
}


@media only screen and (max-width: 425px) {

body{
    width : auto;
}

.cover-image{
    height : 50vh;
    background-position : center right;
}

.cover-wrapper h1{
    font-size : 25px;
    letter-spacing : 2px;
}

.cover-wrapper p{
    font-size : 15px;
    letter-spacing : 1px;
}



.writer_side_para, .movie-para{
    font-size : 12px;
  
}

.promote_img{
    width : 150px;
    height : 100px;
}

.movie-para{
    margin-top : 0px;
    margin-top : -10px;
    border: 1px solid;
   
}
}
</style>



<section class="promote-you p-2 mt-2 mb-5">

    <div class="row">
        <div class="col-12">
            <div class="row d-flex justify-content-start">
                <h2 class="p-5 promote_you_header">promoting you </h2>
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

            <div class="row d-flex justify-content-start">
                <h5 class="pt-5 pl-5 pb-2 promote_you_header">current programs having participation </h5>
            </div>

            <div class="row">
                <?php 
                    $movie_query = mysqli_query($link, "Select * from realtv_movies");

                    while($movie = mysqli_fetch_object($movie_query)):

                        $moviePic = $movie->movie_pic;
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 mt-2">
                    <p class="p-2 text-center bg-light my-0"><?= $movie->movie_title ?></p>                
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>