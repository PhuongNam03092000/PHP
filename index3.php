<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <?php
        $id = $_GET['id'];
        echo "<h1>Mã phiếu giao hàng :" . $id . "</h1> ";
        $connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
        mysqli_query($connect, "SET NAMES 'utf8'");
        $id = $_GET['id'];
        $query = "SELECT * FROM DELIVERYORDERDETAIL WHERE delivery_order_id='$id'";
        echo '<div class="card">';
        echo '<div class="card-header">';
        echo '<div>Thông tin phiếu giao hàng';
        echo '</div>';
        echo '<div class="card-body">';
        $data = mysqli_query($connect, $query);
        $arrayDeliveryOrderDetail = array();
        if (mysqli_num_rows($data) > 0) {
            echo '<table class="table">';
            echo '<thead>';
            echo "<tr>";
            echo "<th>RFID</th>";
            echo "<td>Name</td>";
            echo "<td>Quantity</td>";
            echo "</tr>";
            echo '</thead>';
            echo '<tbody>';
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
              
            }
            echo '</tbody>';
            echo '</table>';
        }else{
            echo '<h3 style="text-align:center;">Không có chi tiết</h3>';
        }
        
        echo '</div>';
        echo ' </div>';
        ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>