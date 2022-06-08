<?php
include_once "../Service/Auto.php";
if(isset($_POST)&& count($_POST)>0 && isset($_GET["ID"])  && is_numeric($_GET["ID"]) && isset($_GET["GrouplistiD"]) && is_numeric($_GET["GrouplistiD"])) {
    $template=array(
        "detailproduct"=>array( 
        "case"=>"IS_REQUEST",
        "message"=>"กรุณากรอกจำนวนที่ต้องการซื้อ"
        ));
        
    $result= $genaral->validate($template, $_POST);
    if($result["validate"]){
        if($_POST["totalbuy"]<1){
            echo "<script>
            alert(`กรุณากรอกจำนวนที่ต้องการซื้อ`);
            window.location.href='../addbasket.php?ID=".$_GET["ID"]."';
            </script>";
        }else {
            
            if($basket->AddBasket($_GET["ID"],$_POST)){
           
                echo "<script>
                alert(`เพิ่มสินค้าลงตระกร้าสำเร็จ`);
                window.location.href='../productlist.php?ID=".$_GET["GrouplistiD"]."';
                </script>";
            }
        }
        


    }else{
        echo "<script>
        alert(`".$genaral->AlertValidate($result["list"])."`);
        window.location.href='../addbasket.php?ID=".$_GET["ID"]."';
        </script>";
    }
}else{
    header("Location: ../index.php");
}

?>