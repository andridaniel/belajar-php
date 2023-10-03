<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login-layout</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css"/>

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"/>

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
            <img
              src="../assets/img/logo-transformer.png"
              width="100px"
              alt="logo github"
            />
          </div>
          <h3 class="text-center">Log-in</h3>
          <p class="login-box-msg">
            Please enter your Email and Password
          </p>

          <form action="../Pages/dashboard.html" method="post">
            <div class="container">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" />
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group">
                    <input
                      type="password"
                      class="form-control"
                      placeholder="Password"
                    />
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <p class="text-end mt-2">
                    <a href="forgot-password.html" class="text-primary"
                      >Forgot Password?</a
                    >
                  </p>
                  <button type="submit" class="btn btn-warning btn-block">
                    Sign In
                  </button>
            </div>
          </form>

          <!-- /.social-auth-links -->

          <p class="mb-0 mt-3 text-center">
            Don't have an account?
            <a href="register.html" class="text-warning fw-bold"><b>Sign up</b></a>

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