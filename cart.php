<?php 
$navBar =true; $logo = true;
require_once "scripts/functions.php";

if(is_loggedIn && (role() == 1)){
require "scripts/header_two.php";

$unique_id = $_SESSION['unique_id'];


$cartquery = mysqli_query($link, "select * from realtv_cart where user_id = '$unique_id' and status = 'Pending'");
?>


<style>
   .cart-text{
       font-size : 20px;
       text-transform : uppercase;
       font-family : 'Poppins', serif;
       color : #004883;
   }

   .cart-img{
       width : 200px;
       height : 150px;
   }

   .cart-btn{
       padding : 5px 10px;
       border : none;
       color : #004883;
   }
   
   .cart-desc{
       font-size : 20px;
       text-transform : capitalize;
       font-family : 'Poppins', serif;
       color : #004883;
   }

   @media only screen and (max-width: 425px) {
        .cart-desc{
            text-align : center;
            font-size : 15px;
        }
        .cart-action{
            padding : 5px;
        }
        .total{
            margin-top: 20px;
        }
        .cart-btn{
            font-size : 15px;
        }
   }


   
</style>

<section class="px-5 my-4">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <p class="border border-light cart-text p-2" style="background-color: #e6e6e6;"><i class="bi bi-cart2"></i> Cart</p>
            <?php 
                $total = 0; $uni = unique_id(); $id_list = "";
                while($cartItem = mysqli_fetch_object($cartquery)): 
                    $projectID = $cartItem->project_id;
                    $getProject = mysqli_fetch_object(mysqli_query($link, "select * from realtv_movies where id = '$projectID'"));
                
                
            ?>
            <div class="row my-2 py-4" style="background-color: #e6e6e6;">

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="cart-img mx-auto">
                        <img src="img/uploads/<?=$getProject->movie_pic ?>" alt="" width="100%" height="100%">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mt-4 cart-desc">
                        <p class="">
                            <?= $getProject->movie_title ?>
                        </p>
                        <p>
                        $<?= $getProject->reg_fee ?> 
                        <?php (int)$total += (int)$getProject->reg_fee; $id_list .= $cartItem->project_id . ","; ?>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="mt-4 cart-action" style="display:flex; justify-content: center">    
                        <a href="c_movie_view.php?id=<?= $getProject->id  ?>" class="cart-btn mx-2 btn-light text-warning" >View</a>        
                        <button onclick = "removeFromCart(event)" class="cart-btn btn-light text-danger mx-2" data-id="<?= $cartItem->id ?>"> Remove</button>
                        <a href="payment.php?contestant=<?= $uni ?>&id=<?= $getProject->id  ?>&price=<?= $getProject->reg_fee ?>&sng=1" class="cart-btn mx-2 btn-light text-success" >Pay</a>
                    </div> 
                </div>
                
                  
                             
            </div>
            <?php endwhile; ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 total">
            <p class="border border-light cart-text p-2" style="background-color: #e6e6e6;">Total</p>
            <div class="d-flex justify-content-start border-bottom">
                <p class="cart-text flex-grow-1">$<?= number_format($total,2) ?> </p>
                <p class=""><a href="payment.php?contestant=<?= $uni ?>&id=<?= $id_list ?>&price=<?= $total ?>&multi=1" class="cart-btn mx-2 px-3 py-2 btn-warning" >Pay</a></p>
            </div>


        </div>
    </div>
</section>


<script>
    function removeFromCart(event){
      let n =  event.target.dataset.id;
      let url = "removeFromCart.php?&id=" + n;

      $.get(url, function(data){
            if(data == '1'){
             location.reload();
                toastr.success('Removed',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });                
            }
      }, "text");
    }
</script>


<?php
 require "scripts/footer_two.php";
}else{
    header("Location: index.php");
}
?>