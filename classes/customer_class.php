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

    function editcus_cls($customer_id,$customer_name,$customer_email,$customer_city,$customer_contact){
    $sql = "UPDATE `customer` SET customer_name = '$customer_name', customer_email= '$customer_email', 
    customer_city= '$customer_city',customer_contact= '$customer_contact'
    WHERE customer_id = '$customer_id'";
    return $this->db_query($sql);}

    function viewall_orders($customer_id){
        $sql="SELECT customer.customer_name, customer.customer_email,orders.invoice_no, orders.order_id, orders.order_date, orders.order_status, products.product_title,products.product_image, payment.amt FROM orders,customer,payment,products WHERE orders.customer_id=customer.customer_id and payment.pay_id=amt and customer.customer_id= '$customer_id' ";
		return $this->db_fetch_all($sql);
    
    }


    // public function view_orders($id)
	// {
	// 	$sql="SELECT customer.customer_name, customer.customer_email,orders.invoice_no, orders.order_id, orders.order_date, orders.order_status FROM orders,customer,orderdetails,payment,products WHERE orders.customer_id=customer.customer_id and  orders.order_id=orderdetails.order_id and rderdetails.product_id=products.product_id and orders.order_id='$oid';  ORDER BY orders.order_date DESC ";
	// 	return $this->db_fetch_all($sql);
	// }
	// public function view_one_order($oid)
	// {
	// 	$sql="SELECT orderdetails.qty, orderdetails.product_id ,products.product_title, payment.amt, orders.order_id FROM orders,orderdetails,payment,products WHERE orders.order_id=orderdetails.order_id and orders.order_id=payment.order_id and orderdetails.product_id=products.product_id and orders.order_id='$oid'; ";
	// 	return $this->db_fetch_all($sql);
	// }




}

  








?>