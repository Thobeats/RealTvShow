<?php
require_once "scripts/functions.php";


// Contestant Register
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
        
    }else{
        $checkEmail = mysqli_query($link, "select * from realtv_users where email = '$email'");
        if(mysqli_num_rows($checkEmail) == 1){
            set_message('error', 'Email taken, register with a unique email');
            header("Location: contestant_signup.php");     
        }else{
            $checkUsername = mysqli_query($link, "select * from realtv_users where username = '$username'");
            if(mysqli_num_rows($checkUsername) == 1){
                set_message('error', 'Username taken, select another username');
                header("Location: contestant_signup.php");     
            } 
            else{

            // echo "yes";
                register_contestant($firstname, $lastname, $email, $password, $role, $address, $username, $phone_no, $project1, $profile_pic, $resume);
            }
        }
    }

    

    

}


//Executive Register
if(isset($_POST['executive_submit'])){
    $firstname = mysqli_real_escape_string($link,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($link,$_POST['lastname']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $username = mysqli_real_escape_string($link,$_POST['username']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $cpass = mysqli_real_escape_string($link,$_POST['c_pass']);
    $phone_no = mysqli_real_escape_string($link,$_POST['phone']);
    $address = mysqli_real_escape_string($link,$_POST['address']);
    $genre = mysqli_real_escape_string($link,$_POST['genre']);
    $title = mysqli_real_escape_string($link,$_POST['title']);
    $company_name = mysqli_real_escape_string($link,$_POST['company_name']);
    $agree = mysqli_real_escape_string($link,$_POST['agree']);

    var_dump($_POST);



    $role = "3";

    


    if($password != $cpass){
        set_message("error", "Passwords do not match");
        header("Location: executive_signup.php");   
        
    }

    if(strtolower($agree) != "i agree"){
        set_message("error", "Enter I agree in the space provided");
        header("Location: executive_signup.php");   
        
    }

    $checkEmail = mysqli_query($link, "select * from realtv_users where email = '$email'");
    if(mysqli_num_rows($checkEmail) == 1){
        set_message('error', 'Email taken, register with a unique email');
        header("Location: executive_signup.php");     
    }

    $checkUsername = mysqli_query($link, "select * from realtv_users where username = '$username'");
    if(mysqli_num_rows($checkUsername) == 1){
        set_message('error', 'Username taken, select another username');
        header("Location: executive_signup.php");     
    } 
    else{

       // echo "yes";
        register_new_user($firstname, $lastname, $email, $password, $role, $address, $username, $phone_no, $project1, $profile_pic, $resume);
    }

}
   ?>