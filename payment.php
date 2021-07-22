<?php $title = "RealTv Registry - Payment"; ?>
<?php 
require"scripts/header_two.php"; 


if(isset($_GET['price'])){
    $price = $_GET['price'];
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
                <div class="form-group">
                    <label for="name">Fullname:</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group" id="paynow">
                   
                </div>
                
            </form>
        </div>
    </div>

</div>
<?php $paypal = true ?>
<?php require"scripts/footer_two.php" ?>