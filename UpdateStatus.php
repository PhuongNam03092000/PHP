<?php
    require "DeliveryOrder.php";
    $connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
    $orderId = $_POST['orderId'];
    $rfid = $_POST['rfid'];
    mysqli_query($connect, "SET NAMES 'utf8'");
    $query = "UPDATE DELIVERYORDERDETAIL SET is_checked=1 WHERE delivery_order_id='$orderId' AND product_instance_id='$rfid'";
    $data = mysqli_query($connect, $query);
?>
