<?php
session_start();
if(!$_GET['id']){
    header('Location:index.php');
} else {
    if(empty($_SESSION['product_id'])){
        $_SESSION['product_id'] = array();
    }
    array_push($_SESSION['product_id'],$_GET['id']);
    header('Location:index.php');
}

?>