<?php

$name = $_GET['pic'];

$path = "/Applications/XAMPP/xamppfiles/htdocs/RealTvShow/img/uploads/$name";
if(unlink($path)){
    echo "File Deleted";
}else{
    echo "File doesn't exist";
}


?>