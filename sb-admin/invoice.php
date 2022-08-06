<?php
// set session
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login1.php ");
    exit;
}
// koneksi database
require 'functions.php';

// deklarasikan variabel untuk menampilkan data
$id = $_GET["id"];
$tampil = mysqli_query($conn, "SELECT * FROM barang WHERE id = $id");

while ($data = mysqli_fetch_array($tampil)) {
    $nama = $data['namaBrg'];
    $deskripsi = $data['deskripsi'];
    $harga = $data['harga'];
    $gambar = $data['gambar'];
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Payment</title>
</head>

<body>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 pt-4">
                    <h2>Dashboard detail pesanan</h2>
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
                    <!-- form edit -->
                    <div class="card mb-3">
                        <div class="card-header bg-secondary text-white">
                            Form pembayaran MDS Store :
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama barang :</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama barang disini" name="nama-barang" value="<?= $nama ?>" required disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Deskripsi barang :</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan deskripsi barang disini" name="deskripsi" value="<?= $deskripsi ?>" required disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Harga barang :</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Masukkan harga barang disini" name="harga" value="<?= $harga ?>" required disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Gambar :</label><br>
                                        <img src="./img/<?= $gambar ?>" style="width: 200px;">
                                    </div>
                                    <button class="btn btn-primary"><a href="detail-bayar.php" style="text-decoration: none; color: azure;">Bayar</a></button>
                                    <button class=" btn btn-danger text-white"><a href="index.php" style="text-decoration: none; color: azure; ">Kembali</a></button>
                                </form>
                            </form>
                        </div>
                    </div>
                    <!-- end form edit -->
                </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>