<?php 
require "scripts/functions.php";


if(is_loggedIn()){

if(role() == 3){

if(isset($_GET['id'])){
$logo = true; $fixed = true;
require "scripts/header_two.php"; 



$query = mysqli_query($link, "Select * from realtv_writers");


?>

<style>
    .profile-body{
        margin-top : 33vh;
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
        }     
      
    }

</style>

<section class="profile-body p-2 mx-2">

    <div class="row">
        
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