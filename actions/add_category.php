<!-- insert update and delete user interaction to database -->

<?php

//making actuioin aware fof controller
include("../controllers/product_controller.php");


// collecting form data
if(isset($_POST['submitc'])){
 // I AM INTERESTED INN THE TWO OTHE RITEMS AND PUTTIGN THEM IN A VARIABLE
  $catname =$_POST['name_of_cat'];

$result = addproductcat_ctr($catname);
if ($result) {
    header('location: ../admin/Category.php');
} else{
    echo 'error';
}
}

?>

