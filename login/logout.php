<?php
session_start();

session_destroy();
header('Location:../index.php');
exit;// check why i used this 



?>