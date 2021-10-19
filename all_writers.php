<?php 
require "scripts/functions.php";


if(is_loggedIn()){

if(role() == 3 || role() == 4){
$logo = true; $fixed = true;
require "scripts/header_two.php"; 



$query = mysqli_query($link, "Select * from realtv_writers");


$step = isset($_GET['step']) ? $_GET['step'] : 'all';

if($step == "view_profile"){
    $profileId = $_GET['profile_id'];

    $writer = mysqli_fetch_assoc(mysqli_query($link, "Select * from realtv_writers where unique_id = '$profileId'"));
}

?>

<style>
    body{
        overflow-x : scroll;
    }
    .profile-body{
        margin-top : 33vh;
    }
    .tab-active{
         text-transform : uppercase;
         color : #fff;
         background-color : #004883;
     }
     .profile_name{
         font-size : 25px;
         font-weight : 700;

     }.profile_{
        font-size : 18px;
     }.count{
         font-size : 50px;
     }
    @media only screen and (max-width: 768px) {
        .realbtn{
            padding : 8px;
        }
        table{
            font-family : "Poppins", serif !important;
        }

        
    }
    @media only screen and (max-width: 425px) {
        .profile-body{
            margin-top : 25vh;
        }    
        .profile_name{
         font-size : 20px;
         font-weight : 700;
        }.profile_{
            font-size : 18px;
        } 
      
    }

</style>

<section class="profile-body p-2 mx-2">

        <div class="row my-4">
            <div class="col-12 p-2">
                <h3 class="poppins ml-4">Writers</h3>
                <hr>
            </div>
        </div>

        <div class="nav nav-tabs text-center mx-auto" id="v-pills-tab" role="tablist">
            <a class="nav-link <?= $step == 'all' ? 'tab-active' : '' ?>" href="?step=all">All writers</a>
            <?php if($step == 'view_profile'): ?>
            <a class="nav-link <?= $step == 'view_profile' ? 'tab-active' : '' ?>" href="?step=resume">Writer's Profile</a>
            <?php endif; ?>
        </div>

        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane p-3 <?= $step == 'all' ? 'active' : '' ?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <table class="table-bordered table" id="contestants">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Profile Image</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Sizzle</th>
                            <th>Status</th>
                        <?php if(role() == 4){ ?>
                            <th>Action</th>
                        <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $count = 1;

                        while($cont = mysqli_fetch_assoc($query)) : 
                            $contId = $cont['unique_id'];

                        ?>
                        <tr>
                            <td align="center"><?= $count ?></td>
                            <td align="center"><img src="<?= $cont['profile_img'] != "" ? 'img/uploads' . $cont['profile_img'] : 'img/man.png'; ?>" width="50px" height="45px" alt=""> </td>
                            <td align="center"><?= $cont['firstname'] ?></td>
                            <td align="center"><?= $cont['lastname'] ?></td>
                            <td align="center"><?= $cont['username'] ?></td>
                            <td align="center"><?= $cont['email'] ?></td>
                            <td align="center"><?= $cont['phone_no'] ?></td>
                            <td align="center"><?= $cont['address'] ?></td>
                            <td align="center"><a class="badge badge-warning" href="<?= $cont['sizzle_reel'] != "" ? 'img/uploads/' . $cont['sizzle_reel'] : ''; ?>">View</a></td>
                            <td align="center"><?= isactive($contId) == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' ?></td>
                            <?php if(role() == 4){ ?>
                            <td align="center">
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="?step=view_profile&profile_id=<?= $contId ?>">View Profile</a>
                                <?php if($cont['activated'] == 0){ ?> <a class="dropdown-item" href="?action=activate">Activate</a> <?php } ?>
                                <?php if($cont['activated'] == 1){ ?> <a class="dropdown-item" href="?action=deactivate">Deactivate</a> <?php } ?>
                                    
                                </div>
                            </td>
                        <?php } ?>
                        </tr>
                        

                        
                        <?php $count++; endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane p-3 <?= $step == 'view_profile' ? 'active' : '' ?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <section class="p-2 mx-auto mt-4">
                    <div class="row w-100 mx-auto">
                        <div class="col-lg-4 col-md-4 bg-light col-sm-12 text-center">
                            <div class="img_cont bg-light mx-auto p-3 rounded rounded-circle" style="width: fit-content; height:auto;">
                                <img src="<?= $writer['profile_img'] != "" ? 'img/uploads' . $writer['profile_img'] : 'img/man.png'; ?>" width="150px" height="140px" alt=""> 
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-8 bg-light col-sm-12 p-2 poppins text-center">
                            <p class="mt-2 profile_name"><?= $writer['firstname'] . " " . $writer['lastname']  ?></p>
                          <?php if($writer['username'] != $writer['email']){ ?> <p class="profile_"><?= $writer['username']  ?></p> <?php } ?>
                            <p class="profile_"><?= $writer['email'] ?></p>
                            <p class="profile_"><?= $writer['phone_no'] ?></p>
                            <p class="profile_"><?= $writer['address'] ?></p>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 p-2">
                           <div class="box mx-auto border" style="width: 200px;">
                                <div class="card-header text-center">Date Joined</div>
                                <div class="card-body text-center bg-light"> <?= date("l M Y", strtotime($writer['date_created'])) ?></div>
                           </div>
                           <div class="box mx-auto border mt-3" style="width: 200px;">
                                <div class="card-header text-center">Project Count</div>
                                <div class="text-center bg-light count"> <?= mysqli_fetch_assoc(mysqli_query($link, "select count(*) as cnt from realtv_drafts where created_by = '$profileId'"))['cnt'] ?></div>
                           </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>  
   
</section>


<script>
    $(document).ready(function(){
        $("#contestants").DataTable();

    })
</script>



<?php
 require "scripts/footer_two.php";
    }else{
        $location = $_SESSION['index'];
        header("Location: $location");
    }
}else{
    header("Location: login.php");
}
?>