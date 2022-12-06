<?php

//making action aware of controller
require("../controllers/customer_controller.php");
// require("../controllers/product_controller.php");
// collecting form data
if(isset($_POST['lsubmit'])){
  // placing in variables
  $email = $_POST['email'];
  $password=$_POST['password'];
    

  $check = select_onecustomer_ctr($email);

  $pickedpassword= $check['customer_pass'];

  // echo $email, $password;
  $_SESSION["success_message"] = "success";


  if($check){
      // set session for id and user role 
      
    if(password_verify($password,$pickedpassword)){
      // echo 'successful'
      session_start();
      $_SESSION['cid'] = $check['customer_id'];
      $_SESSION['role'] = $check['user_role'];
      $_SESSION['name'] = $check['customer_name'];

      
     
      if ($_SESSION['role'] == 1) header("Location: ../admin/admin_users.php");
        else header("Location: ../index.php");
      
    }
      else{
        echo header("Location: ../error/login_error.php");
      }
            
    
  }
  else{
      echo "Login Failed";
  }
}

?>


