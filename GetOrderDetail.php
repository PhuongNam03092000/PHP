<?php
require "DeliveryOrderDetail.php";
$connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
mysqli_query($connect, "SET NAMES 'utf8'");
$id = $_GET['id'];
$query = "SELECT * FROM DELIVERYORDERDETAIL WHERE delivery_order_id='$id'";

$data = mysqli_query($connect, $query);
$arrayDeliveryOrderDetail = array();
if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
        array_push($arrayDeliveryOrderDetail, new DeliveryOrderDetail(
            $row['delivery_order_id'],
            $row['product_instance_id'],
            $row['product_line_id'],
            $row['is_checked'],
            $row['product_name'],
            (int)$row['quanlity']
        ));
    }
}
echo json_encode($arrayDeliveryOrderDetail);
?>
