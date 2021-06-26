<?php 
function connect(){
    $link = mysqli_connect("localhost", "u227522741_kayodeO", "", "u227522741_familyaffairs");

    if($link){
        return $link;
    } else {
        return mysqli_connect_errno();
    }
}

function signUp($firstname, $lastname, $email, $role, $password){
    $link = connect();

    $password = hash("whirlpool", $password, true);

}




?>