<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body>
          <!-- left column -->
          <div class="col-md-6 mt-5 ">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">CREATE PRODUCT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="create-product.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="namaproduct">Nama Products</label>
                    <input type="text" name="namaproduct" class="form-control" id="namaproduct" placeholder="Nama Product">
                  </div>
                  <div class="form-group">
                    <label for="kategoriproduct">Kategori Product</label>
                    <input type="text" name="kategoriproduct" class="form-control" id="kategoriproduct" placeholder="Kategori Product">
                  </div>
                  <div class="form-group">
                    <label for="kodeproduct">Kode Product</label>
                    <input type="text" name="kodeproduct" class="form-control" id="kodeproduct" placeholder="Kode Product">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" cols="20"></textarea><br><br>
                  </div>

                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="crud-product.php" class="btn btn-primary">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card --> 
  </body>
</html>

            