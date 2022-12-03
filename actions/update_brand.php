<!-- insert update and delete user interaction to database -->
<?php

require('../controllers/product_controller.php');

$bid = $_GET['updatebrandid'];
$brand = selectonebrand_ctr($bid);


?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Update Form</title>
</head>

<body>

    <form action="../actions/updateprocess.php" method="POST">
        <br>
        <input type="hidden" name="bid" value="<?php echo $brand['brand_id']?>" >

        <input type="text" name="name_of_brand" id="brandname" value="<?php echo $brand['brand_name']?>">
        <!-- ID is important becasue css can use it to syel javascript can get the ID   -->

        <input type="submit" name="updateme" value="Update">
    </form>

</body>

</html>



