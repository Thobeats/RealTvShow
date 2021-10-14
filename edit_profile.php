<?php 
require "scripts/functions.php";


if(is_loggedIn()){

$logo = true; $fixed = true;
require "scripts/header_two.php"; 

$user_id = user_id();
$role = role(); 
$unique_id = unique_id();

$tabl2 = get_table2_data($role);

if(isset($_POST['save_sizzle'])){

    $vid = $_FILES['sizzle'];
   
    $name = $vid['name'];
    $tmp = $vid['tmp_name'];
     //var_dump($name, $tmp);
    $uploads_dir = 'img/uploads/';
    $uploads_file = $uploads_dir . basename($name);
    if(move_uploaded_file($tmp, $uploads_file)){
        if(mysqli_query($link, "update realtv_writers set sizzle_reel = '$name' where unique_id = '$unique_id'")){
            set_message("success", "Success");
        }
    }
    echo mysqli_error($link);
}

if(isset($_POST['save_company'])){
    $date = date('Y-m-d h:i:s');
    $id = $_POST['id'];
    $co_name = $_POST['co_name'];
    $co_address = $_POST['co_address'];
    $co_phone = $_POST['co_phone'];
    $co_email = $_POST['co_email'];
    $co_web = $_POST['co_web'];

    $uploads_dir = 'img/uploads/';
    $uploads_file = $uploads_dir . basename($_FILES['co_img']['name']);  

    move_uploaded_file($_FILES['co_img']['tmp_name'], $uploads_file);
    $co_img = $_FILES['co_img']['name'] == "" ? $_POST['co_img'] : $_FILES['co_img']['name'];

    if(mysqli_query($link, "UPDATE `realtv_company` SET `company_name`='$co_name',`co_address`='$co_address',`co_email`='$co_email',`co_phone`='$co_phone',`co_img`='$co_img',`date_updated`='$date',`co_web`='$co_web' WHERE id = '$id'")){
        set_message("success", "Updated");
      
    }


   

}

if(isset($_POST['save_resume'])){

    $vid = $_FILES['resume'];
   
    $name = $vid['name'];
    $tmp = $vid['tmp_name'];
     //var_dump($name, $tmp);
    $uploads_dir = 'img/uploads/';
    $uploads_file = $uploads_dir . basename($name);
    if(move_uploaded_file($tmp, $uploads_file)){
        if(mysqli_query($link, "update realtv_contestants set resume = '$name' where unique_id = '$unique_id'")){
            set_message("success", "Success");
        }
    }
    echo mysqli_error($link);
}

if(isset($_POST['save'])){
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $fullname = $first_name . " " . $last_name;
    $address = $_POST['address'];
    if(role() == 1){
        $resume = $_POST['resume'];

    }
    $email = $_POST['email'];
    $username = $_POST['username'];
    $country = $_POST['country'];
    $country = explode("-",$country)[0];
    $state = $_POST['state'];
    $state = explode("-", $state)[0];
    $city = $_POST['city'];
    $dob = $_POST['dob'];
    $phone = $_POST['mobile'];
    $phone2 = $_POST['mobile2'];
    $phone3 = $_POST['mobile3'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $linked_in = $_POST['linked_in'];
    $instagram = $_POST['instagram'];
    $updated = date("Y-m-d h:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    $q1 = "UPDATE `realtv_users` SET `firstname`='$first_name',`lastname`='$last_name',`fullname`='$fullname',`username`='$username',`address`='$address',`email`='$email',`phone`='$phone',`mobile2`='$phone2',`mobile3`='$phone3',`twitter`='$twitter',`facebook`='$facebook',`linked_in`='$linked_in',`instagram`='$instagram',`updated_at`='$updated',`ip_address`='$ip',`dob`='$dob', `country`='$country', `state`='$state', `city`='$city' WHERE id = '$user_id'";

    if(mysqli_query($link, $q1)){

        if(role() == 1){
           $res = update_contestant($link, $unique_id, $first_name, $last_name,$email, $username,$phone, $address,$resume);

           if($res == 1){
                set_message("success", "Updated Successfully");
                header("location: profile.php");
                exit(0);
           }
        }

        if(role() == 2){
            $res = update_writer($link, $unique_id, $first_name, $last_name,$email, $username,$phone, $address);
 
            if($res == 1){
                 set_message("success", "Updated Successfully");
                 header("location: profile.php");
                 exit(0);
            }
         }


         if(role() == 3){
            $res = update_executive($link, $unique_id, $first_name, $last_name,$email, $username,$phone, $address);
 
            if($res == 1){
                 set_message("success", "Updated Successfully");
                 header("location: profile.php");
                 exit(0);
            }
         }



    }
  }

$user_details = mysqli_fetch_object(mysqli_query($link, "select * from realtv_users a inner join $tabl2 b on a.unique_id = b.unique_id where a.id= '$user_id'"));
$companyid = $user_details->company_id;
$company = mysqli_fetch_assoc(mysqli_query($link, "select * from realtv_company where id = '$companyid'"));


if(isset($_GET['step'])){
    $step = $_GET['step'];

}else{
    $step = 'bio';
}
?>

<?= get_message("success"); get_message("error"); ?>


<style>
    .profile-body{
        margin-top : 33vh;
    }
     .tab-active{
         text-transform : uppercase;
         color : #fff;
         background-color : #004883;
     }
     .real-color{
         color : #004883;
     }.border-blue{
         border : 1px solid #004883;
     }
     .tab-pane{
        min-height : 20vh;
     }.nav{
        width : 80%;
        padding  : 0px;
     }
    form{
        padding  : 20px 60px;
        width : 90%;
    }.nav-link{
        width : 200px;
        text-align : center;
        border : 1px solid #004883;
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
<div class="modal fade" id="prevVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >

  <div class="modal-dialog modal-lg">
    <div class="modal-content text-light" style="background-color : black !important;">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="editProfileModalLabel">Video Preview</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
               

                <div class="form-group" style="height : 50vh">
                    <video id="preview_sizzle" width="100%" height="100%" controls>
                    </video>
                </div>
            
            
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>

<div class="modal fade" id="prevRes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >

  <div class="modal-dialog modal-lg">
    <div class="modal-content text-light" style="background-color : black !important;">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="editProfileModalLabel">Resume Preview</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">              
            <div class="form-group resembed" style="height : 30vh">
            </div>
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<section class="profile-body p-2 mx-2">

    <!-- <div class="row"> -->
        <!-- <div class="col-2 bg-light pt-3"> -->
            <div class="nav nav-tabs text-center mx-auto" id="v-pills-tab" role="tablist">
                <a class="nav-link <?= $step == 'bio' ? 'tab-active' : '' ?>" href="?step=bio">Bio</a>
                <?php if(role() == 1): ?>
                <a class="nav-link <?= $step == 'resume' ? 'tab-active' : '' ?>" href="?step=resume">Resume</a>
                <?php endif; ?>
                <?php if(role() == 2): ?>
                <a class="nav-link <?= $step == 'sizzle' ? 'tab-active' : '' ?>" href="?step=sizzle">Sizzle Reel</a>
                <?php endif; ?>
                <?php if(role() == 3): ?>
                <a class="nav-link <?= $step == 'company' ? 'tab-active' : '' ?>" href="?step=company">Company</a>
                <?php endif; ?>
            </div>
        <!-- </div> -->
        <!-- <div class="col-10"> -->
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane <?= $step == 'bio' ? 'active' : '' ?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                    <div class="col-12">
                        <form action="" method="POST" class="mx-auto" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-row mt-3">
                                <div class="col-6">
                                    <h3 class="real-color">Edit Profile</h3>
                                </div>
                                <div class="col-6 form-group text-right">
                                    <button class="realbtn text-light" style="background-color: #004883; " type="submit" name="save">Save</button>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                    <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="<?= $user_details->firstname ?? "" ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="<?= $user_details->lastname ?? "" ?>">
                                </div>                
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $user_details->email ?? "" ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user_details->username ?? "" ?>">
                                </div>                
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                    <input type="text" name="mobile" class="form-control" placeholder="Phone" value="<?= $user_details->phone_no ?? "" ?>">
                                </div>                
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                    <input type="text" name="mobile2" class="form-control" placeholder="Phone2" value="<?= $user_details->mobile2 ?? "" ?>">
                                </div>     
                            </div>
                            <div class="form-row">
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                    <input type="text" name="mobile3" class="form-control" placeholder="Phone3" value="<?= $user_details->mobile3 ?? "" ?>">
                                </div>   
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                    <input type="date" name="dob" class="form-control" placeholder="Date of Birth" value="<?= $user_details->dob ?? "" ?>">
                                </div>

                                        
                            </div>
                            <div class="form-row">
                                <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                                    <select name="country" class="form-control" id="country" onchange="getState(event)">
                                        <option value=""> Select Country </option>
                                    </select>
                                </div>    
                                <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                                    <select name="state" class="form-control" placeholder="State" id="state" onchange="getCity(event)">
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                                    <select name="city" class="form-control" placeholder="City" id="city"></select>
                                </div>    
                            </div>
                            
                            <div class="form-row">
                                <div class="col-lg-3 col-md-3 col-sm-6 mt-2">
                                    <input type="text" name="facebook" class="form-control" placeholder="facebook username" value="<?= $user_details->facebook ?? "" ?>">
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6  mt-2">
                                    <input type="text" name="twitter" class="form-control" placeholder="twitter username" value="<?= $user_details->twitter ?? "" ?>">
                                </div> 
                                <div class="col-lg-3 col-md-3 col-sm-6  mt-2">
                                    <input type="text" name="linked_in" class="form-control" placeholder="linkedIn username" value="<?= $user_details->linked_in ?? "" ?>">
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6  mt-2">
                                    <input type="text" name="instagram" class="form-control" placeholder="Instagram username" value="<?= $user_details->instagram ?? "" ?>">
                                </div>                
                            </div>
                            
                            <div class="form-row">
                                <div class="col-12 mt-2">
                                    <textarea name="address" class="form-control" cols="5" rows="10" placeholder="Enter Address"><?= $user_details->address ?? "" ?></textarea>
                                </div>                
                            </div>            
                        </form>
                    </div>
                </div>
            </div>
                <div class="tab-pane <?= $step == 'resume' ? 'active' : '' ?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="POST" class="mx-auto" enctype="multipart/form-data" autocomplete="off">
                                <input type="hidden" name="tmp" id="tmp">
                                <input type="hidden" name="tmp" id="vidname">
                                <div class="form-row mt-3">
                                    <div class="col-6">
                                        <h3 class="real-color">Edit Resume</h3>
                                    </div>
                                    <div class="col-6 form-group text-right">
                                        <button class="realbtn text-light" style="background-color: #004883; " type="submit" name="save_resume">Save</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group" id="rescont">
                                    <embed type="text/pdf" src="img/uploads/<?= $user_details->resume ?>" width="100%" height="500">
                                </div> 
                                <div class="form-group">
                                    <label for="resume">Upload Resume</label>
                                    <input type="file" name="resume" id="resume" hidden>
                                    <label class="btn-danger"for="" onclick="removeResume(event)" data-name="<?= $user_details->resume ?>">Remove Resume</label>
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
    
            <div class="tab-pane <?= $step == 'sizzle' ? 'active' : '' ?>" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="row">
                    <div class="col-12">
                        <form action="" method="POST" class="mx-auto" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" name="tmp" id="tmp">
                            <input type="hidden" name="tmp" id="vidname">
                            <div class="form-row mt-3">
                                <div class="col-6">
                                    <h3 class="real-color">Edit Sizzle Reel</h3>
                                </div>
                                <div class="col-6 form-group text-right">
                                    <button class="realbtn text-light" style="background-color: #004883; " type="submit" name="save_sizzle">Save</button>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <video id="video" width="100%" height="100%" controls autoplay>
                                <source id="vid" src="img/uploads/<?= $user_details->sizzle_reel ?>" type="video/mp4"></source>
                                </video>
                            </div> 
                            <div class="form-group">
                                <label for="sizzle">Upload Video</label>
                                <input type="file" name="sizzle" id="sizzle" hidden>
                                <label class="btn-danger"for="" onclick="removeVideo(event)" data-name="<?= $user_details->sizzle_reel ?>">Remove Video</label>
                            </div>   
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane <?= $step == 'company' ? 'active' : '' ?>" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            <div class="row">
                    <div class="col-12">
                        <form action="" method="POST" class="mx-auto" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-row mt-3">
                                <div class="col-6">
                                    <h3 class="real-color">Edit Company</h3>
                                </div>
                                <div class="col-6 form-group text-right">
                                    <button class="realbtn text-light" style="background-color: #004883; " type="submit" name="save_company">Save</button>
                                </div>
                            </div>
                            <hr>
                            <input type="hidden" name="id" value="<?= $companyid ?>">
                            <input type="hidden" name="co_img" value="<?=$company['co_img']?>">
                            <div class="row mx-auto w-100 mb-3 mt-3">
                                <div class="col-lg-1 col-sm-0"></div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="company_img py-4">
                                        <img class="cimg" src="<?= $company['co_img'] ? 'img/uploads/' . $company['co_img'] : 'img/logo-placeholder.png' ?>" width="100%" height="100%" alt="">
                                    </div>
                                    <div class="text-center">
                                        <label for="company_img" class="badge badge-success p-2" style="cursor: pointer;"><i class="bi bi-brush text-light " title="change cover image"></i></label>
                                        <input type="file" name="co_img" id="company_img" hidden>
                                        <label for="" class="badge badge-danger p-2"><i class="bi bi-x-lg" data-id="<?= $id ?>" data-name="<?= $company['co_img'] ?>" data-type="company_img" data-tag=".cimg" onclick="removePic(event)" style="cursor:pointer;" title="Remove"></i></label> 
                                    </div>  
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="company-name-and-website mt-3">
                                        <h3 class="p-2"> <input type="text" placeholder="Company Name" class="form-control h3" name="co_name" value="<?= $company['company_name'] ?? "" ?>"></h3>
                                        <h6 class="p-2"><input type="text" placeholder="Company Address"   class="form-control" name="co_address" value="<?= $company['co_address'] ?? "" ?>"></h6>
                                        <h6 class="p-2"><input type="email" placeholder="Company Email"  class="form-control" name="co_email" value="<?= $company['co_email'] ?? "" ?>"></h6>
                                        <h6 class="p-2"><input type="text" placeholder="Company Phone"  class="form-control" name="co_phone" value="<?= $company['co_phone'] ?? "" ?>"></h6>
                                        
                                        <div class="mt-2 p-2">
                                        <input type="text"  placeholder="Company Web : https://example.com"  class="form-control" name="co_web" value="<?= $company['co_web'] ?? "" ?>"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        <!-- </div> -->
     </div>
    
    

   
</section>

<script>

let sizzlePreview = document.getElementById("preview_sizzle");

$(document).ready(function(){
    let value = "<?= $user_details->country ?? "" ?>";
    let valueC = "<?= $user_details->city ?? "" ?>";
    let valueS = "<?= $user_details->state ?? "" ?>";


        if(valueS != ""){
            document.getElementById("state").innerHTML += `<option> ${valueS} </option><option></option>`;
        }
        if(valueC != ""){
            document.getElementById("city").innerHTML += `<option> ${valueC} </option><option></option>`;
        }
       

    let countries = document.getElementById("country");
    var headers = new Headers();
    headers.append("X-CSCAPI-KEY", "OW1RV3hIVkpaZWRybXgyUm1KaXVpY3c5TUdwTk1tRzg4dERxQWxvbw==");

    var requestOptions = {
    method: 'GET',
    headers: headers,
    redirect: 'follow'
    };

    fetch("https://api.countrystatecity.in/v1/countries", requestOptions)
    .then(response => response.json())
    .then((result) => {
        //console.log(result); 
        countries.innerHTML = '';

        if(value != ""){
            countries.innerHTML += `<option> ${value}</option><option></option>`;
        }else{
            countries.innerHTML += '<option value=""> Select Country </option>';
        }
       

        for(let res of result){
            countries.innerHTML += `<option value="${res.name} - ${res.iso2}">${res.name}</option>`;
        }
    })
    .catch(error => console.log('error', error));


    
});


function getState(event){
    let country = event.target.value.split("-")[1].trim();

    console.log(country);

    let state = document.getElementById("state");

    var headers = new Headers();
    headers.append("X-CSCAPI-KEY", "OW1RV3hIVkpaZWRybXgyUm1KaXVpY3c5TUdwTk1tRzg4dERxQWxvbw==");

    var requestOptions = {
    method: 'GET',
    headers: headers,
    redirect: 'follow'
    };

    fetch(`https://api.countrystatecity.in/v1/countries/${country}/states`, requestOptions)
    .then(response => response.json())
    .then((result) => {
        //console.log(result); 
        state.innerHTML = '';

        state.innerHTML += '<option value=""> Select State </option>';

        for(let res of result){
            state.innerHTML += `<option value="${res.name}-${res.iso2}-${country}" >${res.name}</option>`;
        }
    })
    .catch(error => console.log('error', error));

}

function getCity(event){
    let state = event.target.value.split("-")[1].trim();
    let country = event.target.value.split("-")[2].trim();

    let city = document.getElementById("city");

    var headers = new Headers();
    headers.append("X-CSCAPI-KEY", "OW1RV3hIVkpaZWRybXgyUm1KaXVpY3c5TUdwTk1tRzg4dERxQWxvbw==");

    var requestOptions = {
    method: 'GET',
    headers: headers,
    redirect: 'follow'
    };

    fetch(`https://api.countrystatecity.in/v1/countries/${country}/states/${state}/cities`, requestOptions)
    .then(response => response.json())
    .then((result) => {
       // console.log(result); 
        city.innerHTML = '';
       
        city.innerHTML += '<option value=""> Select City</option>';

        for(let res of result){
            city.innerHTML += `<option value="${res.name}">${res.name}</option>`;
        }
    })
    .catch(error => console.log('error', error));

}

let sizzle = document.getElementById('sizzle');

    sizzle.addEventListener("change", function(){
        let files = this.files[0];
        console.log(files);
        let url = "handle_video.php"; 

        let formData = new FormData(); 
        formData.append("file", files);
        fetch(url, {
            method: "POST", 
            body: formData,
        }).then(response => response.json()).then((data) => {
            
            if(data.msg == 'error1'){
                sizzle.value = "";
                toastr.error('File too Large',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data.msg == 'error2'){
                sizzle.value = "";
                toastr.error('Invalid format',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else{

                let src = URL.createObjectURL(files);   
                
                let format = data.format;
               

                console.log(sizzlePreview);
                sizzlePreview.innerHTML = "";
                sizzlePreview.innerHTML += `<source src="${src}" type="video/${format}"></source>`;
                sizzlePreview.load();

                $("#prevVideo").modal('show');
            }
        });
    });

    let resume = document.getElementById('resume');

    resume.addEventListener("change", function(){
        let files = this.files[0];
        let url = "handle_file.php"; 

        let formData = new FormData(); 
        formData.append("file", files);
        fetch(url, {
            method: "POST", 
            body: formData,
        }).then(response => response.text()).then((data) => {
            
            if(data.msg == 'error1'){
                resume.value = "";
                toastr.error('File too Large',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data.msg == 'error2'){
                resume.value = "";
                toastr.error("Invalid Format",{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else{

                let src = URL.createObjectURL(files);   
                console.log(files);                
                document.querySelector(".resembed").innerHTML = `<embed type='text/pdf' src='${src}' width='100%' height='300'>`;

                $("#prevRes").modal('show');
            }
        });
    });

    function removeVideo(event){
        let name = event.target.dataset.name;
        let id = "<?= $unique_id ?>";


        if(name !== ""){
            let url = `unlink.php?pic=${name}`;

            $.get(url, function(data){
                if(data == "File Deleted"){
                    event.target.dataset.name = "";
                    document.querySelector("#vid").setAttribute("src", "");
                    document.querySelector("#video").load();

                   let ur = `update_file.php?id=${id}&type=sizzle&name=NULL`;                      
                    $.get(ur, function(dat){
                        if(dat == 1){
                            toastr.success("Removed",{
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

    function removeResume(event){
        let name = event.target.dataset.name;
        let id = "<?= $unique_id ?>";


        if(name !== ""){
            let url = `unlink.php?pic=${name}`;

            $.get(url, function(data){
                if(data == "File Deleted"){
                    event.target.dataset.name = "";
                    document.querySelector("#rescont").innerHTML = '';

                   let ur = `update_file.php?id=${id}&type=resume&name=NULL`;                      
                    $.get(ur, function(dat){
                        if(dat == 1){
                            toastr.success("Removed",{
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

                        document.querySelector(tag).setAttribute("src", "img/logo-placeholder.png");
                                      
                    let name = "";
                    let ur = "";
                
                        ur = `update_file.php?type=company_img&name=${name}&id=` + event.target.dataset.id; 
                                       
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


    document.getElementById("company_img").addEventListener("change", function(){
        let files = this.files[0];
        let url = "handle_file.php";

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
                
                let cover = document.querySelector(".cimg");
                cover.setAttribute("src", src);
            }
        });

    })
    
</script>


<?php
 require "scripts/footer_two.php";

}else{
    header("Location: login.php");
}
?>