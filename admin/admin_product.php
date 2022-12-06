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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="../css/product.css" rel="stylesheet">
 
<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="../lib/animate/animate.css" rel="stylesheet">
<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="../css/style.css" rel="stylesheet">

</head>

<body>

 
   <!-- Navbar Start -->
   <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.9s">
            <a href="../index.php" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">ON<span class="text-secondary">Demand</span></h1>

            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="admin_product.php" class="nav-item nav-link active">Products</a>
                    <a href="admin_orders.php" class="nav-item nav-link">Orders</a>
                    <a href="admin_users.php" class="nav-item nav-link ">Users </a>
                    <a href="../login/logout.php" class="nav-item nav-link">Logout</a>
                </div>
               
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <!-- Navbar End -->
<!-- 
    <header>
       
        <div class="main">
            <ul>
				<li class="active"><a href="admin_product.php">Products</a></li>
				<li><a href="admin_orders.php">Orders</a></li>
				<li><a href="admin_users.php">Users</a></li>
				<li><a href="../login/logout.php">Logout</a></li>
			</ul>
            </ul>
        </div>
    </header> -->

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
            <input type="radio" name="rental" value="Rental">Rental <br>
            <input type="radio" name="rental" value="Non-Rental">Non-rental
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
                $product = selectallprod_ctr();
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