

<footer class="border-top p-4">

<div class="row">
    <div class="col-lg-5 col-md-12 col-sm-12">
        <div class="d-flex justify-content-center">
            <img src="img/logo.png" alt="logo" id="footer-logo" width = "400px" height="150px">
        </div>   
    </div>

 
    <div class="col-lg-7 col-md-12 col-sm-12">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <ul class="footer_grp p-4 ">
                        <li class="r_list list-title">Pages</li>
                        <li class="r_list"><a href="index.php">Home</a></li>
                        <li class="r_list"><a href="aboutus.php">About Us</a></li>
                        <li class="r_list"><a href="contactus.php">Contact Us</a></li>   
                    </ul>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <ul class="footer_grp p-4">
                        <li class="r_list list-title">Community</li>
                        <li class="r_list"><a href="future.php">Future</a></li>
                        <li class="r_list"><a href="promotingyou.php">Promoting You</a></li>
                        <li class="r_list"><a href="benefits.php">Benefits</a></li>
                        <li class="r_list"><a href="communications.php">Communications</a></li>
                        <li class="r_list"><a href="nda.php">NDA Agreement</a></li>   
                    </ul>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <ul class="footer_grp p-4">
                        <li class="r_list list-title">About</li>
                        <li class="r_list"><a href="reality.php">Reality Tv</a></li>
                        <li class="r_list"><a href="faq.php">Faq</a></li>
                        <li class="r_list"><a href="login.php">Login/Signup</a></li>   
                        <li class="r_list"><a href="privacy.php">Privacy Policy</a></li>
                        <li class="r_list"><a href="terms.php">Terms of service</a></li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
 
</div>
<div class="row my-4">
    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-left text-body">
        <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>
        <i class="fa fa-linkedin-square fa-lg" aria-hidden="true"></i>
        <i class="fa fa-pinterest fa-lg" aria-hidden="true"></i>
        <i class="fa fa-instagram fa-lg" aria-hidden="true"></i>
        <i class="fa fa-twitter fa-lg" aria-hidden="true"></i>
    </div>
</div>

<div class="row my-4 pb-3">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            ©RealityTV International Limited  <span id="date"></span>.
    </div>
</div>



</footer>


 </div>

 <?php if(isset($paypal)): ?>
 <script src="https://www.paypal.com/sdk/js?client-id=AfgYATIfVWBGwQVce9ggpT8F3cpdMckdMmaf525u6IvyLjD1oL8RTiTqHVZrUWMvn7Un6r2q_qDehBJY&currency=USD"></script>
 <script>paypal.Buttons({
     style : {
         color : "blue",
         shape : "pill"
     },
     createOrder: function(data, actions){
         return actions.order.create({
             purchase_units : [{
                 amount : { value: "<?= $movie['reg_fee'] ?>"}
             }]
         })
     },
     onApprove: function(data, actions){
         return actions.order.capture().then(function (){
           
           window.location = "payments/GetOrder.php?orderID=" + data.orderID;
         });
     },
     onCancel: function(){
        window.location = "payment-cancel.php";
     }

 }).render("#paynow");
 
 </script>

 <?php endif; ?>
 
 <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

 <script>
   let date = document.getElementById("date");
   let d = new Date();
   date.innerHTML = d.getFullYear();
   
   CKEDITOR.replaceAll('text-editor');

</script>

<script>
    let nextBtn = document.querySelector(".next");
    let writerForm = document.querySelector(".writer-form");
    let movieForm = document.querySelector(".movie-form");
    let prevBtn = document.querySelector(".prev");

    nextBtn.addEventListener("click", function(){

        if($(writerForm).hasClass("slideIn")){
            writerForm.classList.remove("slideIn");
        }

        writerForm.classList.add("slideOut");
        $(writerForm).hide(600);

        if($(movieForm).hasClass("slideOut")){
            movieForm.classList.remove("slideOut");
        }

        movieForm.classList.add("slideIn");
        $(movieForm).show(600);
    });

    prevBtn.addEventListener("click", function(){
        movieForm.classList.remove("slideIn");
        movieForm.classList.add("slideOut");
        $(movieForm).hide(600);

        writerForm.classList.remove("slideOut");
        writerForm.classList.add("slideIn");
        $(writerForm).show(600);
      
    });
</script>

</body>
</html>