<?php 
require_once "scripts/functions.php";
//$link = connect();


// handle register
if(isset($_POST['register'])){
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $email = $_POST['email'];
  $password = trim($_POST['password']);
  $role = $_POST['role'];
  $order_id = trim($_POST['order']);



  if($role == '1'){
    $check_order = check_order($order_id);

    if($check_order == 0){
      set_message("error", 'Order ID not found');
    }else {
      register_new_user($firstname, $lastname, $email, $password, $role, $check_order);     
    }
  }else{

   register_new_user($firstname, $lastname, $email, $password, $role);

  }
}


require "scripts/header_two.php";

?>

    <?php get_message("error"); get_message('success'); ?>
     <style>

       *{
         font-family: 'Poppins', serif;
       }
      
       .order{
         display : none;
       }

       .show{
         display : block;
       }

       form{
         width : 60%;
       }

        @media only screen and (max-width: 768px) {
          form{
              width : 70%;
            }

        }    

    @media only screen and (max-width: 425px) {
      form{
         width : 100%;
       }

      .btn{
        width : 100%;
      }

    }


     </style>

    <div>

    <div class="row mt-5 ">
      <div class="col-12 text-center">
        <h3>Sign Up</h3>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-12">
        <div class="d-flex justify-content-center">
          <form action="" class="p-3" method="POST">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="firstname">First Name</label>
                  <input type="text" class="form-control" name="firstname" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="lastname">Last Name</label>
                  <input type="text" class="form-control" name="lastname" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="role">Role</label>
                  <select name="role" id="" class="form-control role" required>
                    <option>Select Role</option>
                    <?php 
                      $roleq = mysqli_query($link, "select * from realtv_roles");  

                      while($role = mysqli_fetch_assoc($roleq)):
                    
                    ?>

                        <option value="<?= $role['id'] ?>"><?= ucfirst($role['role_name']) ?></option>

                    <?php endwhile; ?>                   
                  </select>
                </div>
              </div>
            </div>

            <div class="row order">
              <div class="col-12">
                <div class="form-group">
                  <label for="order">Enter Your Order ID</label>
                  <input type="text" class="form-control" name="order" required>
                </div>
              </div>           
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="cpassword">Confirm Password</label>
                  <input type="password" class="form-control cpassword" name="cpassword" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="d-flex justify-content-center form-check form-check-inline">
                    <input type="checkbox" class="form-check-input check" id="inlineCheckbox1" required> <label class="form-check-label" for="inlineCheckbox1">Agree to Terms and Conditions</label>
                </div>
              </div>
            </div>

            <div class="row my-4">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="d-flex justify-content-center ">
                  <button class="btn btn-lg btn-warning button" name="register" disabled="true">Sign Up</button>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="d-flex justify-content-center my-2">
                  <a href="index.php" class="btn btn-lg btn-danger">Cancel</a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="d-flex justify-content-center">
                    <p>Already have an account?  <a href="login.php" style="color: #004883; ">Login</a></p>
                </div>
              </div>
            </div>
            
            



          </form>
        </div>
      </div>
    </div>

    <hr>







    </div>
         

    
 
      <script>
        let password = document.querySelector(".password");
        let cpassword = document.querySelector(".cpassword");

        password.addEventListener("blur", function(){
          cpassword.value = password.value;
        });


        let role = document.querySelector(".role");
        let order = document.querySelector(".order");
        let button = document.querySelector(".button"); let checkbox = document.querySelector(".check");

        role.addEventListener("change", function(){
            if(this.value == "1"){
              order.classList.add("show");
            }else{
              order.classList.remove("show");
            }
        });


        checkbox.addEventListener('click', function(){
          if(this.checked == true){
            button.removeAttribute('disabled');

          }else{
            button.setAttribute('disabled', true);
          }
        });
        

        
      
      
      </script>

</body>
</html>