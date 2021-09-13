<?php

require "link.php";

$id = $_GET['id'];
$user = $_GET['user_unique'];


$query = mysqli_query($link, "insert into `realtv_cart`(`user_id`, `project_id`) values('$user', (Select id from realtv_movies where id = '$id'))");

if($query){
    $no = mysqli_fetch_assoc(mysqli_query($link, "select count(*) as cnt from realtv_cart where user_id='$user'"))['cnt'];    echo $no;
}


?>