<?php 
$navBar = true; $logo = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);

if(isset($_POST['deliver'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['interested_as'];
    $role = get_role($role);
    $message = $_POST['message'];

    $res = send_contact_mail($name, $email, $role, $message);

    if($res == 1){
        set_message("success", "Message Sent");
    }else{
        set_message("error", "Message Not Sent");
    }
}
?>

<?= get_message("success"); get_message("error"); ?>

<style>
.about-us-wrapper{
    height : auto;
}.about-us{
    text-transform : uppercase;
    font-weight : 500;
    font-family: 'Poppins', serif;
    font-size: 20px; 
    letter-spacing : 3px;   
}.contact-us-text{
    font-family: 'Poppins', serif;
    letter-spacing : 2px;
    font-weight : 300;
}.contact-us-text h3{
   font-size : 50px;
   text-transform : capitalize;
}.contact-us-text a {
   font-size : 18px;
   display: block;
   color : #004883;
}.contact-form{
    width : 100%;
    font-family: 'Poppins', serif;
}.contact-details-list{
    list-style: none;
}.realbtn{
    width : 100%;
    padding : 15px;
    font-size : 15px;
}
@media only screen and (max-width: 768px) {.about-us{font-weight : 500;font-size: 17px; }.contact-us-text h3{font-size : 40px;}.contact-us-text a{font-size : 15px;}.img-wrapper{margin-top: 50px;}.cover-image{height: 80vh;} }
@media only screen and (max-width: 425px) {body{width : auto;}.about-us{font-weight : 500;font-size: 15px;}
    .contact-us-text h3{font-size : 30px;}
    .contact-form{
        width: 90%;
    }.cover-image{
        height:50vh;background-position : center right;
    }.cover-wrapper h1{
        font-size : 25px;
        letter-spacing : 3px;
    }.cover-wrapper p{
        font-size : 15px;
        letter-spacing : 2px;
    }
}
</style>


<section class="about-us-wrapper mb-5 ">
    <div class="row p-3">
        <div class="col-lg-12 d-flex justify-content-center pt-4">
            <p class="pl-5 about-us text-center"> Please refer to <a href="faq.php">FAQ’s</a> page for quick answers to your question </p>
        </div>        
    </div>

    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="contact-us-text px-3 pt-5">
                <h3 class="my-5 text-center">Staying connected as we build a community of reality</h3>
                <div class="my-2 p-2 text-center">
                    <img src="img/Picture1.png" alt="" width="100%">
                </div>
                <div class="my-2 ml-5">
                    <a class="text-left py-2" href="#">
                        <i class="bi bi-envelope-fill"></i> Connect@RealityTVRegistry.com
                    </a>
                    <a class="text-left py-2" href="#">
                        <i class="bi bi-envelope-fill"></i> PaulM@RealityTVRegistry.com
                    </a>
                    <a class="text-left py-2" href="#">
                        <i class="bi bi-geo-alt-fill"></i> 626, Wilshire Blvd Ste: 410 Los Angeles,CA. 90017
                    </a>
                </div>
               
            </div>
        </div>

        <div class="col-lg-4 col-md-5 col-sm-12 p-0 mb-5">
            <div class="pt-5 img-wrapper d-flex justify-content-center">
                <form action="" method="POST" class="contact-form mt-5">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Interested As</label>
                        <select name="interested_as" class="form-control" id="">
                            <option>Select Role</option>
                            <?php 
                            $roleq = mysqli_query($link, "select * from realtv_roles where role_name <> 'admin'");  

                            while($role = mysqli_fetch_assoc($roleq)):
                            
                            ?>

                                <option value="<?= $role['id'] ?>"><?= ucfirst($role['role_name']) ?></option>

                            <?php endwhile; ?>     
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Message</label>
                        <textarea name="message" id="" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <button class="realbtn btn-warning" name="deliver">Deliver</button>
                </form>
            </div>
        </div>
    </div>
</section>

     



<?php
 require "scripts/footer_two.php";
?>