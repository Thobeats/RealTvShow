<?php
require "link.php";

$id = $_GET['id'];

$q = mysqli_query($link, "select other_pics from realtv_drafts where id = '$id'");

if($q){
    $name = $_GET['name'];
    $r = mysqli_fetch_assoc($q)['other_pics'];

    $name .= ",";

    $res = str_replace($name, "", $r);

    mysqli_query($link, "update realtv_drafts set other_pics = '$res' where id = '$id'");
}



?>