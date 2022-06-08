<?php
include_once "../Service/Auto.php";
if( isset($_GET["ID"])  && is_numeric($_GET["ID"])) {
    if($basket->DeleteBasket($_GET["ID"])){
        echo "<script>
        alert(`ลบสินค้าออกจากตระกร้าสำเร็จ`);
        window.location.href='../basketlist.php';
        </script>";
    }

}else{
    header("Location: ../index.php");
}
  

?>