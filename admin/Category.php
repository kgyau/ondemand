<?php

require('../controllers/product_controller.php');
$category= selectallcat_ctr();


?>



<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <title>Category</title>
    </head>

    <body>

        <br>
        <h1> List of categories</h1>
        <br>

        <!-- <a class="btn btn-primary" href="../actions/Add_brand.php" role="button">insert</a> -->
        <br>
        <br>

        <form action="../actions/add_category.php" method="POST">
            <br>
            <input type="text" name="name_of_cat" placeholder="Enter category" id="category_name">
            <!-- ID is important becasue css can use it to syel javascript can get the ID   -->
            <input type="submit" name="submitc" value="Add Category">
        </form>
        <br>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $category= selectallcat_ctr();
                    foreach ($category as $acategory){
                        echo 
                        "
                        <tr>
                            <td>{$acategory['cat_name']}</td>
                            <td><a href='../actions/update_category.php?updatecatid={$acategory['cat_id']}'>Update</a></td>
                        </tr>";
            
                    }
                ?>
            </tbody>


        </table>



    </body>

</html>


<!-- get and post variable for forms php -->