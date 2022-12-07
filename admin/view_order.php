<?php
require('../controllers/customer_controller.php');
$customer_id = $_GET['customer_id'];
$orders=viewall_orders_ctr($customer_id);

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
    <link href="../css/admin_orders.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
 



<section class="h-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
          <!-- <a href='../view/shop.php' class='btn btn-secondary' class='right' >continue shopping</a> <br> -->

            <h5 class="text-muted mb-0">Order for <span style="color: #a8729a;"> <?php
                            if($orders==true){

               foreach ( $orders as $anorder) { 
                $customer_name = $anorder['customer_name'];
               }}
                ?> <?php echo $anorder['customer_name']; ?></span>!</h5>
          </div>

        

          <div class="card-body p-4">

           
           
            

              <?php
                            if($orders==true){

               foreach ( $orders as $anorder) {
                $orderid= $anorder['order_id'];
                $invoice = $anorder['invoice_no'];
                $date = $anorder['order_date'];
                $status = $anorder['order_status'];


                $amt = $anorder['amt'];
                $product_title = $anorder['product_title'];
                $customer_name = $anorder['customer_name'];
                $customer_email = $anorder['customer_email'];
                $product_image = $anorder['product_image'];



                // $product_image = $anorder['product_image'];
           
                ?>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
              <p class="small text-muted mb-0">Invoice : <?php echo $anorder['invoice_no']; ?></p>
              <p class="small text-muted mb-0">Date : <?php echo $date ?></p>

            </div>
                <div class="card shadow-0 border mb-4">
                  <div class="card-body">
                

                <div class="row">


                  <div class="col-md-2">
                    <img src="<?php echo $product_image ?>"
                      class="img-fluid" alt="img">
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0"><?php echo $product_title ?> </p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">White</p>
                  </div>
                 
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Price: <?php echo $amt ?></p>
                  </div>
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                <div class="row d-flex align-items-center">
                  <div class="col-md-2">
                    <p class="text-muted mb-0 small"> <?php echo $status ?> </p>
                  </div>
                </div>
              </div>
            </div>
            <?php

          


;}}else{
  echo"No orders for this user";
}
                            
?>
            
          <!-- <div class="card-footer border-0 px-4 py-5"
            style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
              paid: <span class="h2 mb-0 ms-2">$1040</span></h5>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</section>
            

         
          </div>
          <!-- <div class="card-footer border-0 px-4 py-5"
            style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
              paid: <span class="h2 mb-0 ms-2">$1040</span></h5>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>