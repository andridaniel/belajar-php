<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ensure that the 'id' is set and is a numeric value
  if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
    $id = $_POST["id"];
    $namaproduct = $_POST["namaproduct"];
    $kategoriproduct = $_POST["kategoriproduct"];
    $kodeproduct = $_POST["kodeproduct"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];
    $stock = $_POST["stock"];
    $gambarLama = $_POST["gambarLama"];

    if ( $_FILES['gambar']['error'] === 4 ){
      $gambar = $gambarLama;
    }else{
      $gambar = upload();
    }

    // Prepare and execute the SQL UPDATE statement
    $sql = "UPDATE products SET product_name=?, category_id=?, product_code=?, description=?, price=?, stock=?, image=? WHERE id=?";
    $stmt = $koneksi->prepare($sql);
    
    if ($stmt) {
      $stmt->bind_param("sssssssi", $namaproduct, $kategoriproduct, $kodeproduct, $deskripsi, $harga, $stock, $gambar, $id);

      if ($stmt->execute()) {
        header("Location: crud-product.php");
      } else {
        echo "Error updating record: " . $stmt->error;
      }
      $stmt->close();
    } else {
      echo "Error in SQL statement: " . $koneksi->error;
    }
  } else {
    echo "Invalid or missing 'id' parameter.";
  }
}

// ini function upload
function upload(){
  $gambarArray = array();
  $files = $_FILES['gambar'];

  foreach($files['name'] as $key => $namaFile) {
    $ukuranFile = $files['size'][$key];
    $error = $files['error'][$key];
    $tmpName = $files['tmp_name'][$key];

    // cek apakah tidak ada gambar yang diunggah
    if($error === 4){
      continue; // Lewati jika tidak ada file yang diunggah
    }

    // cek apakah yang diunggah adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      continue; // Lewati jika bukan file gambar yang valid
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000){
      continue; // Lewati jika ukuran gambar terlalu besar
    }

    // setelah lolos pengecekan gambar, siap diunggah
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
    move_uploaded_file($tmpName, '../assets/img/gambar/' . $namaFileBaru);
    $gambarArray[] = $namaFileBaru;
  }

  return json_encode($gambarArray);
}


// Fetch the record to populate the form
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM products WHERE id = ?";
  $stmt = $koneksi->prepare($sql);
  
  if ($stmt) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $data = $result->fetch_assoc();
    } else {
      echo "Record not found.";
    }
    $stmt->close();
  } else {
    echo "Error in SQL statement: " . $koneksi->error;
  }
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
<div class="col-md-6 mt-5 mx-auto">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">UPDATE PRODUCT</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="update_product.php" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
          <input type="hidden" name="gambarLama" value="<?php echo $data['image']; ?>">
                    
          <div class="form-group">
            <label for="namaproduct">Nama Products</label>
            <input type="text" name="namaproduct" class="form-control" id="namaproduct" required value="<?php echo $data["product_name"]; ?>">
          </div>
          <div class="form-group">
            <label for="kategoriproduct">Kategori Product</label>
            <select name="kategoriproduct" class="form-control" id="kategoriproduct">
              <option value="" disabled>Pilih Kategori</option>
              <option value="1" <?php if ($data['category_id'] == 1) echo 'selected'; ?>>Sports</option>
              <option value="2" <?php if ($data['category_id'] == 2) echo 'selected'; ?>>Daily</option>
              <option value="3" <?php if ($data['category_id'] == 3) echo 'selected'; ?>>Accessories</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kodeproduct">Kode Product</label>
            <input type="text" name="kodeproduct" class="form-control" id="kodeproduct" required value="<?php echo $data["product_code"]; ?>">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required><?php echo $data["description"]; ?></textarea>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" required value="<?php echo $data["price"]; ?>">
          </div>
          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" id="stock" required value="<?php echo $data["stock"]; ?>">
          </div>
          <div class="form-group">
          <?php
            $gambarArray = json_decode($data['image']);
            if (!empty($gambarArray)) {
              echo "<p>Gambar Lama:</p>";
              foreach ($gambarArray as $gambar) {
                echo '<img src="../assets/img/gambar/' . $gambar . '" width="70" alt="gambar"><br>';
              }
            }
            
          ?>
          <input type="file" name="gambar[]" id="gambar" multiple>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer mt-2">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="crud-product.php" class="btn btn-primary">Kembali</a>
        </div>
      </form>
    </div>
    <!-- /.card --> 
  </div>
            <!-- /.card --> 
  </body>
</html>

            