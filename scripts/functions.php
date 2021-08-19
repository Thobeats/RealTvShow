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

function register_new_user($firstname, $surname, $email, $password, $role_id, $address=null, $username=null, $phone_no){

    $password = md5($password);
    $encode_password = utf8_encode($password);
    $token = md5($email); $encode_token = utf8_encode($token);
    $fullname = strtoupper($firstname) . " " . $surname;
    $email = strtolower($email);

    if($username == null){
        $username = $email;
    }

    // Database connection
    $link = connect(); 
    $checkEmail = mysqli_query($link, "select * from realtv_users where email = '$email'");

    if(mysqli_num_rows($checkEmail) == 1){
        set_message('error', 'Email exists, register with a unique email');
        return false;
    }

    $query = mysqli_query($link, "INSERT INTO `realtv_users`(`firstname`,`lastname`,`fullname`,`username`,`status`, `role_id`,`email`,`password`,`activated`, `token`,`reg_ref`, `address`) VALUES ('$firstname','$surname','$fullname','$username','Active',
                                 '$role_id','$email','$encode_password','0', '$encode_token', '$reg', '$address')");

    if($role_id == "1"){
        $query2 = mysqli_query($link, "INSERT INTO `realtv_contestants`(`firstname`, `lastname`, `email`, `username`, `password`, `phone_no`, `address`, `profile_pic`, `resume`) VALUES ('$firstname','$surname','$email','$username',
                                        '$password','$phone_no','$address','$project1','$resume')");
    }
    if($query){
        $body = "<div style='padding: 5px; text-transform: capitalize;'>";
        $body .= "<h4>Welcome to RealTv Show</h4>";
        $body .= "<p>Confirm your email to activate your account. To confirm your email, click <a href='".base_url()."/confirm.php?email=$email&pass=$token'>here</a> </p>";
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

    }else{
        exit("No Image uploaded");
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


// function payment_cUrl($post_data){

//     $url = "https://api-m.sandbox.paypal.com/v1/oauth2/token";
//     $headers = [
//         "Accept: application/json",
//         "Accept-Language: en_US",
//         "AalMKUeQF_tc82T1vnq4_QVA0_ICAnIfJO_sFC8um-76N-VobMJr8qrUhBaAILWTeDODUNXvk0Iwl_FQ: EMrf3fQCsprQXDD815OggwKuZwCf6Zny18GGe3ddK4F4MzORDYcDqqjAk4HjPFNiEWnUC5sQipTF9Su7",
//         "grant_type=client_credentials"
//     ];

//     $curl = curl_init();

//     curl_setopt($curl, CURLOPT_URL, $url);
//     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    

// }

function get_movie($link, $id){
    return mysqli_fetch_assoc(mysqli_query($link, "select * from realtv_movies where id = '$id'"));
}

$link = connect();

?>