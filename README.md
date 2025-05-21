# CRUD PHP Native
### Deskripsi proyek
- Tugas CRUD sederhana yang dibangun dengan PHP asli (Native) versi 8.4.3 
- Koneksi database disambungkan melalui script pada koneksi_db.php.
- Tampilan depan dibangun dengan script yang ada didalam index.php.
- Tampilan dan fungsional Tambah Produk dibangun dengan script yang ada didalam tambah_produk.php dan proses_tambah.php
- Tampilan dan fungsional Edit Produk dibangun dengan script yang ada didalam edit_produk.php dan proses_edit.php
- Fungsionalitas Hapus Produk dibangun dengan script yang ada didalam proses_hapus.php
- Fungsionalitas paginasi dibangun dengan script yang ada didalam pagination.php
<br>

### Cara menjalankannya
#### 1. Pastikan php dan database terinstall
#### 2. Buat database sesuai yang ada pada file koneksi_db.php serta sesuaikan nama tabel juga (barang)
#### 3. Jalankan proyek (saya menggunakan ekstensi PHP Server pada VSCode)
<br>


### 1. Tampilan Depan
![tampilan depan](/assets/nat1.png "tampilan depan")
Pada tampilan depan ini ditampilkan barang-barang yang ditambahkan oleh user dengan menekan tombol "Tambah Produk", selain itu pada halaman ini terdapat tombol Edit dan Hapus.
<br>

### 2. Tampilan Tambah Produk
![tampilan tambah produk](/assets/nat2.png "tampilan tambah produk")
![notifikasi tambah produk](/assets/nat3.png "notifikasi tambah produk")
Tampilan ini berisi form dengan beberapa label yang digunakan untuk menginputkan informasi seputar barang. Setelah penambahan data maka akan ada notifikasi berhasil menambahkan data.
<br>

### 3. Tampilan Edit Produk
![tampilan edit](/assets/nat4.png "tampilan edit")
![notifikasi berhasil edit](/assets/nat5.png "notifikasi berhasil edit")
Halaman ini berguna untuk mengedit atau mengganti informasi barang setelah data diperbaharui maka akan tampil notifikasi.
![tampilan setelah edit](/assets/nat6.png "tampilan setelah edit")
**(tampilan setelah edit)**
<br>

### 4. Tampilan Delete Produk
![tampilan delete](/assets/nat7.png "tampilan delete")
![notifikasi tampilan delete](/assets/nat8.png "notifikasi tampilan delete")
Ketika user menekan tombol Hapus, maka akan ada konfirmasi setelah user menekan OK akan ada notifikasi data berhasil dihapus.
<br>

