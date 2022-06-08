<?php
class Basket {
    public function AddBasket($id,$data)
    {
        if(!isset($_SESSION["Basket"])|| !is_array($_SESSION["Basket"])){
            $_SESSION["Basket"] = array();
        }
        foreach ($_SESSION["Basket"] as $key => $value) {
            if($value["product_id"]==$id){
                unset($_SESSION["Basket"][$key]);
            }
        }
        array_push( $_SESSION["Basket"], array('product_id' =>$id,'product_name' =>$data['nameproducts'],'product_price' =>$data['price'], 'amount' =>$data['totalbuy']));
        return true ;
    }
    public function EditBasket($id,$data)
    {
        if(!isset($_SESSION["Basket"])|| !is_array($_SESSION["Basket"])){
            $_SESSION["Basket"] = array();
        }
        
        foreach ($_SESSION["Basket"] as $key => $value) {
            if($value["product_id"]==$id){
                $_SESSION["Basket"][$key]["totalbuy"] = $data['totalbuy'];
            }
        }
  
        return true ;
    }
    public function DeleteBasket($id){
        if(!isset($_SESSION["Basket"])|| !is_array($_SESSION["Basket"])){
            $_SESSION["Basket"] = array();
        }
        foreach ($_SESSION["Basket"] as $key => $value) {
            if($value["product_id"]==$id){
                unset($_SESSION["Basket"][$key]);
            }
        }
        return true ;
    }
}


?>