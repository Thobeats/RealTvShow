<?php
require_once "scripts/functions.php";

if(isset($_POST['submit'])){
    $firstname = mysqli_real_escape_string($link,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($link,$_POST['lastname']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $username = mysqli_real_escape_string($link,$_POST['username']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $cpass = mysqli_real_escape_string($link,$_POST['c_pass']);
    $phone_no = mysqli_real_escape_string($link,$_POST['phone_no']);
    $address = mysqli_real_escape_string($link,$_POST['address']);
    $project1 = $_POST['project1'];
    $price = $_POST['price'];
    $role = "1";

    $profile_pic = $_FILES['profile_pic'];
    $resume = $_FILES['resume'];

    


    if($password != $cpass){
        set_message("error", "Passwords do not match");
        header("Location: contestant_signup.php");   
        
    }

    $checkEmail = mysqli_query($link, "select * from realtv_users where email = '$email'");
    if(mysqli_num_rows($checkEmail) == 1){
        set_message('error', 'Email taken, register with a unique email');
        header("Location: contestant_signup.php");     
    }

    $checkUsername = mysqli_query($link, "select * from realtv_users where username = '$username'");
    if(mysqli_num_rows($checkUsername) == 1){
        set_message('error', 'Username taken, select another username');
        header("Location: contestant_signup.php");     
    } 
    else{

       // echo "yes";
        register_new_user($firstname, $lastname, $email, $password, $role, $address, $username, $phone_no, $project1, $profile_pic, $resume);
    }

}
   ?>