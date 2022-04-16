<?php 
    $connect = mysqli_connect("localhost","root","","rfiddatabase");
    mysqli_query($connect,"SET NAMES 'utf8'");
    $product_line_id = $_POST['product_line_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $query = "INSERT INTO PRODUCTLINE VALUES('$product_line_id','$name','$price')";
    if(mysqli_query($connect,$query)){
        echo "Success";
    }else{
        echo "Error";
    }
?>