<?php


require("../settings/db_class.php");

class Cart extends db_connection{

    function addtocart_cls($p_id,$ip_add,$c_id,$qty){
        $sql = "INSERT INTO `cart` (p_id,ip_add,c_id,qty) VALUES ('$p_id','$ip_add','$c_id','$qty')";
		return $this-> db_query($sql);
    }

    function removefromcart_cls($p_id,$c_id){
        $sql="DELETE FROM cart WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		return $this-> db_query($sql);
    }
  
	function viewcart_cls($c_id){
		$sql = "SELECT products.product_id, products.product_title,products.product_price, products.product_image, products.product_price, cart.qty, cart.c_id from cart inner join products on cart.p_id=products.product_id where c_id=$c_id;";
		return $this-> db_fetch_all($sql);
	}


    function delete_all_from_cart_cls($c_id){
		// return true or false
        $sql= "DELETE from cart WHERE `c_id` ='$c_id'";
        return $this->db_query($sql);
       
	}


    //check for duplicate
    function duplicatecheck_cls($p_id,$c_id){
		$error="";
        $sql = "SELECT * FROM cart WHERE `p_id`='$p_id'  AND `c_id`='$c_id'";
        $result=$this-> db_fetch_all($sql);
        if ($result) {
            $this-> error ="Item already in cart";
        }
        return $this->error;
    }

     // one item  from cart
    function select_onefromcart_cls($p_id,$c_id){
        $query= "SELECT `qty` from `cart` where `p_id`=$p_id AND `c_id`=$c_id";
        return $this-> db_fetch_one($query);
    }

	function inc_itemcart_cls($p_id,$c_id,$qty){
		$sql = "UPDATE `cart` SET `qty`='$qty'+1 WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		return $this-> db_query($sql); 
	}

	function dec_itemcart_cls($p_id,$c_id,$qty){
		$sql = "UPDATE `cart` SET `qty`='$qty'-1 WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		return $this-> db_query($sql);
	
    }

    

    function select_total_qty_from_cart_cls($c_id){
        $sql = "SELECT SUM(qty) FROM cart WHERE c_id=$c_id";
        return $this-> db_fetch_all($sql);
    }

     // one item  from cart
    function select_one_from_cart_cls($p_id,$c_id){
        $query= "SELECT  qty from cart where p_id=$p_id and c_id=$c_id";
        return $this-> db_fetch_one($query);
    }


    // selecting the total price of a single item a customer has bought
    function select_one_price_cls($c_id){
        $query= "SELECT products.SUM(product_price) FROM cart WHERE cart inner join products on cart.p_id=products.product_id and cart.c_id=$c_id";
        return $this-> db_fetch_all($query);   
    }

    function select_total_price_cls($c_id){
        $sql= "SELECT SUM(products.product_price*cart.qty) from cart inner join products on cart.p_id=products.product_id where c_id=$c_id;";
        return $this-> db_fetch_all($sql);
        
    }


    //order table
	function order_cls($customer_id,$invoice,$date,$status){
		$sql = "INSERT INTO `orders`(`customer_id`,`invoice_no`,`order_date`,`order_status`) VALUES ('$customer_id','$invoice','$date','$status')";
		return $this->db_query($sql);
	}

	//order details
	function order_details_cls($order_id,$p_id,$qty){
		$sql = "INSERT INTO `orderdetails`(order_id,product_id,qty) VALUES ('$order_id','$p_id','$qty')";
		return $this->db_query($sql);
	}

	//payment
	function payment_cls($amt,$customer_id,$order_id,$currency,$payment_date){
		$sql = "INSERT INTO `payment`(amt,currency,customer_id,order_id,payment_date) VALUES ('$amt','$currency','$customer_id','$order_id','$payment_date')";
		return $this-> db_query($sql);
	}

    function email_cls($c_id){
        $sql = "SELECT customer.customer_email from cart inner join customer on cart.c_id=customer.customer_id where c_id=$c_id limit 1";
       return $this-> db_fetch_one($sql);
   }

   function order_id_cls($invoice_no){
         $sql= "SELECT `order_id` from orders where invoice_no='$invoice_no' ";
        return $this-> db_fetch_one($sql);
   }

   

}
?>