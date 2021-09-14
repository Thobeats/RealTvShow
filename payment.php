<?php $title = "RealTv Registry - Payment"; ?>
<?php 
$logo = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 



if(!is_loggedIn()){
    set_message("info", "Signup to continue");
    header("Location: signup.php");
}else{


    if(isset($_GET['contestant'])){
        $id = $_GET['id'];
        $price = $_GET['price'];
        $pac = null;
        $uni = $_GET['contestant'];
        $user_type = "contestant";
        $mov_id = $id;
        
    }


    if(isset($_GET['writer'])){
        $mid = $_GET['item'];
        $price = $_GET['price'];
        $pac = $_GET['pac'];
        $uni = $_GET['writer'];
        $user_type = "writer";
        $mov_id = $mid;

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
                
                <?php  if(isset($_GET['sng'])) {  
                        $mov_id = $id;

                    $movie = get_movie($link, $id); 
                ?>
                <div class="form-group text-center">
                    <img src="img/uploads/<?= $movie['movie_pic'] ?>" width="100%" alt="<?= $movie['movie_title'] ?>">
                    <p class=""><?= $movie['movie_title'] ?></p>
                </div>
                <?php }elseif(isset($_GET['multi'])){ 
                    $list = substr($id,0,-1);
                    $mov_id = $list;

                    $list = explode(",", $list);
                    foreach($list as $id){
                     $movie = get_movie($link, $id); 
                ?>
                     <div class="form-group text-center">
                        <img src="img/uploads/<?= $movie['movie_pic'] ?>" width="100%" alt="<?= $movie['movie_title'] ?>">
                        <p class=""><?= $movie['movie_title'] ?></p>
                    </div>
                <?php }} ?>
                <div class="form-group" id="paynow">
                   
                </div>
                
            </form>
        </div>
    </div>

</div>
<?php $paypal = true ?>
<?php 
    require"scripts/footer_two.php"; 
} 
?>