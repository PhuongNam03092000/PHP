<?php
$id = $_POST['deliveryorderid'];
$date = $_POST['date'];
$status = 0;
$connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
mysqli_query($connect, "SET NAMES 'utf8'");
$query = "INSERT INTO DELIVERYORDER VALUES('$id','$date','$status')";
session_start();
$_SESSION['id'] = $id;
if (mysqli_query($connect, $query)) {
    echo "Success";
} else {
    echo "Error";
}
mysqli_close($connect);
?>
<script>
    window.location.href = "index2.php";
</script>