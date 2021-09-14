<?php   $logo= true; $navbar=true;
      require "scripts/functions.php"; 
      require "scripts/header_two.php"; 

     get_message("error");
     get_message("success");

     if(isset($_POST['submit'])){
        
      $others =  $_FILES;
     var_dump($others);
      
     //  $pics = handle_multi_images($others);
  
     //  echo $pics;
  
   
    }
   
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="others_pic[]" id="input-id" class="file" data-preview-file-type="text" multiple>
     <button type="submit" name="submit">upload</button>
</form>

<h1 style="margin-left: 100px;">ORDER CONFIRMED</h1>
<h3 style="margin-left: 100px;">Order Details</h3>





<?php
 require "scripts/footer_two.php";
?>