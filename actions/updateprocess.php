<?php

//making actuioin aware fof controller
include("../controllers/product_controller.php");





// collecting form data
if (isset($_POST['updateme'])) {
    // I AM INTERESTED INN THE TWO OTHE RITEMS AND PUTTIGN THEM IN A VARIABLE
    $bid= $_POST['bid'];
    $bname = $_POST['name_of_brand'];

    // echo $bname;



    $result = editBrand_ctr($bid,$bname);
    
    if ($result) {
        header('location: ../admin/Brand.php');
    } else{
        echo 'error';
    }
}

?>
