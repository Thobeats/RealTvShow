<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image.png" href="img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
   
    <title><?= $title ?? "Reality TV | RealTVRegistry.com"; ?></title>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<style>

.container-fluid{
    padding : 0 !important;
    margin : 0 !important;
  }
    #logo{
        height : 15vh;        
    }

    footer{
        height : 50vh;
        color : #cccccc;
    }

    footer a{
        text-decoration : none;
        color : inherit;
        transition : 0.5s linear;
    }

    footer a:hover{
        text-decoration : none;
        color : #000000;
    }

   .fa{
       margin-left : 20px;
       cursor: pointer;
   }

    .footer_grp{
        font-family: 'Poppins', sans-serif;
        list-style-type : none;
        font-weight : 300;
        margin-right : 30px;
        text-transform : capitalize;
        text-align : center;
    }

    .r_list{
        padding : 5px 0px;
    }

    .list-title{
        font-weight : 500;
        font-size: larger;
    }

    @media only screen and (max-width: 1024px) {
        #logo{
            height : 12vh;        
        }

        #footer-logo{
            width : 80%;
            height : 80%;
        }

        body{
            width: 100vw;
            overflow-x : hidden !important;          
        }

       
    }

    @media only screen and (max-width: 768px) {
        body{
            width: 100vw;
            overflow-x : hidden !important;          
        }

       
    }


    

    @media only screen and (max-width: 425px) {
        #logo{
            height : 15vh;        
        }

        #footer-logo{
            width : 80%;
            height : 80%;
        }

        body{
            width: 100vw;
            overflow-x : hidden !important;
        }
    }

</style>
    <div class="container-fluid">
        <header class="border-bottom">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="logo" class="d-flex justify-content-center">
                        <a href="index.php"><img src="../img/logo.png" alt="logo" width = "243px" height="90px"></a>
                    </div>
                </div>
            </div>

         <?php 
            if(isset($navBar)){
                require "scripts/navbar.php";
            }
         
         
         ?> 
        
        
        </header>
