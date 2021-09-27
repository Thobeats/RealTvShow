<?php 
$navBar = true; $logo=true; $writerReg = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

echo $upload_max_size = ini_get('upload_max_filesize');  
echo $post_max_size=ini_get('post_max_size');  

echo "<br>";

if(isset($_POST['reg'])){ 
    $firstname = trim($_POST['fname']);
    $lastname = trim($_POST['lname']);
    $username = trim($_POST['uname']);
    $password = trim($_POST['password']); 
    $email = trim($_POST['email']);
    $phone_num = trim($_POST['phone_num']);
    $address = trim($_POST['address']);
    $role = 2;
    $video = $_FILES['sizzle'];
    $cover_pic = $_POST['home'];

    //Movie Details....
   $movie_title = trim($_POST['project_title']);
   $genre = trim($_POST['genre']);
   $logline = trim($_POST['logline']);
   $synopsis = trim($_POST['synopsis']);
   $other_img = $_POST['pitches'];

  //var_dump($video);

    $checkEmail = mysqli_query($link, "select * from realtv_users where email = '$email'");
    if(mysqli_num_rows($checkEmail) == 1){
        set_message('error', 'Email taken, register with a unique email');
    }else{
        $checkUsername = mysqli_query($link, "select * from realtv_users where username = '$username'");
        if(mysqli_num_rows($checkUsername) == 1){
            set_message('error', 'Username taken, select another username');
        } 
        else{
            register_writer($firstname,$lastname,$email,$password,$role,$address,$username,$phone_num,$movie_title,$genre,$logline,$synopsis,$cover_pic,$other_img, $video);
               
        }
    }

   

   
}
?>
<?= get_message("error"); ?>
<?= get_message("success"); ?>
<?= get_message("info"); ?>
<style>
    body{
        font-family : 'Poppins';
    }

    form{
        padding : 0 10%;
    }


    .writer-img{
        height : 250px;
        width: 400px;
        background-image : url(img/writer.jpg);
        background-size : cover;
    }

    .writer-wrapper p{
        font-weight : 300;
        letter-spacing : 1rem;
        text-transform : uppercase;
        width : 100%;
    }

    .writer-title{
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        font-size: 50px;
        font-weight: 700;
    }

    .writer-header{
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        font-size: 25px;
        font-weight: 700;
        justify-content : start;
    }

    .form-control{
        margin: 10px 0;
        font-weight : 300;
    }

    .writer_side_para{
        font-size : 12px;
        font-family : 'Poppins', serif;
        font-weight : 300;
    }

    @media only screen and (max-width: 768px) {
           
        .writer-title{  
            font-size: 40px;  
        }

        .writer-header{       
            font-size: 20px;
        }

        .writer-img{
            height : 200px;
            width: 300px;
        }

        form{
            padding : 0 5%;
        }
    }

    @media only screen and (max-width: 425px) {

        .writer-title{  
            font-size: 30px;  
        }

        .writer-header{       
            font-size: 18px;
            text-align : center;
            width: 100%;
        }

        .writer-img{
            height : 150px;
            width: 200px;          
        }

        .writer-img{
            width : 100%;
        }
       
        form{
            padding : 0;
        }form .row> .col-sm-12,.col-12{
            margin-top : 10px;
        }.form-control{
            margin: 0;
        }

        
    }
</style>


<div class="row p-3">
    <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end pt-4">
       <p class="pl-5 writer-title text-right"> Writers and Creators</p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 text-align-left p-4">
        <div class="writer-img">

        </div>
    </div>
</div>

<form action="" method="POST" enctype="multipart/form-data" autocomplete="off" id="writer-form">
<section class="writer-form px-4 py-2 mb-4" style="height: auto;">
    <div class="d-flex flex-column justify-content-center">
        
             <div class="row">
                <div class="col-12 d-flex">
                <p class="p-2 writer-header"> personal details </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" class="form-control" name="fname" placeholder="First Name" autocomplete="off">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" autocomplete="off">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" class="form-control" name="uname" placeholder="Username" autocomplete="off">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" class="form-control" name="phone_num" placeholder="Phone Number">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <textarea name="address" class="form-control" cols="30" rows="10" placeholder="Address"></textarea>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6"></div>
                <div class="col-lg-6 text-right">
                  <input type="button" class="realbtn btn-warning next writer-btn" value="Next">
                </div>
            </div>

        <!-- </form> -->
    </div>
</section>

<section class="movie-form p-4 mb-4" style="height: auto;">
    <div class="d-flex flex-column justify-content-center">
        <!-- <form action="" method="POST"> -->
             <div class="row">
                <div class="col-12 d-flex justify-content-start">
                <p class="p-2 writer-header"> proposed reality </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" name="project_title" class="form-control" placeholder="Project Title">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <select name="genre" id="" class="form-control" >
                        <option value="">Select Genre</option>
                        <?php 
                            $genreQ = mysqli_query($link, "Select * from movie_genre");
                            while($genre = mysqli_fetch_object($genreQ)) : 
                        ?>

                        <option value="<?= $genre->id ?>"><?= ucfirst($genre->genre_name) ?></option>

                        <?php endwhile; ?>
                    </select>
                </div>

               
            </div>            

            <div class="row mt-3">        
                <div class="col-12">
                    <label for="" class="h4">Logline <small> (Copy &amp; Paste Your Content)</small></label>
                    <textarea name="logline" class="form-control text-editor" cols="5" rows="5"></textarea>
                </div>

            </div>            

            <div class="row mt-3">
                <div class="col-12">
                    <label class="h4" for="">Synopsis <small> (Copy &amp; Paste Your Content)</small></label>
                    <textarea name="synopsis" class="form-control text-editor" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="row mt-3">
               <div class="col-lg-6 col-md-6 col-sm-12">
               <input type="hidden" name="home" id="home">               

                    <div class="custom-file">                
                        <input type="file" name="home_page" title="Select image" style="font-weight: 300 !important;" class="custom-file-input" id="home_page" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01" >Home Page</label>                      
                    </div>  
                    <div id="home_container" style="height: 20vh;" class="mt-2 border border-black">
                    
                    </div>                
               </div>
                <div class="col-lg-6 col-md-6 col-sm-12">    
                    <div class="custom-file">                
                        <input type="file" name="sizzle" title="Select multiple images" style="font-weight: 300 !important;" class="custom-file-input" id="sizzle" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01" >Upload Sizzle Reel Video</label>                      
                    </div>
                    <div id="sizzle_container" style="height: 20vh;" class="mt-2 border border-black">
                        <video id="preview_sizzle" width="100%" height="100%" controls autoplay>
                            
                        </video>
                    </div> 
                </div>

                <div class="col-12 mt-2">   
                <input type="hidden" name="pitches" id="others">               
 
                    <div class="custom-file"> 
                        <input type="file" name="" id='multiple' title="Select multiple images" style="font-weight: 300 !important;" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01" >Image Enhanced Pitch up to 7 Images</label>                      
                    </div>
                    <div id="pitch_container" style="height: 20vh;" class="pt-2 border border-black row">
                    
                    </div> 
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <p class="writer_side_para">
                        Please review the RTVR Industry Executive <a href="nda.php" target="_blank">NDA - Confidential Agreement</a> , which is required to be signed by any Industry TV
                        Executive who views writer’s material, without exception. Thus, designed to protect all the written material of writers who are registered
                        to RTVR. <a href="terms.php" target="_blank"> Agreeing to the terms of the standard Material Release Form</a>, is required for all submissions. By checking the box below as
                        my electronic and binding signature, I confirm that I have reviewed, understand and agree to RealityTVRegistry.com NDA/Confidential
                        Agreement and Standard Material Release Form and that the terms and conditions of such shall govern me and my use of RTVR
                        and/or any of the services provided by RTVR including but not limited to any submission by me as a writer or any review of the
                        materials of others contained herein.
                    </p>
                </div>
                <div class="col-12">
                    <div class="form-check mx-auto">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                        <label class="form-check-label" for="defaultCheck1">
                            Click to Agree
                        </label>
                    </div>
                </div>
            </div>

            <div id="input_contain">

            </div>

            <div class="row mt-5">
                <div class="col-lg-6 writer-btn-prev col-sm-12">
                    <input type="button" class="realbtn btn-warning prev writer-btn" value="Previous">
                </div>
                <div class="col-lg-6 writer-btn-reg col-sm-12">
                  <input type="submit" class="realbtn btn-legit writer-btn" name="reg" value="Register">
                </div>
            </div>

        <!-- </form> -->
    </div>
</section>

</form>

<script>
    let next = document.querySelector(".next");
    let writerTitle = document.querySelector(".writer-title");
    next.addEventListener("click", function(){
        writerTitle.innerHTML = "pitch submissions";
    });

    let prev = document.querySelector(".prev");
    prev.addEventListener("click", function(){
        writerTitle.innerHTML = "writers and creators";
    });

    let home_page = document.getElementById("home_page");
    let home_contain = document.getElementById("home_container");
    let multiple = document.getElementById("multiple");
    let pitches = document.getElementById("others");
    let home = document.getElementById("home");
    let pitch_contain = document.getElementById("pitch_container");
    let multi_array = [];
    let input_contain = document.querySelector("#input_contain");
    let sizzle = document.querySelector("#sizzle");
    let sizzlePreview = document.querySelector("#preview_sizzle");


    sizzle.addEventListener("change", function(){
        let files = this.files[0];
        console.log(files);
        let url = "handle_video.php";
       
        let formData = new FormData(); 
        formData.append("file", files);
        fetch(url, {
            method: "POST", 
            body: formData,
        }).then(response => response.json()).then((data) => {
            
           console.log(data);
            if(data.msg == 'error1'){
                sizzle.value = "";
                toastr.error('File too Large',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data.msg == 'error2'){
                sizzle.value = "";
                toastr.error('Invalid format',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else{

                console.log(data);

                let src = URL.createObjectURL(files);     
                
                let format = data.format;
                sizzlePreview.innerHTML = "";
                sizzlePreview.innerHTML += `<source src="${src}" type="video/${format}"></source>`;
            }
        });
    })


    //MultiUpload
    multiple.addEventListener("change",function(){
        let files = this.files[0];

        let url = "upload_file.php";


        let formData = new FormData(); 
        formData.append("file", files);
        fetch(url, {
            method: "POST", 
            body: formData,
        }).then(response => response.text()).then((data) => {
            
           //alert(data);
           if(data == 'no'){
                home_page.value = "";
                toastr.error('File exists',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error1'){
                home_page.value = "";
                toastr.error('File too Large',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error2'){
                home_page.value = "";
                toastr.error('Invalid format',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else{
            //console.log(imgArray);
           // console.log(data)

            //let src = URL.createObjectURL(file);
           // multi_array.push(src);

           multi_array.push(data);

            console.log(multi_array)

            pitch_contain.innerHTML = "";
                for(dt of multi_array){
                    pitch_contain.innerHTML += `<div class="mx-2 mt-1 col-2 card p-0 border-0" style="width: 20%; height: 40%; background-color:inherit;">
                                                    <img src="img/uploads/${dt}" width="100%" height="100%">                                        
                                                    <i class="bi bi-trash-fill" data-id="<?= $movie_id ?>" data-name="${dt}" onclick="deletePic(event)"></i>                                      
                                                </div>`;

               
                }

                pitches.value = multi_array.toString();

            
            }
        });

    })

    // SIngle Upload
    home_page.addEventListener("change", function(){
        let files = this.files[0];
        //console.log(files);
        let url = "upload_file.php";
       
        let formData = new FormData(); 
        formData.append("file", files);
        fetch(url, {
            method: "POST", 
            body: formData,
        }).then(response => response.text()).then((data) => {
            
           //alert(data);
            if(data == 'no'){
                home_page.value = "";
                toastr.error('File exists',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error1'){
                home_page.value = "";
                toastr.error('File too Large',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error2'){
                home_page.value = "";
                toastr.error('Invalid format',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else{
            //console.log(imgArray);
           // console.log(data)

            //let src = URL.createObjectURL(files)
            home_contain.innerHTML = "";
            home_contain.innerHTML += `<div class="card p-0 border-0 mx-auto" style="width: 180px; height: 100%; background-color:inherit;">
                                            <img src="img/uploads/${data}" width="100%" height="100%">  
                                      </div>`;
            }

            home.value = data;
        });
    });


    function deletePic(event){
        let name = event.target.dataset.name;
        let url = 'unlink.php?pic=' + name;

        $.get(url, function(data){
            toastr.error(data,{
                'closeButton': true, 
                'showMethod' : 'slideDown', 
                'hideMethod' : 'slideUp'
            });

          
                if(multi_array.includes(name)){
                    let id = multi_array.indexOf(name);
                    multi_array.splice(id, 1);
                    
                    pitch_contain.innerHTML = "";
                    for(dt of multi_array){
                    pitch_contain.innerHTML += `<div class="card p-0 border-0 mx-auto" style="width: 120px; background-color:inherit;">
                                                    <img src="img/uploads/${dt}" width="100%" height="50%">                                        
                                                    <div class="card-footer text-mute text-right"><i class="bi bi-trash-fill" data-id="<?= $movie_id ?>" data-name="${dt}" onclick="deletePic(event)"></i></div>                                        
                                                </div>`;
                    }

                    pitches.value = multi_array.toString();

                }           

            
            event.target.value = "";


        }, "text");
    }
</script>



<?php require "scripts/footer_two.php"; ?>