<?php
$connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
mysqli_query($connect, "SET NAMES 'utf8'");
$orderId = $_POST['orderid'];
if (isset($_POST['submit'])) {
    //delete all delivery order detail of this order
    $query = "DELETE FROM DELIVERYORDERDETAIL WHERE delivery_order_id = '$orderId'";
    if (!mysqli_query($connect, $query)) {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }

    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    $headers = fgetcsv($handle, 1000, ",");
    while (($csv = fgetcsv($handle, 1000, ",")) !== false) {
        $rfid = $csv[0];
        $name = $csv[1];
        $quanlity = $csv[2];
        $product_id = $csv[3];
        $query = "INSERT INTO DeliveryOrderDetail (delivery_order_id,product_instance_id,product_name,quanlity,product_line_id) 
            VALUES('$orderId','$rfid','$name','$quanlity','$product_id')";
        if (!mysqli_query($connect, $query)) {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    }
    fclose($handle);
}
header('Location: index2.php');
