<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);
?>
<style>
.cover-image{
    background-image: url(img/drone4.jpg);
    height: 100vh;
    background-size : cover;
    background-position : top left;
    color : white;
    display: flex;
    align-items : center;
}.cover-wrapper{
    text-align : center;
    font-family: "Montserrat", sans-serif;
    width : 100%;
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.104) ,rgba(0, 0, 0, 0.219));
}
.cover-wrapper h1{
    font-weight : 600;
    letter-spacing : 1.75rem;
    text-transform : uppercase;
}.cover-wrapper p{
    font-weight : 300;
    letter-spacing : 1rem;
    text-transform : uppercase;
    width : 100%;
}.about-us-wrapper{
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
}

.contact-us-text h3{
   font-size : 50px;
   text-transform : capitalize;
}

.contact-us-text a {
   font-size : 15px;
   display: block;
   color : #004883;
}
.contact-form{
    width : 100%;
}
.contact-details-list{
    list-style: none;
}
@media only screen and (max-width: 768px) {.about-us{font-weight : 500;font-size: 17px; }.contact-us-text h3{font-size : 40px;}.contact-us-text a{font-size : 12px;}.img-wrapper{margin-top: 50px;}.cover-image{height: 80vh;} }
@media only screen and (max-width: 425px) {body{width : auto;}.about-us{font-weight : 500;font-size: 15px;}
    .contact-us-text h3{font-size : 30px;}
    .contact-form{
        width: 90%;
    }
    .cover-image{
        height:50vh;background-position : center right;
    }
    .cover-wrapper h1{
        font-size : 25px;
        letter-spacing : 3px;
    }.cover-wrapper p{
        font-size : 15px;
        letter-spacing : 2px;
    }
}
</style>

<section class="cover-image p-4">
    <div class="cover-wrapper m-auto d-flex flex-column justify-content-center">                
        <h1>Reality Tv</h1>
        <p class="mr-auto ml-auto">cache of unique formats & talent</p>                  
    </div>
</section>

<section class="about-us-wrapper">
    <div class="row p-3">
        <div class="col-lg-12 d-flex justify-content-center pt-4">
            <p class="pl-5 about-us text-center"> Please refer to <a href="faq.php">FAQ’s</a> page for quick answers to your question </p>
        </div>        
    </div>

    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="contact-us-text px-3 pt-5">
                <h3 class="my-5 text-center">Stay connected as we build a community of reality.</h3>
                <a class="text-left" href="#">
                    <i class="bi bi-envelope-fill"></i> Connect@RealityTVRegistry.com
                </a>
                <a class="text-left" href="#">
                    <i class="bi bi-envelope-fill"></i> PaulM@RealityTVRegistry.com
                </a>
                <a class="text-left" href="#">
                    <i class="bi bi-geo-alt-fill"></i> 626, Wilshire Blvd Ste: 410 Los Angeles,CA. 90017
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-5 col-sm-12 p-0 mb-5">
            <div class="p-2 img-wrapper d-flex justify-content-center">
                <form action="" method="POST" class="contact-form">
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
                            $roleq = mysqli_query($link, "select * from realtv_roles");  

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