<?php
include('koneksi_db.php');

if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];
    $query = "SELECT * FROM barang WHERE kode='$kode'";
    $sql = mysqli_query($connection, $query);
    if (!$sql) {
        die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
    }
    $data = mysqli_fetch_assoc($sql);
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan');window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('Masukkan data kode');window.location='index.php';>/script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">Edit Produk</h3>
            </div>
            <div class="card-body">
                <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input name="kode" value="<?php echo $data['kode']; ?>" hidden />
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" value="<?php echo $data['nama_barang']; ?>" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                            </div>
                            <div class="col-md-6">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" value="<?php echo $data['deskripsi']; ?>" id="deskripsi" name="deskripsi" placeholder="Deskripsi Barang" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                <input type="text" class="form-control" value="<?php echo $data['harga_satuan']; ?>" id="harga_satuan" name="harga_satuan" placeholder="Harga Satuan" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" value="<?php echo $data['jumlah']; ?>" id="jumlah" name="jumlah" placeholder="Jumlah" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" value="<?php echo $data['foto']; ?>" id="foto" name="foto">
                            <i class="text-danger float-start ">Abaikan jika tidak merubah gambar</i>

                        </div>

                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>