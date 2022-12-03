<?php
include('../controllers/product_controller.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="../css/product.css" rel="stylesheet">



</head>

<body>
    <header>
        <!-- navbar -->
        <!-- <div class="logo">
            <img src="../images/logo_black.svg">
        </div> -->
        <div class="main">
            <ul>
				<li class="active"><a href="admin_product.php">Products</a></li>
				<li><a href="admin_orders.php">Orders</a></li>
				<li><a href="admin_users.php">Users</a></li>
				<li><a href="../login/logout.php">Logout</a></li>
			</ul>
            </ul>
        </div>
    </header>

    <div class="container">
     <form method="POST" action="../actions/add_product.php" enctype="multipart/form-data" >


            <div class="form-group">
				<input class="form-control" type="text" placeholder="Product Title" name="prodtitle" >
			</div>
		
            <div class="form-row" style="padding-left:5px;">
                <!-- Getting all available product categories-->
                <div class="form-group" style="margin: 0 20px 0 0;">
                    <select class="form-control" aria-label="default select example" name = "prodcat" required="required" >
						<option value = "" default> -- Select Product Category --</option>
						<?php
                                    $category_list = selectallcat_ctr();

							foreach($category_list as $x){
						?>
						<option value = "<?php echo $x['cat_id'];?>"> <?php echo $x['cat_name']; }?></option>
                    </select>
                </div>

                <!-- Getting all available product brands-->
                <div class="form-group">
                    <select class="form-control" name="prodbrand" required = "required" >
						<option value = "" default> -- Select Product Brand --</option>
						<?php
                                $brand_list = selectallBrand_ctr();

							foreach($brand_list as $y){
						?>
						<option value = "<?php echo $y['brand_id'];?>"> <?php echo $y['brand_name']; }?></option>
                    </select>
                </div>
            </div>

			<div class="form-group">
				<input class="form-control" type="decimal" placeholder="Add Product Price" name="prodprice">
			</div>

			<div class="form-group">
				<textarea class="form-control" placeholder="Add Product Description" name="proddesc"></textarea>
			</div>

            <div class="form-group">
				<textarea class="form-control" placeholder="Enter Product Keywords" name="prodkeywords"></textarea>
			</div>

			<div class="form-group">
				<input type="file" id="image" name="prodimage" accept="image/*">
			</div>

			<button type="submit" class="btn btn-primary" name="submitprod"> Add Product </button>
		</form>
	</div>
	<br>
	<br>		


    <!-- displaying product table -->
    <div class="product-display">
        <table class="product-display-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>brand</th>
                    <th>category</th>
                    <th>price</th>
                    <th>description</th>
                    <th>keywords</th>
                    <th>image</th>
                    <th>Delete</th>
                    <th>Update</th>


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
                    <td><a href='../actions/delete_product.php?product_id={$aproduct['product_id']}' class= 'btn btn-primary'>Delete</a></td>
                    <td><a href='../view/update_product.php?product_id={$aproduct['product_id']}' class= 'btn btn-primary'>Update</a></td>";
                }
                ?>
            </tbody>
        </table>

        <!-- backend dynamic code goes here -->
        </table>
    </div>

    </div>




</body>

</html>