<?php  
//contact phone entity 
// i would need to update, add and delete contacts 


require("../settings/db_class.php");

// class name is contactphoneclass which needs the method which are in  db_connection 
class Brandclass extends db_connection{

    function admin_login_cls(){
		$sql = "SELECT * FROM customer WHERE user_role = 1";
		return $this->db_fetch_one($sql);		
	}

    //add edit delelte
    // a and b are just pllaceholders (this means that it needs just two items to be passsed to it which are the name and phone in the database)
    function addBrand_cls($bname){
        $sql = "INSERT INTO `brands` (`brand_name`) VALUES ('$bname')";
        return $this->db_query($sql);
    }
    //select

    function selectallBrand_cls(){
        $sql=  "SELECT * FROM brands";
        return $this-> db_fetch_all($sql); 
    }
   
    function selectonebrand_cls($bid){
        $sql = "SELECT * FROM brands WHERE brand_id='$bid'";
        return $this-> db_fetch_one($sql);

    }

    function editBrand_cls($bid,$newbname){
        $sql ="UPDATE brands SET `brand_name` ='$newbname' WHERE `brand_id` = '$bid'";
        return $this-> db_query($sql);
    }

    function addproductcat_cls($catname){
        $sql ="INSERT INTO `categories` (`cat_name`) VALUES ('$catname')";
        return $this-> db_query($sql);

    }

    function selectallcat_cls(){
        $sql=  "SELECT * FROM categories";
        return $this-> db_fetch_all($sql); 
    }
    
    function selectonecat_cls($catid){
        $sql = "SELECT * FROM categories WHERE cat_id='$catid'";
        return $this-> db_fetch_one($sql);


    }

    function editcat_cls($catid,$newcatname){
        $sql ="UPDATE categories SET `cat_name` ='$newcatname' WHERE `cat_id` = '$catid'";
        return $this-> db_query($sql);
    }

    function addproduct_cls($prodcat,$prodbrand,$prodtitle,$prodprice,$proddesc,$prodimage,$prodkeywords,$rental){
        $sql = "INSERT INTO `products` (`product_cat`,`product_brand`,`product_title`,`product_price`,`product_desc`,`product_image`,`product_keywords`,`rental`) 
        VALUES ('$prodcat','$prodbrand','$prodtitle','$prodprice','$proddesc','$prodimage','$prodkeywords','$rental')";
        return $this->db_query($sql);
    }


    function viewallproducts_cls(){
        $sql= "SELECT * FROM products";
        return $this-> db_fetch_all($sql);
    }

    function viewallprod_cls(){
        $sql= "SELECT * FROM products where rental ='Non-rental'";
        return $this-> db_fetch_all($sql);
    }

    function viewrentalprod_cls(){
        $sql= "SELECT * FROM products WHERE rental = 'Rental'";
        return $this-> db_fetch_all($sql);
    }

 
    function viewoneprod_cls($prodid){
        $sql= "SELECT * FROM `products` WHERE product_id='$prodid'";
        return $this-> db_fetch_one($sql);
    }

    function searchprod_cls($search,$cat_id){
        $sql = "SELECT * FROM `products` WHERE product_cat='$cat_id' and product_title like '%$search%'";
        return $this->db_fetch_all($sql);
    }

    function editprod_cls($prod_id,$productcat,$productbrand,$prod_title,$productprice,$prod_desc,$prod_key,$productimage,$rental)
    {
    $sql = "UPDATE `products` SET product_brand = '$productbrand', product_cat= '$productcat',product_title= '$prod_title', 
    product_price= '$productprice',product_desc= '$prod_desc',product_keywords= '$prod_key',product_image= '$productimage',rental='$rental',
    WHERE product_id = '$prod_id'";
    return $this->db_query($sql);
    }

    function delete_one_product_cls($id){
		// return true or false
		return $this->db_query("DELETE from `products` where product_id = '$id'");
	}


  
    function viewallorders_cls($customer_id){
        $sql="SELECT customer.customer_name, customer.customer_email,orders.invoice_no, orders.order_id, orders.order_date, orders.order_status, products.product_title,products.product_image, payment.amt FROM orders,customer,payment,products WHERE orders.customer_id=customer.customer_id and payment.pay_id=amt and customer.customer_id= '$customer_id' ";
		return $this->db_fetch_all($sql);
    
    }


    

}




?>