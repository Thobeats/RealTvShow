<?php 
 $link = mysqli_connect("127.0.0.1", "root", "", "realtvshow");

$id = $_GET['id'];

$q = mysqli_query($link, "select other_pics from realtv_drafts where id = '$id'");

$r = mysqli_fetch_assoc($q);

if($r != ""){
    echo $r['other_pics'];
}



?>