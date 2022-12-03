<?php
    include ("../settings/core.php");
    require("../controllers/cart_controller.php");
    $url = "https://api.paystack.co/transaction/initialize";
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

    //open connection
    $ch = curl_init();
    
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer sk_test_eff444b2ff08c895145928ec0d9064609cdbe20c","Cache-Control: no-cache",));
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

    $i=0;

    // print_r($cartitems);

    while($i < count($cartitems)){
      order_details_ctr($order_id,$cartitems[$i]['product_id'],$cartitems[$i]['qty']);
      $i++;
    }
      
  } 

?>
<!-- <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script >
Swal.fire({
  icon: 'success',
  title: 'Purchase Successful',
  showConfirmButton: false,
 timer: 4000,
})
    // document.location.href="../view/payment_success.php";
    
</script>

