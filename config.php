<?php 
  $server="localhost";
  $username="root";
  $password="";
  $database="ecom";
  $link=new mysqli($server,$username,$password,$database);

  if($link->connect_error){
    die("connnection failed:".$link->connect_error);
  }
?>
