<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

if(isset($_POST['reg'])){ 
    $firstname = mysqli_real_escape_string(trim($_POST['fname']));
    $lastname = mysqli_real_escape_string(trim($_POST['lname']));
    $username = mysqli_real_escape_string(trim($_POST['uname']));
    $password = mysqli_real_escape_string(trim($_POST['password'])); 
    $email = mysqli_real_escape_string(trim($_POST['email']));
    $phone_num = mysqli_real_escape_string(trim($_POST['phone_num']));
    $address = mysqli_real_escape_string(trim($_POST['address']));
    $role = 2;

    //Movie Details....
   $movie_title = mysqli_real_escape_string(trim($_POST['project_title']));
   $genre = mysqli_real_escape_string(trim($_POST['genre']));
   $logline = mysqli_real_escape_string(trim($_POST['logline']));
   $synopsis = mysqli_real_escape_string(trim($_POST['synopsis']));
   $cover_pic = $_FILES['cover_img'];
   $other_img = $_FILES['other_img'];

   if(register_new_user($firstname, $lastname, $email, $password, $role, null, $address, $username)){
       set_message("success", "Registration Successful, check your email to activate your account");
   }else{
       set_message("error", "Registration Failed");
   }

   reg_and_save_movie($movie_title,$logline,$synopsis,$genre,$cover_pic,$other_img);
}
?>

<style>
    body{
        font-family : 'Poppins';
    }

    form{
        padding : 0 10%;
    }
 
    .writer-cover{
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) ,rgba(0, 0, 0, 0.5)),url(img/drone4.jpg);
        height: 100vh;
        background-size : cover;
        background-position : top left;
        color : white;
        display: flex;
        align-items : center;
    }

    .writer-wrapper{
        text-align : center;
        font-family: "Montserrat", sans-serif;
        width : 100%;
    }

    .writer-wrapper h1{
        font-weight : 600;
        letter-spacing : 1.75rem;
        text-transform : uppercase;
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
    }
       

        form .row> .col-sm-12,.col-12{
            margin-top : 10px;
        }

        .form-control{
            margin: 0;
        }

        
    }
</style>

<section class="writer-cover p-4">
    <div class="writer-wrapper m-auto d-flex flex-column justify-content-center">                
        <h1>Reality Tv</h1>
        <p class="mr-auto ml-auto">cache of unique formats & talent</p>                  
    </div>
</section>

<div class="row p-3">
    <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end pt-4">
       <p class="pl-5 writer-title text-right">Writer's Registration </p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 text-align-left p-4">
        <div class="writer-img">

        </div>
    </div>
</div>

<form action="" method="POST" >
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
                  <input type="button" class="btn btn-warning next writer-btn" value="Next">
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
                <p class="p-2 writer-header"> movie details </p>
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
                    <label for="">Logline</label>
                    <textarea name="logline" id="" class="form-control text-editor" cols="5" rows="5"></textarea>
                </div>

            </div>            

            <div class="row mt-3">
                <div class="col-12">
                    <label for="">Synopsis</label>
                    <textarea name="synopsis" id="" class="form-control text-editor" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="input-group mt-2" style="font-weight: 300">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="cover_img" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Cover Image</label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="other_img" title="Select multiple images" style="font-weight: 300 !important;" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" multiple>
                            <label class="custom-file-label" for="inputGroupFile01">Other Images</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6 writer-btn-prev col-sm-12">
                    <input type="button" class="btn btn-warning prev writer-btn" value="Previous">
                </div>
                <div class="col-lg-6 writer-btn-reg col-sm-12">
                  <input type="submit" class="btn btn-legit writer-btn" name="reg" value="Register">
                </div>
            </div>

        <!-- </form> -->
    </div>
</section>

</form>



<?php require "scripts/footer_two.php"; ?>