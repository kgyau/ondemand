<?php
//making actuioin aware fof controller
include("../controllers/product_controller.php");



// collecting form data
if(isset($_POST['submitprod'])){
    // for image 
    // var_dump($pic);
 // I AM INTERESTED INN THE TWO OTHE RITEMS AND PUTTIGN THEM IN A VARIABLE
    
    $prodcat =$_POST['prodcat'];
    $prodbrand =$_POST['prodbrand'];
    $prodtitle =$_POST['prodtitle']; 
    $prodprice =$_POST['prodprice'];
    $proddesc =$_POST['proddesc'];
    $prodkeywords=$_POST['prodkeywords'];
    $rental=$_POST['rental'];
    $prodimage =$_FILES['prodimage']['name'];
    
    $targetdir= "../images/products/";
    $image = $targetdir . $prodimage;
    $file = '../images/products/' .basename($_FILES["prodimage"]["name"]);
    move_uploaded_file($_FILES["prodimage"]["tmp_name"],$file);
    
    // echo"$prodcat,$prodbrand,$prodtitle,$prodprice,$file";

//    echo "<img src='$file'>";
    
//    echo $prodcat,$prodtitle,$prodprice,$prodbrand,$proddesc,$prodimage,$prodkeywords,$rental; 


  $result = addproduct_ctr($prodcat,$prodbrand,$prodtitle,$prodprice,$proddesc,$file,$prodkeywords,$rental);

    if ($result) {

        if (move_uploaded_file($_FILES["prodimage"]["tmp_name"],"../images/product/".$_FILES["prodimage"]["name"])) {
            echo "success";
    
        }else {
            echo "fail";
        }
        header("location:../admin/admin_product.php");

    } else{
         header("location:../admin/admin_product.php");
    }

}

?>