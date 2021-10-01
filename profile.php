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
   
    $about_me = $_POST['about_me'];
    $update_query = mysqli_query($link, "UPDATE `realtv_users` SET `updated_at`='$date',`about_you`='$about_me' WHERE id='$user_id'");

    if($update_query){           
        set_message("success", "Update Successful");   
        header("location: profile.php");
    }
   
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
        cursor: pointer;
        display:flex; justify-content: center; align-items: center; font-size:15px;
    }
    #edit_btns,.edit_btns{
            display : none;
        }
    .show{
        display: block;
    }
    .img{
        transform : translateY(-50px);
        width : 200px;
        height : 180px;
        margin: 0 auto;
        cursor : pointer;
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
        <h5 class="modal-title" id="editProfileModalLabel">Introduce Yourself</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               

                <div class="form-group row">
                    <div class="col-12 mt-2">
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
            <div class="cover-image text-light">
                <div id="edit_btns">
                    <label for="change_cover" style="background-color:inherit;"><i class="bi bi-brush text-light" title="change cover image"></i></label>
                    <input type="file" name="edit_cover_img" id="change_cover" hidden>
                    <i class="bi bi-x-lg" data-name="<?= $coverImg ?>" data-type="cover_image" data-tag=".cover-image" onclick="removePic(event)" style="cursor:pointer;" title="Remove"></i>
                </div>  
            </div>
            <div class="profile-image row">
                
                <div class="col-lg-6 col-md-6 col-sm-12 text-center" >
                    <div class="img">
                        <div class="text-right text-light edit_btns">
                            <label for="change_pro" style="background-color:inherit;"><i class="bi bi-brush text-light" title="change profile image"></i></label>
                            <input type="file" name="edit_pro" id="change_pro" hidden>
                            <i class="bi bi-x-lg" onclick="removePic(event)" data-table="<?= $tabl2 ?>" data-type="pro_image" data-name="<?= $user_details->profile_pic ?>" data-tag=".pro_img"style="cursor:pointer;" title="Remove"></i>
                        </div>   
                        <img src="<?= $user_details->profile_pic != NULL ? 'img/uploads/' . $user_details->profile_pic : 'img/man.png' ?>" class="pro_img rounded rounded-circle border border-4 border-dark" width="100%" height="100%"> 
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
                        <button style="background-color:inherit;" data-toggle="modal" data-target="#editProfileModal" class="realbtn"><i class="bi bi-pencil-square"></i> Edit Intro</button>
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

    function removePic(event){
        let name = event.target.dataset.name;
        let tag = event.target.dataset.tag;
        let type = event.target.dataset.type;


        if(name !== ""){
            let url = `unlink.php?pic=${name}`;

            $.get(url, function(data){
                if(data == "File Deleted"){
                    console.log(tag);
                    event.target.dataset.name = "";

                    if(type == "cover_image"){
                        document.querySelector(tag).style.backgroundImage = 'linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692))';
                    }

                    if(type == "pro_image"){
                        document.querySelector(tag).setAttribute("src", "img/man.png");
                    }
                    // toastr.success('Removed',{
                    //     'closeButton': true, 
                    //     'showMethod' : 'slideDown', 
                    //     'hideMethod' : 'slideUp'
                    // });
                    
                    let name = "";
                    let ur = "";
                    if(event.target.hasAttribute("data-table")){
                        let tbl = event.target.dataset.table;
                        ur = `update_file.php?tbl=${tbl}&type=pro_img&name=${name}&id=` + "<?= $unique_id ?>";   
                    }else{
                        ur = `update_file.php?type=cover_img&name=${name}&id=` + "<?= $user_id ?>"; 
                    }

                    console.log(ur);
                      
                    $.get(ur, function(dat){
                        if(dat){
                            toastr.success(dat,{
                                'closeButton': true, 
                                'showMethod' : 'slideDown', 
                                'hideMethod' : 'slideUp'
                            });
                        }
                    },'text');



                }else{
                    toastr.error('not found',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                    });
                }
            }, 'text');
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

    // $(document).ready(function(){
    //     let coverImg = "<?= $user_details->cover_img ?? '' ?>";
    //     let profPic = "<?= $user_details->profile_pic ?? '' ?>"

    //     let cover = document.querySelector(".edit_cover_img");

    //     let pro = document.querySelector(".prof_pic");

    //     cover.style.backgroundImage = `linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(img/uploads/${coverImg})`;
    //     cover.style.backgroundPosition = "center";
    //     cover.style.backgroundSize = "cover";
    //     pro.style.backgroundImage = `linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(img/uploads/${profPic})`;
    //     pro.style.backgroundPosition = "center";
    //     pro.style.backgroundSize = "cover";
    // });


    $(".cover-image").hover(function(){
        $("#edit_btns").css('display', 'block');
    }, function(){
        $("#edit_btns").css('display', 'none');
    });

    $(".img").hover(function(){
        $(".edit_btns").css('display', 'block');
    }, function(){
        $(".edit_btns").css('display', 'none');
    });


    document.getElementById("change_cover").addEventListener("change", function(){
        let files = this.files[0];
        let url = "upload_file.php";

        let user = "<?= $user_id ?>";

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
                let url = `update_file.php?type=cover_img&name=${data}&id=` + "<?= $user_id ?>";   
                
                let cover = document.querySelector(".cover-image");
                cover.style.backgroundImage = `linear-gradient(to bottom, rgba(36, 36, 36, 0.692),rgba(19, 19, 19, 0.692)),url(${src})`;

                $.get(url, function(data){
                    if(data == 1){
                        toastr.success('Updated',{
                            'closeButton': true, 
                            'showMethod' : 'slideDown', 
                            'hideMethod' : 'slideUp'
                        });
                    }
                },'text');
            }
        });


    });

    document.getElementById("change_pro").addEventListener("change", function(){
        let files = this.files[0];
        let url = "upload_file.php";

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

                
                let tbl = "<?= $tabl2 ?>";
                let url = `update_file.php?tbl=${tbl}&type=pro_img&name=${data}&id=` + "<?= $unique_id ?>";   
                let src = URL.createObjectURL(files);     
                
                let pro_img = document.querySelector(".pro_img");
                pro_img.setAttribute("src", src);
                
                $.get(url, function(data){
                    if(data == 1){
                        toastr.success('Updated',{
                            'closeButton': true, 
                            'showMethod' : 'slideDown', 
                            'hideMethod' : 'slideUp'
                        });
                    }
                },'text');



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