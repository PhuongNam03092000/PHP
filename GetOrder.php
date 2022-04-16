<?php 
    require "DeliveryOrder.php";
    $connect = mysqli_connect("localhost","root","","rfiddatabase");
    mysqli_query($connect,"SET NAMES 'utf8'");
    $query = "SELECT * FROM DELIVERYORDER";
    $data = mysqli_query($connect,$query);
    $arrayDeliveryOrder = array();
    if (mysqli_num_rows($data) > 0) {
        while($row = mysqli_fetch_assoc($data)){
           
            array_push($arrayDeliveryOrder,new DeliveryOrder($row['delivery_order_id'],
                $row['delivery_order_date'],
                $row['order_status'],
                (int)$row['expected_quanlity'],
                (int)$row['actual_quanlity']));
        }
    }
    echo json_encode($arrayDeliveryOrder);
?>