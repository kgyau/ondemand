<?php
require('../controllers/product_controller.php');
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="Kwame Ofori-Gyau" content="WebTecher">

    <title>All products</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootsrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/product.css" rel="stylesheet">

</head>


<body>

    <h4>All Products</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Product Title</th>
                <th>Product Brand</th>
                <th>Product Category</th>
                <th>Product Price</th>
                <th>Product Description</th>
                <th>Product Keyword</th>
                <th>Product image</th>
                <th>Add to cart</th>

            </tr>
        </thead>

        <tbody>
            <?php
                $product = viewallprod_ctr();
                foreach ((array) $product as $aproduct) {
                    
                    $product_title = $aproduct['product_title'];
                    $pcat = $aproduct['product_cat'];
                    $pbrand = $aproduct['product_brand'];
                    $pprice = $aproduct['product_price'];
                    $pdesc = $aproduct['product_desc'];
                    $pkey = $aproduct['product_keywords'];
                    $product_image = $aproduct['product_image'];
                    
                    echo"
                    <tr>
                    <td>$product_title</td>
                    <td>$pcat</td>
                    <td>$pbrand</td>
                    <td>$pprice</td>
                    <td>$pdesc</td>
                    <td>$pkey</td>
                    <td><img src=' ../images/$product_image' class='card-img-top' style='width: 50px; height: 50px ; ' ></td>
                    <td><a href='../actions/add_to_cart.php?product_id={$aproduct['product_id']}' class='btn btn-primary'>Add to Cart</a></td>
                    <td><a href='../view/single_product.php?product_id={$aproduct['product_id']}' class= 'btn btn-primary'>View</a></td>
                    <td><a href='../view/update_product.php?product_id={$aproduct['product_id']}' class= 'btn btn-primary'>Update</a></td>";
                }
                ?>
        </tbody>
    </table>

</body>

</html>