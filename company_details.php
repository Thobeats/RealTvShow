<?php 
require "scripts/functions.php";


if(is_loggedIn()){

if(role() == 4 || role() == 3){

if(isset($_GET['id'])){
$logo = true; $fixed = true;
require "scripts/header_two.php"; 

$id = $_GET['id'];

$company = mysqli_fetch_assoc(mysqli_query($link, "select * from realtv_company where id = '$id'"));



?>

<style>
    .profile-body{
        margin-top : 33vh;
    } .realbtn{
        border : 1px solid;
        color: #000;
        letter-spacing : 0px;
    }.company_img{
        height : 300px;
    }

    @media only screen and (max-width: 768px) {
        .realbtn{
            padding : 8px;
        }
        table{
            font-family : "Poppins", serif !important;
        }
        
    }
    @media only screen and (max-width: 425px) {
        .profile-body{
            margin-top : 25vh;
        }  .company_img{
            height : 250px;
        }   
      
    }

</style>
<?= get_message("success"); get_message("error"); ?>

<section class="profile-body p-2 mx-2">

    <div class="row mx-auto w-100 mb-3 mt-3">
        <div class="col-lg-1 col-sm-0"></div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="company_img py-4">
                <img src="<?= $company['co_img'] ? 'img/uploads/' . $company['co_img'] : 'img/logo-placeholder.png' ?>" width="100%" height="100%" alt="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="company-name-and-website p-4">
                <h3 class="p-2"><?= $company['company_name'] ?></h3>
                <h6 class="p-2"><?= $company['co_address'] ?></h6>
                <h6 class="p-2"><?= $company['co_email'] ?></h6>
                <h6 class="p-2"><?= $company['co_phone'] ?></h6>
                
                <div class="mt-2">
                    <a target="_blank" href="<?= $company['co_web'] ?>"><i class="bi bi-globe"></i> View Website</a> 
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function(){
        $("#contestants").DataTable();

    })
</script>



<?php
 require "scripts/footer_two.php";
}else{
    $location = $_SESSION['index'];
    header("Location: $location");
}
    }else{
        $location = $_SESSION['index'];
        header("Location: $location");
    }
}else{
    header("Location: login.php");
}
?>