<?php 
require "scripts/functions.php";
if(isset($_POST['save'])){
    $date = date('Y-m-d h:i:s');
    $id = $_POST['id'];
    $co_name = $_POST['co_name'];
    $co_address = $_POST['co_address'];
    $co_phone = $_POST['co_phone'];
    $co_email = $_POST['co_email'];
    $co_web = $_POST['co_web'];

    $uploads_dir = 'img/uploads/';
    $uploads_file = $uploads_dir . basename($_FILES['co_img']['name']);  

    move_uploaded_file($_FILES['co_img']['tmp_name'], $uploads_file);

    $co_img = $_FILES['co_img']['name'] == "" ? $_POST['co_img'] : $_FILES['co_img']['name'];
    if(mysqli_query($link, "UPDATE `realtv_company` SET `company_name`='$co_name',`co_address`='$co_address',`co_email`='$co_email',`co_phone`='$co_phone',`co_img`='$co_img',`date_updated`='$date',`co_web`='$co_web' WHERE id = '$id'")){
        set_message("success", "Updated");
        $redirect = "company_details.php?id=$id";
        header("Location: $redirect ");
    // echo $redirect;
    }else{
        echo mysqli_error($link);
    }

   

}else{

if(is_loggedIn()){

if(role() == 3){

if(isset($_GET['id'])){
$logo = true; $fixed = true;
require "scripts/header_two.php"; 

$id = $_GET['id'];


$company = mysqli_fetch_assoc(mysqli_query($link, "select * from realtv_company where id = '$id'"));




?>

<style>
    .profile-body{
        margin-top : 33vh;
    } .realbtn{
        border : 1px solid;
        color: #000;
        letter-spacing : 0px;
        background-color : inherit;
    }.company-name-and-website{
        padding : 20px;
    }.company_img{
        height : 300px;
    }

    @media only screen and (max-width: 768px) {
        .realbtn{
            padding : 8px;
        }
        table{
            font-family : "Poppins", serif !important;
        }.company_img{
            height : 250px;
        }
        
    }
    @media only screen and (max-width: 425px) {
        .profile-body{
            margin-top : 25vh;
        }.company-name-and-website{
            padding : 5px;
        }     
      
    }

</style>

<section class="profile-body p-2 mx-2">
<form action="edit_company_details.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="co_img" value="<?=$company['co_img']?>">
    <div class="row mx-auto w-100 mb-3 mt-3">
        <div class="col-lg-1 col-sm-0"></div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="company_img py-4">
                <img class="cimg" src="<?= $company['co_img'] ? 'img/uploads/' . $company['co_img'] : 'img/logo-placeholder.png' ?>" width="100%" height="100%" alt="">
            </div>
            <div class="text-center">
                <label for="company_img" class="badge badge-success p-2" style="cursor: pointer;"><i class="bi bi-brush text-light " title="change cover image"></i></label>
                <input type="file" name="co_img" id="company_img" hidden>
                <label for="" class="badge badge-danger p-2"><i class="bi bi-x-lg" data-id="<?= $id ?>" data-name="<?= $company['co_img'] ?>" data-type="company_img" data-tag=".cimg" onclick="removePic(event)" style="cursor:pointer;" title="Remove"></i></label> 
            </div>  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="company-name-and-website">
                <h3 class="p-2"> <input type="text" placeholder="Company Name" class="form-control h3" name="co_name" value="<?= $company['company_name'] ?? "" ?>"></h3>
                <h6 class="p-2"><input type="text" placeholder="Company Address"   class="form-control" name="co_address" value="<?= $company['co_address'] ?? "" ?>"></h6>
                <h6 class="p-2"><input type="email" placeholder="Company Email"  class="form-control" name="co_email" value="<?= $company['co_email'] ?? "" ?>"></h6>
                <h6 class="p-2"><input type="text" placeholder="Company Phone"  class="form-control" name="co_phone" value="<?= $company['co_phone'] ?? "" ?>"></h6>
                
                <div class="mt-2 p-2">
                <input type="text"  placeholder="Company Web : https://example.com"  class="form-control" name="co_web" value="<?= $company['co_web'] ?? "" ?>"> 
                </div>

                <div class="mt-5 text-right">
                    <button type="submit" name="save" class="realbtn"><i class="bi bi-pencil-square"></i> Save </a>
                </div>
            </div>
        </div>
    </div>
</section>
</form>

<script>

    function removePic(event){
        let name = event.target.dataset.name;
        let tag = event.target.dataset.tag;
        let type = event.target.dataset.type;


        if(name !== ""){
            let url = `unlink.php?pic=${name}`;

            $.get(url, function(data){
                if(data == "File Deleted"){
                    console.log(tag);
                    event.target.dataset.name = "";

                        document.querySelector(tag).setAttribute("src", "img/logo-placeholder.png");
                                      
                    let name = "";
                    let ur = "";
                
                        ur = `update_file.php?type=company_img&name=${name}&id=` + event.target.dataset.id; 
                                       
                    $.get(ur, function(dat){
                        if(dat){
                            toastr.success(dat,{
                                'closeButton': true, 
                                'showMethod' : 'slideDown', 
                                'hideMethod' : 'slideUp'
                            });
                        }
                    },'text');



                }else{
                    toastr.error('not found',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                    });
                }
            }, 'text');
        }
    }


    document.getElementById("company_img").addEventListener("change", function(){
        let files = this.files[0];
        let url = "handle_file.php";

        let user = "<?= $user_id ?>";

        let formData = new FormData(); 
        formData.append("file", files);
        fetch(url, {
            method: "POST", 
            body: formData,
        }).then(response => response.text()).then((data) => {
            
           console.log(data);
            if(data == 'no'){
                toastr.error('File exists',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error1'){
                toastr.error('File too Large',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else if(data == 'error2'){
                toastr.error('Invalid format',{
                    'closeButton': true, 
                    'showMethod' : 'slideDown', 
                    'hideMethod' : 'slideUp'
                });
            }else{

                console.log(data);

                let src = URL.createObjectURL(files);  
                
                let cover = document.querySelector(".cimg");
                cover.setAttribute("src", src);
            }
        });

    })
</script>



<?php
 require "scripts/footer_two.php";
}else{
    $location = $_SESSION['index'];
    header("Location: $location");
}
    }else{
        $location = $_SESSION['index'];
        header("Location: $location");
    }
}else{
    header("Location: login.php");
}
}
?>