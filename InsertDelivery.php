<?php

use function PHPSTORM_META\type;

$id = $_POST['deliveryorderid'];
if($id==""){
    echo '<script>';
    echo 'window.location.href = "index.php";';  
    echo 'alert("Hãy nhập vào mã phiếu giao")';  
    echo '</script>';
}else{
    $date = $_POST['date'];
    $status = 0;
    $connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
    mysqli_query($connect, "SET NAMES 'utf8'");
    $checkQuery = "SELECT * FROM DELIVERYORDER WHERE delivery_order_id='".$id."'";
    $check = mysqli_query($connect, $checkQuery);

    if (mysqli_num_rows($check) != 0) {
        echo '<script>';
        echo 'window.location.href = "index.php";';  
        echo 'alert("Order này đã tồn tại")';  
        echo '</script>';
    } else {
        $query = "INSERT INTO DELIVERYORDER VALUES('$id','$date','$status')";
        session_start();
        $_SESSION['id'] = $id;
        if (mysqli_query($connect, $query)) {
            echo "Success";
        } else {
            echo "Error";
        }
        mysqli_close($connect);
        echo '<script>';
        echo 'window.location.href = "index2.php";';  
      
        echo '</script>';
    }
}
