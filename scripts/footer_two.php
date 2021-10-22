
<footer class="border-top p-4 text-dark">

<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 ">
        <div class="d-flex flex-column justify-content-center text-center">
            <img src="img/logo.png" class="mx-auto" alt="logo" id="footer-logo" width = "100%">
            <p class="mt-2 text-center h3" style="color:#004883;">on location to a cache of unique formats & talent</p>
        </div>   
    </div>

 
    <div class="col-lg-6 col-md-12 col-sm-12 pt-5">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <ul class="footer_grp p-4 ">
                        <li class="r_list list-title">Pages</li>
                        <li class="r_list"><a href="<?= $_SESSION['index'] ?? 'index.php' ?>">Home</a></li>
                        <li class="r_list"><a href="aboutus.php">About Us</a></li>
                        <li class="r_list"><a href="contactus.php">Contact Us</a></li>   
                    </ul>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <ul class="footer_grp p-4">
                        <li class="r_list list-title">Community</li>
                        <li class="r_list"><a href="future.php">Future</a></li>
                        <li class="r_list"><a href="promoteyou.php">Promoting You</a></li>
                        <li class="r_list"><a href="benefits.php">Benefits</a></li>                       
                    </ul>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <ul class="footer_grp p-4">
                        <li class="r_list list-title">About</li>
                        <li class="r_list"><a href="reality.php">Reality Tv</a></li>
                        <li class="r_list"><a href="faq.php">Faq</a></li>
                        <?php if(is_loggedIn()) { ?>
                            <li class="r_list"><a href="logout.php">Logout</a></li>  
                        <?php }else{?>
                        <li class="r_list"><a href="login.php">Login/Signup</a></li>  
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
 
</div>
<div class="row my-4">
    <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center text-body">
        <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>
        <i class="fa fa-linkedin-square fa-lg" aria-hidden="true"></i>
        <i class="fa fa-pinterest fa-lg" aria-hidden="true"></i>
        <i class="fa fa-instagram fa-lg" aria-hidden="true"></i>
        <i class="fa fa-twitter fa-lg" aria-hidden="true"></i>
    </div>
</div>

<div class="row my-4 pb-3">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            Reality TV Registry <span id="date"></span>.
    </div>
</div>



</footer>


 </div>
 <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>


 <?php if(isset($paypal)): ?>
 <script src="https://www.paypal.com/sdk/js?client-id=AfgYATIfVWBGwQVce9ggpT8F3cpdMckdMmaf525u6IvyLjD1oL8RTiTqHVZrUWMvn7Un6r2q_qDehBJY&currency=USD"></script>
 <script>
paypal.Buttons({
     style : {
         color : "blue",
         shape : "pill"
     },
     createOrder: function(data, actions){
         return actions.order.create({
             purchase_units : [{
                 amount : { value: "<?= $price ?>"}
             }]
         })
     },
     onApprove: function(data, actions){
         return actions.order.capture().then(function (){
          window.location = "payments/GetOrder.php?orderID=" + data.orderID + "&userid=" + '<?= $uni ?>' + "&mov_id=" + '<?= $mov_id ?> '+ "&pac=" + '<?= $pac ?>'+ "&user_type=" + '<?= $user_type ?>' + "&savedID=" + '<?= $svdID ?>';
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
   
//  let editor = CKEDITOR.replaceAll('text-editor');

var logline = new Quill('#logline-editor', {
  modules: {
    toolbar: [
         [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
         ['bold', 'italic', 'underline', 'strike'],
         [{ 'color': [] }, { 'background': [] }], 
         [{ 'align': [] }],
         ['link', 'image'],
         
         ['clean']  
       ],
        imageResize: {
          displaySize: true
        }
  },
  placeholder: 'Paste your material here....',
  theme: 'snow'
});

var synopsis = new Quill('#synopsis-editor', {
  modules: {
    toolbar: [
         [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
         ['bold', 'italic', 'underline', 'strike'],
         [{ 'color': [] }, { 'background': [] }], 
         [{ 'align': [] }],
         ['link', 'image'],
         
         ['clean']  
       ],
        imageResize: {
          displaySize: true
        },history: {
        delay: 0,
        maxStack: 500,
        userOnly: true
        }
  },
  placeholder: 'Paste Your material here...',
  theme: 'snow'
});

$(".reg-submit").on("click", function(){
    let html1  = logline.root.innerHTML;
    let html2 = synopsis.root.innerHTML;

    console.log(html1, html2);

    $("#inputSynopsis").val(html2);
    $("#inputLogline").val(html1);
})

$("#save").on("click", function(){
    let html1  = logline.root.innerHTML;
    let html2 = synopsis.root.innerHTML;

    console.log(html1, html2);

    $("#inputSynopsis").val(html2);
    $("#inputLogline").val(html1);
})


</script>

<script>
    function removeMOvie(event){
        let id = event.target.dataset.id;
        
    }
</script>

<script>

let formControl = document.querySelectorAll(".form-control");

formControl.forEach((formC)=>{
    formC.addEventListener("focus", function(){
        this.classList.add("focus");
    })
});

<?php if(isset($writerReg)): ?>
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

<?php endif; ?>
</script>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}


//$(".form")[0].reset();

</script>




</body>
</html>

