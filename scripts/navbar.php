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

  .cart-no{
    font-size : 10px;
    display: inline-block;
    transform : translateY(-10px);
    padding : 1px 5px;
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
          <a class="nav-link" href="<?= $_SESSION['index'] ?? 'index.php' ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">Let's Connect</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faq.php">Faqs</a>
        </li>
      
      </ul>
    </div>
    

    <?php 
    
    if(is_loggedIn()){
      $userid = $_SESSION['unique_id'];     
      
    ?>
      <div class="col-lg-4 col-md-12">
        <ul class="navbar-nav signup-nav">
          <li class="nav-item active">
            <a class="nav-link"><i class="bi bi-person"></i> <?= $_SESSION['firstname'] ?></a>
          </li>

          <?php if(role() == 1): 
            $no = mysqli_fetch_assoc(mysqli_query($link, "select count(*) as cnt from realtv_cart where user_id='$userid'"))['cnt'];
            ?>
          <li class="nav-item">
            <a href="cart.php" class="nav-link"><i class="bi bi-cart2"></i> Cart<?php if ($no > 0):  ?><span class="bg-danger rounded-circle cart-no"><?= $no ?></span> <?php endif; ?> </a>
          </li>
          <?php endif; ?>

          <?php if(role() == 2): 
            $no = mysqli_fetch_assoc(mysqli_query($link, "select count(*) as cnt from realtv_drafts where created_by='$userid'"))['cnt'];

            ?>
          <li class="nav-item">
            <a href="drafts.php" class="nav-link"><i class="bi bi-pencil-square"></i> Draft<?php if ($no > 0):  ?><span class="bg-danger rounded-circle cart-no"><?= $no ?></span> <?php endif; ?> </a>
          </li>
          <?php endif; ?>

          <li class="nav-item">
            <a href="logout.php" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a>
          </li>             
        </ul>
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