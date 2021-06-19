<?php 
function connect(){
    $link = mysqli_connect("localhost", "root", "", "rts_realtv");

    if($link){
        return $link;
    } else {
        return mysqli_connect_errno();
    }
}

function signUp($firstname, $lastname, $email, $role, $password){
    $link = connect();

    $password = hash("whirlpool", $password, true);

 //   mysqli_query($link, "insert")
}




?>