<?php

$pic = $_FILES['file'];

$extensions = ['mp4', 'webm'];
$name = $pic['name'];
$size = $pic['size']; 
$tmp = explode(".", $name);
$ext = end($tmp);

if($size > 50000000){
    echo json_encode(['status' => '0', 'msg' => 'error1']);
}elseif(!in_array($ext, $extensions)){
    echo json_encode(['status' => '0', 'msg' => 'error2']);
}else{
    echo json_encode(['name' => $name, 'format' => $ext]);
}


?>