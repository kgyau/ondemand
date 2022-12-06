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
  </head>
  <body>
  <div class="s131">
    <form method="POST" action="../view/searchresults.php">

        <div class="inner-form">
          <div class="input-field first-wrap">
            <input  name= "searchtext" id="search" type="text" placeholder="What are you looking for?" />
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
      </form>
    </div>
    <script src="../js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false
      });

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

