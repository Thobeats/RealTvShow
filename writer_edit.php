<?php 
$fixed = true; $logo = true;
require "scripts/functions.php";


if(is_loggedIn() && (role() == 2)){
require "scripts/header_two.php"; 

//var_dump($_SESSION);

//$location = $_SESSION['index'];
$movie_id = "";
if(isset($_GET['edit'])){
    $title = "Edit Project";
    $movie_id = $_GET['id'];
    $edit = true;
    $getProject = mysqli_fetch_assoc(mysqli_query($link, "select * from realtv_drafts where id = '$movie_id'"));
    // $img = $getProject['other_pics'];
    // $img = substr($img, 0, -1);
    // $imgs = explode(",", $img);

    // var_dump($imgs);

}

if (isset($_POST['preview'])){
    $movie_title = $_POST['movie_title'];
    $movie_copyright = $_POST['movie_copyright'];
    $movie_reality = $_POST['movie_reality'];
    $genre = $_POST['movie_genre'];
    $movie_aquisition = $_POST['movie_aquisition'];
    $logline = $_POST['logline'];
    $synopsis = $_POST['synopsis'];
  //  $other_imgs = $_POST['img'];

    $imgs = $_POST['img_file'];
    
    $_SESSION = [
        'preview' => true,
        'title' => $movie_title,
        'copyright' => $movie_copyright,
        'reality' => $movie_reality,
        'genre' => $genre,
        'acquisition' => $movie_aquisition,
        'logline' => $logline,
        'synopsis' => $synopsis,
        'imgs' => $imgs
    ];

    header("Location:preview.php");
    exit(0);
}

if (isset($_POST['save'])){
    $movie_title = $_POST['movie_title'];
    $movie_copyright = $_POST['movie_copyright'];
    $movie_reality = $_POST['movie_reality'];
    $genre = $_POST['movie_genre'];
    $movie_aquisition = $_POST['movie_aquisition'];
    $logline = $_POST['logline'];
    $synopsis = $_POST['synopsis'];
  

    $imgss = $_POST['img_file'];
    $imgss .= ",";

    if(isset($movie_id)){
        $response = mysqli_query($link, "UPDATE `realtv_drafts` SET `movie_title`='$movie_title',`logline`='$logline',`genre`='$genre',`synopsis`='$synopsis',`other_pics`='$imgss',`reality`='$movie_reality',`acquisition`='$movie_aquisition',`copyright`='$movie_copyright' WHERE id = '$movie_id'");
    }else{
        $user = $_SESSION['unique_id'];
        $unique_id = "MOV".strtotime("now");
        $response = mysqli_query($link, "INSERT INTO `realtv_drafts`(`created_by`,`movie_title`,`logline`, `genre`, `synopsis`, `other_pics`, `unique_id`, `reality`, `acquisition`, `copyright`) 
                            VALUES ('$user','$movie_title','$logline','$genre','$synopsis', '$imgss', '$unique_id', '$movie_reality', '$movie_acquisition', '$movie_copyright')");
        
    }

    if($response){
        set_message("success", "Success");
      //  $location = $_SESSION['index'];
        header("Location:writersPage.php");
        exit(0);
    }else{
       echo mysqli_error($link);
    }
}
?>


<?=  get_message("error"); ?>

<style>
 #edit-form{
     width : 80%;
     margin : 0px auto;
 }
 .poppins {
     font-weight : 800;
 }


.movie-dets{
    padding : 0px 15px;
    margin : 0px 15px;
}

.zilla{
    font-family: 'Zilla Slab', serif;    
}

.poppins{
    font-family: 'Poppins', sans-serif;
}
.title{
    text-align : right;
}
.movie_img{
    text-align : left;
}
.movie_img img{
    width : 70%;
}
.r{
    text-align : right;
}

.synopsis_content{
    letter-spacing : 1px;
}
.editor{
    max-height: 40vh; 
    overflow-y:auto;
    white-space: pre-wrap;
    background-color: #eaeaff;
    }

    @media only screen and (max-width: 768px) {
        .movie_img{
            text-align : center;
            
        }
        .movie_img img{
            width : 70%;
            margin-top: 35px;
        }
    }

    @media only screen and (max-width: 425px) {
        .title{
            font-size : 20px;
            text-align : left;
        }
        .synopsis{ font-size : 20px;}
        .res{
            font-size : 15px;
        }
        .features p{
            font-size : 12px;
        }.r{
            text-align : center;
        }.movie_img{
            text-align : center;
        }
    }

</style>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background-color: rgb(218, 214, 214);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    


        <section class="row my-4 p-2 movie-dets">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row" style="width: 100%;">                        
                    <div class="col-lg-2 col-md-2 col-2 p-0">
                        <h3 class="m-0 title movie-header">
                            Title:
                        </h3>
                    </div>
                    <div class="col-lg-10 col-md-10 col-10 p-0">
                        <h5 class="mt-1 ml-3 res movie-title"> 
                            <?= isset($movie_data['movie_title']) ? $movie_data['movie_title'] : 'Epic - Battles of Foreign Lands (Proposed filming in the US)' ?>                                    
                        </h5>
                    </div>                           

                    <div class="col-lg-2 col-md-2 col-sm-12 mt-2 title p-0">                            
                        <h3 class="m-0 title logline-header">
                            Logline:
                        </h3>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 mt-2">
                        <div class="res logline-para">
                        <?= isset($movie_data['logline']) ? $movie_data['logline'] : 'A troop of 30 Roman Soldiers are led to battle against 30 Celti Gauls in this historically
                                                                                        significant encounter that occured, circa 525 BC. Among the destruction and burning ruins of a
                                                                                        Roman settlement, the Celtics are observed boasting until they see a troop of Roman Soldiers
                                                                                        charging at them. Combat is certain snd an Epic Battle of revenge ensues. A man-to-man clash of
                                                                                        soldiers wielding gladius type weaponry soon intensifies as antiquated pistols are drawn. In the end
                                                                                        either the Roman Soldiers or Celtic Gauls, will be declared victorious, and advance to battle again.
                                                                                        <b>Note:</b> Proprietary "BattleSafeWeaponry" is specially designed to insure non-injury conflicts)
                                                                                        ' 
                        ?>

                        </div>
                    </div>
                                            
                </div>
                
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="col-lg-12 col-md-12 col-sm-12 mt-4">                    
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12 p-0">
                            <div class="row features">
                                <p class="col-4 r">
                                    Proposal
                                </p>
                                <p class="col-8 prop">
                                    : <?= isset($movie_data['movie_title']) ? $movie_data['movie_title'] : 'Epic - Battles on Foreign Lands [in the US]' ?>
                                </p>
                                <p class="col-4 r">
                                    Copyright
                                </p>
                                <p class="col-8 cop">
                                    : <?= isset($movie_data['copyright']) ? $movie_data['copyright'] : 'US Copywright Office Title 17 - April 27, 2021' ?>
                                </p>
                                <p class="col-4 r">
                                    Reality
                                </p>
                                <p class="col-8 real">
                                    : <?= isset($movie_data['reality']) ? $movie_data['reality'] : 'Unscripted Format/12-episodes arc series' ?>
                                </p>
                                <p class="col-4 r">
                                    Option/Acquisition
                                </p>
                                <p class="col-8 aq">
                                    : <?= isset($movie_data['acquisition']) ? $movie_data['acquisition'] : 'Negotiable/$300,000' ?>
                                </p>
                                    
                            </div> 
                        </div>

                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="movie_img">
                            <img id="img" src="img/uploads/<?= $movie_data['movie_pic'] ?>">
                            </div>
                        </div>
                                                
                    </div>            
                </div>
            </div>     
            
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="p-2">
                    <h3 class="synopsis">
                        Synopsis
                        <hr>
                    </h3>

                    <div class="res synopsis_content">
                        <?php
                        
                         $synopsis = $movie_data['synopsis'];

                         $trimmed = str_replace(array('<p>&nbsp;</p>'), array(''), $synopsis);
                         $trimmed = str_replace(array('&nbsp;'), array(''), $synopsis);
                         echo $trimmed;
                        
                        ?>
                    </div>
                </div>
            </div>

        </section>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<section class="p-3" style="margin-top: 33vh;">
    <div class="row my-3 mx-auto p-3" style="width: 80%;">
        <div class="col-12">
            <h3 class="poppins"><?= $title ?? "Create Project" ?></h3>
        </div>
    </div>
    <form action="" method="post" id="edit-form" enctype="multipart/form-data">
        <div class="form-group text-right">
            <button class="btn btn-primary" type="button" onclick="openModal()">Preview</button>
            <button class="btn btn-success" type="submit" name="save" id="save">Save</button>
        </div>
        <hr>
        <div class="form-row my-2">
            <div class="mt-3 col-lg-4 col-md-4 col-sm-12">
                <input id="title" type="text" class="form-control" name="movie_title" placeholder="Project Title" value="<?= $getProject['movie_title'] ?? "" ?>">
            </div>
            <div class="mt-3 col-lg-4 col-md-4 col-sm-12">
                <input id="copyright" type="text" class="form-control" name="movie_copyright" placeholder="Project Copyright">
            </div>
            <div class="mt-3 col-lg-4 col-md-4 col-sm-12">
                <input id="reality" type="text" class="form-control" name="movie_reality" placeholder="Project Reality">
            </div>
        </div>
        <div class="form-row">
            <div class="mt-3 col-lg-6 col-md-6 col-sm-12">
                <select name="movie_genre" class="form-control" >
                    <option value="">Select Genre</option>
                    <?php 
                        $genreQ = mysqli_query($link, "Select * from movie_genre");
                        while($genre = mysqli_fetch_object($genreQ)) : 
                    ?>

                    <option <?= isset($getProject) && $getProject['genre'] == $genre->id ? 'selected' : '' ?> value="<?= $genre->id ?? "" ?>"> <?= ucfirst($genre->genre_name) ?></option>

                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mt-3 col-lg-6 col-md-6 col-sm-12">
                <input id="acquisition" type="text" class="form-control" name="movie_aquisition" placeholder="Option/Acquisition">
            </div> 
                      
        </div>
       
        <div class="form-row">
            <div class="mt-3 col-12" style="height: 55vh;">
            <input type="hidden" name="logline" id="inputLogline">
                <label for="logline">Logline</label>
                <div class="form-control editor" id="logline-editor">
                      <!-- <h1>Quill to HTML</h1><p><br></p><p>➡️ Modify this content to update HTML output 🔻.</p> -->
                      <?= $getProject['logline'] ?? "" ?>
                </div>            
            </div>       
            <div class="mt-3 col-12" style="height: 55vh;">
            <input type="hidden" name="synopsis" id="inputSynopsis">
                <label for="logline">Synopsis</label>
                <div class="form-control editor" id="synopsis-editor">
                      <!-- <h1>Quill to HTML</h1><p><br></p><p>➡️ Modify this content to update HTML output 🔻.</p> -->
                      <?= $getProject['synopsis'] ?? "" ?>
                </div>             
            </div>          
        </div>

        <div class="form-row">
            <div class="mt-3 col-12 d-flex flex-wrap" id="show_img">
                
            </div>
            <div class="mt-3 col-12">
                <div class="custom-file">                
                    <input type="file" id="file_upload" >
                </div>
            </div> 
         
        </div>
        <input type="hidden" name="img_file" id="img_file">
    </form>
</section>

<script>


let pic = document.getElementById("file_upload");
let imgArray = [];
let img_contain = document.getElementById("show_img");
let img_file = document.getElementById("img_file");


<?php 
if(isset($_GET['edit'])){
?>

window.addEventListener("load", function(){
    let lurl = "load_image.php?id=" + "<?= $movie_id ?>";
    $.get(lurl, function(data){

        if(data != ""){
        let ar = data.slice(0, -1);
        let split = ar.split(",");
        imgArray = split;
       // console.log(data);
        img_contain.innerHTML = "";
        if(imgArray != null){
            for(dt of imgArray){
            img_contain.innerHTML += `<div class="mx-2 card p-0 border-0" style="width: 120px; height: 120px; background-color:inherit;">
                                            <img src="img/uploads/${dt}" width="100%" height="50%">                                        
                                            <div class="card-footer text-mute text-right"><i class="bi bi-trash-fill" data-name="${dt}" data-id="<?= $movie_id ?>" onclick="deletePic(event)"></i></div>                                        
                                    </div>`;
            }
        }

        img_file.value = imgArray.toString();
        }

    }, "text");

   

});

<?php 
}
?>

function openModal(){
    let title = $("#title").val();
    $(".movie-title").html(title);
    let logline = $("#logline").val();
    $(".logline-para").html(logline);
    $(".synopsis_content").html($("#synopsis").val());
    $(".pop").html(title);
    $(".cop").html($("#copyright").val());
    $(".real").html($("#reality").val());
    $(".aq").html($("#acquisition").val());
    $("#exampleModal").modal('show');
    let img = imgArray[0];
    $('#img').attr('src', 'img/uploads/' + img);

}

    function deletePic(event){
        let name = event.target.dataset.name;
        let mid = event.target.dataset.id;
        let url = 'unlink.php?pic=' + name;

        $.get(url, function(data){
            toastr.error(data,{
                'closeButton': true, 
                'showMethod' : 'slideDown', 
                'hideMethod' : 'slideUp'
            });

            if(mid != ""){
                let url = "delete_img.php?id=" + mid + "&name=" + name;
                $.get(url, function(data,status){
                    console.log(status);
                });
            }

            if(imgArray.includes(name)){
                let id = imgArray.indexOf(name);
                imgArray.splice(id, 1);
                
                img_contain.innerHTML = "";
                for(dt of imgArray){
                img_contain.innerHTML += `<div class="mx-2 card p-0 border-0" style="width: 120px; height: 120px; background-color:inherit;">
                                                <img src="img/uploads/${dt}" width="100%" height="50%">                                        
                                                <div class="card-footer text-mute text-right"><i class="bi bi-trash-fill" data-id="<?= $movie_id ?>" data-name="${dt}" onclick="deletePic(event)"></i></div>                                        
                                        </div>`;
                }

                img_file.value = imgArray.toString();

            }
            pic.value = "";


        }, "text");
    }
 


    pic.addEventListener("change", function(){
        let files = this.files[0];
        let url = "upload_file.php";
       
        let formData = new FormData(); 
        formData.append("file", files);
        fetch(url, {
            method: "POST", 
            body: formData,
        }).then(response => response.text()).then((data) => {
            
           // alert(data);
            if(data == 'no'){
                pic.value = "";
                toastr.error('File exists',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
           

            }else if(data == 'error1'){
                pic.value = "";
                toastr.error('File too Large',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error2'){
                pic.value = "";
                toastr.error('Invalid format',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else{
                imgArray.push(data);
            //console.log(imgArray);
           // console.log(data)
            img_contain.innerHTML = "";
            for(dt of imgArray){
            img_contain.innerHTML += `<div class="mx-2 card p-0 border-0" style="width: 120px; height: 120px; background-color:inherit;">
                                            <img src="img/uploads/${dt}" width="100%" height="50%">                                        
                                            <div class="card-footer text-mute text-right"><i class="bi bi-trash-fill" data-id="<?= $movie_id ?>" data-name="${dt}" onclick="deletePic(event)"></i></div>                                        
                                      </div>`;
            }
            img_file.value = imgArray.toString();
            }
        });
    });

   
</script>



<?php
 require "scripts/footer_two.php";
}else{
    $location = $_SESSION['index'] ?? 'index.php';
    header("Location: $location");

}
?>