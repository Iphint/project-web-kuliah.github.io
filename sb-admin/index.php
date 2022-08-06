<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("location: login1.php ");
  exit;
}
// connect database
include 'functions.php';
$tampil = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Welcome MDS Store</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-5" href="index.php"><i class="fa-brands fa-shopify text-danger"></i> MDS</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li>
            <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link" href="makanan.php">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-bowl-food"></i></div>
              Foods
            </a>
            <a class="nav-link" href="pakaian.php">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-shirt"></i></div>
              T-shirt
            </a>
            <a class="nav-link" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-left"></i></div>
              Logout
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer ps-5">
          <div class="small">Developed by:</div>
          MDS - Store
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <section id="makanan">
          <div class="container">
            <div class="row">
              <div class="col-md-6 mb-3">
                <h1><i>Selamat berbelanja</i> <i class="fa-solid fa-face-smile-wink text-success"></i> </h1>
              </div>
              <div class="col-md-6 mb-3 pt-4">
                <h6 style="text-align: right;">
                  <?php
                  date_default_timezone_set('Asia/Jakarta');
                  $hari = new DateTime();
                  echo $hari->format('D M Y, h:i:s')
                  ?>
                </h6>
              </div>
            </div>
            <div class="row">
              <?php foreach ($tampil as $row) : ?>
                <div class="col-md-3">
                  <div class="card mb-3">
                    <img src="img/<?= $row["gambar"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?= $row["namaBrg"] ?></h5>
                      <p class="card-text"><?= $row["deskripsi"] ?></p>
                      <div class="bungkus d-flex justify-content-between">
                        <h6 class="card-text mt-2">IDR.<?= $row["harga"] ?></h6>
                        <a class="btn btn-primary text-white mr-5" href=" invoice.php?id=<?= $row['id'] ?>">Beli Gaes</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </section>
      </main>

      <footer class="py-3 bg-dark mt-auto">
        <div class="container">
          <div class="d-flex align-items-center justify-content-center small">
            <div class="text-muted">
              <p>Copyright &copy; mds_store
                <?= date('Y'); ?></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

</html>