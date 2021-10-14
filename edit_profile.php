<?php 
require "scripts/functions.php";


if(is_loggedIn()){

$logo = true; $fixed = true;
require "scripts/header_two.php"; 

$user_id = user_id();
$role = role(); 
$unique_id = unique_id();

$tabl2 = get_table2_data($role);

$user_details = mysqli_fetch_object(mysqli_query($link, "select * from realtv_users a inner join $tabl2 b on a.unique_id = b.unique_id where a.id= '$user_id'"));

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

if(isset($_POST['save_sizzle'])){

    $vid = $_FILES['sizzle'];
    var_dump($vid);
    $name = $_POST['vidname'];
    $tmp = $_POST['tmp'];
    $uploads_dir = 'img/uploads/';
    $uploads_file = $uploads_dir . basename($name);
    // if(move_uploaded_file($vid['tmp_name'], $uploads_file)){
    //     if(mysqli_query($link, "update realtv_writers set sizzle_reel = '$name' where unique_id = '$unique_id'")){
    //         set_message("success", "Success");
    //     }
    // }else{
    //     echo "kkk";
    // }
    // echo mysqli_error($link);
}


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
         border: 1px solid;
         color : #004883;
         border-left: 5px solid #004883;
     }
     .real-color{
         color : #004883;
     }.border-blue{
         border : 1px solid #004883;
     }
     .tab-pane{
        min-height : 20vh;
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

<section class="profile-body p-2 mx-2">

    <div class="row">
        <div class="col-2 border-blue pt-3">
            <div class="nav nav-pills flex-column nav-fill d-flex justify-content-center mx-auto" id="v-pills-tab" role="tablist">
                <a class="nav-link <?= $step == 'bio' ? 'tab-active' : '' ?>" href="?step=bio">Bio</a>
                <?php if(role() == 1): ?>
                <a class="nav-link <?= $step == 'resume' ? 'tab-active' : '' ?>" href="?step=resume">Resume</a>
                <?php endif; ?>
                <?php if(role() == 2): ?>
                <a class="nav-link <?= $step == 'sizzle' ? 'tab-active' : '' ?>" href="?step=sizzle">Sizzle Reel</a>
                <?php endif; ?>
                <?php if(role() == 3): ?>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Company</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-10">
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
            <div class="tab-pane <?= $step == 'resume' ? 'active' : '' ?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
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
                                <video width="100%" height="100%" controls autoplay>
                                <source src="img/uploads/<?= $user_details->sizzle_reel ?>" type="video/mp4"></source>
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
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div>
        </div>
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
                $("#vidname").val(data.name);
                $("#tmp").val(data.tmp);

                console.log(sizzlePreview);
                sizzlePreview.innerHTML = "";
                sizzlePreview.innerHTML += `<source src="${src}" type="video/${format}"></source>`;
                sizzlePreview.load();

                $("#prevVideo").modal('show');
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
                   let ur = `update_file.php?id=${id}&type=sizzle&name=`;                      
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

    
</script>


<?php
 require "scripts/footer_two.php";

}else{
    header("Location: login.php");
}
?>