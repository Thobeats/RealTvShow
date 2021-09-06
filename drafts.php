<?php 
$navBar =true; $logo = true;
require_once "scripts/functions.php";

if(is_loggedIn && (role() == 2)){
require "scripts/header_two.php";

$unique_id = $_SESSION['unique_id'];


$draftquery = mysqli_query($link, "select * from realtv_drafts where created_by = '$unique_id' and status = 'Pending'");
?>


<style>
   .draft-text{
       font-size : 20px;
       text-transform : uppercase;
       font-family : 'Poppins', serif;
       color : #004883;
   }

   .draft-img{
       width : 200px;
       height : 150px;
   }

   .draft-btn{
       padding : 5px 10px;
       border : none;
       font-size : 15px;
       color : #004883;
   }
   
   .draft-desc{
       font-size : 20px;
       text-transform : capitalize;
       font-family : 'Poppins', serif;
       color : #004883;
   }


   @media only screen and (max-width: 425px) {
        .draft-desc{
            text-align : center;
        }
        .draft-action{
            padding : 5px;
        }
   }

   
</style>

<section class="px-5 my-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <p class="border border-light draft-text p-2" style="background-color: #e6e6e6;"><i class="bi bi-pencil-square"></i> draft</p>
            <?php 
                while($draftItem = mysqli_fetch_object($draftquery)): 
                    
                
                
            ?>
            <div class="row my-2 py-2" style="background-color: #e6e6e6;">

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="draft-img mx-auto">
                        <img src="img/uploads/<?=$draftItem->movie_pic ?>" alt="" width="100%" height="100%">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mt-4 draft-desc">
                        <p class="">
                            <?= $draftItem->movie_title ?>
                        </p>
                     
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="mt-4 draft-action" style="display:flex; justify-content: center"> 
                        <button class="draft-btn btn-light mx-2 text-danger" data-id="<?= $getProject->id ?>">Delete</button>           
                        <button class="draft-btn btn-light mx-2" data-id="<?= $getProject->id ?>">Edit</button>
                        <a href="payment.php?id=<?= $getProject->id  ?>" class="draft-btn mx-2 btn-light text-success" >Submit</a>
                    </div> 
                </div>
                
                  
                             
            </div>
            <?php endwhile; ?>
        </div>
       
    </div>
</section>


<?php
 require "scripts/footer_two.php";
}else{
    header("Location: index.php");
}
?>