<?php

class OrderProduct{
    private    $connect;
    public function __construct($con) {
        global $connect;
        $this->$connect = $con ;   
    }
    public function GetOrderbuy(){
        global $connect;
        $stmt =$this->$connect->prepare("select orderproduct.*,user.name,product.product_name,product.product_price from orderproduct 
        INNER JOIN product on product.product_ID = orderproduct.product_ID 
        INNER JOIN user on product.UserID = user.UserID WHERE orderproduct.userid_buy =?");
        $stmt->bind_param("s" ,$_SESSION["UserID"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);

    }
    
    public function GetOrdersell(){
        global $connect;
        $stmt =$this->$connect->prepare("select orderproduct.*,user.name,product.product_name,product.product_price from orderproduct 
        INNER JOIN product on product.product_ID = orderproduct.product_ID 
        INNER JOIN user on orderproduct.userid_buy = user.UserID WHERE  product.UserID =?");
        $stmt->bind_param("s" ,$_SESSION["UserID"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function SetStatusSend($id){
        global $connect;
        $stmt =$this->$connect->prepare("UPDATE `orderproduct` SET  `Order_send`= 1 where `OrderProduct_ID`=?");
        $stmt->bind_param("s" ,$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return true;
    }
    public function CreateOrderProduct($data){
        $totallist = 0; //! รายการทั้งหมด
        $totalprice = 0; //! ราคารวม
        global $connect;
        foreach ($data as $key => $value) {
     
         
            //! UPDATE รายการสินค้า
            $stmt =$this->$connect->prepare("UPDATE `product` SET  `product_amout` = `product_amout`-? WHERE `product_ID` = ? ");
            
            $stmt->bind_param("ss" ,$value["amount"]  ,$value["product_id"]);
            $stmt -> execute();
            $stmt -> close();
  
  
            $stmt =$this->$connect->prepare("INSERT INTO `orderproduct`(  `product_ID`, `orderProduct_totalbuy`,  `userid_buy` ) VALUES (?,?,? )");
            $stmt->bind_param("sss",$value["product_id"],$value["amount"], $_SESSION["UserID"]);
            $totallist+=1;
            $totalprice+=$value["amount"]*$value["product_price"];
            $stmt -> execute();
            $stmt -> close();
            unset($_SESSION["Basket"][$key]);
        }
        return "รายการทั้งหมด ".$totallist." รายการ ราคาทั้งหมด ".$totalprice." บาท";
    }
}


?>