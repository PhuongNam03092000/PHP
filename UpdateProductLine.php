<?php
    $connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
    mysqli_query($connect, "SET NAMES 'utf8'");
    $id = $_POST['id'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $query = "UPDATE PRODUCTLINE
    SET product_name = '$name', product_price = '$price' , stock = '$stock'
    WHERE product_line_id='$id'";
    $data = mysqli_query($connect, $query);
    echo $query;
    echo '<script>';
    echo 'window.location.href = "product.php";';  
    echo '</script>';
?>