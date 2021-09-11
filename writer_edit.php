<?php 
$navBar = true; $logo = true;
require "scripts/functions.php";
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

    header("Location: preview.php");
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

    if($reponse){
        set_message("success", "Success");
        header("Location : $location");
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
</style>

<section class="p-3 m-3">
    <div class="row my-3 mx-auto p-3" style="width: 80%;">
        <div class="col-12">
            <h3 class="poppins"><?= $title ?? "Create Project" ?></h3>
        </div>
    </div>
    <form action="" method="post" id="edit-form" enctype="multipart/form-data" target="_blank">
        <div class="form-group text-right">
            <button class="btn btn-primary" type="submit" name="preview">Preview</button>
            <button class="btn btn-success" type="submit" name="save">Save</button>
        </div>
        <hr>
        <div class="form-row my-2">
            <div class="mt-3 col-lg-4 col-md-4 col-sm-12">
                <input type="text" class="form-control" name="movie_title" placeholder="Project Title" value="<?= $getProject['movie_title'] ?? "" ?>">
            </div>
            <div class="mt-3 col-lg-4 col-md-4 col-sm-12">
                <input type="text" class="form-control" name="movie_copyright" placeholder="Project Copyright">
            </div>
            <div class="mt-3 col-lg-4 col-md-4 col-sm-12">
                <input type="text" class="form-control" name="movie_reality" placeholder="Project Reality">
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
                <input type="text" class="form-control" name="movie_aquisition" placeholder="Option/Acquisition">
            </div> 
                      
        </div>
       
        <div class="form-row">
            <div class="mt-3 col-12">
                <label for="logline">Logline</label>
                <textarea name="logline" class="form-control text-editor" cols="30" rows="10"><?= $getProject['logline'] ?? "" ?></textarea>
            </div>       
            <div class="mt-3 col-12">
                <label for="logline">Synopsis</label>
                <textarea name="synopsis" class="form-control text-editor" cols="30" rows="10"><?= $getProject['synopsis'] ?? "" ?></textarea>
            </div>          
        </div>

        <div class="form-row">
            <div class="mt-3 col-12 d-flex flex-wrap" id="show_img">
                
            </div>
            <div class="mt-3 col-12">
                <div class="custom-file">                
                    <!-- <input type="file" name="img[]" id="input-id" class="file" data-preview-file-type="text" multiple>                    -->
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



window.addEventListener("load", function(){
    let lurl = "load_image.php?id=" + "<?= $movie_id ?>";
    $.get(lurl, function(data){

        if(data != ""){
        let ar = data.slice(0, -1);
        let split = ar.split(",");
        imgArray = split;
       // console.log(data);
        img_contain.innerHTML = "";
        for(dt of imgArray){
        img_contain.innerHTML += `<div class="mx-2 card p-0 border-0" style="width: 120px; height: 120px; background-color:inherit;">
                                        <img src="img/uploads/${dt}" width="100%" height="50%">                                        
                                        <div class="card-footer text-mute text-right"><i class="bi bi-trash-fill" data-name="${dt}" data-id="<?= $movie_id ?>" onclick="deletePic(event)"></i></div>                                        
                                </div>`;
        }

        img_file.value = imgArray.toString();
        }

    }, "text");

   

})

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
            //console.log(data)

            if(data != 'no'){
            imgArray.push(data);
            //console.log(imgArray);
            img_contain.innerHTML = "";
            for(dt of imgArray){
            img_contain.innerHTML += `<div class="mx-2 card p-0 border-0" style="width: 120px; height: 120px; background-color:inherit;">
                                            <img src="img/uploads/${dt}" width="100%" height="50%">                                        
                                            <div class="card-footer text-mute text-right"><i class="bi bi-trash-fill" data-id="<?= $movie_id ?>" data-name="${dt}" onclick="deletePic(event)"></i></div>                                        
                                      </div>`;
            }
            img_file.value = imgArray.toString();

            }else{
                pic.value = "";
                toastr.info('File exists',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }
        });
    });

   
</script>



<?php
 require "scripts/footer_two.php";
?>