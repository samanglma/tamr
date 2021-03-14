<?php
session_start();
$items = [];
$item = ['name' => 'Test Item', 'price' => 100, 'quantity' => 10];
$_SESSION['cart'] = $item;
//print_r($_SESSION['cart']);
header('Location: viewcart.php');

?>