<?php
ob_start();
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

function connect(){ 
    $link = mysqli_connect("127.0.0.1", "root", "", "realtvshow");

    if($link){
        return $link;
    }else {
        return mysqli_connect_errno();
    }
}

// function connect(){ 
//     $link = mysqli_connect("localhost", "realtv_db_user", "@lphA3ch0#", "realtv_show");

//     if($link){
//         return $link;
//     }else {
//         return mysqli_connect_errno();
//     }
// }

function base_url(){
    return "https://" . $_SERVER['SERVER_NAME'] . "/test/";
}

//echo base_url();
function set_message($type, $message){
    $_SESSION[$type] = $message;   
}

function get_message($type){
    $echo = false;
    if(isset($_SESSION[$type])){

        $message = $_SESSION[$type]; $title = NULL;
        $toastr = "toastr.$type('$message','$title', 
        {
            'closeButton': true, 
            'showMethod' : 'slideDown', 
            'hideMethod' : 'slideUp'
        })";  


        echo "<script>$toastr</script>";
        $echo = true;
    }

    if($echo == true){
        unset($_SESSION[$type]);
    }

}


// function send_mail($toEmail, $subject, $body){
//     $mail = new PHPMailer(true);
//     try{
//         //Settings
//        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = "tobiy23@gmail.com";
//         $mail->Password = "T3mil0luw4";
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//         $mail->Port = "465";

//         //Receiver
//         $mail->setFrom('RealtvShow@test.com', 'Mailer');
//         $mail->addAddress($toEmail);
    
//         //Content
//         $mail->isHTML(true);
//         $mail->Subject = $subject;
//         $mail->Body = $body;
        
//         $mail->send();
//         set_message("success", "Confirmation email sent");        
//         header("location: confirm.php");


//     }
//     catch(Exception $e){
//         set_message("error" , $mail->ErrorInfo);
//     }
// }

function send_mail($toEmail, $subject, $body){
    $mail = new PHPMailer(true);
    try{
        //Settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
       
        $mail->isSMTP();
        $mail->Host = 'p3plzcpnl459190.prod.phx3.secureserver.net';
        $mail->SMTPAuth = false;
        $mail->SMTPAutoTLS = false; 
        $mail->Port = 25; 
        // $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = true;
        $mail->Username = "welcome@realitytv-registry.com";
        $mail->Password = "R34l1tytvr3g1stry";
        $mail->SMTPSecure = 'none';
        $mail->ENCRYPTION = "none";
        //$mail->Port = "465";

        //Receiver
        $mail->setFrom('welcome@realitytv-registry.com', 'Connect');
        $mail->addAddress($toEmail);
    
        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        
        $mail->send();
        set_message("success", "Confirmation email sent");        
        header("location: confirm.php");


    }
    catch(Exception $e){
        set_message("error" , $mail->ErrorInfo);
    }
}

function user_session($array){
    foreach($array as $key => $value){
        $_SESSION[$key] = $value;
    }
}


function register_writer($firstname, $surname, $email, $password, $role_id, $address, $username, $phone_no, $project_title, $genre, $logline, $synopsis, $cover_img = null, $other_images = null, $video = null){

    $password = md5($password);
    $encode_password = utf8_encode($password);
    $token = md5($email); $encode_token = utf8_encode($token);
    $fullname = strtoupper($firstname) . " " . $surname;
    $email = strtolower($email);
    $unique_id = $role_id.strtotime("now");

    // if($cover_img['name'] != ""){
    //     $pic = handle_image($cover_img);
    // }

    if($video['name'] != ""){
        $vid = handle_video($video);
    }




    if($username == null){
        $username = $email;
    }

    // Database connection
    $link = connect();     

    $query = mysqli_query($link, "INSERT INTO `realtv_users`(`firstname`,`lastname`,`fullname`,`username`,`status`, `role_id`,`email`,`password`,`activated`, `token`, `address`, `unique_id`) VALUES ('$firstname','$surname','$fullname','$username','Active',
                                 '$role_id','$email','$encode_password','0', '$encode_token', '$address', '$unique_id')");

  
    if($query){
        
        if($role_id == 2){

            //var_dump($_POST);
            $writer_query = mysqli_query($link, "INSERT INTO `realtv_writers`(`firstname`, `lastname`, `email`, `username`, `password`, `phone_no`, `address`, `profile_pic`, `sizzle_reel`, `unique_id`) 
                                                VALUES ('$firstname','$surname','$email','$username','$password','$phone_no','$address','$cover_img','$vid','$unique_id')");

           $res = save_drafts($unique_id, $project_title,$logline,$synopsis,$genre,$other_images);

        }
  

        $body = "<div style='padding: 5px; text-transform: capitalize;'>";
        $body .= "<h4>Welcome to RealTv Show</h4>";
        $body .= "<p>Confirm your email to activate your account. To confirm your email, click <a href='".base_url()."confirm.php?email=$email&pass=$token'>here</a> </p>";
        $body .= "</div>";
        send_mail($email, "Email Confirmation", $body);
    }else {
        set_message("error", "Not Registered");

    }

    

}

function register_contestant($firstname, $surname, $email, $password, $role_id, $address, $username, $phone_no, $project, $profile_pic, $resume){

    $password = md5($password);
    $encode_password = utf8_encode($password);
    $token = md5($email); $encode_token = utf8_encode($token);
    $fullname = strtoupper($firstname) . " " . $surname;
    $email = strtolower($email);
    $unique_id = $role_id.strtotime("now");

    // $pic = handle_image($profile_pic);
    // $res = handle_file($resume);

    if($profile_pic['name'] != ""){
        $pic = handle_image($profile_pic);
    }

    if($resume['name'] != ""){
        $res = handle_file($resume);
    }

    if($username == null){
        $username = $email;
    }

    // Database connection
    $link = connect();     

    $query = mysqli_query($link, "INSERT INTO `realtv_users`(`firstname`,`lastname`,`fullname`,`username`,`status`, `role_id`,`email`,`password`,`activated`, `token`, `address`, `unique_id`) VALUES ('$firstname','$surname','$fullname','$username','Active',
                                 '$role_id','$email','$encode_password','0', '$encode_token', '$address', '$unique_id')");

  
    if($query){
        if($role_id == 1){
            $contestant_query = mysqli_query($link, "INSERT INTO `realtv_contestants`(`firstname`, `lastname`, `email`, `username`, `password`, `phone_no`, `address`, `profile_pic`, `resume`, `unique_id`) VALUES ('$firstname','$surname','$email','$username',
                                            '$password','$phone_no','$address','$pic','$res', '$unique_id')");
            if(!is_null($project)){
                foreach($project as $pro){
                    $cartquery = mysqli_query($link, "INSERT INTO `realtv_cart`(`user_id`, `project_id`) VALUES ('$unique_id','$pro')");
                }
            }
        }
        $body = "<div style='padding: 5px; text-transform: capitalize;'>";
        $body .= "<h4>Welcome to RealTv Show</h4>";
        $body .= "<p>Confirm your email to activate your account. To confirm your email, click <a href='".base_url()."confirm.php?email=$email&pass=$token'>here</a> </p>";
        $body .= "</div>";
        send_mail($email, "Email Confirmation", $body);
    }else {
        set_message("error", "Not Registered");
        echo mysqli_error($link);    

    }

    

}

function register_executive($firstname, $surname, $email, $password, $role_id, $address, $username, $phone_no, $profile_pic=null, $title=null, $company_name=null){

    $password = md5($password);
    $encode_password = utf8_encode($password);
    $token = md5($email); $encode_token = utf8_encode($token);
    $fullname = strtoupper($firstname) . " " . $surname;
    $email = strtolower($email);
    $unique_id = $role_id.strtotime("now");

    
    if($profile_pic['name'] != ""){
        $pic = handle_image($profile_pic);
    }

    //echo $pic;

    if($username == null){
        $username = $email;
    }

    // Database connection
    $link = connect();     

    if($company_name != null){
       if(mysqli_connect($link, "INSERT INTO `realtv_company`(`company_name`) VALUES ('$company_name'")){
           $company_id = mysqli_insert_id($link);
       }else{
           $company_id = null;
       }
    }

    $query = mysqli_query($link, "INSERT INTO `realtv_users`(`firstname`,`lastname`,`fullname`,`username`,`status`, `role_id`,`email`,`password`,`activated`, `token`, `address`, `unique_id`) VALUES ('$firstname','$surname','$fullname','$username','Active',
                                 '$role_id','$email','$encode_password','0', '$encode_token', '$address', '$unique_id')");

  
    if($query){
        if($role_id == "3"){
            $executive_query = mysqli_query($link, "INSERT INTO `realtv_executives`(`firstname`, `lastname`, `email`, `username`, `password`, `phone_no`, `address`, `profile_pic`, `unique_id`, `title`, `company_id`) VALUES ('$firstname','$surname','$email','$username',
                                            '$password','$phone_no','$address','$pic','$unique_id', '$title', '$company_id')");
        }


        $body = "<div style='padding: 5px; text-transform: capitalize;'>";
        $body .= "<h4>Welcome to RealTv Show</h4>";
        $body .= "<p>Confirm your email to activate your account. To confirm your email, click <a href='".base_url()."confirm.php?email=$email&pass=$token'>here</a> </p>";
        $body .= "</div>";
        send_mail($email, "Email Confirmation", $body);
    }else {
        set_message("error", "Not Registered");
        echo mysqli_error($link);    

    }

    

}

function log_in_user($email, $password){
    $password = utf8_encode(md5($password));
    $email = strtolower($email);

    $link = connect();

    $loginQuery = mysqli_query($link, "select * from realtv_users where LOWER(`email`) = '$email' and `password` = '$password' and `activated` = '1'");
    $num_row = $loginQuery->num_rows;

    if($num_row == 1){
        $user_details = mysqli_fetch_assoc($loginQuery); $userid = $user_details['id'];
        user_session($user_details);
        $date = date("Y/m/d h:i:s");
        $updateUser = mysqli_query($link, "update realtv_users set last_logged_in = '$date', online = '1' where id = '$userid'");

        $role = $user_details['role_id'];

        if($role == 3){
            $location = "Eprojectsreg.php";
        }

        if($role == 1){
            $location = "contestantsreg.php";
        }

        if($role == 2){
            $location = "writersPage.php";
        }

        if($role == 4){
            $location = "profile.php";
        }

        $_SESSION['index'] = $location;
       
        header("Location: $location");

        set_message("success", "Login Success"); 
    }else {
        set_message('error', 'Invalid login details');
    }
}

function save_to_cart($user_id, $project_id){
    $link = connect();
    $query = mysqli_query($link, "INSERT INTO `realtv_cart`(`user_id`, `project_id`) VALUES ('$user_id','$project_id')");

    if($query){
        return 1;
    }else{
        return 0;
    }
}

function check_order($order_id){

    $order_id = trim($order_id);

    $link = connect();

    $checkOrder = mysqli_query($link, "select * from realtv_users where orderID = '$order_id'");

    if(mysqli_num_rows($checkOrder) >= 1){
        set_message("error", "Order Id is used");
    }else{

        $order = mysqli_query($link, "select * from realtv_reg where `orderID` = '$order_id'");

        $num_row = mysqli_num_rows($order);

        if($num_row == 1){
            return mysqli_fetch_assoc($order)['id'];
        }else {
            return 0;
        }
    }

    
}


/////////////////// MEDIA FUNCTIONS /////////////////////////

function handle_image($image){
    if(!is_null($image)){
      
        $uploads_dir = 'img/uploads/';
        $extensions = ['jpg', 'png',"jpeg"];
        $name = $image['name'];
        $size = $image['size']; 
        $ext = end(explode(".", $name));
        $location = $_SERVER['HTTP_REFERER'];

        // //echo $ext;

        // // //check size 
        // if($size > 500000){
        //     set_message("error", "file too large, must not exceed 500KB");
        //     header("Location: $location");
        //     exit(0);
        // }

        // //check extension
        // if(!in_array($ext, $extensions)){
        //     set_message("error", "invalid type, only jpg or png allowed");
        //     header("Location: $location");
        //     exit(0);
        // }
        $uploads_file = $uploads_dir . basename($name);

        if(move_uploaded_file($image['tmp_name'], $uploads_file)){
            return $name;

        }else{
            return "error";
        }
    }
  

}

function handle_file($image){
    if(!is_null($image)){
       // $uploads_dir = 'C:/Users/user/Documents/Fiverr Projects/RealTvShow/img/uploads/';
       // $uploads_dir = '/Users/firstlincoln/Documents/iyanu/RealTvShow/img/uploads/';
       $uploads_dir = 'img/uploads/';
        $extensions = ['pdf','doc','docx'];
        $name = $image['name'];
        $size = $image['size']; 
        $ext = end(explode(".", $name));
        $location = $_SERVER['HTTP_REFERER'];


        //echo $ext;

        //check size 
        if($size > 500000){
            set_message("error", "file too large, must not exceed 500KB");
            header("Location: $location");
            exit(0);
        }

        //check extension
        if(!in_array($ext, $extensions)){
            set_message("error", "invalid type, only pdf is allowed");
            header("Location: $location");
            exit(0);
        }
        $uploads_file = $uploads_dir . basename($name);

        if(move_uploaded_file($image['tmp_name'], $uploads_file)){
         set_message("success", "Uploaded");
            
        }else{
            set_message("error", "Not Uploaded");
            header("Location: $location");
            exit(0);
        }
        return $name;
    }
  

}


function handle_multi_images($images){

    $image_list = "";
    $location = $_SERVER['HTTP_REFERER'];

    if(!is_null($images)){
 
       $uploads_dir = 'img/uploads/';

        $extensions = ['jpg', 'png',"jpeg"];     

       // var_dump($images);
        //check size 
        foreach($images['size'] as $size){
            if($size > 1000000){
                set_message("error", "file too large, must not exceed 1MB");
                header("Location: $location");
                exit(0);
            }

        }

        foreach($images['name'] as $key => $imagename){
            $ext = end(explode(".", $imagename));

            //check extension
            if(!in_array($ext, $extensions)){
                set_message("error", "$imagename is invalid, only png and jpg is allowed");
                header("Location: $location");
                exit(0);
            }

            $uploads_file = $uploads_dir . basename($imagename);

            if(move_uploaded_file($images['tmp_name'][$key], $uploads_file)){
                $image_list .= $imagename . ",";
            }
           
        }

       
    }

    return $image_list;
}

function handle_video($video){
    if(!is_null($video)){
      //  $uploads_dir = '/Users/firstlincoln/Documents/iyanu/RealTvShow/img/uploads/';
        $uploads_dir = 'img/uploads/';
        $extensions = ['mp4', 'mkv', "avi"];

        $name = $video['name'];
        $size = $video['size']; 
        $ext = end(explode(".", $name));
        $location = $_SERVER['HTTP_REFERER'];

        //check size 
        if($size > 5000000){
            set_message("error", "file too large, must not exceed 5MB");
            header("Location: $location");
            exit(0);
        }

        //check extension
        if(!in_array($ext, $extensions)){
            set_message("error", "invalid type, only mp4, mkv or avi are allowed");
            header("Location: $location");
            exit(0);
        }
        $uploads_file = $uploads_dir . basename($name);

        if(move_uploaded_file($video['tmp_name'], $uploads_file)){
            set_message("success", "Uploaded");
            
        }else{
            set_message("error", "Not Uploaded");
            header("Location: $location");
            exit(0);
        }
        return $name;

    }
}



///// MEDIA FUNCTIONS END /////////////////


function save_movie($movie_title, $movie_plot, $synopsis, $genre, $movie_pic, $movie_pics = NULL, $reality, $acquisition, $unique_id = null){
    $link = connect();

    $created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "00000000";
    if(is_null($unique_id)) {
        $unique_id = "MOV" . strtotime('now');
    }

    if( mysqli_query($link, "INSERT INTO `realtv_movies`( `created_by`, `movie_pic`,`other_img`, `movie_title`, `logline`, `status`, `synopsis`, `genre`, `unique_id`) 
                            VALUES ('$created_by','$movie_pic','$movie_pics','$movie_title','$movie_plot','1', '$synopsis', '$genre', '$unique_id')")){
      
        return 1;
    }else{
        return 0;
    }


}

function save_drafts($writer_id = null, $movie_title, $logline, $synopsis, $genre, $movie_pics = NULL, $reality = null, $acquisition = null, $copyright = null){
    $link = connect();

    if ($writer_id == null) {
        $writer_id = $_SESSION['unique_id'];
    }

    //$other_images = handle_multi_images($movie_pics);
    $unique_id = "MOV".strtotime("now");


    if( mysqli_query($link, "INSERT INTO `realtv_drafts`(`created_by`,`movie_title`,`logline`, `genre`, `synopsis`, `other_pics`, `unique_id`, `reality`, `acquisition`, `copyright`) 
                            VALUES ('$writer_id','$movie_title','$logline','$genre','$synopsis', '$movie_pics', '$unique_id', '$reality', '$acquisition', '$copyright')")){
        
        return 1;
    }else{
        $error = mysqli_error($link);    
        set_message("error", "$error");
        header("Location: $location");
        exit(0);
    }


}

function user_id(){
    if(!isset($_SESSION['id'])){
        return false;
    }
    return $_SESSION['id'];
}

function unique_id(){
    if(!isset($_SESSION['unique_id'])){
        return false;
    }
    return $_SESSION['unique_id'];
}

function role(){

    if(!isset($_SESSION['role_id'])){
        return false;
    }
    
    return $_SESSION['role_id'];
}

function is_loggedIn(){
    if(!isset($_SESSION['id'])){
        return false;
    }

    return true;
}


function get_movie($link, $id){
    return mysqli_fetch_assoc(mysqli_query($link, "select * from realtv_movies where id = '$id'"));
}

function get_table2_data($role){
    if($role == 3){
        return "realtv_executives";
    }else if($role == 2){
        return "realtv_writers";
    }else if($role == 1){
       return "realtv_contestants";
    }
}


function update_contestant($link, $id, $firstname, $lastname, $email, $username, $phone_no, $address){
    $date = date("Y-m-d h:i:s");
    $q = "UPDATE `realtv_contestants` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`username`='$username',`phone_no`='$phone_no',`address`='$address',`date_updated`='$date' WHERE unique_id = '$id'";

    if(mysqli_query($link, $q)){
        return 1;
    }
}


function update_writer($link, $id, $firstname, $lastname, $email, $username, $phone_no, $address){
    $date = date("Y-m-d h:i:s");
    $q = "UPDATE `realtv_writers` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`username`='$username',`phone_no`='$phone_no',`address`='$address',`date_updated`='$date' WHERE id='$id'";

    if(mysqli_query($link, $q)){
        return 1;
    }
}


function update_executive($link, $id, $firstname, $lastname, $email, $username, $phone_no, $address){
    $date = date("Y-m-d h:i:s");
    $q = "UPDATE `realtv_executives` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`username`='$username',`phone_no`='$phone_no',`address`='$address',`date_updated`='$date' WHERE unique_id = '$id'";

    if(mysqli_query($link, $q)){
        return 1;
    }
}

function isactive($id){
    $link = connect();

    $check = mysqli_query($link, "select activated from realtv_users where unique_id = '$id'");

    return mysqli_fetch_assoc($check)['activated'];
}

$link = connect();

?>