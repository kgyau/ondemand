
<?php
include('../controllers/customer_controller.php');

// $customer_id= $_GET['customer_id'];


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
   

</head>
<body>
    <header>
		<!-- navbar -->
		<!-- <div class="logo">
			<img src="../img/about.jpg">
		</div> -->
		<div class="main">
			<ul>
				<li><a href="admin_product.php">Products</a></li>
				<li><a href="admin_orders.php">Orders</a></li>
				<li class="active"><a href="admin_users.php">Users</a></li>
				<li><a href="../login/logout.php">Logout</a></li>
			</ul>
		</div>
	</header>
<br>
<br>
<br>
    <!-- adding a user -->
    <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Contact</th>
            <th>Delete</th>
            <th>Update</th>

         </tr>
         </thead>


        <tbody>
            <?php
                $customer = viewallcustomers_ctr();
                foreach ((array) $customer as $acustomer) {
                  // $customer_id = $acustomer['customer_id'];
                    
                    $name = $acustomer['customer_name'];
                    $email = $acustomer['customer_email'];
                    $city = $acustomer['customer_city'];
                    $contact = $acustomer['customer_contact'];
           
                    echo"
                    <tr>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$city</td>
                    <td>$contact</td>
                    <td><a href='../actions/delete_user.php?deletec={$acustomer['customer_id']}' class= 'btn btn-primary'>Delete</a></td>
                    <td><a href='../view/update_customer.php?customer_id={$acustomer['customer_id']}' class= 'btn btn-primary'>Update</a></td>";
                }
                ?>
        </tbody>

         
      </table>
   </div>


<!-- displaying product table -->
   

</div>




</body>
</html>



<div class="container-fluid px-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-4 col-lg-8 col-md-9 col-11 text-center">
                <form method="POST" action="../actions/add_product.php" enctype="multipart/form-data" >

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
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

    <br><br>