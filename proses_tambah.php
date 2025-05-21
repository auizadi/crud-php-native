<?php
include('koneksi_db.php');

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
        $query = "INSERT INTO barang (nama_barang, deskripsi, harga_satuan, jumlah, foto) VALUES ('$nama_barang', '$deskripsi', '$harga_satuan', '$jumlah', '$nama_gambar_baru')";
        $sql = mysqli_query($connection, $query);
        if ($sql) {
            echo "<script>alert('Berhasil menambahkan data'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data'); window.location.href='tambah_produk.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar tidak diperbolehkan'); window.location.href='tambah_produk.php';</script>";
    }
} else {
    $query = "INSERT INTO barang (nama_barang, deskripsi, harga_satuan, jumlah, foto) VALUES ('$nama_barang', '$deskripsi', '$harga_satuan', '$jumlah', null)";
    $sql = mysqli_query($connection, $query);
    if (!$sql) {
        die("Query Error:" . mysqli_errno($connection) . "-" . mysqli_error($connection));
    } else {
        echo "<script>alert('Data berhasil ditambahkan');window.location='index.php';</script>";
    }
}
