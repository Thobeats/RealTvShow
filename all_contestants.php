<?php 
require "scripts/functions.php";


if(is_loggedIn()){

if(role() == 3 || role() == 4){
$logo = true; $fixed = true;
require "scripts/header_two.php"; 


?>

<style>
    .profile-body{
        margin-top : 33vh;
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
      
    }

</style>

<section class="profile-body p-2 mx-2">
   
</section>




<?php
 require "scripts/footer_two.php";
    }
}else{
    header("Location: login.php");
}
?>