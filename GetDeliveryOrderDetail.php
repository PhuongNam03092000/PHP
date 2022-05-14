<?php
require "DeliveryOrderDetail.php";
$connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
mysqli_query($connect, "SET NAMES 'utf8'");
session_start();
$id = $_SESSION['id'];
?>
<?php
          if ($_SESSION['flag'] == true) {
            echo "<h3>Đã kiểm trả hoàn tất</h3>";
            echo "<div>";
            echo '<form action="SaveAll.php" method="post">';
            echo '  <button type="submit" id="accept" class="btn btn-success">Hàng đã đủ, nhập kho</button>';
            echo '</form>';
            echo "</div>";
          } else {
            echo "<div>";
            echo ' <button type="button" id="force-accept" class="btn btn-danger">Thiếu hàng, không thể nhập kho</button>';
            echo "</div>";
          }
          ?>
<table class="table table-dark">
    <thead class="">
        <tr style="font-weight: 700;">
            <td>Product Instance Id(RFID)</td>
            <td>Product Name</td>
            <td>Quantity</td>
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
            if ($row['is_checked'] == 0) {
                echo "<tr style='background-color:#dc3545;'>";
                echo "<td>" . $row['product_instance_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "</tr>";
            } else {
                echo "<tr style='background-color:#28a745;'>";
                echo "<td>" . $row['product_instance_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "</tr>";
            }
            if ($row['is_checked'] == 1) {
                $n = $n + 1;
            }
            if ($n < $rowCount) {
                $_SESSION['flag'] =false;
            }
            if ($n == $rowCount) {
                $_SESSION['flag'] = true;
            }
        }
        ?>
    </tbody>
</table>