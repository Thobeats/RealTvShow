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
                <h2 class="px-5 pt-5 pb-2 promote_you_header ">FAQs </h2>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        <i>Please note – RTVR never collects a fee when matching individuals for casting assignments and acting
                        rolls. Likewise, we never collect fees when pairing writer’s material with TV executives.</i>
                    </p>                   
                </div>
            </div>

            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">contestant & talent</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <ul class="writer_side_para">
                       <li>
                            RTVR is a platform that TV industry executive’s access to fulfill casting assignments for acting rolls.
                            Casting relates to general contestants and for specific talent. Your credentials are only available to
                            executives who are seeking casting assignments, and are registered for access.
                       </li>
                       <li>RTVR employs several mix-media sources to promote your talents including, TV executive
                            communications, magazine, industry publications, direct mail and opt-in emails</li>
                       <li> The when/where date, posted on the Reality TV Program page is tentative. If selected, you will be
                            informed of the exact time and exact location of pre-production events. </li>
                       <li>Pre-production event participation pays $50/hr. with 1099 tax status.</li>
                       <li>Pay scales for reality programming is subject to union levels and standards of the Networks.</li>
                       <li>Registration of a reality TV format insures; you will be given priority status in pre-production sizzle reels
                            or for future casting of TV programming.</li>
                       <li>We will always prioritize your participation in the reality program that you register for. If you wish, we will
                            also consider adding you to the list of your second-choice reality at no additional fee. (providing your
                            credentials qualify you for your second choice).</li>
                       <li>Pre-production sizzle reels are short simulations of actual acts, competition segments and sample
                           communications of characters in proposals.</li>
                    </ul>
                </div>
            </div>  
            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">writers</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                <ul class="writer_side_para">
                       <li>
                            Writers have the option to submit material in a standard listing format or to enlist in a block display
                            presentation with Image Enhancement Pitch proposals.
                       </li>
                       <li>RTVR functions as a viable resource destination for Industry TV Executives to review and discover
                            unique Reality formats and the writers who have created the material.</li>
                       <li> Your Reality pitch or script is only available to industry TV executives who are registered as decision-
                            makers with authority to review, option and acquire material. </li>
                       <li>All Industry TV executive registrations are closely vetted to insure, legitimacy before granting their
                            access.</li>
                       <li>RTVR employs several mix-media sources to promote your reality proposals, including, industry TV
                            executive communications, magazine, industry publications, direct mail and opt-in emails.</li>
                       <li>Your account page displays a status report that indicates which executives and producers have
                            reviewed your reality pitch on a certain date.</li>
                       <li>Industry TV executives and producers have ability to contact you directly.</li>
                       <li>You have 24-hour access to edit and/or submit additional pitches.</li>
                    </ul>
                </div>
            </div> 
            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">industry tv executives</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                <ul class="writer_side_para">
                       <li>
                       RTVR functions as a viable resource destination for Industry TV Executives to review and discover
                       fulfillment.
                       unique Reality proposals, writers, special talent and contestants for reality TV programming and casting
                       </li>
                       <li>After registration and vetting is complete, you have 24-hour access to review unique reality
                            proposals, talent and contestants.</li>
                       <li> YYou are able to initiate contact with all registered writers, talent and contestants. </li>
                       <li>We do not collect finder fees when contracts are executed with writers and talent.</li>
                       <li>As a fiduciary, all RTVR executives and staff will honor your privacy and confidentiality in all
                        matters including discussions, option proposals and contracts with concerning individuals and
                        companies.</li>                      
                    </ul>
                </div>
            </div>  
        </div>
    </div>
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>