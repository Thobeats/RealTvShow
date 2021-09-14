<?php 
require "scripts/functions.php";


if(is_loggedIn()){

$logo = true; $fixed = true;
require "scripts/header_two.php"; 

$user_id = user_id();
$role = role(); 

function get_role(){
    $l = connect();
    $r = role();


    echo ucfirst(mysqli_fetch_assoc(mysqli_query($l, "select role_name from realtv_roles where id = '$r'"))['role_name']);
}

$tabl2 = get_table2_data($role);

$user_details = mysqli_fetch_object(mysqli_query($link, "select * from realtv_users a inner join $tabl2 b on a.unique_id = b.unique_id where a.id= '$user_id'"));

$fullname = $user_details->fullname;
?>
<style>
    .profile-body{
        margin-top : 33vh;
    }

    .cover-image{
        background-image: linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(img/Onboard1.jpg);
        height : 40vh;
        background-size : cover;
        background-position : center;
    }
    .img{
        transform : translateY(-70px);
        width : 250px;
        margin: 0 auto;
    }
    .fullname{
        text-transform : uppercase;
        font-family: 'Arial',serif;
        font-weight : 500;
        font-size : 45px;
    }
    .day{
        font-size : 50px;
        padding-top : 15px;
        font-weight : 600;
        text-transform: uppercase;
        font-family : 'Montserrat', serif;

    }
    .m-y{
        font-size : 20px;
        font-weight : 600;
        text-transform: uppercase;
        font-family : 'Montserrat', serif;

    }
    .bio-container{
        margin : 0px auto;
    }
    .realbtn{
        border : 1px solid;
        color: #000;
        letter-spacing : 0px;
    }
    @media only screen and (max-width: 768px) {
        .realbtn{
            padding : 8px;
        }
    }
    @media only screen and (max-width: 425px) {
        .profile-body{
            margin-top : 25vh;
        }
        .cover-image{
            height : 30vh;
        }
        .dt{
            transform : translateY(-70px);
        }

        .bio-container{
            margin : 0px 0px;
        }
        .realbtn{
            padding : 5px;
            font-size: 13px;
        }
    }

</style>

<section class="profile-body p-2 mx-2">
    <div class="row mx-auto" style="width: 100%">
        <div class="col-12">
            <div class="cover-image"></div>
            <div class="profile-image row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-center" >
                    <div class="img rounded-circle bg-light">
                        <img src="<?= $user_details->profile_pic != null ? 'img/uploads/' . $user_details->profile_pic : 'img/man.png' ?>" class="rounded" width="100%">
                    </div>                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 dt">
                   <h3 class="day w-100 text-center"><?= date('l') ?></h3>
                   <h3 class="m-y w-100 text-center"><?= date('M Y') ?></h3>
                   <h6 class="time w-100 text-center">
                       <span id="hrs"></span>
                       <span id="min"></span>
                       <span id="sec"></span>
                   </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-3 bio-container">
        <div class="col-12">
            <div class="bio p-2">
                <h3 class="poppins ml-4">Bio</h3>
                <hr>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Full Name</p>
            <p class="col-8">:  <?= $fullname ?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Username</p>
            <p class="col-8">:  <?= $user_details->username ?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Email</p>
            <p class="col-8">:  <?= $user_details->email?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Phone</p>
            <p class="col-8">:  <?= $user_details->phone_no ?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Role</p>
            <p class="col-8">:  <?= get_role() ?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Address</p>
            <div class="col-8">: <?= $user_details->address ?> </div>
        </div>
        <div class="col-12">
            <div class="edit text-right">
                <a href="edit_profile.php" class="realbtn"><i class="bi bi-pencil-square"></i>Edit Profile</a>
            </div>
        </div>
    </div>
</section>

<script>
    setInterval(function(){ curTime(); }, 1000);

   
    function curTime(){ 
        var today = new Date();

        $("#hrs").html(formatNum(today.getHours()) + " :");
        $("#min").html(formatNum(today.getMinutes()) + " :");
        $("#sec").html(formatNum(today.getSeconds()));
    }
    function formatNum(n){
        if(n < 10){
            return "0" + n;
        }else{
            return n;
        }
    }
</script>
<?php
 require "scripts/footer_two.php";

}else{
    header("Location: login.php");
}
?>