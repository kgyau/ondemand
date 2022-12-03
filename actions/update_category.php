<!-- insert update and delete user interaction to database -->
<?php

require('../controllers/product_controller.php');

$catid= $_GET['updatecatid'];
$category = selectonecat_ctr($catid);


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

    <form action="../actions/updatecat_process.php" method="POST">
        <br>
        <input type="hidden" name="cid" value="<?php echo $category['cat_id']?>" >

        <input type="text" name="name_of_cat" id="catename" value="<?php echo $category['cat_name']?>">
        <!-- ID is important becasue css can use it to syel javascript can get the ID   -->

        <input type="submit" name="updatec" value="Update">
    </form>

</body>

</html>



