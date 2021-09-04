<style>
  nav{
    background-color : black;
  }

  nav a {
    color : white !important;
    font-family: 'Poppins', sans-serif;
    transition : 0.2s linear;
    font-weight : 300;
  }

  nav a:hover{
    background-color : #ffc107;
  }

  .user-btn{
    border : none;
    padding : 10px;
    font-size : 15px;
    font-family: 'Poppins', sans-serif;
    border-radius: 5px;
  }
  

</style>


<nav class="navbar navbar-expand-lg navbar-dark">
  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse row" id="navbarSupportedContent">
    <div class="col-4"></div>
    <div class="col-lg-4 col-md-12">
        <ul class="navbar-nav page-nav">   
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">Let's Connect</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faq.php">Faq's</a>
        </li>
      
      </ul>
    </div>
    

    <?php if(is_loggedIn()){ ?>
    <div class="col-lg-4 col-md-12 signup-nav">
      <div class="btn-group">
        <button type="button" class="user-btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $_SESSION['firstname'] ?>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item text-dark" href="#">Profile</a>
          <a class="dropdown-item text-dark" href="cart.php">Cart</a>
          <a class="dropdown-item text-dark" href="logout.php">Logout</a>         
        </div>
      </div>
    </div>

    <?php }else { ?>
      <div class="col-lg-4 col-md-12">
        <ul class="navbar-nav signup-nav">
          <li class="nav-item active">
            <a href="login.php" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
          <a href="signup.php" class="nav-link">Signup</a>
          </li>             
        </ul>
      </div>
      
    <?php } ?>
   
  </div>
</nav>