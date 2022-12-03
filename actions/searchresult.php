<?php 

if(isset($_POST['searchb'])) {
    $text = $_POST['searchtext'];
    $searchitem = searchprod_ctr($text);
  }

  
?>