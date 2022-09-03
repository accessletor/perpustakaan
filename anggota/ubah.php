<?php 
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: ../login.php");
  exit;
}
require 'functions.php';
// ambil data di url
$id = $_GET["id"];
// query data
$ubah = query("SELECT * FROM anggota WHERE id = $id")[0];
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
  <title>Ubah Data Anggota</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
  <h1 class="text-center">Ubah Data</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $ubah['id']; ?>">
    <input type="hidden" name="fotoLama"  value="<?= $ubah['foto']; ?>">
    <div class="mb-3">
      <label for="id_anggota" class="form-label">ID Anggota</label>
      <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?= $ubah['id_anggota']; ?>">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $ubah['nama']; ?>">
    </div>
    <div class="mb-3">
      <p>Jenis Kelamin</p>
      <input class="form-check-input" type="radio" name="jk" value="laki-laki" id="laki" <?php if ($ubah['jk'] == 'laki-laki') {
        echo "checked";
      } ?>>
      <label class="form-check-label" for="laki">
        Laki-Laki
      </label>
      <input class="form-check-input" type="radio" name="jk" value='perempuan' id="perempuan" <?php if ($ubah['jk'] == 'perempuan') {
        echo "checked";
      } ?>>
      <label class="form-check-label" for="perempuan">
        Perempuan
      </label>
    </div>
    <div class="mb-3">
      <label for="alamat" class="col-form-label">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $ubah['alamat']; ?>">
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