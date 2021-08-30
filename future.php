<?php 
$navBar = true; $logo = true;
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
                <h2 class="px-5 pt-5 pb-2 promote_you_header ">future of reality tv </h2>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        Creators and producers of Reality TV are individuals who think outside main stream programming. Most have
                        a viewpoint that the genre of reality programming expands the opportunities of diverse forms of hybrid shows,
                        which have consistently been on the growth side. With the audience’s interest in event-type programming of
                        real (non-actor) people, the addictive appetite of viewers will be sustained for years to come.
                    </p>
                    <p class="writer_side_para">
                        As Producers and Networks seek the discovery of real people with unique professions and businesses,
                        captivating lives of individuals and groups, future growth of Reality programming will prove to experience
                        significant growth in the film industry.
                    </p>
                </div>
            </div>

            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">sizzle reels</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        A sizzle reel is basically a &quot;proof of concept&quot; reel that depicts a real segment, action, or brief demonstration
                        contained within a proposed reality project. Its creation can significantly assist producers to better understand
                        the storyline and views of the personalities to be programmed.
                    </p>
                </div>
            </div>  
        </div>
    </div>
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>