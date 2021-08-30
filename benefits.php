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
                <h2 class="px-5 pt-5 pb-2 promote_you_header ">contestant/talent and writer benefits </h2>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        Your benefits can start today. TV industry executives have 24-hour access to the RTVR platform in
                        which, to scout reality talent for casting and acting rolls, and to discover unique and original material
                        from writers who display reality TV projects. Through our promotional campaigns RTVR members
                        obtain a competitive advantage of being discovered.
                    </p>
                    <p class="writer_side_para">
                        <i style="text-decoration: underline;"><b>Executive access is granted to Producers, Networks Executives and Casting Companies.</b></i>                        
                    </p>
                    <p class="writer_side_para">
                        These individuals have full access privileges to proposed reality programming and talent credentials,
                        that are submitted by registered individuals.
                    </p>
                </div>
            </div>

            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">contestant/talent benefits</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <ol class="writer_side_para">
                       <li>Big 93% advantage to be cast when promoted by RealityTVRegistry.</li>
                       <li>Priority status to participate in the Reality production of your choice.</li>
                       <li> Your private account access, to view and edit your credentials.</li>
                       <li> We promote your individual talents to producers and TV executives.</li>
                       <li> Casting companies can view your talents and contact you directly.</li>
                       <li> Exposure to talent scouts with opportunity to be discovered.</li>
                       <li> We keep you apprised of future Reality TV productions.</li>
                    </ol>
                </div>
            </div>  
            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">writer benefits</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <ol class="writer_side_para">
                       <li>Inclusion of <a href="sample.php">Image Enhancement Pitches</a> on the RealityTVRegistry platform.</li>
                       <li>Advantage to be promoted via Business-To-Business approach.</li>
                       <li> Strict vetting process to verify legitimate industry TV executives.</li>
                       <li> Your account access to identify companies who have viewed your material.</li>
                       <li> Account access to edit and upload additional reality proposals.</li>
                       <li> We promote your unique material to producers and TV executives.</li>
                       <li> Producers and networks access your reality pitch and initiate contact.</li>
                       <li> We keep you apprised of future industry trade opportunities.</li>
                    </ol>
                </div>
            </div>  
        </div>
    </div>
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>