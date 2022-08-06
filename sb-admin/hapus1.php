<?php
require 'functions.php';
// Jadikan id sebagai acuan
$id = $_GET["id"];
if (hapus_transaksi($id) > 0) {
    echo "
        <script> 
        alert ('Pembayaran sukses');
        document.location.href = 'pembayaran.php';
        </script>
        ";
} else {
    echo "
        <script> 
        alert ('Pembayaran gagal');
        // document.location.href = 'pembayaran.php';
        </script>
        ";
}
