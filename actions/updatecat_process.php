<?php

//making actuioin aware fof controller
include("../controllers/product_controller.php");





// collecting form data
if (isset($_POST['updatec'])) {
    // I AM INTERESTED INN THE TWO OTHE RITEMS AND PUTTIGN THEM IN A VARIABLE
    $catid= $_POST['cid'];
    $catname = $_POST['name_of_cat'];

    $result = editcat_ctr($catid,$catname);
    
    if ($result) {
        header('location: ../admin/Category.php');
    } else{
        echo 'error';
    }
}

?>
