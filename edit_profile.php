<?php 
require "scripts/functions.php";


// if(is_loggedIn()){

$logo = true; $fixed = true;
require "scripts/header_two.php"; 

$user_id = user_id();
$role = role(); 
$unique_id = unique_id();


?>
<style>
    .profile-body{
        margin-top : 33vh;
    }

    
    form{
        padding  : 20px 60px;
        width : 90%;
    }
    .realbtn{
        border : 1px solid;
        color: #000;
        letter-spacing : 0px;
    }
    label {
        color: white;
        padding: 0.5rem;
        font-family: sans-serif;
        border-radius: 0.3rem;
        cursor: pointer;
        margin-top: 1rem;
        font-size : 13px;
        background-color :  #004883;
    }
    @media only screen and (max-width: 768px) {
        .realbtn{
            padding : 8px;
        }
        form{
            padding  : 20px;
            width : 90%;
        }
    }
    @media only screen and (max-width: 425px) {
        .profile-body{
            margin-top : 25vh;
        }
       
        .realbtn{
            padding : 5px;
            font-size: 13px;
        }
        form{
            padding  : 10px;
            width : 100%;
            font-size : 15px;
        }
    }

</style>

<section class="profile-body p-2 mx-2">
   <div class="row">
       <div class="col-12">
        <form action="process_contestant.php" method="POST" class="mx-auto" enctype="multipart/form-data" autocomplete="off">
            <div class="form-row mt-3">
                <div class="col-6">
                    <h3>Edit Profile</h3>
                </div>
                <div class="col-6 form-group text-right">
                    <button class="btn btn-success" type="submit" name="save">Save</button>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="text" class="form-control" placeholder="Firstname">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="text" class="form-control" placeholder="Lastname">
                </div>                
            </div>
            <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="email" class="form-control" placeholder="Email">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="text" class="form-control" placeholder="Username">
                </div>                
            </div>
            <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="password" class="form-control" placeholder="Password">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="text" class="form-control" placeholder="Phone">
                </div>                
            </div>
            <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="text" class="form-control" placeholder="City">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="text" class="form-control" placeholder="Country">
                </div>                
            </div>
            <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="date" class="form-control" placeholder="Date of Birth">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <input type="text" class="form-control" placeholder="Phone2">
                </div>                
            </div>
            <div class="form-row">
                <div class="col-lg-3 col-md-3 col-sm-6 mt-2">
                    <input type="text" class="form-control" placeholder="facebook">
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6  mt-2">
                    <input type="text" class="form-control" placeholder="twitter">
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-6  mt-2">
                    <input type="text" class="form-control" placeholder="linkedIn">
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6  mt-2">
                    <input type="text" class="form-control" placeholder="Instagram">
                </div>                
            </div>
            
            <div class="form-row">
                <div class="col-12 mt-2">
                    <textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Enter Address"></textarea>
                </div>                
            </div>
            <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12 row mt-2">
                    <div class="col">
                        <label for="resume" class="">Upload Resume</label>
                        <input type="file" name="profile_pic" hidden id="resume">
                    </div>
                    <div class="col">
                        <iframe 
                        src="" width="100%" height="100%" id="doc_prev">
                        </iframe>
                    </div>
                </div>    
                  
            </div>
        </form>
       </div>
   </div>
</section>

<script>

</script>


<?php
 require "scripts/footer_two.php";

// }else{
//     header("Location: login.php");
// }
?>