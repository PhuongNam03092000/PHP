<?php
require "DeliveryOrder.php";
$connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
mysqli_query($connect, "SET NAMES 'utf8'");
$id = $_SESSION['id'];

// get delivery order detail by delivery order id
$query = "SELECT * FROM DELIVERYORDER WHERE delivery_order_id = '$id' AND order_status = 1";
$data = mysqli_query($connect, $query);
$row_cnt = mysqli_num_rows($data);
