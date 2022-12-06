<?php


include ("../settings/core.php");
require("../controllers/cart_controller.php");
$url = "https://paybox.com.co/invoice";




$email = $_POST['email'];
// $amt = $_POST['amt'];
$amt =$_POST['amount'];
// $amt=select_one_price_ctr($amt);
$qty =$_POST['prod_quantity'];
$c_id =$_POST['customerid'];
$prod_id=$_POST['prod_id'];

$cartitems = viewcart_ctr($c_id);

$fields = [

    'email' => $email,
    'amt' => "$amt"
  ];

  $fields_string = http_build_query($fields);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',

  CURLOPT_POSTFIELDS => array(
  'currency' => 'GHS',
  'amount' => "$amt",
  'payerName' => "$customer_name",'payerPhone' => '+233',
  'payerEmail' => "$email",
   ),
    
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ' $key
  ),

));

$response = curl_exec($curl);

echo $response;
curl_close($curl);

?>