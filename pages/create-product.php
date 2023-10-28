<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $namaProduct = $_POST["namaproduct"];
  $kategoriProduct = $_POST["kategoriproduct"];
  $kodeProduct = $_POST["kodeproduct"];
  $deskripsi = $_POST["deskripsi"];
  $harga = $_POST["harga"];
  $stock = $_POST["stock"];

  // upload gambar
  $gambar = upload();
  if(!$gambar){
    return false;
  }

  include 'koneksi.php'; // Pastikan file koneksi.php ada dan berisi koneksi ke database yang benar.

  if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
  }

  $sql = "INSERT INTO products (product_name, category_id, product_code, description, price, stock, image) VALUES ('$namaProduct', '$kategoriProduct', '$kodeProduct', '$deskripsi', '$harga', '$stock', '$gambar')";

  if ($koneksi->query($sql) === TRUE) {
    header("Location: crud-product.php");
  } else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
  }

  $koneksi->close();
}

function upload(){
  $gambarArray = array();
  $files = $_FILES['gambar'];

  foreach($files['name'] as $key => $namaFile) {
    $ukuranFile = $files['size'][$key];
    $error = $files['error'][$key];
    $tmpName = $files['tmp_name'][$key];

    if ($error === 4) {
      continue; // Lewati jika tidak ada file yang diunggah
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
    $ekstensiGambar = strtolower($ekstensiGambar);

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
              alert('Gambar $namaFile bukan file gambar (jpg, jpeg, png)'); 
            </script>";
      continue; // Lewati jika bukan file gambar yang valid
    }

    if ($ukuranFile > 1000000) {
      echo "<script>
              alert('Gambar $namaFile terlalu besar!'); 
            </script>";
      continue; // Lewati jika ukuran gambar terlalu besar
    }

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
    move_uploaded_file($tmpName, '../assets/img/gambar/' . $namaFileBaru);
    $gambarArray[] = $namaFileBaru;
  }

  return json_encode($gambarArray);
}
?>



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
          <div class="col-md-6 mt-5 mx-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">CREATE PRODUCT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="create-product.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="namaproduct">Nama Products</label>
                    <input type="text" name="namaproduct" class="form-control" id="namaproduct" placeholder="Nama Product">
                  </div>
                  <div class="form-group">
                    <label for="kategoriproduct">Kategori Product</label>
                    <select name="kategoriproduct" class="form-control" id="kategoriproduct">
                      <option value="" disabled selected>Pilih Kategori</option>
                      <option value="1">Sports</option>
                      <option value="2">Daily</option>
                      <option value="3">Accesoris</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="kodeproduct">Kode Product</label>
                    <input type="text" name="kodeproduct" class="form-control" id="kodeproduct" placeholder="Kode Product">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" cols="10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
                  </div>

                  <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock" placeholder="stock">
                  </div>

                <div class="form-group">
                  <label for="gambar">Images</label><br>
                  <?php
                    if (isset($data) && isset($data['image'])) {
                      $gambarArray = json_decode($data['image']);
                      foreach ($gambarArray as $gambar) {
                        echo '<img src="../assets/img/gambar/' . $gambar . '" width="50" alt="gambar"><br>';
                      }
                    }
                  ?>
                  <input type="file" name="gambar[]" id="gambar" multiple><br>
                </div>
               
                <!-- /.card-body -->

                <div class="card-footer mt-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="crud-product.php" class="btn btn-primary">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card --> 
  </body>
</html>

            