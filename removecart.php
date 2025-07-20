<?php
session_start();
if (! $_GET['id']) {
    header('Location:index.php');
} else {
    $products = array_search($_GET['id'], $_SESSION['product_id']);
    unset($_SESSION['product_id'][$products]);
    header('Location:cart.php');
}
?>