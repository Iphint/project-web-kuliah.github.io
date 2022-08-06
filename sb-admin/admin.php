<?php
// set session
session_start();
if (!isset($_SESSION["admin"])) {
  header("location: admin-login.php ");
  exit;
}
// koneksi
require 'functions.php';
$isi = mysqli_query($conn, "SELECT * FROM barang");

// tambah barang
if (isset($_POST['submit'])) {
  // cek data gagal masuk atau tidak
  if (tambah($_POST) == false) {
    echo "
        <script> 
        alert ('Data berhasil ditambahkan');
        document.location.href = 'admin.php';
        </script>
        ";
  } else {
    echo "
        <script> 
        alert ('Data gagal ditambahkan');
        document.location.href = 'admin.php';
        </script>
        ";
  }
}
$user = mysqli_query($conn, "SELECT * FROM user");
$usr = mysqli_fetch_array($user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Admin page</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-5" href="admin.php"><i class="fa-brands fa-shopify text-danger"></i> MDS</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Dashboard</div>
            <a class="nav-link" href="admin.php">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-landmark"></i></div>
              Dashboard master
            </a>
            <a class="nav-link" href="pembayaran.php">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-sack-dollar"></i></div>
              Info pembayaran
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
        <section id="main">
          <div class="container">
            <div class="row">
              <div class="col-md-6 mb-3 pt-4">
                <h2>Dashboard <?= $usr['username'] ?></h2>
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
              <div class="max-auto">
                <!-- form tambah -->
                <div class="card mb-3">
                  <div class="card-header bg-primary text-white">
                    Form tambah data produk MDS Store :
                  </div>
                  <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <form>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama barang :</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama barang disini" name="nama-barang" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Deskripsi barang :</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan deskripsi barang disini" name="deskripsi" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Harga barang :</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Masukkan harga barang disini" name="harga" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Gambar :</label>
                          <input type="file" class="form-control" id="exampleInputPassword1" name="gambar">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                      </form>
                    </form>
                  </div>
                </div>
                <!-- end form tambah -->
                <!-- form tampil -->
                <div class="card mb-3">
                  <div class="card-header bg-success text-white">
                    Data master :
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped">
                      <tr class="text-center">
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>
                      <?php
                      $no = 1;
                      foreach ($isi as $row) :
                      ?>
                        <tr>
                          <td class="text-center"> <?= $no++ ?> </td>
                          <td class="text-center"> <?= $row['id'] ?> </td>
                          <td> <?= $row['namaBrg'] ?> </td>
                          <td> <?= $row['deskripsi'] ?> </td>
                          <td> <?= $row['harga'] ?> </td>
                          <td> <img src="./img/<?= $row['gambar'] ?>" width="120px"></td>
                          <td><a href="form-edit.php?id= <?= $row['id'] ?> "><i class="fa-solid fa-arrow-rotate-right"></i></a> | <a href="hapus.php?id= <?= $row['id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a></td>
                        </tr>
                      <?php endforeach ?>


                    </table>
                  </div>
                </div>
                <!-- end form tempil -->
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