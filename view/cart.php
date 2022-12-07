<?php
include("../controllers/cart_controller.php");
include("../settings/core.php");

$c_id = get_id();
$cartitems = viewcart_ctr($c_id);
$email=email_ctr($c_id);
$email= $email['customer_email'];
$total= select_total_qty_from_cart_ctr($c_id);
$total=$total[0];
$total1=$total['SUM(qty)'];
$grandtotal=select_total_price_ctr($c_id);
$grandtotal=$grandtotal[0];
$grandtotal1=$grandtotal['SUM(products.product_price*cart.qty)'];


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OnDemand website Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../lib/animate/animate.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">



    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
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
    <a href="../index.php" class="navbar-brand ms-4 ms-lg-0">
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



    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="../index.php">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->




    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Cart items</h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->

                            <?php
                            if($cartitems==true){

                            
                            foreach ($cartitems as $oneitem) {
                                $product_id = $oneitem['product_id'];
                                $product_title = $oneitem['product_title'];
                                $product_price = $oneitem['product_price'];
                                $product_image = $oneitem['product_image'];
                                $product_qty =  $oneitem['qty'];
					            $itemtotal_price= $product_price * $product_qty;
                            
                            


                                if ($product_qty == 1){
                                    echo " 
                                    <div class='row'>
                                    <div class='col-lg-3 col-md-12 mb-4 mb-lg-0'>
                                    <!-- Image -->
                                    <div class='bg-image hover-overlay hover-zoom ripple rounded'
                                    data-mdb-ripple-color='light'>
                                    <img src=' ../images/$product_image' class='card-img-top' style='height: 200px ; ' >
                                        <div class='mask' style='background-color: rgba(251, 251, 251, 0.2)'></div>
                                    </a>
                                    </div>
                                    <!-- Image -->
                                    </div>
                                        
                                    <div class='col-lg-5 col-md-6 mb-4 mb-lg-0'>

                                        <!-- Data -->
                                        <p><strong>Name: $product_title</strong></p>
                                        <p><strong>Price:  GHS $product_price</strong></p>
                                        <p><strong>Quantity: $product_qty</strong></p>
                                      
						                <a href='../actions/deletefromcart.php?deletecart={$cartitems['product_id']}' class='btn btn-primary'>Remove</a>
						               
        
                                        <!-- Data -->
                                        </div>
                                        <div class='col-lg-4 col-md-6 mb-4 mb-lg-0'>

                                        <div class='d-flex mb-4' style='max-width: 300px'>
                                        <a href='../actions/manage_qty_cart.php?dec=$product_id' class='btn btn-primary'>-</a>

                                            
                                        <!-- Quantity -->
                                              <div>
                                                <p> Quantity </p>
                                              </div>
                                                 <a href='../actions/manage_qty_cart.php?inc=$product_id' class='btn btn-primary'>+</a>
                                            </div>
                                        <!-- Quantity -->
                                    </div>
                                    </div>
                                    <!-- Single item -->
                                    <hr class='my-4'/>";}
 
                             
                            else{
                                echo" 
                                <div class='row'>
                                <div class='col-lg-3 col-md-12 mb-4 mb-lg-0'>
                                <!-- Image -->
                                <div class='bg-image hover-overlay hover-zoom ripple rounded'
                                data-mdb-ripple-color='light'>
                                <img src=' ../images/$product_image' class='card-img-top' style='height: 200px ; ' >
                                    <div class='mask' style='background-color: rgba(251, 251, 251, 0.2)'></div>
                                </a>
                                </div>
                                <!-- Image -->
                                </div>
                                    
                                <div class='col-lg-5 col-md-6 mb-4 mb-lg-0'>

                                    <!-- Data -->
                                    <p><strong>Name: $product_title</strong></p>
                                    <p><strong>Price:  GHS $product_price</strong></p>
                                    <p><strong>Quantity: $product_qty</strong></p>
                                  
                                    <a href='../actions/deletefromcart.php?deletecart={$cartitems['product_id']}' class='btn btn-primary'>Remove</a>
                                   
    
                                    <!-- Data -->
                                    </div>
                                    <div class='col-lg-4 col-md-6 mb-4 mb-lg-0'>

                                    <div class='d-flex mb-4' style='max-width: 300px'>
                                    <a href='../actions/manage_qty_cart.php?dec=$product_id' class='btn btn-primary'>-</a>

                                        
                                    <!-- Quantity -->
                                          <div>
                                            <p> Quantity </p>
                                          </div>
                                             <a href='../actions/manage_qty_cart.php?inc=$product_id' class='btn btn-primary'>+</a>
                                        </div>
                                    <!-- Quantity -->
                                </div>
                                </div>
                                <!-- Single item -->
                                <hr class='my-4'/>";
                            }
                        } }else {
                            echo"
                            The Cart is empty
                            ";
                        }

                            ?>
                            <?php
                             if($cartitems==true){
                                echo" <a href='../view/product.php'
                                class='btn btn-outline-primary border-2 py-2 px-4 rounded-pill'>continue shopping</a>";
                             }
                            ?>
                            
                            <!-- <a href='../view/payment.php'
                                class='btn btn-outline-primary border-2 py-2 px-4 rounded-pill'>Proceed to payment</a> -->

                        </div>
                    </div>
                </div>



                <div class ='col-md-3'>
                    <div class='card mb-4'>
                        <div class='card-header py-3'>
                            <h5 class='mb-0'>Summary</h5>
                        </div>
                <?php
                            foreach ($cartitems as $oneitem) {
                                $product_id = $oneitem['product_id'];
                                $product_title = $oneitem['product_title'];
                                $product_price = $oneitem['product_price'];
                                $product_image = $oneitem['product_image'];
                                $product_qty =  $oneitem['qty'];
					            $itemtotal_price= $product_price * $product_qty;
                            
                                if ($product_qty == 1) {
                 echo"
               
                        <div class='card-body'>
                            <ul class='list-group list-group-flush'>
                                <li
                                    class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0'>
                                    Product
                                    <span>$product_title</span>
                                </li>
                                <li class='list-group-item d-flex justify-content-between align-items-center px-0'>
                                    Pick-up
                                    <span>Head Office</span>
                                </li>
                                <li
                                    class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3'>
                                    <div>
                                        <strong>Total amount</strong>
                                        <strong>
                                            <p class='mb-0'>(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong>GHS $itemtotal_price</strong></span>
                                </li>
                            </ul>
                            </div>
                            ";
                        } else{
                            echo " 
                        
                        <div class='card-body'>
                            <ul class='list-group list-group-flush'>
                                <li
                                    class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0'>
                                    Products
                                    <span>$product_title</span>
                                </li>
                                <li class='list-group-item d-flex justify-content-between align-items-center px-0'>
                                    Shipping
                                    <span>Gratis</span>
                                </li>
                                <li
                                    class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3'>
                                    <div>
                                        <strong>Total amount</strong>
                                        <strong>
                                            <p class='mb-0'>(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong>GHS $itemtotal_price</strong></span>
                                </li>
                            </ul>
                         </div>";
                        }}
                    ?>


                            <?php
                             if($cartitems==true){
                                echo"<a href='../view/payment.php' class='btn btn-primary btn-lg btn-block'>
                                Go to checkout
                            </a>";
                             }
                            ?>

                           
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">F<span class="text-secondary">oo</span>dy</h1>
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                        stet lorem sit clita</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
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
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->



 <!-- Back to Top -->
 <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>




</body>

</html>

