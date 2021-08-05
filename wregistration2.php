<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);
?>

<style>
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
    }
</style>

<section class="writer-cover p-4">
    <div class="writer-wrapper m-auto d-flex flex-column justify-content-center">                
        <h1>Reality Tv</h1>
        <p class="mr-auto ml-auto">cache of unique formats & talent</p>                  
    </div>
</section>

<div class="row p-5">
    <div class="col-6 d-flex justify-content-end pt-4">
       <p class="p-2 writer-title text-right">Writer's Registration </p>
    </div>
    <div class="col-6 d-flex justify-content-start pt-4">
       <img src="img/writer.jpg" alt="" srcset="" width="400px">
    </div>
</div>

<section class="writer-form p-4 mb-4" style="height: auto;">
    <div class="d-flex justify-content-center">
        <form action="" method="POST" style="width: 80%;">
             <div class="row">
                <div class="col-12 d-flex justify-content-start">
                <p class="p-2 writer-header"> personal details </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="">First Name:</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label for="">Last Name:</label>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 col-sm-12">
                    <label for="">Username:</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label for="">Password:</label>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 col-sm-12">
                    <label for="">Email:</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label for="">Phone Number:</label>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <label for="">Address:</label>
                    <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6"></div>
                <div class="col-lg-6 text-right">
                  <input type="button" class="btn btn-warning next writer-btn" value="Next">
                </div>
            </div>

        </form>
    </div>
</section>

<section class="movie-form p-4 mb-4" style="height: auto;">
    <div class="d-flex justify-content-center">
        <form action="" method="POST" style="width: 80%;">
             <div class="row">
                <div class="col-12 d-flex justify-content-start">
                <p class="p-2 writer-header"> movie details </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="">Project Title:</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label for="">Genre:</label>
                    <select name="genre" id="" class="form-control">
                        <option value=""></option>
                    </select>
                </div>

               
            </div>

            <div class="row mt-4">        
                <div class="col-12">
                    <label for="">Logline:</label>
                    <textarea name="logline" id="" class="form-control text-editor" cols="5" rows="5"></textarea>
                </div>

            </div>            

            <div class="row mt-4">
                <div class="col-12">
                    <label for="">Synopsis:</label>
                    <textarea name="synopsis" id="" class="form-control text-editor" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 writer-btn-prev col-sm-12">
                    <input type="button" class="btn btn-warning prev writer-btn" value="Previous">
                </div>
                <div class="col-lg-6 writer-btn-reg col-sm-12">
                  <input type="submit" class="btn btn-primary writer-btn" name="reg" value="Register">
                </div>
            </div>

        </form>
    </div>
</section>



<?php require "scripts/footer_two.php"; ?>