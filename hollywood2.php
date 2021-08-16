<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);
?>
<style>
    .cover-image{
    background-image: url(img/camera8.jpg);
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
    letter-spacing : 1.75rem;
    text-transform : uppercase;
}

.cover-wrapper p{
    font-weight : 300;
    letter-spacing : 1rem;
    text-transform : uppercase;
    width : 100%;
}

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

.promote-you h3{
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

.promote-you h3::before{
    display: inline-block;
    background-color :  #004883;
    content : " ";
    width : 10px;
    height : 19px;
    margin-right : 3px;
}

.writer_side_para, .movie-para{
    font-size : 14px;
    font-family : 'Poppins', serif;
    font-weight : 300;
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
}
</style>

<section class="cover-image p-4">
    <div class="cover-wrapper m-auto d-flex flex-column justify-content-center">                
        <h1>Reality Tv</h1>
        <p class="mr-auto ml-auto">cache of unique formats & talent</p>                  
    </div>
</section>

<?php include("floating_toggler.php"); ?>

<section class="promote-you p-2 my-5">

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row d-flex justify-content-start">
                <h2 class="p-5 promote_you_header">Hollywood Outsiders Claim Success</h2>
            </div>

            <div class="row p-2">
                <div class="col-12 pl-3">
                    <ol class="writer_side_para">
                        <li>A few, recent success stories of individuals who pitched their unique material to 
                        producers and then prospered from their efforts.</li>
                        </br>
                        <li>John Stewart of Deerfield, Illinois was a former professional wrestler. His program, 
                        Bizarre World in Artifact Collection was sold to Fox TV Studios.</li>
                        </br>
                        <li>Steve Santini of Ontario, Canada created a Docuseries that was acquired by Buck
                        Productions and aired on A&E Australia.</li>
                        </br>
                        <li>Stephan Reichel from Minnesota found his success when selling his Docuseries
                        about Unique Professions. His program airs on Neon Television and Discovery
                        Channel.</li>
                        </br>
                        <li>Leisa Naples created a Docuseries titled, Happily Ever After, with the Mullins. Her
                        Success was found through Dick Clark Productions and Freemantle Media.</li>
                        </br>
                        <li>Dorie Genlesse was busy creating a variety of programs. Her success includes contracts 
                        of seven programs with Smoke and Mirrors Productions and with Fox’s Mobbed TV 
                        Series.</li>
                        </br>
                        <li>Steven Blanchard created and also stars in his Docuseries, Saw Dogs, acquired by
                        Discovery International, and Chainsaw Sculptors acquired from the Velocity Channel
                        and OLN</li>
                        </br>
                        <li>David Howe from Fredrick, Maryland sold an un-named Docuseries television concept
                        to Buck Productions.</li>
                        </br>
                        <li>Kenny Rowlette from Rockton, Illinois found success when contracting with Kingfish
                        Productions for his collaboration in an original reality television series.</li>
                        </br>
                        <li>Timothy Centner from a tiny rural town contracted with MDR Entertainment for his 
                        original concepts in reality television programming.</li>
                    </ul>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6 col-md-6 text-center p-3 col-sm-12">
                    <a class="realbtn border-bottom" href="sample.php">View Pitch Sample</a>
                </div>
                <div class="col-lg-6 col-md-6 text-center p-3 col-sm-12">
                    <a class="realbtn border-bottom" href="wregistration.php">Register</a>
                </div>
            </div>
           
        </div>
        <?php require "scripts/sidebar_member_benefits.php"; ?>
    </div>
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>