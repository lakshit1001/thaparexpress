<?php

  include('config.php');

  $cat = $_POST['category'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $condi = $_POST['condi'];
  $seller = $_SESSION['rollnum'];

  $SellerSQL = "INSERT INTO store(`name`, `cat`, `price`, `condi`, `seller`)
  values('" .$name. "',
        '" .$cat. "',
        '". $price ."',
        '". $condi ."',
        '". $rollnum ."')";

  $result = mysql_query($SellerSQL) or die(mysql_error());

  if ($result){
  header("Location: http://thaparexpress.in/store.php?cat=".$cat."&type=buy&request=submitted");
  exit();} else{
  header("Location: http://thaparexpress.in/store.php?cat=".$cat."&type=buy&request=failed");
  exit();}


?>
