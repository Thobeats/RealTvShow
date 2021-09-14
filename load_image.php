<?php 
require "link.php";

$id = $_GET['id'];
$q = mysqli_query($link, "select other_pics from realtv_drafts where id = '$id'");
$r = mysqli_fetch_assoc($q);

if($r != ""){
    echo $r['other_pics'];
}



?>