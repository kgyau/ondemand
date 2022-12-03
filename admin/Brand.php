<?php

require('../controllers/product_controller.php');
$brand= selectallBrand_ctr();


?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Brand form</title>
</head>


<br>
<h1> List of Brands</h1>
<br>

<!-- <a class="btn btn-primary" href="../actions/Add_brand.php" role="button">insert</a> -->
<br>
<br>

    <form action="../actions/Add_brand.php" method="POST">
        <br>
        <input type="text" name="name_of_brand" placeholder="Enter your Brand name" id="brand_name">
        <!-- ID is important becasue css can use it to syel javascript can get the ID   -->
        <input type="submit" name="submitb" value="Add Brand">
    </form>
<br>
<br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Brand</th>
            <th scope="col">Update</th>
        </tr>
    </thead>

    <tbody>
        <?php
                $brand= selectallBrand_ctr();
                foreach ($brand as $abrand){
                    echo 
                    "
                    <tr>
                        <td>{$abrand['brand_name']}</td>
                        <td><a href='../actions/update_brand.php?updatebrandid={$abrand['brand_id']}'>Update</a></td>
                    </tr>";
        
                }



        

            ?>


    </tbody>


</table>



</body>

</html>


<!-- get and post variable for forms php -->