<?php
// Simpan harga dalam variabel
$harga = "Rp.10.000.000";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminLTE 3 | Products</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="../assets/plugins/fontawesome-free/css/all.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css" />
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="dashboard.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a
              class="nav-link"
              data-widget="navbar-search"
              href="#"
              role="button"
            >
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input
                    class="form-control form-control-navbar"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  />
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button
                      class="btn btn-navbar"
                      type="button"
                      data-widget="navbar-search"
                    >
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img
                    src="../assets/dist/img/user1-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 mr-3 img-circle"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"
                        ><i class="fas fa-star"></i
                      ></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img
                    src="../assets/dist/img/user8-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 img-circle mr-3"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"
                        ><i class="fas fa-star"></i
                      ></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img
                    src="../assets/dist/img/user3-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 img-circle mr-3"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"
                        ><i class="fas fa-star"></i
                      ></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer"
                >See All Messages</a
              >
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header"
                >15 Notifications</span
              >
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer"
                >See All Notifications</a
              >
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              data-widget="control-sidebar"
              data-slide="true"
              href="#"
              role="button"
            >
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
          <img
            src="../assets/dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="../assets/dist/img/user2-160x160.jpg"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <!-- <li class="nav-header"></li> -->
              <li class="nav-item">
                <a href="newproduct.html" class="nav-link active">
                  <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
                  <i class="nav-icon fas fa-cheese"></i>
                  <p>Products</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Products</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">
                    <a href="dashboard.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Products</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-end">
                    <h3 class="card-title col align-self-center">
                      List Products
                    </h3>
                    <!-- <div class="col justify-content-md-end"> -->
                    <button class="btn btn-primary col-sm-2">
                      <i class="nav-icon fas fa-plus mr-2"></i> Add Product
                    </button>
                    <!-- </div> -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Image</th>
                          <th style="width: 200px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1.</td>
                          <td>Acer Aspire 3 Slim A315</td>
                          <td><?php echo $harga; ?></td>
                          <td>
                            <div class="text-center">
                              <img
                                src="../assets/img/produk1.jpg"
                                class="img-thumbnail"
                                style="max-width: 150px"
                                alt=""
                              />
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-info">
                              <i class="nav-icon fas fa-edit mr-2"></i>Edit
                            </button>
                            <button class="btn btn-danger">
                              <i class="nav-icon fas fa-trash-alt mr-2"></i
                              >Delete
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>2.</td>
                          <td>Lenovo IdeaPad Slim D330 Flex</td>
                          <td><?php echo $harga; ?></td>
                          <td>
                            <div class="text-center">
                              <img
                                src="../assets/img/produk2.jpg"
                                class="img-thumbnail"
                                style="max-width: 150px"
                                alt=""
                              />
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-info">
                              <i class="nav-icon fas fa-edit mr-2"></i>Edit
                            </button>
                            <button class="btn btn-danger">
                              <i class="nav-icon fas fa-trash-alt mr-2"></i
                              >Delete
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>3.</td>
                          <td>ASUS VivoBook 15 A516MAO N4020</td>
                          <td><?php echo $harga; ?></td>
                          <td>
                            <div class="text-center">
                              <img
                                src="../assets/img/produk3.jpg"
                                class="img-thumbnail"
                                style="max-width: 150px"
                                alt=""
                              />
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-info">
                              <i class="nav-icon fas fa-edit mr-2"></i>Edit
                            </button>
                            <button class="btn btn-danger">
                              <i class="nav-icon fas fa-trash-alt mr-2"></i
                              >Delete
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>4.</td>
                          <td>HP Laptop 14s dq0508TU</td>
                          <td><?php echo $harga; ?></td>
                          <td>
                            <div class="text-center">
                              <img
                                src="../assets/img/produk4.jpg"
                                class="img-thumbnail"
                                style="max-width: 150px"
                                alt=""
                              />
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-info">
                              <i class="nav-icon fas fa-edit mr-2"></i>Edit
                            </button>
                            <button class="btn btn-danger">
                              <i class="nav-icon fas fa-trash-alt mr-2"></i
                              >Delete
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>5.</td>
                          <td>Xiaomi RedmiBook 15</td>
                          <td><?php echo $harga; ?></td>
                          <td>
                            <div class="text-center">
                              <img
                                src="../assets/img/produk5.jpg"
                                class="img-thumbnail"
                                style="max-width: 150px"
                                alt=""
                              />
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-info">
                              <i class="nav-icon fas fa-edit mr-2"></i>Edit
                            </button>
                            <button class="btn btn-danger">
                              <i class="nav-icon fas fa-trash-alt mr-2"></i
                              >Delete
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>6.</td>
                          <td>Lenovo V14 G2 ITL</td>
                          <td><?php echo $harga; ?></td>
                          <td>
                            <div class="text-center">
                              <img
                                src="../assets/img/produk6.jpg"
                                class="img-thumbnail"
                                style="max-width: 150px"
                                alt=""
                              />
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-info">
                              <i class="nav-icon fas fa-edit mr-2"></i>Edit
                            </button>
                            <button class="btn btn-danger">
                              <i class="nav-icon fas fa-trash-alt mr-2"></i
                              >Delete
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>7.</td>
                          <td>ASUS VivoBook 14 A416FA</td>
                          <td><?php echo $harga; ?></td>
                          <td>
                            <div class="text-center">
                              <img
                                src="../assets/img/produk7.jpg"
                                class="img-thumbnail"
                                style="max-width: 150px"
                                alt=""
                              />
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-info">
                              <i class="nav-icon fas fa-edit mr-2"></i>Edit
                            </button>
                            <button class="btn btn-danger">
                              <i class="nav-icon fas fa-trash-alt mr-2"></i
                              >Delete
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>8.</td>
                          <td>ASUS VivoBook Go 14 Flip TP1400KA</td>
                          <td><?php echo $harga; ?></td>
                          <td>
                            <div class="text-center">
                              <img
                                src="../assets/img/produk8.jpg"
                                class="img-thumbnail"
                                style="max-width: 150px"
                                alt=""
                              />
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-info">
                              <i class="nav-icon fas fa-edit mr-2"></i>Edit
                            </button>
                            <button class="btn btn-danger">
                              <i class="nav-icon fas fa-trash-alt mr-2"></i
                              >Delete
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                      <li class="page-item">
                        <a class="page-link" href="#">&laquo;</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">&raquo;</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div>
        <strong
          >Copyright &copy; 2014-2021
          <a href="https://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js"></script>
  </body>
</html>
