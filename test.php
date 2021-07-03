<?php   
      require "scripts/functions.php"; 
     require "scripts/header.php"; 

     get_message("error");
     get_message("success");

     if(isset($_POST['submit'])){
         $test = $_FILES['pic'];
        $image = handle_image($test, 'pic');

        echo $image;

    
     }
   
?>

<form action="" method="post" enctype="multipart/form-data">

<input type="file" name="pic">
<input type="submit" name="submit" value="Submit">

</form>