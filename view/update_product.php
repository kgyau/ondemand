<?php
include('../controllers/product_controller.php');
$prod_id = $_GET['product_id'];
$product = viewoneprod_ctr($prod_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Product</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/product.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">



</head>

<body>

    <?php
		
	?>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <form method="post" action="../actions/updateprod_process.php" enctype="multipart/form-data">
                    <div class="card">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $product['product_id']?> " name="product_id"required>
                            <label for=""> Choose Category</label>
                            <select name='category'>
                                <option>category</option>

                                <?php
                                    $category = selectallcat_ctr();
                                    if($category){
                                        foreach((array) $category as $acategory){
                                            $cat_id= $acategory['cat_id'];
                                            $cat_name=$acategory['cat_name'];
                                            echo "<option value= '$cat_id'> $cat_name </option>";
                                        }
                                    }else{
                                        echo "<option value= 'no found'> Category cannot be found</option>";
                                    }
                                  ?>

                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for=""> Choose Brand</label>
                            <select name="brand" id="">
                                <option>brand</option>

                                <?php
                                        $brand= selectallBrand_ctr();
                                        if($brand){
                                            foreach($brand as $abrand){
                                                $brand_id= $abrand['brand_id'];
                                                $brand_name=$abrand['brand_name'];
                                                echo "<option value= '$brand_id'> $brand_name </option>";
                                            }
                                        }else{
                                            echo "<option value= 'no found'> Brand cannot be found</option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Title</label><br>
                            <input type="text" value="<?php echo $product['product_title']?> " placeholder="Update"
                                name="product_title">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?php echo $product['product_price']?> " placeholder="Update"
                                name="product_price">
                            <label for="">Price</label><br>
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?php echo $product['product_desc']?> " placeholder="Update"
                                name="product_desc">
                            <label for="">Description</label><br>
                        </div>

                        <div class="form-group">
                            <input type="radio" name="rental" value="Rental">Rental <br>
                            <input type="radio" name="rental" value="Non-Rental">Non-rental
                        </div>


                        <div class="form-group">
                            <label for="">Image</label><br>
                            <input type="file" class="form-control-file" name="prodimage">
                        </div>

                        <div class="form-group">
                            <input type="text" value="<?php echo $product['product_keywords']?> " placeholder="Update"
                                name="product_keywords">
                            <label for="">Keywords</label><br>
                        </div>
                        </br>
                        <button name="Updatep" class= "btn btn-primary"> Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>