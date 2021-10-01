<?php
require "link.php";

$id = $_GET['id'];
$type = $_GET['type'];
$name = $_GET['name'];


if(isset($_GET['tbl'])){
    $tbl = $_GET['tbl'];
}


if($type == "cover_img"){
    if(mysqli_query($link, "update realtv_users set cover_img = '$name' where id = '$id'")){
        echo "updated";
    }
}

if($type == "pro_img"){
    if(mysqli_query($link, "update $tbl set profile_pic = '$name' where unique_id = '$id'")){
        echo "updated";
        //$tbl . " " . $id;
    }
}





?>