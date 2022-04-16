<?php 
    $id = $_POST['deliveryorderid'];
    $date = $_POST['date'];
    $expected = $_POST['expected'];
    $actual = $_POST['actual'];
    $status = 1;
    $connect = mysqli_connect("localhost","root","","rfiddatabase");
    mysqli_query($connect,"SET NAMES 'utf8'");
    $query = "INSERT INTO DELIVERYORDER VALUES('$id','$date','$status','$expected','$actual')";
    session_start();
    $_SESSION['id'] = $id;
    if(mysqli_query($connect,$query)){
        echo "Success";
    }else{
        echo "Error";
    }
    header('Location: index2.php');
?>