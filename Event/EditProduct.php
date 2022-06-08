<?php
include_once "../Service/Auto.php";
if(isset($_POST)&& count($_POST)>0 && isset($_GET["ID"])){
    $template=array(
        "nameproduct"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกชื่อสินค้า"
        ),
        "prict"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกราคา"
        ),
        "totalproduct"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกจำนวนสินค้า"
        ),
        "detailproduct"=>array(
            "case"=>"IS_REQUEST",
            "message"=>"กรุณากรอกรายละเอียดสินค้า"
        ),
    );
    $result= $genaral->validate($template, $_POST);
    if($result["validate"]){
        if(!is_numeric($_GET["ID"])){

            echo "<script>
            alert(`รหัสสินค้าไม่ถูกต้อง`);
            window.location.href='../sell_procuct.php';
            </script>";
        }
        else if($product->EditProduct($_GET["ID"],$_POST,$_FILES["productimg"])){
                echo "<script>
                alert(`แก้ไขสินค้าสำเร็จ`);
                window.location.href='../sell_product.php';
                </script>";
        } 
 
      
    }else{
  
        echo "<script>
        alert(`".$genaral->AlertValidate($result["list"])."`);
        window.location.href='../EditProduct.php';
        </script>";
 
    }
}else{
    header("Location: ../sell_procuct.php");
}


?>