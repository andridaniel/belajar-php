<?php
session_start();
include 'koneksi.php';

class halamanLogin {
    private $db;

    public function __construct($database) {
        $this->db = $database->getConnection();
    }

    public function login($no_hp, $password) {
        // Lindungi dari SQL Injection dengan menghindari inputan langsung
        $no_hp = $this->db->real_escape_string($no_hp);
        $password = $this->db->real_escape_string($password);

        $sql = "SELECT * FROM users WHERE phone_number = '$no_hp' AND password = '$password'";
        $result = $this->db->query($sql);

        if ($result) {
            if ($result->num_rows == 1) {
                $_SESSION['no_hp'] = $no_hp;
                header('Location: dashboard.php');
            } else {
                $error = "Login gagal. Silahkan periksa kembali nomor handphone dan password Anda.";
            }
        } else {
            $error = "Terjadi kesalahan dalam eksekusi query.";
        }
    }
}

$database = new Koneksi("127.0.0.1", "root", "", "pos_shop");
$userManager = new halamanLogin($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $userManager->login($no_hp, $password);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Halaman-login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css" />

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />

  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css" />
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <!-- <div class="card-header text-center">
      <a href="../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div> -->
      <div class="card-body bg-dark">
        <div class="text-center">
          <img src="../assets/img/logo-transformer.png" width="100px" alt="logo github" />
        </div>
        <h3 class="text-center">Log-in</h3>
        <p class="login-box-msg">
          Please enter your Username and Password
        </p>

        <form action="halaman-login.php" method="POST">
          <div class="container">
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <p class="text-end mt-2">
              <a href="forgot-password.html" class="text-primary">Forgot Password?</a>
            </p>
            <p><?php if (isset($error)) { echo "<p>$error</p>"; } ?></p>
            <button type="submit" class="btn btn-warning btn-block">
              Sign In
            </button>
          </div>
        </form>

        <!-- /.social-auth-links -->

        <p class="mb-0 mt-3 text-center">
          Don't have an account?
          <a href="register.php" class="text-warning fw-bold"><b>Sign up</b></a>

        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>