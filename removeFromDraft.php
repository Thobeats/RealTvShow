<?php

require "link.php";

$id = $_GET['id'];

$query = mysqli_query($link, "DELETE FROM `realtv_drafts` WHERE id = '$id'");

if($query){
    echo '1';
}

?>