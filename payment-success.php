<?php
session_start();
$logo = true; 
require"scripts/header_two.php"; 

$order = $_GET['orderID'];

?>
<div class="row">
    <div class="col-12 text-center mt-5 ">
        <img src="img/check.png" alt="payment successful icon" width="300px">
        <p class="mt-5">Payment Successful..</p>

    </div>


</div>



<script>
    console.log('<?= json_decode($order) ?>');

</script>

<?php require"scripts/footer_two.php" ?>