<?php
require('../controllers/product_controller.php');

if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];

    // call the function
    $result = delete_product_ctr($id);

    if ($result === true) {
        header('Location: ../admin/admin_product.php');
    } else {
        echo 'deletion failed';
    }
}


?>