<?php 
    require "ProductLine.php";
    $connect = mysqli_connect("localhost","root","","rfiddatabase");
    mysqli_query($connect,"SET NAMES 'utf8'");
    $query1 = "SELECT product_line_id FROM PRODUCTLINE WHERE product_line_id NOT IN (SELECT product_line_id FROM PRODUCTINSTANCE)";
    $data1 = mysqli_query($connect,$query1);
    $arrayId = array();
    $arrayProductLine = array();
    if(mysqli_num_rows($data1)>0){
        while($row = mysqli_fetch_assoc($data1)){
            $id = $row['product_line_id'];
           $query2 = "SELECT * FROM PRODUCTLINE where product_line_id =$id";
           $data2 = mysqli_query($connect,$query2);
           if(mysqli_num_rows($data2)>0){
               while($row2 = mysqli_fetch_assoc($data2)){
                   array_push($arrayProductLine, new ProductLine($row2['product_line_id'],$row2['Name'],$row2['Price']));
               }
           }
        }
    }
    echo json_encode($arrayProductLine);
    
?>