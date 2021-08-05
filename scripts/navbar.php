<style>
  nav{
    background-color : #1c87c9;
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

</style>


<nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
     
    </ul>

    <?php if(is_loggedIn()){ ?>
      <div class="btn-group">
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $_SESSION['firstname'] ?>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item text-dark" href="#">Profile</a>
          <a class="dropdown-item text-dark" href="logout.php">Logout</a>         
        </div>
      </div>

    <?php }else { ?>
    <a href="signup.php" class="btn btn-warning">Signup</a>
    <?php } ?>
   
  </div>
</nav>