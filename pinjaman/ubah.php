<?php 
require 'functions.php';
// ambil data di url
$id = $_GET["id"];
// query data
$ubah = query("SELECT * FROM transaksi_peminjaman WHERE id = $id")[0];
if (isset($_POST['submit'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
    alert('berhasil mengubah Data');
    document.location.href = 'index.php';
    </script>";
  }else {
    echo "<script>
    alert('gagal mengubah Data');
    document.location.href = 'index.php';
    </script>";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Pinjamaman</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
  <h1 class="text-center">Ubah Data Peminjaman</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $ubah['id']; ?>">
    <div class="mb-3">
      <label for="id_anggota" class="form-label">ID Anggota</label>
      <input type="text" class="form-control" id="id_anggota" aria-describedby="emailHelp" name="id_anggota" value="<?= $ubah['id_anggota']; ?>">
    </div>
    <div class="mb-3">
      <label for="nama_anggota" class="form-label">Nama Anggota</label>
      <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?= $ubah['nama_anggota']; ?>">
    </div>
    <div class="mb-3">
      <label for="kode_buku" class="form-label">Kode Buku</label>
      <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?= $ubah['kode_buku']; ?>">
    </div>
    <div class="mb-3">
      <label for="judul_buku" class="form-label">Judul Buku</label>
      <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?= $ubah['judul_buku']; ?>">
    </div>
    <div class="mb-3">Tanggal Peminjaman</label>
      <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $ubah['tgl_pinjam']; ?>">
    </div>
    <div class="d-grid gap-2 col-12 mx-auto">
      <button class="btn btn-primary" type="submit" name="submit">Button</button>
    </div>
  </form>
</body>
</html>