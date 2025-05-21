<?php

include('koneksi_db.php');

$kode = $_POST['kode'];
$nama_barang = $_POST['nama_barang'];
$deskripsi = $_POST['deskripsi'];
$harga_satuan = $_POST['harga_satuan'];
$jumlah = $_POST['jumlah'];
$foto = $_FILES['foto']['name'];

if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $split_ekstensi = explode('.', $foto);
    $ekstensi = strtolower(end($split_ekstensi));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);
        $query = "UPDATE barang SET nama_barang = '$nama_barang', deskripsi = '$deskripsi', harga_satuan = '$harga_satuan', jumlah = '$jumlah', foto = '$nama_gambar_baru' WHERE kode = '$kode'";
        $sql = mysqli_query($connection, $query);
        if ($sql) {
            echo "<script>alert('Berhasil memperbaharui data'); window.location.href='index.php';</script>";
        } else {
            die ("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
        }
    } else {
        echo "<script>alert('Ekstensi gambar tidak diperbolehkan'); window.location.href='tambah_produk.php';</script>";
    }
} else {
    $query = "UPDATE barang SET nama_barang = '$nama_barang', deskripsi = '$deskripsi', harga_satuan = '$harga_satuan', jumlah = '$jumlah' WHERE kode = ''$kode";
    $sql = mysqli_query($connection, $query);
    if (!$sql) {
        die("Query Error:" . mysqli_errno($connection) . "-" . mysqli_error($connection));
    } else {
        echo "<script>alert('Data berhasil diperbaharui');window.location='index.php';</script>";
    }
}
