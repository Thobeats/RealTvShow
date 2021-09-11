<?php 
 //$link = mysqli_connect("127.0.0.1", "root", "", "realtvshow");
 $link = mysqli_connect("localhost", "realtv_db_user", "@lphA3ch0#", "realtv_show");

$id = $_GET['id'];

$q = mysqli_query($link, "select other_pics from realtv_drafts where id = '$id'");

$r = mysqli_fetch_assoc($q);

if($r != ""){
    echo $r['other_pics'];
}



?>