<?php

include_once "../Service/Auto.php";
if(isset($_POST)&& count($_POST)>0){
 
    $template=array(
        "name"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกชื่อ"
        ),
        "lastname"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกนามสกุล"
        ),
        "telphone"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกเบอร์มือถือ"
        ),
        "email"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกอีเมล"
        ),
        "password"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกรหัสผ่าน"
        ),
        "password_again"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกยื่นยันรหัสผ่าน"
        ),
        "group"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกเลือกกลุ่ม"
        ));
        $result= $genaral->validate($template, $_POST);
        
        if($result["validate"]){
            if($_POST["password"]!=$_POST["password_again"]){
                echo "<script>
                alert(`กรุณากรอกรหัสผ่านให้ตรงกัน`);
                window.location.href='../register.php';
                </script>";
         
            }else if($users->Email_is_exist($_POST["email"])){
                echo "<script>
                alert(`อีเมล์ถูกใช้งานไปแล้ว`);
                window.location.href='../register.php';
                </script>";
                
            }elseif (empty($_POST["permissionbuy"]) && empty($_POST["permissionsell"])) {
                echo "<script>
                alert(`กรุณาเลือกสิทธิ์การใช้งาน`);
                window.location.href='../register.php';
                </script>";
            }else{
                 
                if($users->CreateUser($_POST)){
                    echo "<script>
                    alert(`สมัครสมาชิกสำเร็จ`);
                    window.location.href='../login.php';
                    </script>";
                } 
            }
        }else{
  
            echo "<script>
            alert(`".$genaral->AlertValidate($result["list"])."`);
            window.location.href='../register.php';
            </script>";
     
        }
     
       
}else{
    header("Location: ../register.php");
}
 
?>