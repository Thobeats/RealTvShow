<?php 
require_once "scripts/functions.php";
$link = connect();


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

    if($check_order == 1){
      register_new_user($firstname, $lastname, $email, $password, $role);
    }else {
      set_message('error', 'No Movie Order yet');
    }
  }else{

   register_new_user($firstname, $lastname, $email, $password, $role);

  }
}


require "scripts/header_two.php";

?>


    <?php get_message("error"); get_message('success') ?>
     <style>
       .order{
         display : none;
       }

       .show{
         display : block;
       }
     </style>

    <div class="container-fluid">

    <div class="row mt-5">
      <div class="col-12 text-center">
        <h3>Sign Up</h3>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12">
        <div class="d-flex justify-content-center">
          <form action="" class="p-3" style="width: 70%">
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

                        <option value="<?= $role['id'] ?>"><?= $role['role_name'] ?></option>

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
                  <input type="password" class="form-control password" name="password" required>
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
                <div class="d-flex justify-content-end">
                  <button class="btn btn-warning btn-lg" style="width: ">Sign Up</button>
                </div>
              </div>
            </div>
            
            



          </form>
        </div>
      </div>
    </div>







    </div>
         

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
      <script>
        let password = document.querySelector(".password");
        let cpassword = document.querySelector(".cpassword");

        password.addEventListener("blur", function(){
          cpassword.value = password.value;
        });


        let role = document.querySelector(".role");
        let order = document.querySelector(".order");

        role.addEventListener("change", function(){
            if(this.value == "1"){
              order.classList.add("show");
            }else{
              order.classList.remove("show");
            }
        });

        
      
      
      </script>

</body>
</html>