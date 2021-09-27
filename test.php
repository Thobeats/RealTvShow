<?php   
      require "scripts/functions.php"; 

     get_message("error");
     get_message("success");

     if(isset($_POST['submit'])){
        
       $synopsis =  $_POST['synopsis'];
       $logline = $_POST['logline'];
       $title = $_POST['title'];

       echo preg_replace("/<p>/", "<p><b>Logline:</b>",$logline, 1);


      // mysqli_query($link, "update realtv_movies set synopsis = '$synopsis' where id = '2'");
        
    
     }
    //  $ip = $_SERVER['REMOTE_ADDR'];
    //  $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    //  echo $details->city;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

</head>
<body>
   <div class="container">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Cover Pic:</label>
                <input type="file" class="form-control" name="pic">
            </div>

            <div class="form-group">
                <label for="">Supporting Pictures</label>
                <input type="file" class="form-control" name="pics[]" multiple>
            </div>

            <div class="form-group">
                <label for="">Project Title</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label for="">Copyright</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label for="">Reality</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="">Option/Acquisition</label>
                <input type="text" class="form-control" name="title">
            </div>
      
            <div class="form-group">
                <label for="">Logline</label>
                <textarea class="form-control logline" cols="30" rows="10"  name="logline"></textarea>
            </div>

            <div class="form-group">
                <label for="">Synopsis</label>
                <textarea name="synopsis" class="form-control synopsis" cols="30" rows="10" id="" ></textarea>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Submit">
            </div>      
        
        
           

        </form>
   
   </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
    CKEDITOR.replace( 'logline' );

    CKEDITOR.replace('synopsis');
</script>
</body>
</html>
