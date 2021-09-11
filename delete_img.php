<?php
//$link = mysqli_connect("127.0.0.1", "root", "", "realtvshow");
$link = mysqli_connect("localhost", "realtv_db_user", "@lphA3ch0#", "realtv_show");

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