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

<body class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="index.php">Order</span></a>
        <a class="nav-item nav-link" href="product.php">Products</a>
      </div>
    </div>
  </nav>
  <hr>
  <div class="card">
    <div class="card-header">
      Thêm phiếu giao hàng
    </div>
    <div class="card-body">
      <form action="InsertDelivery.php" method="post">
        Id : <input type="text" name="deliveryorderid" class="form-control"><br>
        Date : <input type="date" name="date" class="form-control" readonly value="<?php echo date("Y-m-d"); ?>"><br>
        <button type="submit" class="btn btn-success btn-block" >INSERT</button>
      </form>
    </div>
  </div>
  <hr>
  <div class="container">
    <table class="table">
      <thead >
        <tr>
          <th>Id</th>
          <th>Date</th>
          <td>Status</td>
          <td>Features</td>
        </tr>
      </thead>
      <tbody>
        <?php
            $connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
            mysqli_query($connect, "SET NAMES 'utf8'");
            $query = "SELECT * FROM DELIVERYORDER";
            $data = mysqli_query($connect, $query);
            if (mysqli_num_rows($data) > 0) {
              while ($row = mysqli_fetch_assoc($data)) {
                  $style;
                  $string;
                  if($row['order_status']==0) 
                   
                  {
                    $string = "Chưa hoàn tất";
                    $style = "color:#dc3545;";
                  }
                  else
                  {
                    $string = "Hoàn tất";
                    $style = "color:#28a745;";
                  }
                  echo '<tr >';
                  echo '<td>'.$row['delivery_order_id'].'</td>';
                  echo '<td>'.$row['delivery_order_date'].'</td>';
                  echo '<td >'.'<span style="'.$style.'">'.$string.'</span>'.'</td>';
                  echo '<td class="btn-group btn-block">';
                  echo '<a class="btn btn-dark " href="index3.php?id='.$row['delivery_order_id'].'">Details</a>';
                  echo '<a class="btn btn-danger " href="Delete.php?id='.$row['delivery_order_id'].'">Delete</a>';
                  echo '</td>';
                  echo '</tr>'; 
              }
            } 
        ?>
      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>