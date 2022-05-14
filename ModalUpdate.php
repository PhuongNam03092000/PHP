<?php
    $connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
    mysqli_query($connect, "SET NAMES 'utf8'");
    $id = $_POST['id'];
    // get delivery order detail by delivery order id
    $query = "SELECT * FROM PRODUCTLINE WHERE product_line_id = '$id'";
    $data = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($data);
    $name = $row['product_name'];
    $price = $row['product_price'];
    $stock = $row['stock'];

   echo '<form method="Post" action="UpdateProductLine.php"> '.
    '<div class="form-group" >'.
    'Id : '. '<input type = "text" name="id" class="form-control" readonly value = '.$id.'>'.
    '</div>'.
    '<div class="form-group">'.
    'Name : '. '<input type = "text"  name="product_name" class="form-control" value = '.$name.'>'.
    '</div>'.
    '<div class="form-group">'.
    'Price : '. '<input type = "number" name="price" class="form-control" value = '.$price.'>'.
    '</div>'.
    '<div class="form-group">'.
    'Stock : '. '<input type = "number" name="stock" class="form-control" value = '.$stock.'>'.
    '</div>'.
    '<button type="submit" class="btn btn-success btn-block">Update</button>'.
    '</form>';
?>