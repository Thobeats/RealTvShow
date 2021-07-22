<?php

namespace Sample;

require '../vendor/autoload.php';
//1. Import the PayPal SDK client that was created in `Set up Server-Side SDK`.
use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

require('../PaypalClient.php');


if(isset($_GET['orderID'])){
  $orderid = $_GET['orderID'];
}


class GetOrder
{

  // 2. Set up your server to receive a call from the client
  /**
   *You can use this function to retrieve an order by passing order ID as an argument.
   */


   public static function getOrder($orderId)
  {

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


    //Get DB connection 

    require "db.php";

    $insertdata = $con->prepare("INSERT INTO `realtv_reg`(`orderID`, `payerID`, `name`, `email`,
                               `address1`, `address2`, `address3`, `postal_code`, `country_code`, `currency_code`,
                                `gross_amount`, `intent`) 
                                      VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
    $insertdata->bind_param("ssssssssssss", $orderID,$payerID,$name,$email,$address,$address2,$address3,$postal_code,$country_code,$currency_code,$gross_amount,$intent);
    $insertdata->execute();

    if(!$insertdata){
        echo "Error " . mysqli_error($link);
    }else{
        header('location: ../payment-success.php');
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
  GetOrder::getOrder($orderid, true);
}
?>