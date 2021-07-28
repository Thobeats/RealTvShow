<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="css/icon-font.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="sass/main.scss">
        <link rel="shortcut icon" type="image.png" href="img/logo.png">
        <script type="text/javascript" src="js/reality.js"></script>

   <?php if(is_loggedIn() && role() == '3'){
    require "scripts/header.php";
?>

    </head>
    <body>
        <main>
            <header>
                <div class="project__logo">
                    <img src="img/logo.png" alt="Reality Tv Logo" class="project__logo-box">
                </div>

                <nav class="clearfix navbox">
                                    <div class="navbar">
                                        <div class="dropdown">
                                            <button class="dropbtn"><a href="index.php">Home</a>
                                            <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                        
                                        <div class="dropdown">
                                            <button class="dropbtn"><a href="aboutus.php">About Us</a>
                                            <i class="fa fa-caret-down"></i>
                                            </button>
                                            <!-- <div class="dropdown-content">
                                                <a href="">Blog</a>
                                                <a href="">FAQ's</a>
                                                <a href="">Promoting You</a>
                                                <a href="">Talent Areas</a>
                                                <a href="">Writer Benefits and Talent Benefits</a>
                                            </div> -->
                                        </div>
                                        <div class="dropdown">
                                            <button class="dropbtn"><a href="contactus.php">Contact Us</a>
                                            <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="buttons">
                                            <a href="signup.php" class="btn btn--white">SignUp</a>
                                        </div>
                                    </div>
                                </nav> 


                            <div class="project">
                                <div class="project__text-box">
                                    <h1 class="heading-primary">
                                        <span class="heading-primary--main">Reality Tv</span>
                                        <span class="heading-primary--sub">cache of unique formats & talent</span>
                                    </h1>        
                                </div>
                            </div>                            
            </header>

                <section class="section-realities">
                    <div class="u-center-text u-margin-bottom-large">
                            <h2 class="heading-tertiary">
                                Synopsis of 12 Realities
                            </h2>
                    </div>

                    <div class="row">
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--1">
                                        <img src="img/snipers.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--1">Battle Grounds - Snipers at Large</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-1">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--2">
                                        <img src="img/scene1.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--2">Ovations - Sound of Music</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-2">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--3">
                                        <img src="img/lifeboat.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--3">Life Boat - Unhinged</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-3">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--4">
                                        <img src="img/war.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--4">Battles of Foreign Lands</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-4">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--5">
                                        <img src="img/love.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--5">Modelled to Market</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-5">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--6">
                                        <img src="img/shark2.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--6">Sharks on Wallstreet</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-6">
                                    <div class="card__cta"> 
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--1">
                                        <img src="img/Conquest2.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--1">Gold Fever - Quest for the Mother Lode</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-1">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--2">
                                        <img src="img/actress3.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--2">Encore - Matters of ACTORS</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-2">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--3">
                                        <img src="img/Imagine.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--3">Imagine That</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-3">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--4">
                                        <img src="img/wonder.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--4">Manipulated</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-4">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--5">
                                        <img src="img/golf2.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--5">Golf Squadron</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-5">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--6">
                                        <img src="img/Pet1.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--6">Pet Celebrity</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-6">
                                    <div class="card__cta"> 
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--1">
                                        <img src="img/yacht3.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--1">Singles Yatching Society</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-1">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--2">
                                        <img src="img/Inventor.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--2">State Street Inventor</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-2">
                                    <div class="card__cta">
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-1-of-3">
                            <div class="card">
                                <div class="card__side card__side--front">
                                    <div class="card__picture card__picture--3">
                                        <img src="img/swim.jpg" alt="card-pic" class="card__img">
                                    </div>
                                    <h4 class="card__heading">
                                        <span class="card__heading-span card__heading-span--3">Living Aboard</span>    
                                    </h4>
                                </div>
                                <div class="card__side card__side--back card__side--back-3">
                                    <div class="card__cta"> 
                                        <a href="Eviewpage.php" class="bttn bttn--white">Check It Out Now</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="section-projects">
                    <p class="Projects__paragraph">With great enthusiasm, RealityTVRegistry recommends these 15 projects. All have copyright 
                        protection and are available for option and acquisition. Additional proposals are being 
                        developed and may be viewable in mid-August.</p>
                </section>
        </main>

       

<?php 

        require "scripts/footer.php";

    }else{
        header("Location: login.php");
    }



?>
