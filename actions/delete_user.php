<?php
include("../controllers/customer_controller.php");




if (isset($_GET['deletec'])) {

    $customer_id= $_GET['deletec'];
    $check= deleteOnecustomer_ctr($customer_id);
  
    if ($check) {
        header("location:../admin/admin_users.php");
        
    } else {
      echo "Not Deleted";
    }
 }






?>