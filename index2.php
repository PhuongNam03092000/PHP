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
      $connect = mysqli_connect("localhost","root","","rfiddatabase");
      mysqli_query($connect,"SET NAMES 'utf8'");
      session_start(); 
      $id = $_SESSION['id'];
    
     ?>
      <div class="container">
        <?php echo "<h1>Mã phiếu giao hàng : . $id</h1> ";?>
        <div class="card">
          <div class="card-header">
              Thêm thông tin phiếu giao hàng
          </div>
          <div class="card-body">
          <form action="InsertOrderDetail.php" method="post" enctype="multipart/form-data">
            Order id: <input readonly type="text" name="orderid" class="form-control" value="<?php echo $id ?>">
           File excel :  <input type="file" name="file" id="file" />
           <button class="btn btn-success">Insert</button>
        </form>
          </div>
        </div>
        <hr>
        <div class="card">
          <div class="card-header">
            Thông tin phiếu giao hàng
          </div>
          <div class="card-body">
          <table class="table table-dark">
          <thead class="">
            <tr>
              <td>Product Instance Id</td>
              <td>Is Checked</td>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = "SELECT * FROM DELIVERYORDERDETAIL WHERE delivery_order_id  = '$id'";
              $data = mysqli_query($connect,$query);
              if (mysqli_num_rows($data) > 0) {
                while($row = mysqli_fetch_assoc($data)){
                   
                    echo '<th>'.$row['product_instance_id'].'</th>';
                    if($row['is_checked']==0){
                      echo '<th>'.'Checked'.'</th>';
                    }else{
                      echo '<th>'.'Null'.'</th>';
                    }
                }
            }
            ?>
          </tbody>
        </table>
          </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>