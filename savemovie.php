<?php 
require "link.php";

$id = $_GET['id'];
$user_id = $_GET['user_id'];
$q = mysqli_query($link, "INSERT INTO `realtv_executive_project`(`movie_id`, `user_id`) VALUES ('$id','$user_id')");

if($q){
    echo 1;
}else{
    echo 0;
}




?>