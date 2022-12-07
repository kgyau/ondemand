<?php
//make the controller aware of the existence of the class

require("../classes/customer_class.php");


// eedit select update delectre functions

// you need placeholders itema and b 
function addCustomer_ctr($fullname,$email,$password,$city,$contactnumber,$userrole){
    //create an instance of the class means that in this fucntion now i can run all the cls methods in the contact_class file
    // instance is add_item then new and the naem of the class in the contact_class file 
    $add_item= new CustomerClass();

    return $add_item->addCustomer_cls($fullname,$email,$password,$city,$contactnumber,$userrole); 

    //run the method 

}


    //--SELECT--//
    //login customer
    function select_onecustomer_ctr($email){
        $selectonecustomer = new CustomerClass();
        return $selectonecustomer->customer_login_cls($email);
    }



     function viewallcustomers_ctr(){
      $selectallcustomer = new CustomerClass();
        return $selectallcustomer->viewcustomer_cls();

    }

    function deleteOnecustomer_ctr($customer_id){
        $selectonecustomer = new CustomerClass();
        return $selectonecustomer->deletecustomer_cls($customer_id);

    }


    function viewonecustomer_ctr($customer_id){
        $selectonecustomer = new CustomerClass();
        return $selectonecustomer->viewonecustomer_cls($customer_id);
    }

    function editcustomer_ctr($customer_id,$customer_name,$customer_email,$customer_city,$customer_contact){
        $selectonecustomer = new CustomerClass();
        return $selectonecustomer->editcus_cls($customer_id,$customer_name,$customer_email,$customer_city,$customer_contact);
    }

    function viewall_orders_ctr($customer_id){
        $order = new  CustomerClass();
        return $order->viewall_orders($customer_id);
    }

    
?>