<?php

$pic = $_FILES['file'];
$uploads_dir = 'img/uploads/';
$extensions = ['jpg', 'png',"jpeg"];
$name = $pic['name'];
$size = $pic['size']; 
$tmp = explode(".", $name);
$ext = end($tmp);

if($size > 500000){
    echo "error1";
}elseif(!in_array($ext, $extensions)){
    echo "error2";
}else{
    echo $name;
}


?>