<?php
// include('../controllers/product_controller.php');
require('../controllers/customer_controller.php');


// $orders=viewall_orders_ctr($order_id);

// $customer = viewallcustomers_ctr();



?>

<!doctype html>
<html lang="en">
  <head>
    <title>Orders</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <link href="../css/admin_orders.css" rel="stylesheet"> -->
 
    <link rel="stylesheet" href="../css/admin.css">
   <link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="../css/style.css" rel="stylesheet">


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
                    <a href="admin_product.php" class="nav-item nav-link ">Products</a>
                    <a href="admin_orders.php" class="nav-item nav-link active">Orders</a>
                    <a href="admin_users.php" class="nav-item nav-link">Users </a>
                    <a href="../login/logout.php" class="nav-item nav-link">Logout</a>
                </div>
               
            </div>
        </nav>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- Navbar End -->

 <!-- adding a user -->
 <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Name</th>
            <th>Email</th>
            <th>view Order</th>

         </tr>
         </thead>


        <tbody>
            <?php
                $customer = viewallcustomers_ctr();
                foreach ((array) $customer as $acustomer) {
                   $customer_id = $acustomer['customer_id'];
                    
                    $name = $acustomer['customer_name'];
                    $email = $acustomer['customer_email'];
                 
           
                    echo"
                    <tr>
                    <td>$name</td>
                    <td>$email</td>
                    <td><a href='../admin/view_order.php?customer_id={$acustomer['customer_id']}' class= 'btn btn-primary'>View</a></td>";
                }
                ?>
        </tbody>

         
      </table>
   </div>



</body>
</html>