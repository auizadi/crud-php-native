<?php

include('koneksi_db.php');
include('cari.php');
include('pagination.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP NATIVE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body>
    <div class="container my-5">
        <h1 class="fw-bold mb-5">CRUD PHP Native</h1>

        <!-- pencarian -->

        <!-- <form method="GET" action="cari.php" class="mb-4">
            <div class="row">
                <div class="col-4">
                    <input class="form-control col-4" name="keyword" type="search" placeholder="Cari..." aria-label="default input example" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-search me-2"></i>Cari</button>
                </div>
            </div>


        </form> -->

        <div>
            <a href="tambah_produk.php" class="text-decoration-none rounded-3 py-2 px-3 text-light fw-semibold bg-primary my-5">Tambah Produk</a>

        </div>
        <!-- tabel -->
        <table class="table table-responsive table-bordered p-3 my-4 text-center rounded-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Gambar Produk</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $query = "SELECT * FROM barang ORDER BY kode ASC";
                // $sql = mysqli_query($connection, $query);
                // if (!$sql) {
                //     die("Query Error:" . mysqli_errno($connection) . " - " . mysqli_error($connection));
                // }
                $no = $halaman_awal + 1;
                while ($row = mysqli_fetch_assoc($data_barang)) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
                        <td><?php echo htmlspecialchars(substr($row['deskripsi'], 0, 20)) . '...'; ?></td>
                        <td>Rp. <?php echo number_format($row['harga_satuan'], 0, ',', '.');  ?></td>
                        <td><?php echo $row['jumlah'];  ?></td>
                        <td>
                            <?php
                            $gambar = $row['foto'];
                            if ($gambar == null) {
                                echo "<img class='img-thumbnail' style='width: 120px;' src='gambar/no-image.png' alt='no image'>";
                            } else {
                                echo "<img class='img-thumbnail' style='width: 120px;' src='gambar/$gambar' alt='$gambar'>";
                            }
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="edit_produk.php?kode=<?php echo $row['kode']; ?>">Edit</a> |
                            <a class="btn btn-sm btn-danger" href="proses_hapus.php?kode=<?php echo $row['kode']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- paginasi -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                
                <?php if ($halaman > 1): ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman - 1 ?>">Previous</a></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_halaman; $i++): ?>
                    <li class="page-item <?= ($i == $halaman) ? 'active' : '' ?>">
                        <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($halaman < $total_halaman): ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman + 1 ?>">Next</a></li>
                <?php endif; ?>
            </ul>

        </nav>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>

</html>