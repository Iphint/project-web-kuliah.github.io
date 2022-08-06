<?php
// set session
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login1.php ");
    exit;
}
// koneksi
require 'functions.php';
// input data bayar
if (isset($_POST["submit"])) {
    if (tambah_bayar($_POST) == false) {
        echo "
        <script> 
        alert ('Pembayaran berhasil ditambahkan');
        alert ('Silahkan kembali belanja');   
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script> 
        alert ('Pembayaran gagal ditambahkan');      
        document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Form alamat</title>
</head>

<body>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 pt-4">
                    <h2>Dashboard pembayaran</h2>
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
                    <!-- form bayar -->
                    <div class="card mb-3">
                        <div class="card-header bg-secondary text-white">
                            Form alamat pembayaran MDS Store :
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama lengkap :</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama anda disini" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Alamat lengkap :</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan alamat anda disini" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No Hp :</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan no hp anda" name="nohp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email :</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email anda" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Via pembayaran :</label><br>
                                    <select name="opsi" id="opsi" required>
                                        <option value="Ovo">Ovo</option>
                                        <option value="Bank BRI">Bank BRI</option>
                                        <option value="Shoope Pay">Shoope Pay</option>
                                        <option value="COD">COD</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success">Bayar</button>
                                <button class="btn btn-danger text-white"><a href="index.php" style="text-decoration: none; color: azure; ">Kembali</a></button>
                            </form>
                        </div>
                    </div>
                    <!-- end form edit -->
                </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>