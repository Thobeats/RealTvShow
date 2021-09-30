<?php 
require "scripts/functions.php";


if(is_loggedIn()){

$logo = true; $fixed = true;
require "scripts/header_two.php"; 

$user_id = user_id();
$role = role(); 
$unique_id = unique_id();

function get_role(){
    $l = connect();
    $r = role();


    echo ucfirst(mysqli_fetch_assoc(mysqli_query($l, "select role_name from realtv_roles where id = '$r'"))['role_name']);
}

$tabl2 = get_table2_data($role);

$user_details = mysqli_fetch_object(mysqli_query($link, "select * from realtv_users a inner join $tabl2 b on a.unique_id = b.unique_id where a.id= '$user_id'"));

$no_cont = mysqli_fetch_object(mysqli_query($link, "select count(*) as cnt from realtv_contestants"))->cnt;
$no_write = mysqli_fetch_object(mysqli_query($link, "select count(*) as cnt from realtv_writers"))->cnt;
$no_pro = mysqli_fetch_object(mysqli_query($link, "select count(*) as cnt from realtv_contestants"))->cnt;
$no_book = mysqli_fetch_object(mysqli_query($link, "select count(*) as cnt from realtv_executive_project where user_id = '$unique_id'"))->cnt;

$fullname = $user_details->fullname;
$dateOfBirth = date('d M Y', strtotime($user_details->dob));
$joined = date('d M Y', strtotime($user_details->date_created));

$fb = $user_details->facebook;
$tw = $user_details->twitter;
$ln = $user_details->linked_in;
$in = $user_details->instagram;

$coverImg = $user_details->cover_img;

$date = date('Y-m-d h:i:s');


?>


<?php
if(isset($_POST['save'])){
    $cover_img = $_FILES['edit_cover_img'];
    $pro_img = $_FILES['edit_pro'];
    $about_me = $_POST['about_me'];

    if($cover_img['name'] !== ""){
        $cover_img = handle_image($cover_img);

     if($cover_img != 'error'){
        $update_query = mysqli_query($link, "UPDATE `realtv_users` SET `cover_img`='$cover_img',`updated_at`='$date',`about_you`='$about_me' WHERE id='$user_id'");

        if($update_query){

            if($pro_img['name'] !== ""){
                $pro_img = handle_image($pro_img);

                if($pro_img != 'error'){
                    $update_pro = mysqli_query($link, "update $tabl2 set profile_pic = '$pro_img' where unique_id = '$unique_id'");

                    if($update_pro){
                        set_message("success", "Update Successful");
                      
                    }else{
                        set_message("error", "Update Error, Try Again");
                    }
                }else{
                    set_message("error", "Update Error, Try Again");
                }
            }  
            set_message("success", "Update Successful");            
         
        }else{
            set_message("error", "Update Error, Try Again");
        }
    }else{
        set_message("error", "Update Error, Try Again");
    }
}


header("location : profile.php");
}

?>

<?= get_message("success"); get_message("error"); ?>

<style>
    label{
        background-color : whitesmoke;
        cursor: pointer;
        color : grey;
    }
    .profile-body{
        margin-top : 33vh;
    }
    .h1{
        font-family : 'Montserrat', serif;
        font-weight : 700;
        font-size : 45px;
    }
    .cover-image{
        background-image: linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(img/uploads/<?= $coverImg != '' ? $coverImg : 'Onboard1.jpg' ?>);
        height : 40vh;
        background-size : cover;
        background-position : center;
    }
    .img{
        transform : translateY(-50px);
        width : 200px;
        height : 180px;
        margin: 0 auto;
    }
    .fullname{
        text-transform : uppercase;
        font-family: 'Arial',serif;
        font-weight : 500;
        font-size : 45px;
    }.date{ text-align: right; font-size : 14px; }
    .day{
        font-size : 50px;
        padding-top : 15px;
        font-weight : 600;
        text-transform: uppercase;
        font-family : 'Montserrat', serif;

    }.details{ text-align : right; font-size : 14px;}
    .m-y{
        font-size : 20px;
        font-weight : 600;
        text-transform: uppercase;
        font-family : 'Montserrat', serif;

    }
    .bio-container{
        margin : 0px auto;
    }
    .realbtn{
        border : 1px solid;
        color: #000;
        letter-spacing : 0px;
    }
    .social,.profile-edit{
        text-align : right;
    }
    .social a{
        font-size : 18px;
    }
     
    @media only screen and (max-width: 768px) {
        .realbtn{
            padding : 8px;
        }
    }
    @media only screen and (max-width: 425px) {
        .profile-body{
            margin-top : 25vh;
        }
        .cover-image{
            height : 30vh;
        }
        .dt{
            transform : translateY(-70px);
        }

        .bio-container{
            margin : 0px 0px;
        }
        .realbtn{
            padding : 5px;
            font-size: 13px;
        }
        .social,.profile-edit{
            text-align : center;
        }
        .img{
            width : 150px;
            height : 130px;
            margin: 0 auto;
        }.date{ margin-top: 10px; text-align: center; font-size : 12px; }
        .details{ text-align : right; font-size : 13px;}
        .details span{ display: block; text-align: center;}
    }

</style>
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >

  <div class="modal-dialog modal-lg">
    <div class="modal-content text-light" style="background-color : black !important;">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <div class="edit_cover_img text-light" style="height: 30vh;display:flex; justify-content: center; align-items: center; font-size:15px;">
                        <div>
                            <label for="change_cover" style="background-color:inherit;"><i class="bi bi-brush text-light" title="change cover image"></i></label>
                            <input type="file" name="edit_cover_img" id="change_cover" hidden>
                            <i class="bi bi-x-lg" style="cursor:pointer;" title="Remove"></i>
                        </div>                               
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                        <div class="prof_pic text-light"  style="height: 200px; display:flex; justify-content: center; align-items: center; font-size:15px;">
                            <div>
                                <label for="change_pro" style="background-color:inherit;"><i class="bi bi-brush text-light" title="change profile image"></i></label>
                                <input type="file" name="edit_pro" id="change_pro" hidden>
                                <i class="bi bi-x-lg" style="cursor:pointer;" title="Remove"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                        <div class="form-group" style="height: 200px;">
                            <label for="" style="background-color:inherit;">About Me</label>
                            <textarea name="about_me" id="" cols="" rows="6" class="form-control"><?= $user_details->about_you ?? "" ?></textarea>
                        </div>
                    </div>
                </div>
            
            
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

<section class="profile-body p-2 mx-2">
    <div class="row mx-auto mb-5" style="width: 100%">
        <div class="col-12">
            <div class="cover-image">
            </div>
            <div class="profile-image row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-center" >
                    <div class="img">
                        <img src="<?= $user_details->profile_pic != null ? 'img/uploads/' . $user_details->profile_pic : 'img/man.png' ?>" class="rounded rounded-circle border border-4 border-dark" width="100%" height="100%"> 
                    </div>    

                    <div style="font-family: 'Poppins', serif;">
                        <?= $user_details->about_you ?>
                    </div>
                               
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-1">
                    <div class="date text-secondary mt-2">
                        <span class="mr-2"><?= date('l M Y') ?></span> <span id="hrs"></span><span id="min"></span><span id="sec"></span>
                    </div>
                   
                    <div class="details mt-2 text-secondary">
                        <span><i class="bi bi-geo-alt"></i> <i class="loc"></i></span>
                        <?php if($dateOfBirth != null): ?>
                        <span class=""><i class="fa fa-birthday-cake" aria-hidden="true"></i> <i>Birthday <?= $dateOfBirth ?></i></span>
                        <?php endif; ?>
                        <span class=""><i class="bi bi-calendar"></i> <i>Joined <?= $joined ?></i></span>
                    </div>

                    <div class="social mt-2">
                        
                        <span><a class="mr-2" href="https://web.facebook.com/<?= $fb ?>/" target="_blank"><i class="bi bi-facebook"></i></a></span>
                        <span><a class="mr-2" href="https://twitter.com/<?= $tw ?>" target="_blank"><i class="bi bi-twitter"></i></a></span>
                        <span><a class="mr-2" href="https://www.linkedin.com/in/<?= $ln ?>/" target="_blank"><i class="bi bi-linkedin"></i></a></span>
                        <span><a class="mr-2" href="https://www.instagram.com/<?= $in ?>/" target="_blank"><i class="bi bi-instagram"></i></a></span>

                    </div>

                    <div class="profile-edit mt-4">
                        <button style="background-color:inherit;" data-toggle="modal" data-target="#editProfileModal" class="realbtn"><i class="bi bi-pencil-square"></i> Edit Profile</button>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
<?php if(role() == 3) { ?>
    <div class="row preview p-3 mx-auto w-100">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-body bg-dark text-light p-0">
                <h1 class="h1 p-3 text-center"><?= $no_book ?></h1>
                <p class="text-center p-3">Saved Projects</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-body bg-light text-dark p-0">
                <h1 class="h1 p-3 text-center">4</h1>
                <p class="text-center p-3">Projects</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-body bg-warning text-light p-0">
                <h1 class="h1 p-3 text-center"><?= $no_write ?></h1>
                <p class="text-center p-3">Writers</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-body text-light p-0" style="background-color : #004883;">
                <h1 class="h1 p-3 text-center"><?= $no_cont ?></h1>
                <p class="text-center p-3">Contestants</p>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(role() == 1) { ?>
    <div class="row preview p-3 mx-auto w-100">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card-body bg-dark text-light p-0">
                <h1 class="h1 p-3 text-center">4</h1>
                <p class="text-center p-3">Saved Gigs</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card-body bg-light text-dark p-0">
                <h1 class="h1 p-3 text-center">4</h1>
                <p class="text-center p-3">Registered Gigs</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card-body bg-warning text-light p-0">
                <h1 class="h1 p-3 text-center">4</h1>
                <p class="text-center p-3">Views</p>
            </div>
        </div>
        <!-- <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-body text-light p-0" style="background-color : #004883;">
                <h1 class="h1 p-3 text-center">4</h1>
                <p class="text-center p-3"></p>
            </div>
        </div> -->
    </div>
<?php } ?>

<?php if(role() == 2) { ?>
    <div class="row preview p-3 mx-auto w-100">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-body bg-dark text-light p-0">
                <h1 class="h1 p-3 text-center">4</h1>
                <p class="text-center p-3">Drafts</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-body bg-light text-dark p-0">
                <h1 class="h1 p-3 text-center">4</h1>
                <p class="text-center p-3">Registered Projects</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-body bg-warning text-light p-0">
                <h1 class="h1 p-3 text-center">4</h1>
                <p class="text-center p-3">Negotiations</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-body text-light p-0" style="background-color : #004883;">
                <h1 class="h1 p-3 text-center">4</h1>
                <p class="text-center p-3">Views</p>
            </div>
        </div>
    </div>
<?php } ?>

    <div class="row p-3 bio-container mx-auto w-100">
        <div class="col-12">
            <div class="bio p-2">
                <h3 class="poppins ml-4">Bio</h3>
                <hr>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Full Name</p>
            <p class="col-8">:  <?= $fullname ?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Username</p>
            <p class="col-8">:  <?= $user_details->username ?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Email</p>
            <p class="col-8">:  <?= $user_details->email?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Phone</p>
            <p class="col-8">:  <?= $user_details->phone_no ?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Role</p>
            <p class="col-8">:  <?= get_role() ?></p>
        </div>
        <div class="col-lg-6  col-md-6 col-sm-12 row poppins mx-auto">
            <p class="col-4 text-right">Address</p>
            <div class="col-8">: <?= $user_details->address ?> </div>
        </div>
        <div class="col-12">
            <div class="edit text-right">
                <a href="edit_profile.php" class="realbtn"><i class="bi bi-pencil-square"></i> Edit Bio</a>
            </div>
        </div>
    </div>

<?php if(role() == 2): ?>
    <div class="row p-3 bio-container mx-auto w-100 my-2 ">
       <div class="col-12">

       </div>
    </div>
<?php endif; ?>
</section>


<script>
    setInterval(function(){ curTime(); }, 1000);

   
    function curTime(){ 
        var today = new Date();

        $("#hrs").html(formatNum(today.getHours()) + " :");
        $("#min").html(formatNum(today.getMinutes()) + " :");
        $("#sec").html(formatNum(today.getSeconds()));
    }
    function formatNum(n){
        if(n < 10){
            return "0" + n;
        }else{
            return n;
        }
    }

    $(document).ready(()=>{

        let url = "https://geolocation-db.com/json/";

        $.get(url, function(data){
            let city = data.city;
            let country = data.country_name;
            document.querySelector(".loc").innerHTML = city + ", " + country;
        }, 'json');
    });

    $(document).ready(function(){
        let coverImg = "<?= $user_details->cover_img ?? '' ?>";
        let profPic = "<?= $user_details->profile_pic ?? '' ?>"

        let cover = document.querySelector(".edit_cover_img");

        let pro = document.querySelector(".prof_pic");

        cover.style.backgroundImage = `linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(img/uploads/${coverImg})`;
        cover.style.backgroundPosition = "center";
        cover.style.backgroundSize = "cover";
        pro.style.backgroundImage = `linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(img/uploads/${profPic})`;
        pro.style.backgroundPosition = "center";
        pro.style.backgroundSize = "cover";
    });


    document.getElementById("change_cover").addEventListener("change", function(){
        let files = this.files[0];
        let url = "handle_file.php";

        let formData = new FormData(); 
        formData.append("file", files);
        fetch(url, {
            method: "POST", 
            body: formData,
        }).then(response => response.text()).then((data) => {
            
           console.log(data);
            if(data == 'no'){
                toastr.error('File exists',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error1'){
                toastr.error('File too Large',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error2'){
                toastr.error('Invalid format',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else{

                console.log(data);

                let src = URL.createObjectURL(files);     
                
                let cover = document.querySelector(".edit_cover_img");
                cover.style.backgroundImage = `linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(${src})`;

            }
        });


    });

    document.getElementById("change_pro").addEventListener("change", function(){
        let files = this.files[0];
        let url = "handle_file.php";

        let formData = new FormData(); 
        formData.append("file", files);
        fetch(url, {
            method: "POST", 
            body: formData,
        }).then(response => response.text()).then((data) => {
            
           console.log(data);
            if(data == 'no'){
                toastr.error('File exists',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error1'){
                toastr.error('File too Large',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error2'){
                toastr.error('Invalid format',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else{

                console.log(data);

                let src = URL.createObjectURL(files);     
                
                let cover = document.querySelector(".prof_pic");
                cover.style.backgroundImage = `linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(${src})`;

            }
        });


    });
    
</script>
<?php
 require "scripts/footer_two.php";

}else{
    header("Location: login.php");
}
?>