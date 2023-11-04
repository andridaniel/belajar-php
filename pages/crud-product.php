<?php
//login dahulu baru bisa masuk ke halaman
session_start();

if (!isset($_SESSION['no_hp'])) {
    header('Location: halaman-login.php');
    exit();
}
$no_hp = $_SESSION['no_hp'];

include 'koneksi.php';

class crudProduct {
    private $db;

    public function __construct($database) {
      $this->db = $database->getConnection();
    }

    public function getTotalProductCount() {
        $query = "SELECT COUNT(*) AS total FROM products";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getProducts($offset, $limit, $sortingColumn) {
        $query = "SELECT products.*, product_categories.category_name AS category_name 
                  FROM products 
                  INNER JOIN product_categories ON products.category_id = product_categories.id 
                  ORDER BY $sortingColumn
                  LIMIT $offset, $limit";
        return $this->db->query($query);
    }

    public function searchProducts($keyword) {
        $keyword = $this->db->real_escape_string($keyword);
        $query = "SELECT products.*, product_categories.category_name AS category_name
                  FROM products
                  INNER JOIN product_categories ON products.category_id = product_categories.id
                  WHERE
                  products.product_name LIKE '%$keyword%' OR
                  product_categories.category_name LIKE '%$keyword%' OR
                  products.product_code LIKE '%$keyword%' OR
                  products.description LIKE '%$keyword%'
                  ";
        return $this->db->query($query);
    }
}

$database = new Koneksi("127.0.0.1", "root", "", "pos_shop");
$productManager = new crudProduct($database);

$jumlahDataPerHalaman = 5;
$jumlahData = $productManager->getTotalProductCount();
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$sortingColumn = "products.id";
$products = $productManager->getProducts($awalData, $jumlahDataPerHalaman, $sortingColumn);

if (isset($_POST["cari"])) {
    $products = $productManager->searchProducts($_POST["keyword_search"]);
}

$database->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AdminLTE 3 | Products</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css" />
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
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                  aria-label="Search" />
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
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
                <img src="../assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle" />
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
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
                <img src="../assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
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
                <img src="../assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
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
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
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
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
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
        <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: 0.8" />
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $no_hp; ?></a>
          </div>

          <div class="info">
            <a href="logout.php" class="d-block">Logout</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="newproduct.html" class="nav-link active">
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

                  <!-- searching -->
                  <form action="" method="POST" class="form-inline" role="search">
                    <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="search" size="50" name="keyword_search"
                        placeholder="Search" aria-label="Search" />
                      <div class="input-group-append">
                        <button class="btn btn-primary" name="cari" type="submit">Cari</button>
                      </div>
                    </div>
                  </form>



                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                      <li class="page-item">
                        <?php if($halamanAktif > 1) : ?>
                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
                        <?php endif; ?>
                      </li>
                      <li class="page-item">
                        <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                        <a class="page-item btn-primary col-sm-3 " href="?halaman=<?= $i; ?>"> <?= $i; ?></a>
                        <?php else : ?>
                        <a class="page-item btn-warning col-sm-1" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                        <?php endif; ?>
                        <?php endfor; ?>
                      </li>

                      <li class="page-item">
                        <?php if($halamanAktif < $jumlahHalaman) : ?>
                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
                        <?php endif; ?>
                      </li>

                    </ul>
                  </div>
                  <!-- <div class="col justify-content-md-end"> -->
                  <button id="tmblcreate" class="btn btn-primary col-sm-2">
                    <i class="nav-icon fas fa-plus mr-2"></i> Add Product
                  </button>

                  <script>
                    document.getElementById("tmblcreate").addEventListener("click", function () {
                      // Redirect pengguna ke halaman lain
                      window.location.href = "create-product.php";
                    });
                  </script>

                  <!-- </div> -->
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Nama product</th>
                        <th>Kategori product</th>
                        <th>Kode product</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th style="width: 200px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          if ($products->num_rows > 0) {
                              $i = 1;
                              while ($row = $products->fetch_assoc()) {
                        ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><?php echo $row["category_name"]; ?></td>
                        <td><?php echo $row["product_code"]; ?></td>
                        <td>
                          <?php echo $row["description"]; ?>
                        </td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["stock"]; ?></td>
                        <td>
                          <?php
                            $gambarArray = json_decode($row["image"]);
                            if ($gambarArray !== null && is_array($gambarArray)) {
                              foreach ($gambarArray as $gambar) {
                                echo '<img src="../assets/img/gambar/' . $gambar . '" alt="gambar" width=80 class="m-2 border border-5"><br>';
                              }
                            }
                          ?>

                        </td>
                        <td>
                          <a href="update_product.php?id=<?php echo $row['id']; ?>" class="btn btn-info">
                            <i class="nav-icon fas fa-edit mr-2"></i>Update
                          </a>

                          <form method="post" action="hapus_product.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-danger mt-2" name="hapus">
                              <i class="nav-icon fas fa-trash-alt mr-3"></i>Delete
                            </button>
                          </form>
                        </td>
                      </tr>
                      <?php
                          $i++;
                          }
                          } else {
                                  echo "<tr><td colspan='5'>Tidak ada data produk yang ditemukan.</td></tr>";
                                }
                        ?>
                    </tbody>
                  </table>
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
      <strong>Copyright &copy; 2014-2021
        <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
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