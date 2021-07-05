<?php   
      require "scripts/functions.php"; 
     require "scripts/header.php"; 

     get_message("error");
     get_message("success");

     if(isset($_POST['submit'])){
        
        $test = $_FILES['pic'];
        $title = $_POST['title'];
        $plot = $_POST['plot'];

        $save_stats = save_movie($title, $plot, $test);

        if($save_stats == 1){
            echo "Yes";
        }
        

    
     }
   
?>

<form action="" method="post" enctype="multipart/form-data">

<input type="file" name="pic">
<input type="text" name="title">
<input type="text" name="plot">
<input type="submit" name="submit" value="Submit">

</form>