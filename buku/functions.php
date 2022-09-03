<?php 
$conn = mysqli_connect("localhost", "root", "", "perpustakaan");
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// tambah
function tambah($data){
	global $conn;
	$kode_buku = htmlspecialchars($data['kode_buku']);
	$judul_buku = htmlspecialchars($data['judul_buku']);
	$kategori = htmlspecialchars($data['kategori']);
	$tahun_terbit = htmlspecialchars($data['tahun_terbit']);
	$rak = htmlspecialchars($data['rak']);


	// $foto = htmlspecialchars($data['file']);
	// upload
	$foto = upload();
	if (!$foto) {
		return false;
	}

	$query = "INSERT INTO buku VALUES ('','$kode_buku','$judul_buku','$kategori','$tahun_terbit','$rak','$foto')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function upload(){
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];
	// cek apakah tidak ada file yang diupload
	// if ($error === 4) {
	// 	echo "<script>
	// 	alert('upload file terlebih dahulu');
	// 	</script>";
	// 	return false;
	// }
	// cek file apakah data file atau bukan
	$ekstensiFileValid = ['jpg','jpeg','png'];
	$ekstensiFile = explode('.', $namaFile);
	$ekstensiFile = strtolower(end($ekstensiFile));
	if (!in_array($ekstensiFile, $ekstensiFileValid)) {
		echo "<script>
		alert('file tidak diizinkan atau kosong');
		</script>";
	}
	if ($ukuranFile > 2000000) {
		echo "<script>
		alert('file terlalu besar');
		</script>";
	}
	// generate nama file baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFile;
	// lolos pengecekan
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;
}
// hapus
function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
	unlink('img/'.$_GET['foto']);
	return mysqli_affected_rows($conn);
}
// ubah data
function ubah($data){
	global $conn;
	$id = $data['id'];
	$kode_buku = htmlspecialchars($data['kode_buku']);
	$judul_buku = htmlspecialchars($data['judul_buku']);
	$kategori = htmlspecialchars($data['kategori']);
	$tahun_terbit = htmlspecialchars($data['tahun_terbit']);
	$rak = htmlspecialchars($data['rak']);
	$fotoLama = htmlspecialchars($data['fotoLama']);
	// cek apakah user upload file baru?
	if ($_FILES['foto']['error'] === 4) {
		$foto = $fotoLama;
	}else {
		$foto = upload();
	}
	

	$query = "UPDATE buku SET 
	kode_buku = '$kode_buku',
	judul_buku = '$judul_buku',
	kategori = '$kategori',
	tahun_terbit = '$tahun_terbit',
	rak = '$rak',
	foto = '$foto'
	WHERE id = $id
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// cari
function search($keyword){
	$query = "SELECT * FROM buku
	WHERE kode_buku LIKE '%$keyword%' OR 
	judul_buku LIKE '%$keyword%' OR
	kategori LIKE '%$keyword%' OR
	tahun_terbit LIKE '%$keyword%' OR
	rak LIKE '%$keyword%' OR
	foto LIKE '%$keyword%' OR
	";
	return query($query);
}

?>