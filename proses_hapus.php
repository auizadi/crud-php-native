<?php 

include('koneksi_db.php');

$kode = $_GET['kode'];
$query = "DELETE FROM barang WHERE kode='$kode'";
$sql = mysqli_query($connection, $query);
if ($sql) {
    echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
} else {
    die ("Query Error : " . mysqli_errno($connection) . " . ". mysqli_error($connection));
}