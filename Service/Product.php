<?php

class Product  
{
    private    $connect;
    public function __construct($con) {
        global $connect;
        $this->$connect = $con ;   
    }
    public function GetProductList(){
        global $connect;
        $stmt =$this->$connect->prepare("SELECT * FROM  `product` WHERE   `UserID` = ?  ");
        $stmt->bind_param("s",$_SESSION["UserID"] );
        $stmt -> execute(); 
        $result = $stmt->get_result();
        $stmt -> close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function DeleteOrderByProductID($id){
        global $connect;
        $stmt =$this->$connect->prepare("DELETE FROM `orderproduct` WHERE `product_ID` =?");
        $stmt->bind_param("s" ,$id);
        $stmt->execute();
        $stmt->close();
    }
    public function DeleteProduct($ID){ 
        global $connect;
        $path ="../Event/Photos/Product/";
         
        //! start  unlink file
      $stmt =$this->$connect->prepare("select `product_file_path` from `product` WHERE `product_ID`=?");
      $stmt->bind_param("s",$ID );
      $stmt -> execute();
      $result = $stmt->get_result();
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $stmt -> close();
      unlink($path.$row["product_file_path"]);
        $stmt =$this->$connect->prepare("DELETE FROM `product` WHERE  `product_ID` = ? and `UserID` = ?  ");
        $stmt->bind_param("ss",$ID,$_SESSION["UserID"] );
        $stmt -> execute();
        $this->DeleteOrderByProductID($ID);
       
        if(  $stmt->error){
            echo $stmt->error;
            $stmt -> close();
            return  false;
        }else{
            $stmt -> close();
            return  true;
        }
    }
    public function GetProduct($ID){
        global $connect;
        $stmt =$this->$connect->prepare("SELECT `product_ID`, `product_name`, `product_price`, `product_amout`, `product_file_path` ,`product_details`, `poston` FROM `product` WHERE `UserID` = ?  and `product_ID` =  ? ");
        $stmt->bind_param("ss",$_SESSION["UserID"],$ID);
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
    public function CreateProduct($data,$file){
        global $connect;
        $path ="../Event/Photos/Product/";
        $imageFileType = strtolower(pathinfo(basename($file["name"]),PATHINFO_EXTENSION));
        $filename =  md5(date('Y-m-d H:i:s')).".".$imageFileType;
        $fullpath = $path.$filename;
        $stmt =$this->$connect->prepare("INSERT INTO `product`(  `product_name`, `product_price`, `product_amout`, `product_details`,`product_file_path`, `UserID`, `poston`) VALUES (?,?,?,?,?,?, NOW())");
        $stmt->bind_param("ssssss",$data["nameproduct"],$data["prict"],$data["totalproduct"],$data["detailproduct"],$filename,$_SESSION["UserID"] );
        $stmt -> execute();
        if(move_uploaded_file($file["tmp_name"],$fullpath)){
            if(  $stmt->error){
                echo $stmt->error;
                $stmt -> close();
                return  false;
            }else{
                $stmt -> close();
                return  true;
            }
        }else{
            $stmt -> close();
            return  false;
        }
    } 
    public function EditProduct($id,$data,$file){
        global $connect;
        if($file["error"]==0){
            $path ="../Event/Photos/Product/";
            $imageFileType = strtolower(pathinfo(basename($file["name"]),PATHINFO_EXTENSION));
            $filename =  md5(date('Y-m-d H:i:s')).".".$imageFileType;
            $fullpath = $path.$filename;
            //! start  unlink file
            $stmt =$this->$connect->prepare("select `product_file_path` from `product` WHERE `product_ID`=?");
            $stmt->bind_param("s",$id );
            $stmt -> execute();
            $result = $stmt->get_result();
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $stmt -> close();
            unlink($path.$row["product_file_path"]);
             //! end unlink file
            $stmt =$this->$connect->prepare("  UPDATE `product` SET  `product_name`= ?,`product_price`=?,`product_amout`=?, `product_details`=?,`product_file_path`=?, `poston`=Now() WHERE `product_ID`=?");
            $stmt->bind_param("ssssss",$data["nameproduct"],$data["prict"],$data["totalproduct"],$data["detailproduct"],$filename,$id );
            $stmt -> execute();
            if(move_uploaded_file($file["tmp_name"],$fullpath)){
                if(  $stmt->error){
                    echo $stmt->error;
                    $stmt -> close();
                    return  false;
                }else{
                    $stmt -> close();
                    return  true;
                }
            }else{
                $stmt -> close();
                return  false;
            }
        }else{

            $stmt =$this->$connect->prepare("INSERT INTO `product`(  UPDATE `product` SET  `product_name`= ?,`product_price`=?,`product_amout`=?, `product_details`=?, `poston`=Now() WHERE `product_ID`=?");
            $stmt->bind_param("ssssss",$data["nameproduct"],$data["prict"],$data["totalproduct"],$data["detailproduct"],$id );
            $stmt -> execute();
            if(  $stmt->error){
                echo $stmt->error;
                $stmt -> close();
                return  false;
            }else{
                $stmt -> close();
                return  true;
            }
        }
    }
}


?>