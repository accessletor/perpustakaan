<?php 
require 'functions.php';
// ambil data di url
$id = $_GET["id"];
// query data
$ubah = query("SELECT * FROM buku WHERE id = $id")[0];
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
  <title>Ubah Data Buku</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
  <h1 class="text-center">Ubah Data Buku</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $ubah['id']; ?>">
    <input type="hidden" name="fotoLama"  value="<?= $ubah['foto']; ?>">
    <div class="mb-3">
      <label for="kode_buku" class="form-label">Kode Buku</label>
      <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?= $ubah['kode_buku']; ?>">
    </div>
    <div class="mb-3">
      <label for="judul_buku" class="form-label">Judul Buku</label>
      <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?= $ubah['judul_buku']; ?>">
    </div>
    <div class="mb-3">
      <p>Kategori</p>
      <input class="form-check-input" type="radio" name="kategori" id="umum" <?php if ($ubah['kategori'] == 'umum') {
        echo "checked";
      } ?>>
      <label class="form-check-label" for="umum">
        UMUM
      </label>
      <input class="form-check-input" type="radio" name="kategori" id="novel" <?php if ($ubah['kategori'] == 'novel') {
        echo "checked";
      } ?>>
      <label class="form-check-label" for="novel">
        Novel
      </label>
      <input class="form-check-input" type="radio" name="kategori" id="pelajaran" <?php if ($ubah['kategori'] == 'pelajaran') {
        echo "checked";
      } ?>>
      <label class="form-check-label" for="pelajaran">
        pelajaran
      </label>
    </div>
    <div class="mb-3">
      <label for="tahun_terbit" class="col-form-label">Tahun Terbit</label>
      <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $ubah['tahun_terbit']; ?>">
    </div>
    <div class="mb-3">
      <label for="rak" class="col-form-label">Rak Buku</label>
      <input type="text" class="form-control" id="rak" name="rak" value="<?= $ubah['rak']; ?>">
    </div>
    <div class="mb-3">
      <label for="ubahubah" class="form-label">foto</label>
      <img src="img/<?= $ubah['foto'] ?>" alt="" style="width:100px;">
      <input type="file" class="form-control" id="filefile" name="foto">
    </div>
    <div class="d-grid gap-2 col-12 mx-auto">
      <button class="btn btn-primary" type="submit" name="submit">Button</button>
    </div>
  </form>
</body>
</html>