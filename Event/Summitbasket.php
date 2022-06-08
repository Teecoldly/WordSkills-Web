<?php
include_once "../Service/Auto.php";
 if( isset($_SESSION["Basket"])&& is_array($_SESSION["Basket"]) &&count($_SESSION["Basket"])>0){

    $result = $orderproduct->CreateOrderProduct($_SESSION["Basket"]);
    echo "<script>
    alert(`".$result."`);
    window.location.href='../basketlist.php';
    </script>";
 }else{
    header("Location: ../basketlist.php");
 }


?>