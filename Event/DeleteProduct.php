<?php
include_once "../Service/Auto.php";
if( isset($_GET["ID"]) && is_numeric($_GET["ID"])){
    if($product->DeleteProduct($_GET["ID"])){
        echo "<script>
        alert(`ลบสินค้าสำเร็จ`);
        window.location.href='../sell_product.php';
        </script>";
    }else{
        echo "<script>
        alert(`ลบสินค้าไม่สำเร็จ`);
        window.location.href='../sell_product.php';
        </script>";
    }
}else{
    header("Location: ../sell_product.php");
}

?>