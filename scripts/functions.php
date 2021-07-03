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



function register_new_user($firstname, $surname, $email, $password, $role_id){

    $password = hash('whirlpool', $password, TRUE);
    $token = hash('sha1', $email, TRUE);
    $fullname = strtoupper($firstname) . " " . $surname;

    // Database connection
    $link = connect();   

    $query = mysqli_query($link, "INSERT INTO `tbl_users`(`fname`,`sname`,`fullname`,`uname`,`status`, `role_id`,`email`,`password`,`activated`, `token`) VALUES ('$firstname','$surname','$fullname','$email','Active',
                                 '$role_id','$email','$password','0', '$token')");

    if($query){
        set_message("success", "Registered Successfully");
    }else {
        set_message("error", "Not Registered");
    }

}

function login_user($email, $password){
    $password = hash('whirlpool', $password, TRUE);

    $link = connect();

    $find_user = mysqli_query($link, "select * from tbl_users where email ='$email' and password='$password'");

    $num_rows = $find_user->num_rows;

    if($num_rows != 1){
        return false;
    }else {
        $user_details = mysqli_fetch_assoc($find_user);
        session_start();
        $_SESSION = [
            "user_id" => $user_details['id'],
            'fullname' => $user_details['fullname'],
            "role" => $user_details['role']

        ];
    }
}


?>