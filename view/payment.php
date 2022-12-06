<?php
require('../controllers/cart_controller.php');
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
    <title>Payment</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



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
        <a class="nav-item nav-link" style="align-self: right;" href="login/logout.php">Logout</a>
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
            <h1 class="display-3 mb-3 animated slideInDown">Checkout</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


  
    


    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Checkout</h5>
                    </div>
                   

                    <?php
                            foreach ($cartitems as $oneitem) {
                                $product_id = $oneitem['product_id'];
                                $product_title = $oneitem['product_title'];
                                $product_price = $oneitem['product_price'];
                                $product_image = $oneitem['product_image'];
                                $product_qty =  $oneitem['qty'];
					            $itemtotal_price= $product_price * $product_qty;
                            



                                echo "
                                <div class='card-body'>
                                <ul class='list-group list-group-flush'>
                                    <li
                                        class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0'>
                                        Product Name
                                        <span>$product_title</span>
                                        

                                    </li>

                                    <li class='list-group-item d-flex justify-content-between align-items-center px-0'>
                                    Price
                                    <span>GHS$product_price</span>
                                    </li>

                                    <li class='list-group-item d-flex justify-content-between align-items-center px-0'>
                                        Quantity
                                        <span>$product_qty</span>
                                    </li>
                                    <li
                                        class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3'>
                                        <div>
                                            <strong>Total amount</strong>
                                            <strong>
                                                <p class='mb-0'>(including VAT)</p>
                                            </strong>
                                        </div>
                                        <span><strong>GHS$itemtotal_price</strong></span>

                                    </li>
                                    <li
                                    class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3'>
                                    <div>
                                        <strong>Final Amount</strong>
                                        <strong>
                                            <p class='mb-0'></p>
                                        </strong>
                                    </div>
                                    <span><strong>GHS$grandtotal1</strong></span>

                                </li>
                                </ul>
                               
                               </div>
                               ";
                                }
                                
                            ?>
                          

                        <div class="card-footer">
						<form action="../actions/payment_process.php" method="POST"> 
							<input type="hidden" id="email"  name="email" value="<?php echo $email; ?>" >
							<input type="hidden" id="amt"  name="amount" value="<?php echo $grandtotal1; ?>">
							<input type="hidden" id="c_id"name="customerid" value="<?php echo $c_id; ?>"> 
							<input type="hidden" id="p_qty" name="prod_quantity" value="<?php echo $product_qty; ?>"> 
							<input type="hidden" id="prod_id" name="prod_id" value="<?php echo $product_id; ?>"> 



							<button class='btn btn-primary btn-lg btn-block' type="submit" name="pay_now"  onclick=payWithPaystack() id="pay-now"  >Pay now</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- https://paybox.com.co/pay -->





    <script>




    //const paymentForm = document.getElementById('paymentForm');
    //paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(){
    event.preventDefault();

    let handler = PaystackPop.setup({
        key: 'pk_test_0ecfee73d182a155d2d4c95e059fc6ab143a5554', // Replace with your public key
        email: document.getElementById("email").value,
        amount: document.getElementById("amt").value * 100,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        currency:'GHS',
        // label: "Optional string that replaces customer email"
        onClose: function(){
      alert('Window closed.');
    },callback: function(response){  
        // let message = 'Payment complete! Reference: ' + response.reference;  alert(message);
        $.ajax({
      	url: '../actions/payment_process.php?reference='+ response.reference+'&email='+document.getElementById("email").value+'&amount='+document.getElementById("amt").value+'&c_id='+document.getElementById("c_id").value+'&p_qty='+
          document.getElementById("p_qty").value+'&prod_id='+document.getElementById("prod_id").value,
      	method: 'get',
      	success: function () {
      // the transaction status is in response.data.status
    //   alert(response);
       window.location = "../view/payment_success.php";
    //    return false;

    //    document.location.href="../view/payment_success.php";
  }
});
    }
});


handler.openIframe();

}

</script> 

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