<?php $title = "RealTv Registry - Payment"; ?>
<?php 

require "scripts/functions.php";
require "scripts/header_two.php"; 

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $pics = $_FILES['pics'];
    handle_multi_images($pics, $id);


    $purpose = $_POST['purpose'];
    $pay = $_POST['pay'];
    $limited_to = $_POST['limited_to'];
    $when = $_POST['when'];
    $seeking = $_POST['seeking'];

    mysqli_query($link, "UPDATE `realtv_movies` SET `limited_to`= '$limited_to',`pay_range`= '$pay',`when_and_where`= '$when',`purpose`= '$purpose',`seeking`= '$seeking' WHERE id = '$id'");

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
            <form action="" method="post" style="width : 400px;" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Purpose:</label>
                    <input type="text" name="purpose" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Pay Range:</label>
                    <input type="text" name="pay" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Limited to:</label>
                    <input type="text" name="limited_to" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">When and Where:</label>
                    <input type="text" name="when" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Other Pics:</label>
                    <input type="file" name="pics[]" class="form-control" multiple>
                </div>
                <div class="form-group">
                    <label for="email">Seeking:</label>
                    <textarea name="seeking" id="" cols="30" rows="10" class="form-control text-editor"></textarea>
                </div>
                

             
                <div class="form-group">
                    <button type="submit" class="btn form-control">Update</button>
                </div>
                
            
            
            
            
            
            </form>
        </div>
    </div>

</div>


<?php require"scripts/footer_two.php" ?>