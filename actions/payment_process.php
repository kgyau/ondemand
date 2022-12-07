<?php

  include ("../settings/core.php");
  require("../controllers/cart_controller.php");
  $url = "https://api.paystack.co/transaction/initialize";
  get_id();
  $email = $_GET['email'];
  // $amt = $_GET['amt'];
  $amt =$_GET['amount'];
  // $amt=select_one_price_ctr($amt);
  $qty =$_GET['p_qty'];
  $c_id =get_id();
 $p_id=$_GET['prod_id'];


  $cartitems = viewcart_ctr($c_id);

  

  $fields = [

    'email' => $email,
    'amt' => "$amt"
  ];

  $fields_string = http_build_query($fields);

  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer sk_live_497a3a223893acf3ff8ecfd4dce1158b2fc9b088","Cache-Control: no-cache",));
  // sk_live_497a3a223893acf3ff8ecfd4dce1158b2fc9b088
  // sk_test_3cad4886be207b2ea11d086f457a79e9fffa3547
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  //execute post
  $result = curl_exec($ch);
//  echo $result;

  
  if ($result) {
      //save transaction in order table
  $invoice_no=mt_rand();
  $customer_id= get_id();
  $status='Success';
  $payment_date=date('Y-m-d');
  $order= order_ctr($customer_id,$invoice_no,$payment_date,$status);
  
  //  echo "$customer_id,inv$invoice_no,pay$payment_date,sta$status";
  
  //save payment details
  
  $order_id= order_id_ctr($invoice_no);
  $order_id=$order_id['order_id'];
  $currency= 'GHS';
  $payment= payment_ctr($amt,$customer_id,$order_id,$currency,$payment_date);
    
  // echo"<br>amount$amt,cus$customer_id,ord$order_id,curr$currency,pay$payment_date";

  $delete = delete_all_from_cart_ctr($c_id);



  $i=0;

  // print_r($cartitems);

  while($i < count($cartitems)){
    order_details_ctr($order_id,$cartitems[$i]['product_id'],$cartitems[$i]['qty']);
    $i++;
  }
    
  $_SESSION["success_message"] = "success";


} 

?>

