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

// function base_url(){
//     return "http://" . $_SERVER['SERVER_NAME'] . "/realtv";
// }


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

function user_session($array){
    foreach($array as $key => $value){
        $_SESSION[$key] = $value;
    }
}

function register_new_user($firstname, $surname, $email, $password, $role_id){

    $password = md5($password);
    $encode_password = utf8_encode($password);
    $token = md5($email); $encode_token = utf8_encode($token);
    $fullname = strtoupper($firstname) . " " . $surname;

    // Database connection
    $link = connect();   


    $checkEmail = mysqli_query($link, "select * from realtv_users where email = '$email'");

    if($checkEmail->num_rows == 1){
        return false;
    }

    $query = mysqli_query($link, "INSERT INTO `realtv_users`(`firstname`,`lastname`,`fullname`,`username`,`status`, `role_id`,`email`,`password`,`activated`, `token`) VALUES ('$firstname','$surname','$fullname','$email','Active',
                                 '$role_id','$email','$encode_password','0', '$encode_token')");

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

    $link = connect();

    $loginQuery = mysqli_query($link, "select * from realtv_users where `email` = '$email' and `password` = '$password' and `activated` = '1'");
    $num_row = $loginQuery->num_rows;

    if($num_row == 1){
        $user_details = mysqli_fetch_assoc($loginQuery); $userid = $user_details['id'];
        user_session($user_details);
        $date = date("Y/m/d h:i:s");
        $updateUser = mysqli_query($link, "update realtv_users set last_logged_in = '$date', online = '1' where id = '$userid'");

        set_message("success", "Login Success"); 
        echo "Yes";
    }else {
        return false;
    }
}

function handle_image($image){

    if(!is_null($image)){
        $uploads_dir = '/Users/firstlincoln/Documents/iyanu/RealTvShow/img/uploads/';
        $extensions = ['jpg', 'png'];

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
            set_message("error", "invalid type, only jpg or png allowed");
            exit(0);
        }
        $uploads_file = $uploads_dir . basename($name);

        move_uploaded_file($image['tmp_name'], $uploads_file);
        return $name;

    }else{
        return "No Image uploaded";
    }

}

function handle_video($video){
    if(!is_null($image)){
        $uploads_dir = '/Users/firstlincoln/Documents/iyanu/RealTvShow/img/uploads/';
        $extensions = ['mp4', 'mkv', "avi"];

        $name = $image['name'];
        $size = $image['size']; 
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

        move_uploaded_file($image['tmp_name'], $uploads_file);
        return $name;

    }else{
        return "No Image uploaded";
    }
}





?>