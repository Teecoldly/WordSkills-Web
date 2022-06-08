<?php

include_once "../Service/Auto.php";
if( isset($_GET["ID"]) && is_numeric($_GET["ID"])){
    if($orderproduct->SetStatusSend($_GET["ID"])){
        echo "<script>
        alert(`ส่งสินค้าเรียบร้อย`);
        window.location.href='../ordersell.php';
        </script>";
    }
   
}else{
    header("Location: ../index.php");
}

?>