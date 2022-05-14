<?php
    $id = $_GET['id'];
    $connect = mysqli_connect("localhost","root","","rfiddatabase");
    mysqli_query($connect,"SET NAMES 'utf8'");
    $query = "DELETE FROM DELIVERYORDERDETAIL WHERE delivery_order_id='$id'";
    mysqli_query($connect, $query);
    $query = "DELETE FROM DELIVERYORDER WHERE delivery_order_id='$id'";
    mysqli_query($connect, $query);
    echo '<script>';
    echo 'window.location.href = "index.php";';  
  
    echo '</script>';
?>