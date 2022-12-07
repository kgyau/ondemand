<?php
// session_start();
require('../controllers/product_controller.php');
// require('../controllers/customer_controller.php');
include("../settings/core.php");
$c_id = get_id();
$orders=viewallorders_ctr($c_id);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Purchase</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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


        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">ON<span class="text-secondary">Demand</span></h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="../index.php" class="nav-item nav-link active">Home</a>
                    <a href="../view/product.php" class="nav-item nav-link"> Products</a>
                    <a href="../view/contact.php" class="nav-item nav-link">Contact us</a>
                    <?php
            // session_start();
            if(isset($_SESSION['cid'])){
        ?>
                    <a class="nav-item nav-link" style="align-self: right;" href="../login/logout.php">Logout</a>
                    <?php
            }
        ?>

                </div>

                <div class="d-none d-lg-flex ms-2">
                    <?php
            if(isset($_SESSION['cid'])){
        ?>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="../view/product_search_result.php">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a>

                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="../view/cart.php">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                    <?php
            }
        ?>

                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



    <!-- <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s"> -->


    <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header px-4 py-5">
                            <!-- <a href='../view/shop.php' class='btn btn-secondary' class='right' >continue shopping</a> <br> -->

                            <h5 class="text-muted mb-0">Order for  <span style="color: #a8729a;"> <?php
                        if($orders==true){

                            foreach ( $orders as $anorder) { 
                            $customer_name = $anorder['customer_name'];
                            }}
                            ?> <?php echo $anorder['customer_name']; ?></span> is ready !</h5>
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
                                            <img src="<?php echo $product_image ?>" class="img-fluid" alt="img">
                                        </div>
                                        <div
                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0"><?php echo $product_title ?> </p>
                                        </div>
                                        <div
                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">White</p>
                                        </div>

                                        <div
                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
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
                                echo"This user has not purchased any products";
                                }
                                                            
                                ?>
                                <a href='../view/product.php'
                                class='btn btn-outline-primary border-2 py-2 px-4 rounded-pill'>continue shopping</a>
                        </div>
                    </div>
                </div>
            </div>


    </section>








    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary m-0">ON<span class="text-secondary">Demand</span></h1>

                    <p>Get all fish farming products Here! For a good fee</p>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Mamprobi,Accra</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+2332028129432</p>
                    <p><i class="fa fa-envelope me-3"></i>gifty.ofori-gyau@bov.gov.gh</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="../view/about.php">About Us</a>
                    <a class="btn btn-link" href="../view/contact.php">Contact Us</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Products available 24hours.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="../index.php">Ondemand</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!-- Designed By <a href="https://htmlcodex.com">HTML Codex</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <?php
    if($_SESSION["success_message"] == "success"){

?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Purchase Successful',
        showConfirmButton: false,
        timer: 4000,
    });
    // document.location.href="../view/payment_success.php";
    </script>



    <?php

    }

    ?>





</body>

</html>