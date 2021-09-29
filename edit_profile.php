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
    $state = $_POST['state'];
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

    $q1 = "UPDATE `realtv_users` SET `firstname`='$first_name',`lastname`='$last_name',`fullname`='$fullname',`username`='$username',`address`='$address',`email`='$email',`phone`='$phone',`mobile2`='$phone2',`mobile3`='$phone3',`twitter`='$twitter',`facebook`='$facebook',`linked_in`='$linked_in',`instagram`='$instagram',`updated_at`='$updated',`ip_address`='$ip',`dob`='$dob' WHERE id = '$user_id'";

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
                    <input type="text" name="mobile" class="form-control" placeholder="Phone" value="<?= $user_details->phone ?? "" ?>">
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
                        <option> Select Country </option>
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
                    <input type="text" name="linked_in" class="form-control" placeholder="linkedIn uaername" value="<?= $user_details->linked_in ?? "" ?>">
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6  mt-2">
                    <input type="text" name="instagram" class="form-control" placeholder="Instagram uaername" value="<?= $user_details->instagram ?? "" ?>">
                </div>                
            </div>
            
            <div class="form-row">
                <div class="col-12 mt-2">
                    <textarea name="address" class="form-control" id="" cols="30" rows="10" placeholder="Enter Address"><?= $user_details->address ?? "" ?></textarea>
                </div>                
            </div>            
        </form>
       </div>
   </div>
</section>

<script>


$(document).ready(function(){
    let value = "<?= $user_details->country ?? "" ?>";
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
        countries.innerHTML += '<option> Select Country </option>';

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
        state.innerHTML += '<option> Select State </option>';

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
        city.innerHTML += '<option> Select City</option>';

        for(let res of result){
            city.innerHTML += `<option value="${res.name}">${res.name}</option>`;
        }
    })
    .catch(error => console.log('error', error));

}

</script>


<?php
 require "scripts/footer_two.php";

}else{
    header("Location: login.php");
}
?>