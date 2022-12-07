<?php
include("../classes/cart_class.php");

    //sanitize data
    function cleanText($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    function addtocart_ctr($p_id,$c_id,$qty){
        //create an instance of the class means that in this fucntion now i can run all the cls methods in the contact_class file
        // instance is add_item then new and the naem of the class in the contact_class file 
        $add_item= new Cart();
        return $add_item->addtocart_cls($p_id,$c_id,$qty);
    }

    function delete_all_from_cart_ctr($c_id){
        $delall=new Cart();
        return $delall-> delete_all_from_cart_cls($c_id);

    }

   
    function viewcart_ctr($c_id){
        $view= new Cart();
        return $view->viewcart_cls($c_id);
    }
    // function cartqty_ctr(){
    //     $qty= new Cart();
    //     return $qty->cartqty_cls();
    // }

    function removefromcart_ctr($p_id,$c_id){
        $remove= new Cart();
        return $remove->removefromcart_cls($p_id,$c_id);
    }

    function  duplicatecheck_ctr($p_id,$c_id){
        $duplicate= new Cart();
        return $duplicate->duplicatecheck_cls($p_id,$c_id);
    }

    function select_onefromcart_ctr($p_id,$c_id){
        $selectone= new Cart();
        return $selectone->select_onefromcart_cls($p_id,$c_id);


    }

    function inc_itemcart_ctr($p_id,$c_id,$qty){
        $inc= new Cart();
        return $inc->inc_itemcart_cls($p_id,$c_id,$qty);


    }

    function dec_itemcart_ctr($p_id,$c_id,$qty){
        $dec= new Cart();
        return $dec->dec_itemcart_cls($p_id,$c_id,$qty);

    }

    function select_total_qty_from_cart_ctr($c_id){
        $total= new Cart();
        return $total->select_total_qty_from_cart_cls($c_id);
    }

    function select_one_from_cart_ctr($p_id,$c_id){
        $oneitem= new Cart();
        return $oneitem->select_one_from_cart_cls($p_id,$c_id);
    }
    function select_total_price_ctr($c_id){
        $price= new Cart();
        return $price->select_total_price_cls($c_id);
  

    }

    function select_one_price_ctr($c_id){
        $price= new Cart();
        return $price->select_one_price_cls($c_id);
  
    }
    

    function order_ctr($customer_id,$invoice,$date,$status){
        $order= new Cart();
        return $order-> order_cls($customer_id,$invoice,$date,$status);
    }

    function order_details_ctr($order_id,$p_id,$qty){
        $orderdet=new Cart();
        return $orderdet-> order_details_cls($order_id,$p_id,$qty);
    }

    function payment_ctr($amt,$customer_id,$order_id,$currency,$payment_date){
        $pay= new Cart();
      return $pay-> payment_cls($amt,$customer_id,$order_id,$currency,$payment_date);
    }

    function email_ctr($c_id){
        $mail=new Cart();
        return $mail-> email_cls($c_id);
    }


    function order_id_ctr($invoice_no){
        $inv= new Cart();
        return $inv-> order_id_cls($invoice_no);
    }



?>
