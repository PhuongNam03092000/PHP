<?php
require "DeliveryOrderDetail.php";
$connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
mysqli_query($connect, "SET NAMES 'utf8'");
session_start();
$id = $_SESSION['id'];
$_SESSION['flat'] = false;
?>
<table class="table table-dark">
    <thead class="">
        <tr>
            <td>Product Instance Id(RFID)</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>Is Checked</td>
        </tr>
    </thead>
    <?php
    $query = "SELECT * FROM DELIVERYORDERDETAIL WHERE delivery_order_id  = '$id'";
    $data = mysqli_query($connect, $query);
    $rowCount = mysqli_num_rows($data);
    $n = 0;
    ?>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($data)) {
            echo "<tr>";
            echo "<td>" . $row['product_instance_id'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['quanlity'] . "</td>";
            echo "<td>" . $row['is_checked'] . "</td>";
            echo "</tr>";
            if ($row['is_checked'] == 1) {
                $n = $n + 1;
            }
            if ($n < $rowCount) {
                $_SESSION['flag'] = false;
            }
            if ($n == $rowCount) {
                $_SESSION['flag'] = true;
            }
        }
        ?>
    </tbody>
</table>