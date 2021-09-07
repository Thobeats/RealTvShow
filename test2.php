<?php   
      require "scripts/functions.php"; 

     get_message("error");
     get_message("success");

     if(isset($_POST['submit'])){
        
       $others =  $_FILES['others_pic'];
      var_dump($others);
       
       $pics = handle_multi_images($others);

       echo $pics;

    
     }
   
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="others_pic[]" id="" multiple>
     <button type="submit" name="submit">upload</button>
</form>