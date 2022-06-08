<?php

include_once "../Service/Auto.php";

if(isset($_POST)&& count($_POST)>0){
    $template=array(
        "email"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกอีเมล์"
        ), 
        "password"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกรหัสผ่าน"
        ),
    );
    $result= $genaral->validate($template, $_POST);
        
    if($result["validate"]){
        $Login = $users->Login($_POST);
        if($Login["status"]){
          
            echo "<script>
                alert(`ยินดีต้อนรับคุณ ".$Login["data"]["name"]."`);
                window.location.href='../index.php';
                </script>";
        }else{
            echo "<script>
            alert(`อีเมล์หรือรหัสผ่านไม่ถูกต้อง`);
            window.location.href='../login.php';
            </script>";
        }
    }else{
        
        echo "<script>
        alert(`".$genaral->AlertValidate($result["list"])."`);
        window.location.href='../login.php';
        </script>";
    }
}else{
    header("Location: ../login.php");
}
?>