<?php 

// konfigurasi paginasi
$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman - 1) * $batas;

// hitung total data
$hasil = mysqli_query($connection, "SELECT COUNT(*) AS total FROM barang");
$row = mysqli_fetch_assoc($hasil);
$total_data = $row['total'];
$total_halaman = ceil($total_data / $batas);

// ambil data untuk ditampilkan
$data_barang = mysqli_query($connection, "SELECT * FROM barang ORDER BY kode ASC LIMIT $halaman_awal, $batas"); 

