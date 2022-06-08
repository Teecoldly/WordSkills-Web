<?php
include_once "../Service/Auto.php";
if(isset($_POST)&& count($_POST)>0){
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
        if($_FILES["productimg"]["error"]==0){
            if($product->CreateProduct($_POST,$_FILES["productimg"])){
                echo "<script>
                alert(`สินค้าถูกสร้างเรียบร้อยแล้ว`);
                window.location.href='../sell_product.php';
                </script>";
            } 
        }else{
            echo "<script>
            alert(`กรุณาเลือกรูปภาพ`);
            window.location.href='../addProduct.php';
            </script>";
        }
      
    }else{
  
        echo "<script>
        alert(`".$genaral->AlertValidate($result["list"])."`);
        window.location.href='../addProduct.php';
        </script>";
 
    }
}else{
    header("Location: ../sell_procuct.php");
}


?>