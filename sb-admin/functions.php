<?php
// hubungkan database
$conn = mysqli_connect('localhost', 'root', '', 'company');
// cek database connect atau tidak 
if (!$conn == true) {
    die("database tidak bisa dibuka");
} else {
    ("database bisa dibuka");
}

function registrasi($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $level = mysqli_real_escape_string($conn, $data["level"]);

    // cek username ready atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE 
                username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
        alert ( 'Username sudah terdaftar' );
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
        alert ( 'konfirmasi password anda tidak sesuai password pertama anda ' );
        </script>";
        return false;
    }

    // tambahkan user ke DB
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username', '$password', '$level')");
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM barang WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function hapus_transaksi($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM transaksi WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;
    $nama = $_POST['nama-barang'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];

    $simpan_file = 'img/' . $gambar;
    move_uploaded_file($gambar_tmp, $simpan_file);
    $save = mysqli_query($conn, "INSERT INTO barang(namaBrg,deskripsi,harga,gambar) VALUES ('$nama','$deskripsi','$harga', '$gambar') ");
}

function edit_data()
{
    global $conn;
    $id = $_POST['id'];
    $nama = $_POST['nama-barang'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];

    $simpan_file = 'img/' . $gambar;
    move_uploaded_file($gambar_tmp, $simpan_file);
    $save = mysqli_query($conn, "UPDATE barang SET namaBrg = '$nama', deskripsi = '$deskripsi', harga = '$harga', gambar = '$gambar' WHERE id = '$id' ");
}

function tambah_bayar($data)
{
    global $conn;
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['nohp'];
    $email = $_POST['email'];
    $opsi = $_POST['opsi'];

    $save = mysqli_query($conn, "INSERT INTO transaksi(nama,alamat,no_hp,email,via_pembayaran) VALUES ('$nama','$alamat','$hp', '$email', '$opsi') ");
}
