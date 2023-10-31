<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $group_id = 3;
    $sql = "INSERT INTO users (name, email, phone_number, username, password, group_id) VALUES ('$nama', '$email', '$no_hp', '$username', '$password', '$group_id')";

    if ($koneksi->query($sql) === TRUE) {
        $_SESSION['username'] = $username;
        header('Location: halaman-login.php');
    } else {
        $error = "Registrasi gagal. Silakan coba lagi.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

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
                <h3 class="card-title">Form Register</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">

                  <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Your Name">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                  </div>

                  <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="No HP">
                  </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="User Name">
                  </div>
        
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>

                <!-- /.card-body -->

                <div class="card-footer mt-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="halaman-login.php" class="btn btn-primary">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card --> 
  </body>
</html>

            