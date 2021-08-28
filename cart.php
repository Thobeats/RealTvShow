<?php 
require_once "scripts/functions.php";

if(is_loggedIn && (role() == 1)){
require "scripts/header_two.php";

$unique_id = $_SESSION['unique_id'];


$cartquery = mysqli_query($link, "select * from realtv_cart where user_id = '$unique_id' and status = 'Pending'");
?>


<style>
    .card{
        
    }
</style>

<section class="p-5 bg-light">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2 mx-2 bg-white border p-0">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-cart-tab" data-toggle="pill" href="#v-pills-cart" role="tab" aria-controls="v-pills-cart" aria-selected="true">Cart</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
        </div>
        <div class="col-8 bg-white border">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-cart" role="tabpanel" aria-labelledby="v-pills-cart-tab">
                    <div class="cart p-5">
                        <div class="row">
                            <?php 
                                while($cart = mysqli_fetch_assoc($cartquery)): 
                                    $project_id = $cart['project_id'];
                                    $projectQuery = mysqli_query($link, "select * from realtv_movies where id='$project_id'");
                                    $project = mysqli_fetch_assoc($projectQuery);
                            ?>
                            <div class="col-12">
                                <div class="row border my-2">
                                    <div class="col-8 p-2">
                                        <div class="d-flex">
                                            <img src="img/uploads/<?= $project['movie_pic'] ?>" width="150px" height="100px"  alt="">
                                            <div class="p-4 d-flex flex-column"><?= $project['movie_title'] ?></div>
                                        </div>                                        
                                    </div>
                                    <div class="col-4 d-flex justify-content-center">
                                        <h3 class="d-flex flex-column justify-content-center"><?= $project['reg_fee'] ?></h3>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div> -->
            </div>
        </div>
    </div>

</section>


<?php
 require "scripts/footer_two.php";
}else{
    header("Location: index.php");
}
?>