<?php
//make the controller aware of the existence of the class

require("../classes/product_class.php");


// eedit select update delectre functions

// you need placeholders itema and b 
function addBrand_ctr($bname){
    //create an instance of the class means that in this fucntion now i can run all the cls methods in the contact_class file
    // instance is add_item then new and the naem of the class in the contact_class file 
    $add_brand= new Brandclass();

    return $add_brand->addBrand_cls($bname); 

    //run the method 

}
    //--SELECT--//
    //login admin
function select_oneadmin_ctr(){
        $selectoneadmin = new BrandClass();
        return $selectoneadmin->admin_login_cls();
}

function editBrand_ctr($bid,$newbname){
    $updateonebrand = new BrandClass();
    return $updateonebrand->editBrand_cls($bid,$newbname);
}

function selectallBrand_ctr(){
    $select_brand = new  BrandClass();
    return $select_brand->selectallBrand_cls();
}

function selectonebrand_ctr($bid){
    $selectonebrand = new BrandClass();
    return $selectonebrand->selectonebrand_cls($bid);
}

function addproductcat_ctr($prodcat){
    $add_prodcat= new Brandclass();
    return $add_prodcat->addproductcat_cls($prodcat); 
}

function selectallcat_ctr(){
    $select_cat = new  BrandClass();
    return $select_cat->selectallcat_cls();
}
function selectonecat_ctr($catid){
    $select_onecat = new Brandclass();
    return $select_onecat->selectonecat_cls($catid);
}

function editcat_ctr($catid,$newcatname){
    $updateonecat = new Brandclass();
    return $updateonecat->editcat_cls($catid,$newcatname);
}

function viewallprod_ctr(){
    $viewallprod = new Brandclass();
    return $viewallprod->viewallprod_cls();
}

function viewrentalprod_ctr(){
    $viewrental= new Brandclass();
    return $viewrental-> viewrentalprod_cls();
}

function viewoneprod_ctr($prodid){
    $viewoneprod = new Brandclass();
    return $viewoneprod->viewoneprod_cls($prodid);
}
function addproduct_ctr($prodcat,$prodbrand,$prodtitle,$prodprice,$proddesc,$prodimage,$prodkeywords){
    $add_prod= new Brandclass();
    return $add_prod->addproduct_cls($prodcat,$prodbrand,$prodtitle,$prodprice,$proddesc,$prodimage,$prodkeywords); 
}

function searchprod_ctr($search,$cat_id){
    $searchprod = new Brandclass();
    return $searchprod->searchprod_cls($search,$cat_id);
}

function editprod_ctr($prod_id,$productcat,$productbrand,$prod_title,$productprice,$prod_desc,$prod_key,$productimage){
    $updateprod = new Brandclass();
    return $updateprod->editprod_cls($prod_id,$productcat,$productbrand,$prod_title,$productprice,$prod_desc,$prod_key,$productimage);

}
function delete_product_ctr($id){
    // create an instance of the Product class
    $product_instance = new BrandClass();
    // call the method from the class
    return $product_instance->delete_one_product_cls($id);

}


// function editcat_ctr($catid,$newcatname){
//     $updateonecat =new BrandClass();
//     return $updateonecat->editcat_cls();

// }


?>