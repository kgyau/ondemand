<?php
include('../controllers/product_controller.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="../css/product.css" rel="stylesheet">
    <title>products</title>
</head>

<body>



    <br>
    <h1> Add products</h1>
    <br>
    <!-- <a class="btn btn-primary" href="../actions/Add_brand.php" role="button">insert</a> -->
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <form action="../actions/add_product.php" method="POST" enctype="multipart/form-data" >

                    <div class="card">
                        <div class="form-group">
                            <label for="prodtitle"><b>Product Title</b></label>
                            <input type="text" placeholder="Enter Product Name" name="prodtitle" required>
                        </div>

                        <div class="form-group">
                            <label for="brands">Choose Product Brand:</label>
                            <select class="form-control" name="prodbrand">
                                <option> Select Brand </option>
                                <?php 
                                $brand_list = selectallBrand_ctr();
                                if ($brand_list) {

                                    foreach ((array) $brand_list as $one_brand) {
                                        $brand_id = $one_brand['brand_id'];
                                        $brand_name = $one_brand['brand_name'];
                                        echo "<option value='$brand_id' > $brand_name </option>";
                                    }
                                }else{
                                    echo "<option value='no_found'>No Brand found</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <br><br>



                        <div class="form-group">
                            <label for="prods">Choose Product Category:</label>
                            <select class="form-control" name="prodcat">
                                <option> Select Category </option>
                                <?php 
                                    $category_list = selectallcat_ctr();
                                    if ($category_list) {
                                        foreach ((array) $category_list as $one_category) {
                                            $cat_id = $one_category['cat_id'];
                                            $cat_name = $one_category['cat_name'];
                                            echo "<option value='$cat_id'>$cat_name</option>";
                                        }
                                    }else{
                                        echo "<option value='no_found'>No Category found</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                        <br><br>

                        <div class="form-group">
                            <label for="prodprice"><b>Product Price (in Ghana Cedis)</b></label>
                            <input type="text" placeholder="Enter Product Price (Ghana Cedi)" name="prodprice" required>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="proddesc"><b>Product Description</b></label>
                            <input type="text" placeholder="Enter Product Description" name="proddesc" required>
                        </div>

                        <div class="form-group">
                            <label for="prodkeywords"><b>Product keyword</b></label>
                            <input type="text" placeholder="Enter Product keyword" name="prodkeywords" required>
                        </div>

                        <div class="form-group">
                            <label class="image" for="prodimage">Select Product Image:</label>
                            <input type="file" class="form-control-file" name="prodimage" id="prodimage">
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6">
                                <button type="submit" value="Add new product" name="submitprod" class="btn btn-primary">Add Product</button>
                               <a href='../view/all_product.php' value="Add new product"class= "btn btn-primary">View products</a>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</body>

</html>


<!-- get and post variable for forms php -->