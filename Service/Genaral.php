<?php
 
 class Genaral {
    private    $connect;
    public function __construct($con) {
        global $connect;
        $this->$connect = $con ;   
    }
    public function PrintStausSend($data){
        if($data){
            return "สินค้าถูกจัดส่งแล้ว";
        }else{
            return "รอการจัดส่ง";
        }
    }
    public function PrintDate($date){
        return date("d/m/Y H:i:s",strtotime($date));
    }
    public function ProductlistGroup($id){
        global $connect;
        $stmt =$this->$connect->prepare("SELECT `product_ID`, `product_name`, `product_price`, `product_amout`, `product_details`, `product_file_path` FROM `product` INNER JOIN user on user.UserID = product.UserID where user.GrouplistiD = ?  and product.UserID!=? and product.product_amout >0 order by product.poston desc");
        $stmt->bind_param("ss",$id,$_SESSION["UserID"] );
        $stmt -> execute(); 
        $result = $stmt->get_result();
        $stmt -> close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function GetProduct($ID){
        global $connect;
        $stmt =$this->$connect->prepare("SELECT `product_ID`, `product_name`, `product_price`, `product_amout`, `product_file_path` ,`product_details`, `poston`,user.GrouplistiD FROM `product`inner join user on user.UserID = product.UserID      where `product_ID`=? ");
        $stmt->bind_param("s" , $ID);
        $stmt -> execute();
        $result = $stmt->get_result();
        if($result->num_rows==0){
            $resultstatus =   array(
                "status" => false,
                "data" => array(),
            );
            $stmt -> close();
            return  $resultstatus;
        }else{
            $resultstatus =   array(
                "status" => true,
                "data" => $result->fetch_array(MYSQLI_ASSOC),
            );
            $stmt -> close();
            return  $resultstatus;
        }
    }
    public function Grouplist(){
        global $connect;
        $stmt = $this->$connect->prepare("select * from rm_grouplist");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function GrouplistMainPage(){
        global $connect;
        $stmt = $this->$connect->prepare("select rm_grouplist.*,count(user.GrouplistiD) as totlemember from rm_grouplist INNER JOIN user on user.GrouplistiD = rm_grouplist.GrouplistiD GROUP by user.GrouplistiD  ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function validateCase($case,$value){
        switch ($case) {
            case 'IS_REQUEST':
                if(is_null($value) || $value==''){
                    return true ;
                }else {
                    return false;
                }
        }
    } 
    public function validate($template, $data){
        $list = array();
        $pass = true ;
        foreach ($data as $key => $value) {
            if(!empty($template[$key])){
               if($this->validateCase($template[$key]["case"],$value)){
                    $pass= false;
                    $list[$key]= $template[$key]["message"];
               }
            }
        }
        $validate =   array(
            "validate" => $pass,
            "list"=> $list,
        );
        return $validate;
     }
     public function AlertValidate($list){
       
        $str = "";
        foreach ($list as $key => $value) { 
                $str .= $value."\n";
        }
        return $str;
     }
 }
?> 