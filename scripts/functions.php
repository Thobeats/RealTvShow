<?php

function connect(){
    $link = mysqli_connect("localhost", "root", "", "realtvshow");

    if($link){
        return $link;
    }else {
        return mysqli_connect_errno();
    }
}


function set_message($type, $message, $title=null){
    $toastr = "toastr.$type('$message','$title', 
              {
                  'closeButton': true, 
                  'showMethod' : 'slideDown', 
                  'hideMethod' : 'slideUp'
              })";  


    echo "<script>$toastr</script>";
}



function register_new_user($email, $password, $role_id){

    $password = hash('whirlpool', $password, TRUE);
    $token = hash('sha1', $email, TRUE);


    // Database connection
    $link = connect();   

    $query = mysqli_query($link, "INSERT INTO `tbl_users`(`uname`,`status`, `role_id`,`email`,`password`,`activated`, `token`) VALUES ('$email','Active',
                                 '2','$email','$password','0', '$token')");

    if($query){
        set_message("success", "Registered Successfully");
    }else {
        set_message("error", "Not Registered");
    }

}


?>