<?php
require_once "scripts/functions.php";


//Executive Register
if(isset($_POST['executive_submit'])){
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $cpass = trim($_POST['c_pass']);
    $phone_no = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $genre = trim($_POST['genre']);
    $title = trim($_POST['title']);
    $company_name = trim($_POST['company_name']);
    $agree = trim($_POST['agree']);
    $role = "3";
    $profile_pic = $_FILES['profile'];

    if($password != $cpass){
        set_message("error", "Passwords do not match");
        header("Location: executive_signup.php");           
    }else{
        if(strtolower($agree) != "i agree"){
            set_message("error", "Enter I agree in the space provided");
            header("Location: executive_signup.php");   
            
        }else{
            $checkEmail = mysqli_query($link, "select * from realtv_users where email = '$email'");
            if(mysqli_num_rows($checkEmail) == 1){
                set_message('error', 'Email taken, register with a unique email');
                header("Location: executive_signup.php");     
            }else{

                $checkUsername = mysqli_query($link, "select * from realtv_users where username = '$username'");
                if(mysqli_num_rows($checkUsername) == 1){
                    set_message('error', 'Username taken, select another username');
                    header("Location: executive_signup.php");     
                } 
                else{
                    //var_dump($_POST);
                   register_executive($firstname, $lastname, $email, $password, $role, $address, $username, $phone_no, $profile_pic, $title, $company_name);
                }
            }
        }
    }

    

   

    

}
   ?>