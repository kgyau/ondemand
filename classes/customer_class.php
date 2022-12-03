<?php  
//contact phone entity 
// i would need to update, add and delete customers


require("../settings/db_class.php");


// class name is contactphoneclass which needs the method which are in  db_connection 
class CustomerClass extends db_connection{


    //add edit delelte
    // a and b are just pllaceholders (this means that it needs just two items to be passsed to it which are the name and phone in the database)
    function addCustomer_cls($fullname,$email,$password,$city ,$contactnumber,$userrole){
        //write sql 
        //$sql= "INSERT INTO phonebook VALUES ('$item1','$item2')"; 
        // 2nd way of writing insert query
        $finalpassword= password_hash($password,PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO `customer` (`customer_name`,`customer_email`,`customer_pass`,`customer_city`,`customer_contact`,`user_role`) 
        VALUES ('$fullname','$email','$finalpassword','$city' ,'$contactnumber','$userrole')";

        return $this->db_query($sql);



    }
    //--SELECT--//
	//login customer 

	function customer_login_cls($email){
		$sql = "SELECT * FROM customer WHERE customer_email ='$email'";
		return $this->db_fetch_one($sql);		
	}
    function viewcustomer_cls(){
        $sql= "SELECT * FROM `customer`";
        return $this-> db_fetch_all($sql);
    }


    function deletecustomer_cls($customer_id){
        $sql= "DELETE FROM `customer` WHERE `customer_id`='$customer_id'";
        return $this-> db_query($sql); 
    }

    function viewonecustomer_cls($customer_id){
        $sql= "SELECT * FROM `customer` WHERE customer_id='$customer_id'";
        return $this-> db_fetch_one($sql);

    }

    function editcus_cls($customer_id,$customer_name,$customer_email,$customer_country,$customer_city,$customer_contact){
    $sql = "UPDATE `customer` SET customer_name = '$customer_name', customer_email= '$customer_email',customer_country= '$customer_country', 
    customer_city= '$customer_city',customer_contact= '$customer_contact'
    WHERE customer_id = '$customer_id'";
    return $this->db_query($sql);

}





}




?>