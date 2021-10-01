<?php 
require "scripts/functions.php";


if(is_loggedIn()){

if(role() == 3 || role() == 4){
$logo = true; $fixed = true;
require "scripts/header_two.php"; 



$query = mysqli_query($link, "Select * from realtv_contestants");




?>

<style>
    body{
        overflow-x : scroll;
    }
    .profile-body{
        margin-top : 33vh;
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
      
    }

</style>

<section class="profile-body p-2 mx-2">

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
                <th>Resume</th>
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
                <td align="center"><a class="badge badge-warning" href="<?= $cont['resume'] != "" ? 'img/uploads/' . $cont['resume'] : ''; ?>">View</a></td>
                <td align="center"><?= isactive($contId) == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' ?></td>
                <?php if(role() == 4){ ?>
                <td align="center">
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Activate</a>
                        <a class="dropdown-item" href="#">Deactivate</a>                        
                    </div>
                </td>
               <?php } ?>
            </tr>
            

            
            <?php $count++; endwhile; ?>
        </tbody>
    </table>
   
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