<?php
session_start();
$id = $_SESSION['id'];
$connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
mysqli_query($connect, "SET NAMES 'utf8'");
$query = "SELECT * FROM DELIVERYORDERDETAIL WHERE delivery_order_id  = '$id'";
$data = mysqli_query($connect, $query);

while ($row = mysqli_fetch_assoc($data)) {
    $instance_id = $row['product_instance_id'];
    $product_line_id = $row['product_line_id'];
    $queryProductInstance = "SELECT * FROM PRODUCTINSTANCE WHERE product_instance_id = '$instance_id' 
    AND product_line_id = '$product_line_id'";
    $dataProductInstance = mysqli_query($connect, $queryProductInstance);
    // check if product instance is exist
    if (mysqli_num_rows($dataProductInstance) > 0) {
        // alert for user know that which product instance id is exist and if click ok back to index2.php
        echo "<script>alert('Product Instance with id: " . $instance_id . " is exist');</script>";
        echo "<script>window.location.href='index2.php';</script>";
        return;
    }
}
mysqli_data_seek($data, 0);
while ($row = mysqli_fetch_assoc($data)) {
    $product_line_id = $row['product_line_id'];
    $product_instance_id = $row['product_instance_id'];
    $product_name = $row['product_name'];
    $quantity = $row['quantity'];

    $queryProduct = "SELECT * FROM PRODUCTLINE WHERE product_line_id = '$product_line_id'";
    $dataProduct = mysqli_query($connect, $queryProduct);

    $queryProductInstance = "SELECT * FROM PRODUCTINSTANCE WHERE product_instance_id = '$product_instance_id'";
    $dataProductInstance = mysqli_query($connect, $queryProductInstance);

    //check if product line is exist
    if (mysqli_num_rows($dataProduct) == 1) {
        $queryUpdateStock = "UPDATE PRODUCTLINE SET stock = stock + '$quantity' WHERE product_line_id = '$product_line_id'";
        if (!mysqli_query($connect, $queryUpdateStock)) {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    } elseif (mysqli_num_rows($dataProduct) == 0) {
        $query = "INSERT INTO PRODUCTLINE (product_line_id,product_name,stock) VALUES('$product_line_id','$product_name','$quantity')";
        if (!mysqli_query($connect, $query)) {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    }


    //check if product instance is exist
    if (mysqli_num_rows($dataProductInstance) == 1) {
        // notice that product instance is exist
        echo "Product Instance is exist";
    } elseif (mysqli_num_rows($dataProductInstance) == 0) {
        $query = "INSERT INTO PRODUCTINSTANCE (product_instance_id,product_line_id) VALUES('$product_instance_id','$product_line_id')";
        if (!mysqli_query($connect, $query)) {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    }
}

//update status of delivery order to 1
$query = "UPDATE DELIVERYORDER SET order_status = 1 WHERE delivery_order_id = '$id'";
if (!mysqli_query($connect, $query)) {
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}

// alert success and clear session and back to index.php
session_unset();
session_destroy();
header('Location: index.php');
