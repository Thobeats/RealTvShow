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
function set_message($type, $message, $title=null){

    $_SESSION[$type] = $message;
   
}

function get_message($type){

    if(isset($_SESSION[$type])){

        $message = $_SESSION[$type]; $title = NULL;
        $toastr = "toastr.$type('$message','$title', 
        {
            'closeButton': true, 
            'showMethod' : 'slideDown', 
            'hideMethod' : 'slideUp'
        })";  


        echo "<script>$toastr</script>";


      unset($_SESSION[$type]);
    }
}

function send_mail($toEmail, $subject, $body){
    $mail = new PHPMailer(true);
    try{
        //Settings
       // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "tobiy23@gmail.com";
        $mail->Password = "T3mil0luw4";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = "465";

        //Receiver
        $mail->setFrom('RealtvShow@test.com', 'Mailer');
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

// function send_mail($toEmail, $subject, $body){
//     $mail = new PHPMailer(true);
//     try{
//         //Settings
//         $mail->SMTPDebug = SMTP::DEBUG_SERVER;
       
//         $mail->isSMTP();
//         $mail->Host = 'p3plzcpnl459190.prod.phx3.secureserver.net';
//         $mail->SMTPAuth = false;
//         $mail->SMTPAutoTLS = false; 
//         $mail->Port = 25; 
//         // $mail->isSMTP();
//         // $mail->Host = 'smtp.gmail.com';
//         // $mail->SMTPAuth = true;
//         $mail->Username = "welcome@realitytv-registry.com";
//         $mail->Password = "R34l1tytvr3g1stry";
//         $mail->SMTPSecure = 'none';
//         $mail->ENCRYPTION = "none";
//         //$mail->Port = "465";

//         //Receiver
//         $mail->setFrom('welcome@realitytv-registry.com', 'Connect');
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

function user_session($array){
    foreach($array as $key => $value){
        $_SESSION[$key] = $value;
    }
}

// function register_new_user($firstname, $surname, $email, $password, $role_id, $address=null, $username=null, $phone_no, $project = null, $profile_pic, $resume = null, $title=null, $company_name=null){

//     $password = md5($password);
//     $encode_password = utf8_encode($password);
//     $token = md5($email); $encode_token = utf8_encode($token);
//     $fullname = strtoupper($firstname) . " " . $surname;
//     $email = strtolower($email);
//     $unique_id = $role_id.strtotime("now");

//     $pic = handle_image($profile_pic);

//     if($username == null){
//         $username = $email;
//     }

//     // Database connection
//     $link = connect();     

//     $query = mysqli_query($link, "INSERT INTO `realtv_users`(`firstname`,`lastname`,`fullname`,`username`,`status`, `role_id`,`email`,`password`,`activated`, `token`, `address`, `unique_id`) VALUES ('$firstname','$surname','$fullname','$username','Active',
//                                  '$role_id','$email','$encode_password','0', '$encode_token', '$address', '$unique_id')");

  
//     if($query){
//         if($role_id == 1){
//             $contestant_query = mysqli_query($link, "INSERT INTO `realtv_contestants`(`firstname`, `lastname`, `email`, `username`, `password`, `phone_no`, `address`, `profile_pic`, `resume`, `unique_id`) VALUES ('$firstname','$surname','$email','$username',
//                                             '$password','$phone_no','$address','$pic','$resume', '$unique_id')");
//             if(!is_null($project)){
//                 foreach($project as $pro){
//                     $cartquery = mysqli_query($link, "INSERT INTO `realtv_cart`(`user_id`, `project_id`) VALUES ('$unique_id','$pro')");
//                 }
//             }
//         }

//         if($role_id == "2"){
//             $writer_query = mysqli_query($link, "INSERT INTO `realtv_writers`(`firstname`, `lastname`, `email`, `username`, `password`, `phone_no`, `address`, `profile_pic`, `resume`, `unique_id`) VALUES ('$firstname','$surname','$email','$username',
//                                             '$password','$phone_no','$address','$project1','$resume', '$unique_id')");
//         }

//         if($role_id == "3"){
//             $executive_query = mysqli_query($link, "INSERT INTO `realtv_executives`(`firstname`, `lastname`, `email`, `username`, `password`, `phone_no`, `address`, `profile_pic`, `unique_id`, `title`, `company_name`) VALUES ('$firstname','$surname','$email','$username',
//                                             '$password','$phone_no','$address','$pic','$unique_id', '$title', '$company_name')");
//         }


//         $body = "<div style='padding: 5px; text-transform: capitalize;'>";
//         $body .= "<h4>Welcome to RealTv Show</h4>";
//         $body .= "<p>Confirm your email to activate your account. To confirm your email, click <a href='".base_url()."confirm.php?email=$email&pass=$token'>here</a> </p>";
//         $body .= "</div>";
//         send_mail($email, "Email Confirmation", $body);
//     }else {
//         set_message("error", "Not Registered");
//         echo mysqli_error($link);    

//     }

    

// }

function register_writer($firstname, $surname, $email, $password, $role_id, $address, $username, $phone_no, $project_title, $genre, $logline, $synopsis, $cover_img, $other_images){

    $password = md5($password);
    $encode_password = utf8_encode($password);
    $token = md5($email); $encode_token = utf8_encode($token);
    $fullname = strtoupper($firstname) . " " . $surname;
    $email = strtolower($email);
    $unique_id = $role_id.strtotime("now");

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
            $writer_query = mysqli_query($link, "INSERT INTO `realtv_writers`(`firstname`, `lastname`, `email`, `username`, `password`, `phone_no`, `address`, `unique_id`) 
                                                VALUES ('$firstname','$surname','$email','$username','$password','$phone_no','$address','$unique_id')");

           $res = save_drafts($unique_id, $project_title,$logline,$synopsis,$genre,$cover_img,$other_images);

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

    $pic = handle_image($profile_pic);
    $res = handle_file($resume);

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

    $pic = handle_image($profile_pic);

    if($username == null){
        $username = $email;
    }

    // Database connection
    $link = connect();     

    $query = mysqli_query($link, "INSERT INTO `realtv_users`(`firstname`,`lastname`,`fullname`,`username`,`status`, `role_id`,`email`,`password`,`activated`, `token`, `address`, `unique_id`) VALUES ('$firstname','$surname','$fullname','$username','Active',
                                 '$role_id','$email','$encode_password','0', '$encode_token', '$address', '$unique_id')");

  
    if($query){
        if($role_id == "3"){
            $executive_query = mysqli_query($link, "INSERT INTO `realtv_executives`(`firstname`, `lastname`, `email`, `username`, `password`, `phone_no`, `address`, `profile_pic`, `unique_id`, `title`, `company_name`) VALUES ('$firstname','$surname','$email','$username',
                                            '$password','$phone_no','$address','$pic','$unique_id', '$title', '$company_name')");
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

    $loginQuery = mysqli_query($link, "select * from realtv_users where `email` = '$email' and `password` = '$password' and `activated` = '1'");
    $num_row = $loginQuery->num_rows;

    if($num_row == 1){
        $user_details = mysqli_fetch_assoc($loginQuery); $userid = $user_details['id'];
        user_session($user_details);
        $date = date("Y/m/d h:i:s");
        $updateUser = mysqli_query($link, "update realtv_users set last_logged_in = '$date', online = '1' where id = '$userid'");
        header('Location: index.php');

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

function handle_image($image){
    if(!is_null($image)){
       // $uploads_dir = 'C:/Users/user/Documents/Fiverr Projects/RealTvShow/img/uploads/';
       // $uploads_dir = '/Users/firstlincoln/Documents/iyanu/RealTvShow/img/uploads/';
       $uploads_dir = 'img/uploads/';

        $extensions = ['jpg', 'png',"jpeg"];

        $name = $image['name'];
        $size = $image['size']; 
        $ext = explode(".", $name)[1];

        //echo $ext;

        //check size 
        if($size > 500000){
            set_message("error", "file too large, must not exceed 500KB");
            exit(0);
        }

        //check extension
        if(!in_array($ext, $extensions)){
            //set_message("error", "invalid type, only jpg or png allowed");
            return false;
        }
        $uploads_file = $uploads_dir . basename($name);

        if(move_uploaded_file($image['tmp_name'], $uploads_file)){
         set_message("success", "Uploaded");
            
        }else{
            set_message("error", "Not Uploaded");
        }
        return $name;
    }
  

}

function handle_file($image){
    if(!is_null($image)){
       // $uploads_dir = 'C:/Users/user/Documents/Fiverr Projects/RealTvShow/img/uploads/';
       // $uploads_dir = '/Users/firstlincoln/Documents/iyanu/RealTvShow/img/uploads/';
       $uploads_dir = 'img/uploads/';
        $extensions = ['pdf'];
        $name = $image['name'];
        $size = $image['size']; 
        $ext = explode(".", $name)[1];

        //echo $ext;

        //check size 
        if($size > 500000){
            set_message("error", "file too large, must not exceed 500KB");
            exit(0);
        }

        //check extension
        if(!in_array($ext, $extensions)){
            //set_message("error", "invalid type, only jpg or png allowed");
            return false;
        }
        $uploads_file = $uploads_dir . basename($name);

        if(move_uploaded_file($image['tmp_name'], $uploads_file)){
         set_message("success", "Uploaded");
            
        }else{
            set_message("error", "Not Uploaded");
        }
        return $name;
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


function handle_multi_images($images, $insertID){

    $link = connect();
    if(!is_null($images)){
       // $uploads_dir = 'C:/Users/user/Documents/Fiverr Projects/RealTvShow/img/uploads/';
       //$uploads_dir = '/Users/firstlincoln/Documents/iyanu/RealTvShow/img/uploads/';
       $uploads_dir = 'img/uploads/';

        $extensions = ['jpg', 'png',"jpeg"];     

        //check size 
        foreach($images['size'] as $size){
            if($size > 1000000){
                set_message("error", "file too large, must not exceed 1MB");
                exit(0);
            }

        }

        foreach($images['name'] as $key => $imagename){
            $ext = explode(".", $imagename)[1];

            //check extension
            if(!in_array($ext, $extensions)){
                //set_message("error", "invalid type, only jpg or png allowed");
                return false;
            }
            $uploads_file = $uploads_dir . basename($imagename);

           if(move_uploaded_file($images['tmp_name'][$key], $uploads_file))
            mysqli_query($link, "INSERT INTO `realtv_movie_pics`(`movie_pic`, `movie_id`) VALUES ('$imagename', '$insertID')");
        }
        

    }
}

function handle_image_drafts($images){

    $link = connect();
    $image_list = "";
    if(!is_null($images)){
       // $uploads_dir = 'C:/Users/user/Documents/Fiverr Projects/RealTvShow/img/uploads/';
       //$uploads_dir = '/Users/firstlincoln/Documents/iyanu/RealTvShow/img/uploads/';
       $uploads_dir = 'img/uploads/';

        $extensions = ['jpg', 'png',"jpeg"];     

       // var_dump($images);
        //check size 
        foreach($images['size'] as $size){
            if($size > 1000000){
                set_message("error", "file too large, must not exceed 1MB");
                exit(0);
            }

        }

        foreach($images['name'] as $key => $imagename){
            $ext = explode(".", $imagename)[1];

            //check extension
            if(!in_array($ext, $extensions)){
                //set_message("error", "invalid type, only jpg or png allowed");
                return false;
            }
            $uploads_file = $uploads_dir . basename($imagename);
            if($uploads_file){
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
        $ext = explode(".", $name)[1];

        //echo $ext;

        //check size 
        if($size > 5000000){
            set_message("error", "file too large, must not exceed 5MB");
            exit(0);
        }

        //check extension
        if(!in_array($ext, $extensions)){
            set_message("error", "invalid type, only mp4, mkv or avi are allowed");
            exit(0);
        }
        $uploads_file = $uploads_dir . basename($name);

        if(move_uploaded_file($video['tmp_name'], $uploads_file)){
            set_message("success", "Uploaded");
            
        }else{
            set_message("error", "Not Uploaded");
        }
        return $name;

    }else{
        return "No Image uploaded";
    }
}


function save_movie($movie_title, $movie_plot, $synopsis, $genre, $movie_pic, $movie_pics = NULL){
    $link = connect();

    $created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "00000000";

    $insert_pic = handle_image($movie_pic);

    if( mysqli_query($link, "INSERT INTO `realtv_movies`( `created_by`, `movie_pic`, `movie_title`, `movie_plot`, `status`, `synopsis`, `genre`) 
                            VALUES ('$created_by','$insert_pic','$movie_title','$movie_plot','1')")){
               

        //GET Insert ID
        $movie_insert_id = mysqli_insert_id($link);

        if(!is_null($movie_pics)){
        
             handle_multi_images($movie_pics, $movie_insert_id);          
          
        }

        return 1;
    }else{
        return 0;
    }


}

function save_drafts($writer_id = null, $movie_title, $logline, $synopsis, $genre, $movie_pic, $movie_pics = NULL){
    $link = connect();

    if ($writer_id == null) {
        $writer_id = $_SESSION['user_id'];
    }

    $insert_pic = handle_image($movie_pic);
    $other_images = handle_image_drafts($movie_pics);


    if( mysqli_query($link, "INSERT INTO `realtv_drafts`(`created_by`, `movie_pic`, `movie_title`,`logline`, `genre`, `synopsis`, other_pics) 
                            VALUES ('$writer_id','$insert_pic','$movie_title','$logline','$genre','$synopsis', '$other_images')")){
        
        return 1;
    }else{
        return mysqli_error($link);    
    }


}

function reg_and_save_movie($movie_title, $logline, $synopsis, $genre, $movie_pic, $movie_pics = NULL){
    $link = connect();

    $insert_pic = handle_image($movie_pic);

    $created_by = mysqli_insert_id($link);

    if(mysqli_query($link, "INSERT INTO `realtv_movies`( `created_by`, `movie_pic`, `movie_title`, `logline`, `status`, `synopsis`, `genre`) 
                            VALUES ('$created_by','$insert_pic','$movie_title','$logline','1','$synopsis','$genre')")){
               

        //GET Insert ID
        $movie_insert_id = mysqli_insert_id($link);

        if(!is_null($movie_pics)){
        
             handle_multi_images($movie_pics, $movie_insert_id);          
          
        }

        return 1;
    }else{
        return 0;
    }


}

function user_id(){
    if(!isset($_SESSION['id'])){
        return false;
    }
    return $_SESSION['id'];
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

$link = connect();

?>