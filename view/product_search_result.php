<?php

include("../controllers/product_controller.php");
$category_list = selectallcat_ctr();
$cat_id;
  if(isset($_POST['searchb'])) {
    // $text= $_POST['searchtext'];
    $searchitem = searchprod_ctr($_POST['searchtext'],$cat_id);
  }

  //to query add or product_keywords LIKE '%$jdf%'

?>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
    <link href="../css/search.css" rel="stylesheet"/>

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
            session_start();
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
    <div class="s131">
        <form method="POST" action="../view/searchresults.php">



            <div class="inner-form">

                <div class="input-field first-wrap">
                    <input name="searchtext" id="search" type="text" placeholder="What are you looking for?" />
                </div>
                <div class="input-field second-wrap">
                    <div class="input-select">
                        <select data-trigger="" name="cat_id">
                            <option placeholder="">CATEGORY</option>
                            <?php 
                      
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
                </div>
                <div class="input-field third-wrap">
                    <button class="btn-search" name="searchb" type="submit">SEARCH</button>
                </div>
            </div>
            <br>

            <div class="col-12 text-center">
                <a class="btn btn-secondary rounded-pill py-2 px-3" href="../view/product.php">Browse Products</a>
            </div>

        </form>

    </div>






    
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



    <script src="../js/extention/choices.js"></script>
    <script>
    const choices = new Choices('[data-trigger]', {
        searchEnabled: false
    });
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>