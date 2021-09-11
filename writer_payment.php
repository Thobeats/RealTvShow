<?php 
$navBar = true; $logo = true;
require "scripts/functions.php";

if(is_loggedIn() && (role() == 2)){
require "scripts/header_two.php"; 

if(isset($_GET['mid'])){
    $mid = $_GET['mid'];
    $uni = unique_id();

}

//var_dump($_SESSION);
?>

<style>
    .m-a{
        color: inherit;
        display: block;
    }
    .pay_card{
        cursor : pointer;
        display: flex;
        flex-direction : column;
        align-items : center;
        justify-content: center;
    }
    #standard{
        background-image : linear-gradient(to bottom, rgba(250, 250, 250, 0.762),rgba(250, 250, 250, 0.762)),url(img/write.jpg);
        background-size : cover;
        background-position : center right;
        height : 50vh;       
    }

    #standard:hover{
        background-image: linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(img/write.jpg);
        color : #ccc;
    }

    #enhanced{
        background-image : linear-gradient(to bottom, rgba(250, 250, 250, 0.762),rgba(250, 250, 250, 0.762)),url(img/studio3.jpg);
        background-size : cover;
        background-position : center right;
        height : 50vh; 
    }

    #enhanced:hover{
        background-image: linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(img/studio3.jpg);
        color : #ccc;
    }

    @media only screen and (max-width: 768px) {
        .c{
           margin-top : 10px;
        }
    }
    @media only screen and (max-width: 425px) {
        .pay_card h3{
            font-size: 18px;
        }
        .pay_card h6{
            font-size: 14px;
        }
    }
</style>

<section class="m-5 p-3">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <a class="m-a" href="payment.php?writer=<?=$uni ?>&pac=standard&item=<?=$mid?>&price=95">
                <div class="card">
                    <div class="card-body pay_card rounded" id="standard">
                        <h3 class="text-center">Standard Pitch Submission</h3>
                        <h6>6 Months</h6>
                        <h6>$95 per pitch</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 c">
            <a class="m-a" href="payment.php?writer=<?=$uni ?>&pac=enhanced&item=<?=$mid?>&price=250">
                <div class="card">
                    <div class="card-body pay_card" id="enhanced">
                        <h3 class="text-center">Display Listing and Image Enhanced Pitch</h3>
                        <h6>6 Months</h6>
                        <h6>$250 per pitch</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <p class="text-center">
                RealityTVRegistry functions as a viable resource destination for Industry TV Executives to review and discover unique
                reality programming. Writers who pitch their original material have a great opportunity to be read and discovered for their creative works.
            </p>
        </div>
    </div>
</section>


<?php
 require "scripts/footer_two.php";
}else{
    $location = $_SESSION['index'] ?? 'index.php';
    header("Location: $location");
}
?>