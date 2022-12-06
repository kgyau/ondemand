<?php
include('../controllers/product_controller.php');

if(isset($_POST['Updatep'])){
   $prod_id=$_POST['product_id'];
   $productcat=$_POST['category'];
   $productbrand=$_POST['brand'];
   $prod_title=$_POST['product_title'];
   $productprice=$_POST['product_price'];
   $prod_desc=$_POST['product_desc'];
   $prod_key=$_POST['product_keywords'];
   $rental=$_POST['rental'];


   $prodimage =$_FILES['prodimage']['name'];
   $targetdir= "../images/products/";
   $image = $targetdir . $prodimage;
   $file = '../images/products/' .basename($_FILES["prodimage"]["name"]);

   move_uploaded_file($_FILES["prodimage"]["tmp_name"],$file);
   

  

   $result= editprod_ctr($prod_id,$productcat,$productbrand,$prod_title,$productprice,$prod_desc,$prod_key,$prodimage,$rental);
   echo "$prod_id id ,$productcat cat,$productbrand bran,$prod_title tit,$productprice prioc,$prod_desc des,$prod_key ke,$prodimage ima,$rental tip";


   if($result==True){
    header("location:../admin/admin_product.php");
   }

   else{
    echo "Could not update";
   }
}
?>