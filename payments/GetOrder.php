<?php

namespace Sample;

require '../vendor/autoload.php';
//1. Import the PayPal SDK client that was created in `Set up Server-Side SDK`.
use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../PaypalClient.php');


if(isset($_GET['orderID'])){
  $orderid = $_GET['orderID'];
  $mov_id = $_GET['mov_id'];
  $user_type = $_GET['user_type'];
  $pac = $_GET['pac'];
  $user_id = $_GET['userid'];
  $svdID = $_GET['savedID'];
}


class GetOrder
{

  // 2. Set up your server to receive a call from the client
  /**
   *You can use this function to retrieve an order by passing order ID as an argument.
   */


   public function send_confirmation_mail($toEmail, $subject, $body){
    // $mail = new PHPMailer(true);
    // try{
    //     //Settings
    //    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.gmail.com';
    //     $mail->SMTPAuth = true;
    //     $mail->Username = "tobiy23@gmail.com";
    //     $mail->Password = "T3mil0luw4";
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //     $mail->Port = "465";

    //     //Receiver
    //     $mail->setFrom('RealtvShow@test.com', 'Mailer');
    //     $mail->addAddress($toEmail);
    
    //     //Content
    //     $mail->isHTML(true);
    //     $mail->Subject = $subject;
    //     $mail->Body = $body;
        
    //     $mail->send();
    //    // set_message("success", "Confirmation email sent");        
    //     header("location: confirm.php");


    // }
    // catch(Exception $e){
    //    // set_message("error" , $mail->ErrorInfo);
    // }

    $mail = new PHPMailer(true);
    try{
        //Settings
      //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
       
        $mail->isSMTP();
        $mail->Host = 'p3plzcpnl459190.prod.phx3.secureserver.net';
        $mail->SMTPAuth = false;
        $mail->SMTPAutoTLS = false; 
        $mail->Port = 25; 
        // $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = true;
        $mail->Username = "welcome@realitytv-registry.com";
        $mail->Password = "R34l1tytvr3g1stry";
        $mail->SMTPSecure = 'none';
        $mail->ENCRYPTION = "none";
        //$mail->Port = "465";

        //Receiver
        $mail->setFrom('welcome@realitytv-registry.com', 'Connect');
        $mail->addAddress($toEmail);
    
        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        
        $mail->send();
       // set_message("success", "Confirmation email sent");        
      //  header("location: confirm.php");


    }
    catch(Exception $e){
      //  set_message("error" , $mail->ErrorInfo);
    }
   }


   public static function updateStatus($user_id, $item_id, $user_type){
      require "db.php";

      if($user_type == "contestant"){
        $table = "realtv_cart";
        $update_data = $con->query("UPDATE $table set status='paid' where `user_id` = '$user_id' and `id` = `$item_id`");
      }elseif($user_type == "writer"){
        $table = "realtv_drafts";
        $update_data = $con->query("UPDATE $table set status='paid' where `created_by` = '$user_id' and `id` = `$item_id`");

      }
    $con->close();

   }

   public static function getOrder($orderId, $mov, $pac = null, $user_id, $user_type,$item_id=null)
  {
      $getOrder = new GetOrder();
    // 3. Call PayPal to get the transaction details
    $client = PayPalClient::client();
    $response = $client->execute(new OrdersGetRequest($orderId));
    /**
     *Enable the following line to print complete response as JSON.
     */
    //print json_encode($response->result);


    // Get Transaction Details and save them to the Database

    $orderID = $response->result->id;
    $payerID = $response->result->payer->payer_id;
    $email = $response->result->payer->email_address;
    $name = $response->result->purchase_units[0]->shipping->name->full_name;
    $intent = $response->result->intent;
    $address = $response->result->purchase_units[0]->shipping->address->address_line_1;
    $address2 = $response->result->purchase_units[0]->shipping->address->admin_area_1;
    $address3 = $response->result->purchase_units[0]->shipping->address->admin_area_2;

    $postal_code =  $response->result->purchase_units[0]->shipping->address->postal_code;
    $country_code =  $response->result->purchase_units[0]->shipping->address->country_code;

    $currency_code = $response->result->purchase_units[0]->amount->currency_code;
    $gross_amount = $response->result->purchase_units[0]->amount->value;
    $movie_id = $mov;
    $package = $pac;
    $user = $user_id;
    $date = date('l jS \of F Y');


    //Get DB connection 

    require "db.php";

    $insertdata = $con->prepare("INSERT INTO `realtv_reg`(`orderID`, `payerID`, `userID`,`name`, `email`,
                               `address1`, `address2`, `address3`, `postal_code`, `country_code`, `currency_code`,
                                `gross_amount`, `intent`, `movie_id`, `package`, `user_type`) 
                                      VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $insertdata->bind_param("ssssssssssssssss", $orderID,$payerID,$user,$name,$email,$address,$address2,$address3,$postal_code,$country_code,$currency_code,$gross_amount,$intent, $movie_id, $package, $user_type);
    $insertdata->execute();

    if(!$insertdata){
        echo "Error " . mysqli_error($link);
    }else{
        $body = "
        <table width='100%' cellpadding='20' style='border-collapse: collapse; margin-bottom : 40px; font-family: Arial;'>
              
        <thead>
          <th  colspan='2' align='center'><img src='https://res.cloudinary.com/dluyx2qsq/image/upload/v1627507541/logo.png' alt='' width='200px' ></th>
        </thead>
            
        <thead>
          <th colspan='2' align='center' style=' color: white; background-color: #0d3e65; padding: 40px; font-size : 30px;'>Order Confirmed</th>
        </thead>

        <tbody>
            <tr >
                <td colspan='2' align='center'  style='padding: 10px; border:none; font-size: 20px; padding-top: 20px;'> Transaction Details </td>   
             </tr>
            <tr >
                <td align='left' style='padding: 10px; border-bottom: 1px solid #ffcc33;'>Order ID</td>
                <td  align='right' style='padding: 10px; border-bottom: 1px solid #ffcc33;'><b>$orderID</b></td>
            </tr>

            <tr>
                <td align='left' style='padding: 10px; border-bottom: 1px solid #ffcc33;'>Date</td>
                <td align='right' style='padding: 10px; border-bottom: 1px solid #ffcc33;'><b>$date</b></td>
            
            </tr>

            <tr>
                <td align='left' style='padding: 10px; border-bottom: 1px solid #ffcc33;'>Customer Name</td>
                <td  align='right' style='padding: 10px; border-bottom: 1px solid #ffcc33;'><b>$name</b></td>
            </tr>

            <tr>
              <td align='left' style='padding: 10px; border-bottom: 1px solid #ffcc33;'>Amount</td>
              <td  align='right' style='padding: 10px; border-bottom: 1px solid #ffcc33;'><b>$currency_code$gross_amount</b></td>
            </tr>


            
        </tbody>
              
            
        </table>
        ";
        if($item_id != null){
          $getOrder->updateStatus($user,$item_id, $user_type);
        }
        $getOrder->send_confirmation_mail($email, 'RealTV Registry Movie Registration Payment', $body);
        header('Location:../payment-success.php');
    }

    $insertdata->close();
    $con->close();
  }
}

/**
 *This driver function invokes the getOrder function to retrieve
 *sample order details.
 *
 *To get the correct order ID, this sample uses createOrder to create an order
 *and then uses the newly-created order ID with GetOrder.
 */
if (!count(debug_backtrace()))
{
  GetOrder::getOrder($orderid,$mov_id,$pac,$user_id, $user_type,$svdID);
}
?>