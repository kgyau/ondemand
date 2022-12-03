<!-- insert update and delete user interaction to database -->

<?php

//making actuioin aware fof controller
include("../controllers/product_controller.php");


// collecting form data
if(isset($_POST['submitb'])){
 // I AM INTERESTED INN THE TWO OTHE RITEMS AND PUTTIGN THEM IN A VARIABLE
  $brandname =$_POST['name_of_brand'];

$result = addBrand_ctr($brandname);
if ($result) {
    header('location: ../admin/Brand.php');
} else{
    echo 'error';
}
}

?>

