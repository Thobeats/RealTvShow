<?php 
require "scripts/functions.php";


if(is_loggedIn()){

if(role() == 4){
$logo = true; $fixed = true;
require "scripts/header_two.php"; 



$query = mysqli_query($link, "Select * from realtv_reg");


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

        <div class="row my-4">
            <div class="col-12 p-2">
                <h3 class="poppins ml-4">Payments</h3>
                <hr>
            </div>
        </div>

    <table class="table-bordered table" id="contestants">
        <thead>
            <tr>
                <th>SN</th>
                <th>OrderId</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Package</th>
                <th>User Type</th>
                <th>Country</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>                
                <th>Movie Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count = 1;

            while($cont = mysqli_fetch_assoc($query)) : 
                $contId = $cont['unique_id'];
                $package = $cont['package'];
                $user = $cont['user_type'];

            ?>
            <tr>
                <td align="center"><?= $count ?></td>
                <td align="center"><?= $cont['orderID'] ?></td>
                <td align="center"><?= $cont['gross_amount'] ?></td>
                <td align="center"><?= $cont['currency_code'] ?></td>
                <td align="center"><?= (($package == 'standard') ? "<label class='badge badge-warning p-2' style='text-transform : uppercase'>$package</label" : $package == 'enhanced' ? "<label class='badge badge-success p-2' style='text-transform : uppercase'>$package</label" : "" )?></td>
                <td align="center"><?= ($user == 'writer' ? "<label class='badge badge-warning p-2' style='text-transform : uppercase'>$user</label" : ($user == 'contestant' ? "<label class='badge badge-success p-2' style='text-transform : uppercase'>$user</label" : "" )) ?></td>
                <td align="center"><?= $cont['name'] ?></td>
                <td align="center"><?= $cont['email'] ?></td>
                <td align="center"><?= $cont['address1'] ?></td>
                <td align="center"><?= $cont['country_code'] ?></td>
                <td align="center"><?= movie_title($cont['movie_id']) ?></td>

                <td align="center">
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">View</a>
                        <a class="dropdown-item" href="#">View</a>                        
                    </div>
                </td>
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