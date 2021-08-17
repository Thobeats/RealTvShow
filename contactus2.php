<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);
?>
<style>
    .cover-image{
    background-image: url(img/drone4.jpg);
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
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.274) ,rgba(0, 0, 0, 0.219));
}

.cover-wrapper h1{
    font-weight : 600;
    letter-spacing : 1.75rem;
    text-transform : uppercase;
}.cover-wrapper p{
    font-weight : 300;
    letter-spacing : 1rem;
    text-transform : uppercase;
    width : 100%;
}.about-us-wrapper{
    height : auto;
}.about-us{
    text-transform : uppercase;
    font-weight : 500;
    font-family: 'Poppins', serif;
    font-size: 20px; 
    letter-spacing : 3px;   
}.about-us-text{
    font-family: 'Poppins', serif;
    font-size : 15px;
    letter-spacing : 2px;
    font-weight : 300;
}.about-us-img{
    width : 100%;
    clip-path : polygon(0% 0%, 0% 100%, 100% 96%, 100% 0%);
}@media only screen and (max-width: 768px) {.about-us{font-weight : 500;font-size: 15px; }.about-us-text{font-size : 12px;} .img-wrapper{margin-top: 50px;}  .cover-image{height: 80vh;} }
@media only screen and (max-width: 425px) {body{width : auto;}.about-us{font-weight : 500;font-size: 12px;}
    .about-us-text{font-size : 10px;}
    .about-us-img{
        width: 70%;
    }
    .cover-image{
        height:50vh;background-position : center right;
    }
    .cover-wrapper h1{
        font-size : 25px;
        letter-spacing : 2px;
    }.cover-wrapper p{
        font-size : 15px;
        letter-spacing : 1px;
    }.img-wrapper{
        margin-top: -30px;
    }
}
</style>

<section class="cover-image p-4">
    <div class="cover-wrapper m-auto d-flex flex-column justify-content-center">                
        <h1>Reality Tv</h1>
        <p class="mr-auto ml-auto">cache of unique formats & talent</p>                  
    </div>
</section>

<section class="about-us-wrapper">
    <div class="row p-3">
        <div class="col-lg-12 d-flex justify-content-center pt-4">
            <p class="pl-5 about-us text-center"> Please refer to <a href="#">FAQ’s</a> page for quick answers to your question </p>
        </div>        
    </div>

    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="about-us-text px-5 pb-5 text-center">
                <p>
                    In the essence of this community, aspiring individuals of great talent and ambition 
                    convene, on their paths to discovery. With your commitment for success, we pledge to reveal your individual 
                    talents in the quest of your discovery.
                </p>

                <p>
                    Our philosophy is simple. Attaining success for talent suspended in anonymity, can 
                    simply result in that individual aligning with a source who possesses relentless drive to promote their talent 
                    until the dream is realized.
                </p>

                <p>
                    The founder is known for his marketing and promotional skills. With more than 35 
                    years-experience in developing, targeting and implementing successful marketing strategies, the founder has 
                    secured multi-year commitments with hundreds of companies and Fortune 500 entities located within the continental 
                    United States and Hawaii.
                </p>
                <p>
                With the many forms of advertising mediums, selecting an effective mix is essential if 
                            success is to be achieved. As the founder, I pledge that the staff at Reality TV Registry is committed in advancing 
                            your talent and success.  
                            Not to be overstated, this highly diverse destination has been developed to elevate our client’s visibility and 
                            promote their skills, whether it be their special talents, competitiveness or unique reality proposals.
                </p>
            </div>
        </div>

        <div class="col-lg-4 col-md-5 col-sm-12 p-0 mb-5">
            <div class="p-2 img-wrapper text-center">
                <img src="img/shoot7.png" alt="" class="about-us-img">
            </div>
        </div>
    </div>
</section>

     



<?php
 require "scripts/footer_two.php";
?>