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
  <?php
  session_start();
  // set sesseion flat = false
  if ($_SESSION['id'] == null) {
    header("Location: index.php");
  } else {
    $id = $_SESSION['id'];
  }
  $_SESSION['flat'] = "false";
  ?>
  <div class="container">
    <?php echo "<h1>Mã phiếu giao hàng : . $id</h1> "; ?>
    <div class="card">
      <div class="card-header">
        Thêm thông tin phiếu giao hàng
      </div>
      <div class="card-body">
        <form action="InsertOrderDetail.php" method="post" enctype="multipart/form-data">
          Order id: <input readonly type="text" name="orderid" class="form-control" value="<?php echo $id ?>">
          File excel : <input size='50' type='file' name='filename'>
          <input type='submit' name='submit' value='Upload Products'>
        </form>
      </div>
    </div>
    <hr>
    <div class="card">
      <div class="card-header">
        <div>Thông tin phiếu giao hàng
          <?php
          if ($_SESSION['flat'] == "true") {
            echo "<h3>Đã kiểm trả hoàn tất</h3>";
            echo "</div>";
            echo "<div>";
            echo '<form action="SaveAll.php" method="post">';
            echo '  <button type="submit" id="accept" class="btn btn-success">Hàng đã đủ, nhập kho</button>';
            echo '</form>';
          } else {
            echo "<div>";
            echo '<form action="SaveAll.php" method="post">';
            echo '  <button type="submit" id="accept" class="btn btn-danger">Thiếu hàng, chấp nhận nhập kho</button>';
            echo '</form>';
          }
          ?>
        </div>
        <div class="card-body">
          <div id="table-delivery-detail">

          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      function loadXMLDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table-delivery-detail").innerHTML =
              this.responseText;
          }
        };
        xhttp.open("GET", "GetDeliveryOrderDetail.php", true);
        xhttp.send();
      }
      setInterval(loadXMLDoc, 500);
      window.onload = loadXMLDoc;
    </script>
</body>

</html>