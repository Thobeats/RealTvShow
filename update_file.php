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

if($type == "company_img"){
    if(mysqli_query($link, "update realtv_company set co_img = '$name' where id = '$id'")){
        echo "updated";
        //$tbl . " " . $id;
    }
}

if($type == "sizzle"){
    if(mysqli_query($link, "update realtv_writers set sizzle_reel = '$name' where unique_id = '$id'")){
        echo 1;
    }
}

if($type == "resume"){
    if(mysqli_query($link, "update realtv_contestants set resume = '$name' where unique_id = '$id'")){
        echo 1;
    }
}





?>