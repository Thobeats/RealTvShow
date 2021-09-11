<?php

$name = $_GET['pic'];

$path = "img/uploads/$name";
if(unlink($path)){
    echo "File Deleted";
}else{
    echo "File doesn't exist";
}


?>