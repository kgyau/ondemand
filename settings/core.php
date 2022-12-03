<?php
//start session
session_start(); 

//for header redirection
ob_start();

//funtion to check for login



//function to get user ID
function get_id(){
    $id=$_SESSION['cid'];
   return $id;
 }
 


//function to check for role (admin, customer, etc)



?>