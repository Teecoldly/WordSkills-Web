<?php
//! init session
include_once "cons.php";
include_once "Genaral.php";
include_once "Users.php";
include_once "Product.php";
include_once "Basket.php";
include_once "OrderProduct.php";
session_start();
$genaral = new Genaral($cons);
$users = new Users($cons);
$product = new Product($cons);
$basket = new Basket();
$orderproduct = new OrderProduct($cons);
?> 