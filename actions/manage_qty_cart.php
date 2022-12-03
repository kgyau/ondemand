<?php
  include("../settings/core.php");
  require("../controllers/cart_controller.php");

 
 //for increase quantity in cart
 if (isset($_GET['inc'])) {
    $p_id= $_GET['inc'];
    $c_id= get_id();
    $qty=select_onefromcart_ctr($p_id,$c_id);
    $q1= $qty['qty'];
    $check= inc_itemcart_ctr($p_id,$c_id,$q1);
    if ($check) {
        header("location:../view/cart.php");
        
    } else {
      echo "Increase qty failure";
    }
 }



 //for decrease quantity in cart
 if (isset($_GET['dec'])) {
  $p_id= $_GET['dec'];
  $c_id= get_id();
  $qty=select_onefromcart_ctr($p_id,$c_id);
  $q1= $qty['qty'];
  $check= dec_itemcart_ctr($p_id,$c_id,$q1);
  if ($check) {
      header("location:../view/cart.php");
      
  } else {
    echo "decrease qty failure";
  }
}



?>