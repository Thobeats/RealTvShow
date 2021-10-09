<?php

$pic = $_FILES['file'];
$uploads_dir = 'img/uploads/';
$extensions = ['jpg', 'png',"jpeg"];
$name = $pic['name'];
$size = $pic['size']; 
$tmp = explode(".", $name);
$ext = end($tmp);


$path = "img/uploads/" . $name;

if(!file_exists($path)){

    if($size > 5000000){
        echo "error1";
    }elseif(!in_array($ext, $extensions)){
        echo "error2";
    }else{
        echo $name;
    }

}else{
    echo "no";
}


?>