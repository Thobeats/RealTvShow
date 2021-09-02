<?php 
$navBar = true; $logo=true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

if(isset($_POST['reg'])){ 
    $firstname = trim($_POST['fname']);
    $lastname = trim($_POST['lname']);
    $username = trim($_POST['uname']);
    $password = trim($_POST['password']); 
    $email = trim($_POST['email']);
    $phone_num = trim($_POST['phone_num']);
    $address = trim($_POST['address']);
    $role = 2;

    //Movie Details....
   $movie_title = trim($_POST['project_title']);
   $genre = trim($_POST['genre']);
   $logline = trim($_POST['logline']);
   $synopsis = trim($_POST['synopsis']);
   $cover_pic = $_FILES['cover_img'];
   $other_img = $_FILES['other_img'];

  // var_dump($other_img);

    $checkEmail = mysqli_query($link, "select * from realtv_users where email = '$email'");
    if(mysqli_num_rows($checkEmail) == 1){
        set_message('error', 'Email taken, register with a unique email');
    }else{
        $checkUsername = mysqli_query($link, "select * from realtv_users where username = '$username'");
        if(mysqli_num_rows($checkUsername) == 1){
            set_message('error', 'Username taken, select another username');
        } 
        else{
            register_writer($firstname,$lastname,$email,$password,$role,$address,$username,$phone_num,$movie_title,$genre,$logline,$synopsis,$cover_pic,$other_img);
               
        }
    }

   

   
}
?>
<?= get_message("error"); ?>
<?= get_message("success"); ?>
<?= get_message("info"); ?>
<style>
    body{
        font-family : 'Poppins';
    }

    form{
        padding : 0 10%;
    }


    .writer-img{
        height : 250px;
        width: 400px;
        background-image : url(img/writer.jpg);
        background-size : cover;
    }

    .writer-wrapper p{
        font-weight : 300;
        letter-spacing : 1rem;
        text-transform : uppercase;
        width : 100%;
    }

    .writer-title{
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        font-size: 50px;
        font-weight: 700;
    }

    .writer-header{
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        font-size: 25px;
        font-weight: 700;
        justify-content : start;
    }

    .form-control{
        margin: 10px 0;
        font-weight : 300;
    }

    .writer_side_para{
        font-size : 12px;
        font-family : 'Poppins', serif;
        font-weight : 300;
    }

    @media only screen and (max-width: 768px) {
           
        .writer-title{  
            font-size: 40px;  
        }

        .writer-header{       
            font-size: 20px;
        }

        .writer-img{
            height : 200px;
            width: 300px;
        }

        form{
            padding : 0 5%;
        }
    }

    @media only screen and (max-width: 425px) {

        .writer-title{  
            font-size: 30px;  
        }

        .writer-header{       
            font-size: 18px;
            text-align : center;
            width: 100%;
        }

        .writer-img{
            height : 150px;
            width: 200px;          
        }

        .writer-img{
            width : 100%;
        }
       
        form{
            padding : 0;
        }form .row> .col-sm-12,.col-12{
            margin-top : 10px;
        }.form-control{
            margin: 0;
        }

        
    }
</style>


<div class="row p-3">
    <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end pt-4">
       <p class="pl-5 writer-title text-right"> Writers and Creators</p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 text-align-left p-4">
        <div class="writer-img">

        </div>
    </div>
</div>

<form action="" method="POST" enctype="multipart/form-data">
<section class="writer-form px-4 py-2 mb-4" style="height: auto;">
    <div class="d-flex flex-column justify-content-center">
        
             <div class="row">
                <div class="col-12 d-flex">
                <p class="p-2 writer-header"> personal details </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" class="form-control" name="fname" placeholder="First Name">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" class="form-control" name="lname" placeholder="Last Name">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" class="form-control" name="uname" placeholder="Username">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" class="form-control" name="phone_num" placeholder="Phone Number">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <textarea name="address" id="" class="form-control" cols="30" rows="10" placeholder="Address"></textarea>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6"></div>
                <div class="col-lg-6 text-right">
                  <input type="button" class="realbtn btn-warning next writer-btn" value="Next">
                </div>
            </div>

        <!-- </form> -->
    </div>
</section>

<section class="movie-form p-4 mb-4" style="height: auto;">
    <div class="d-flex flex-column justify-content-center">
        <!-- <form action="" method="POST"> -->
             <div class="row">
                <div class="col-12 d-flex justify-content-start">
                <p class="p-2 writer-header"> proposed reality </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" name="project_title" class="form-control" placeholder="Project Title">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <select name="genre" id="" class="form-control" >
                        <option value="">Select Genre</option>
                        <?php 
                            $genreQ = mysqli_query($link, "Select * from movie_genre");
                            while($genre = mysqli_fetch_object($genreQ)) : 
                        ?>

                        <option value="<?= $genre->id ?>"><?= ucfirst($genre->genre_name) ?></option>

                        <?php endwhile; ?>
                    </select>
                </div>

               
            </div>            

            <div class="row mt-3">        
                <div class="col-12">
                    <label for="" class="h4">Logline <small> (Copy &amp; Paste Your Content)</small></label>
                    <textarea name="logline" id="" class="form-control text-editor" cols="5" rows="5"></textarea>
                </div>

            </div>            

            <div class="row mt-3">
                <div class="col-12">
                    <label class="h4" for="">Synopsis <small> (Copy &amp; Paste Your Content)</small></label>
                    <textarea name="synopsis" id="" class="form-control text-editor" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6 col-md-6 col-sm-12">                    
                        <div class="custom-file">
                            <input type="file" name="cover_img" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Home Page</label>
                        </div>
                </div>
                    
                <div class="col-lg-6 col-md-6 col-sm-12">    
                    <div class="custom-file">                
                        <input type="file" name="other_img[]" title="Select multiple images" style="font-weight: 300 !important;" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" multiple>
                        <label class="custom-file-label" for="inputGroupFile01" >Image Enhanced Pitch up to 7 Images</label>                      
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">    
                    <div class="custom-file">                
                        <input type="file" name="sizzle" title="Select multiple images" style="font-weight: 300 !important;" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01" >Upload Sizzle Reel Video</label>                      
                    </div>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <p class="writer_side_para">
                        Please review the RTVR Industry Executive <a href="nda.php" target="_blank">NDA - Confidential Agreement</a> , which is required to be signed by any Industry TV
                        Executive who views writer’s material, without exception. Thus, designed to protect all the written material of writers who are registered
                        to RTVR. <a href="terms.php" target="_blank"> Agreeing to the terms of the standard Material Release Form</a>, is required for all submissions. By checking the box below as
                        my electronic and binding signature, I confirm that I have reviewed, understand and agree to RealityTVRegistry.com NDA/Confidential
                        Agreement and Standard Material Release Form and that the terms and conditions of such shall govern me and my use of RTVR
                        and/or any of the services provided by RTVR including but not limited to any submission by me as a writer or any review of the
                        materials of others contained herein.
                    </p>
                </div>
                <div class="col-12">
                    <div class="form-check mx-auto">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                        <label class="form-check-label" for="defaultCheck1">
                            Click to Agree
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6 writer-btn-prev col-sm-12">
                    <input type="button" class="realbtn btn-warning prev writer-btn" value="Previous">
                </div>
                <div class="col-lg-6 writer-btn-reg col-sm-12">
                  <input type="submit" class="realbtn btn-legit writer-btn" name="reg" value="Register">
                </div>
            </div>

        <!-- </form> -->
    </div>
</section>

</form>

<script>
    let next = document.querySelector(".next");
    let writerTitle = document.querySelector(".writer-title");
    next.addEventListener("click", function(){
        writerTitle.innerHTML = "pitch submissions";
    });

    let prev = document.querySelector(".prev");
    prev.addEventListener("click", function(){
        writerTitle.innerHTML = "writers and creators";
    });

</script>



<?php require "scripts/footer_two.php"; ?>