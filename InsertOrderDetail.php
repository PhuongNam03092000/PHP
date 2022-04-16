<?php 
    $connect = mysqli_connect("localhost","root","","rfiddatabase");
    mysqli_query($connect,"SET NAMES 'utf8'");
    $orderId = $_POST['orderid'];
 
        $file = $_FILES["file"]["name"];
        $file_open = fopen($file,"r");
        while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
        {
            echo $csv[0];
            echo $csv[1];
            //$quanlity = 10;
            //mysqli_query($connect,"INSERT INTO DELIVERYORDERDETAIL VALUES ('$orderId','$rfid','$name','$quanlity')");
        }
   
    
    
?>