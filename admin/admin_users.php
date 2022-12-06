
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
                    <a href="admin_product.php" class="nav-item nav-link">Products</a>
                    <a href="admin_orders.php" class="nav-item nav-link">Orders</a>
                    <a href="admin_users.php" class="nav-item nav-link active">Users </a>
                    <a href="../login/logout.php" class="nav-item nav-link">Logout</a>
                </div>
                
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

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
