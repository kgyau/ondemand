<?php
include('../controllers/customer_controller.php');
$customer_id = $_GET['customer_id'];
$customer = viewonecustomer_ctr($customer_id);

// echo $customer_id;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update customer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/product.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="../css/signup_login.css">

</head>

<body>

    <?php
		
	?>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <form method="post" action="../actions/updatecusprocess.php">


                    <div class="form-field">
                    <input type="hidden" name="customer_id" placeholder="Name" value="<?php echo $customer['customer_id']?> "  />

                    <input type="text" name="customer_name" placeholder="Name" value="<?php echo $customer['customer_name']?> " required />
            </div>

            <!-- Email field -->
            <div class="form-field">
                <input disabled type="email" name="customer_email" placeholder="Email" value="<?php echo $customer['customer_email']?> "required />
            </div>

            <!-- Contact field -->
            <div class="form-field">
                <input type="text" name="customer_contact" placeholder="Contact" value="<?php echo $customer['customer_contact']?> " required />
            </div>

            </br>

            <button name="Updatec" class="btn btn-primary"> Update customer</button>
        </div>
        </form>
    </div>
    </div>
    </div>
</body>

</html>

