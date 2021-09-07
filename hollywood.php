<?php 
$navBar = true;$logo =true;
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
.writer_side_para, .movie-para{
    font-size : 12px;
  
}
}
</style>


<?php include("floating_toggler.php"); ?>

<section class="promote-you p-2 my-5 px-3">

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
                    <a class="realbtn btn-dark border-bottom" href="sample.php">View Pitch Sample</a>
                </div>
                <?php 
                        if(!is_loggedIn()){ ?>
                <div class="col-lg-6 col-md-6 text-center p-3 col-sm-12">
                    <a class="realbtn btn-dark border-bottom" href="wregistration.php">Register</a>
                </div>
                <?php } ?>
            </div>
           
        </div>
        <?php require "scripts/sidebar_member_benefits.php"; ?>
    </div>
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>