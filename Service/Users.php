<?php

class Users {
    private    $connect;
    public function __construct($con) {
        global $connect;
        $this->$connect = $con ;   
    }
    public function Logout(){
        session_destroy();
        header("Location: ../login.php");
    }
    public function Login($data){
        global $connect;
        $stmt =$this->$connect->prepare("  SELECT `UserID`, `name`,  `GrouplistiD`, `pm_buy`, `pm_sell` FROM `user` WHERE `email` =? and `password`=?");
        $stmt->bind_param("ss",$data["email"],$data["password"]);
        $stmt->execute();
        $result = $stmt->get_result();
  
        if($result->num_rows==0){
            $loginstatus =   array(
                "status" => false,
                "data" => array(),
            );
            $stmt -> close();
            return  $loginstatus;
        }else{
            $login =$result->fetch_array(MYSQLI_ASSOC);
            $loginstatus =   array(
                "status" => true,
                "data" => $login   ,
            );
            $_SESSION["UserID"] = $login["UserID"];
            $_SESSION["name"] = $login["name"];
            $_SESSION["GrouplistiD"] = $login["GrouplistiD"];
            $_SESSION["pm_buy"] = $login["pm_buy"];
            $_SESSION["pm_sell"] = $login["pm_sell"];
            $stmt -> close();
            return  $loginstatus;
        }
 
       
    }
    public function Email_is_exist($data){
        global $connect;
        $stmt =$this->$connect->prepare("SELECT * FROM `user` WHERE  `email` =?");
        $stmt->bind_param("s",$data);
        $stmt -> execute();
        $result = $stmt->get_result();
  
        if($result->num_rows==0){
            $stmt -> close();
            return  false;

        }else{
            $stmt -> close();
            return  true;
        }

    }
    public function CreateUser($data){
        global $connect;
        $stmt =$this->$connect->prepare("INSERT INTO user(  name, lastname, telphone, email, password, GrouplistiD, pm_buy, pm_sell) VALUES (?,?,?,?,?,?,?,?)");
        if(empty($data["permissionbuy"])){
            $data["permissionbuy"]=0;
        }else{
            $data["permissionbuy"]=1;
        }
        if(empty($data["permissionsell"])){
            $data["permissionsell"]=0;
        }else{
            $data["permissionsell"]=1;
        }
     
        $stmt->bind_param("ssssssss",$data["name"],$data["lastname"],$data["telphone"],$data["email"],$data["password"],$data["group"],$data["permissionbuy"],$data["permissionsell"]);
      
        $stmt -> execute();
        if(   $stmt->error){
            echo $stmt->error;
            $stmt -> close();
            return  false;
        }else{
            echo $stmt->error;
            $stmt -> close();
            return  true;
        }
 
     
    }

}
?>