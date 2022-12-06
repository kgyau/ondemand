<?php
include("../controllers/customer_controller.php");


// session_start();

if(isset($_POST['Updatec']))
  {
    $customer_id=$_POST['customer_id'];
    $name=$_POST['customer_name'];
    $email=$_POST['customer_email'];
    $city=$_POST['customer_city'];
    $contact=$_POST['customer_contact'];
    $userrole = 2;


    // echo "$name,$email,$country,$city,$contact,$userrole";
    $results = editcustomer_ctr($customer_id,$name,$email,$city,$contact);
    
    
    if ($results) {
      header('location: ../admin/admin_users.php');
  } else {
      echo 'Update Failed. Try again';
  }

  }

?>


