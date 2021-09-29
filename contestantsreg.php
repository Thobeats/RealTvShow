<?php 
$navBar = true; $logo =true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);

if(!is_loggedIn()){
    //$_SESSION['error'] = "Not Authorized";
    header("Location: login.php");    

}elseif(role() != 1){
    set_message('error', "Not Authorized");
    $location = $_SESSION['index'];
    header("Location: $location");    
}else{

?>

<?php get_message("error"); get_message('success') ?>


<section class="landing-page-movie">
    <div class="landing-synopsis text-center ">
        <h2 class="landing-header">reality tv proposals</h2>
    </div>

    <div class="row py-5">
        <?php 
            $movie_query = mysqli_query($link, "Select * from realtv_movies");

            while($movie = mysqli_fetch_object($movie_query)):

                $moviePic = $movie->movie_pic;
                $user_id = unique_id(); $mvid = $movie->id;

                $checkInCart = mysqli_query($link, "select * from realtv_cart where project_id = '$mvid' and user_id = '$user_id'");
               
        ?>
        <div class="col-lg-4 col-md-4 mt-5 col-sm-6">
            <div class="card movie-card border-0 mx-auto" style="cursor: pointer; background-color: inherit">
                <div class="card-body p-0" style="height: 100%;">
                      <img src="img/uploads/<?= $moviePic ?>" class="movie-card-body"  alt="">
                </div>
                <div class=" movieTitle my-0 p-2">
                    <p class="pb-2"><?= $movie->movie_title ?></p>                   
                </div>
                <div class="action-btns row w-100 mx-auto">               
                    <div class="col-6 text-left p-0 pr-1">
                        <?php  if($checkInCart->num_rows > 0){ ?>
                            <span class="crt-<?=$mvid?> addcart badge-success"> <i class="bi bi-check"></i>Added to Cart</span>
                        <?php }else{ ?>
                            <span class="crt-<?=$mvid?> addcart text-light" onclick="addToCart(event)" data-id="<?= $movie->id ?>" style="background-color : #004177;"><i class="bi bi-cart2"></i> Add to Cart</span>
                        <?php } ?> 
                    </div>
                    <div class="col-6 text-right p-0 pl-1">
                        <a href="c_movie_view.php?id=<?= $movie->id ?>" class="bg-warning cont_check text-dark">Check it out</a>
                    </div>                  

                </div>
                <!-- <div class="action-btns">                
                    <a href="c_movie_view.php?id=<?= $movie->id ?>" class="bg-warning check text-dark">Check it out</a>
                </div> -->
                    
            </div>     
        </div>
        <?php endwhile; ?>
    </div>
    
 
</section>

<section class="py-4 mt-4 note">
    <div class="col-12">
        <p class="text-center p-4 cnote">
            With great enthusiasm, Reality TV
            Registry enters the initial stages in creating sizzle reels and qualifying contestants and
            professional talent in these original and exciting programs.        
        </p>
    </div>
</section>


<section class="row mb-4">
    <div class="col-12 mt-4">
        <div class="member-benefits">
            <h3 class="text-center my-4 m-title">MEMBER BENEFITS</h3>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes zilla text-center">
                                
                                    Big 93% advantage to be casted when promoted by a business 
                                    
                                </div>
                                    <img class="" src="img/write01.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                                
                                    Priority status to participate in the production of your choice
                                                                    
                                </div>
                                    <img class="" src="img/shoot2.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                            
                                    Your private account access, to view and edit your credentials 
                                                                        
                                </div>
                                    <img class="" src="img/mixgh.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                                
                                    Promote your individual talents to producers and TV executives 
                                                                        
                                </div>
                                    <img class="" src="img/act000.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                                
                                    Casting companies access your info. and initiate contact
                                                                            
                                </div>
                                    <img class="" src="img/studio0.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                            
                                    Exposure to talent scouts with opportunity to be discovered
                                                                            
                                </div>
                                    <img class="" src="img/wePromote.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="quotes text-center">
                                
                                    Keep you apprised of future reality productions
                                                                            
                                </div>
                                    <img class="" src="img/write3.jpg" width="350px">

                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="fa fa-arrow-circle-o-left fa-2x" aria-hidden="true" style="color : black"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="fa fa-arrow-circle-o-right fa-2x" aria-hidden="true" style="color : black"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
            
    </div>
</section>

<script>


    function addToCart(event){
      let n =  event.target.dataset.id;
      let crt = ".crt-" + n;
      let crtclass = "crt-" + n;
      let user = '<?= unique_id() ?>';
      let url = "addToCart.php?user_unique=" + user + "&id=" + n;

      $.get(url, function(data){
            if(data){
                //alert(data);
                $(".cart-no").html(data);
                $(crt).parent().html('<span class="' + crtclass +' addcart badge-success"><i class="bi bi-check"></i>Added to Cart</span>');
                toastr.success('Added To Cart',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });

                
            }
      }, "text");
    }
</script>
<?php
 require "scripts/footer_two.php";

}
?>