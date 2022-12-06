<?php

include ("../settings/core.php");
require("../controllers/cart_controller.php");

 if (isset($_GET['product_id'])) {
    //product id
    $p_id= $_GET['product_id'];
    //customer id
    $c_id= get_id();
    //client IP address
     $ip_add= $_SERVER['REMOTE_ADDR'];
     //quantity
     $qty= 1;
     $checkduplicate=duplicatecheck_ctr($p_id,$c_id);

     if($checkduplicate!=""){ 

      $_SESSION["alreadycart"] = "error";
      header("location:../view/product.php");

            
      ;

     } else {
   $result= addtocart_ctr($p_id,$ip_add,$c_id,$qty);
       if($result){
         header("location:../view/cart.php");
       }else {
         echo"fail";
       }
     }
   //   echo "$p_id pid,$c_id cid,$ip_add ipadd,$qty qty";

   
}


// $result= addtocart_ctr($p_id,$ip_add,$c_id,$qty);
   

//    $checkduplicate=duplicatecheck_ctr($p_id,$c_id);

//    if($checkduplicate) {
//     echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
//     echo "The following errors occured<br><br>";
//    //  echo $checkduplicate;
//     echo "</div>";
//    }else {
//             header("location:../view/cart.php");
         

//    }









    //duplicate checker
         //  $result= addtocart_ctr($p_id,$ip_add,$c_id,$qty);
         // if ($result) {
         //          header("location:../view/cart.php");
               
         // } else {
         //    echo "fail";
         // }
         // }
   
 
         // $checkduplicate=duplicatecheck_ctr($p_id,$c_id);
 
 

?>
 
