<?php $title = "RealTv Registry - Payment"; ?>
<?php 
$logo = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 



if(!is_loggedIn() && role() != 1){
    set_message("info", "Signup to continue");
    header("Location: contestant_signup.php");
}else{


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $movie = get_movie($link, $id);
}

?>

<style>
    .main {
        margin : 3rem 0;
        padding-bottom : 3rem;
    }
    
    .pay-title{
        font-family: 'Poppins', sans-serif;
        font-size : 25px;
        font-weight : 500;
        width : 250px;
        text-align : center;
        color : #041e3c;
    }

    form{
        font-family: 'Poppins', sans-serif;
    }

    .btn {
        color : white; 
        background-color : #041e3c;
        transition : 0.5s linear;
    }

    .btn:hover {
        color : white;
        background-color : #072e5d;
    }
</style>

<div class="row pt-2 main">
    <div class="col-lg-12 d-flex justify-content-center my-4">
        <div class="pay-title pl-2 text-center">        
            Payment Details        
        </div>
    </div>
    <div class="col-lg-12">
        <div class="d-flex justify-content-center">
            <form action="" method="post" style="width : 400px;">
                
                
                <div class="form-group text-center">
                    <img src="img/uploads/<?= $movie['movie_pic'] ?>" width="100%" alt="<?= $movie['movie_title'] ?>">
                    <p class=""><?= $movie['movie_title'] ?></p>
                </div>

                <div class="form-group" id="paynow">
                   
                </div>
                
            </form>
        </div>
    </div>

</div>
<?php $paypal = true ?>
<?php 

require"scripts/footer_two.php"; 

} ?>