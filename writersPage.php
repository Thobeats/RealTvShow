<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);
?>


<style>
    .first_post_pic{
        background-image : url(img/promotingyou.jpeg);
        background-size : cover;
        height : 60vh;
    }

    .second_post_pic{
        background-image : url(img/write06.jpeg);
        background-size : cover;
        background-position : center;
        height : 30vh;
    }

    .third_post_pic{
        background-image : url(img/write07.jpeg);
        background-size : cover;
        background-position : center;
        height : 30vh;
    }

    .fourth_post_pic{
        background-image : url(img/hollywood.jpeg);
        background-size : cover;
        background-position : center;
        height : 30vh;
      
    }

    .fifth_post_pic{
        background-image : url(img/options.jpeg);
        background-size : cover;
        background-position : center;
        height : 30vh;
        
    }

    .sixth_post_pic{
        background-image : url(img/pitch_reality.jpeg);
        background-size : cover;
        background-position : center;
        height : 30vh;        
    }

    .post_text{
        background-color : #004883;
        height : 10vh;
      
    }

    .post_link{
        color : white;
        text-decoration : none;
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        text-transform : uppercase;
        letter-spacing : 1px;

    }

    .post_link:hover{
        color : white;
        text-decoration : none;
    }

    .col-6 {
        margin : 10px 0;
    }

    .btn {
        text-transform : uppercase;
    }

    .regnow{
        background-image : url(img/write9.jpeg);
        background-size : cover;
        background-position : center right;
        width : 100%;
        height : 10vh;
    }

    .regnow_link{
        text-decoration : none;
        color : #004000;
        font-family: 'Poppins', sans-serif;
        font-size: 20px;
        
    }

    .regnow_link:hover{
        text-decoration: none;
    }



    
@media only screen and (max-width: 768px) {
    .post_link {
        font-size: 15px;
    }

   
}

@media only screen and (max-width: 425px) {
    .post_link, .btn{
        font-size : 10px;
        font-weight : 400;
    }

    .second_post_pic,.fifth_post_pic, .fourth_post_pic, .third_post_pic {
        height : 20vh;
    }

    .post_text{
        height : 6vh;
        padding : 0;
    }



}
</style>

<section class="py-5 px-2" style="height : auto">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column tile">
                        <div class="first_post_pic"></div>
                        <div class="post_text d-flex flex-column justify-content-center pt-1">
                            <a href="" class="post_link text-center">promoting your material</a>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="d-flex flex-column">
                        <div class="fourth_post_pic"></div>
                        <div class="post_text d-flex flex-column justify-content-center pt-1">
                            <a href="" class="post_link text-center">hollywood outsiders</a>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="d-flex flex-column">
                        <div class="fifth_post_pic"></div>
                        <div class="post_text d-flex flex-column justify-content-center pt-1">
                            <a href="" class="post_link text-center">business of options</a>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <div class="second_post_pic"></div>
                        <div class="post_text d-flex flex-column justify-content-center pt-1">
                            <a href="" class="post_link text-center">business of writing</a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <div class="third_post_pic"></div>
                        <div class="post_text d-flex flex-column justify-content-center pt-1">
                            <a href="" class="post_link text-center">pitching reality</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <div class="sixth_post_pic"></div>
                        <div class="post_text d-flex flex-column justify-content-center pt-1">
                            <a href="" class="post_link text-center">display listing and image pitch</a>
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <a href=""></a>
                </div>                
            </div>
        </div>
    </div>
</section>




<?php
 require "scripts/footer_two.php";
?>