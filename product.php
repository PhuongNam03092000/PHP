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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index.php">Order</span></a>
                    <a class="nav-item nav-link active" href="product.php">Products</a>
                </div>
            </div>
        </nav>
        <hr>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Thông tin sản phẩm</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Feature</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "", "rfiddatabase");
                        mysqli_query($connect, "SET NAMES 'utf8'");

                        $query = "SELECT * FROM PRODUCTLINE";
                        $data = mysqli_query($connect, $query);
                        $row_cnt = mysqli_num_rows($data);
                        while ($row = mysqli_fetch_assoc($data)) {
                            echo '<tr>';
                            echo '<td>' . $row['product_line_id'] . '</td>';
                            echo '<td>' . $row['product_name'] . '</td>';
                            echo '<td>' . $row['product_price'] . '</td>';
                            echo '<td >' . $row['stock'] . '</td>';

                            echo '<td> <button type="button" id="#buttonLaunch" class="btn btn-primary btn-block" data-toggle="modal" onclick="Function(' . $row['product_line_id'] . ')" data-target="#modelId">
                                Update
                                </button></td>';
                            echo '</tr>';
                        }
                        ?>




                    </tbody>
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="#Content" class="modal-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function Function(value) {
          var xhttp = new XMLHttpRequest();
          var params = "id="+value;
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("#Content").innerHTML =
                this.responseText;
            }
          };
          xhttp.open("POST", "ModalUpdate.php", true);
          xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhttp.send(params);
        }
    </script>
</body>

</html>