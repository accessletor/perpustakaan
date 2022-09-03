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
	$id_anggota = htmlspecialchars($data['id_anggota']);
	$nama = htmlspecialchars($data['nama']);
	$jk = htmlspecialchars($data['jk']);
	$alamat = htmlspecialchars($data['alamat']);

	// $foto = htmlspecialchars($data['file']);
	// upload
	$foto = upload();
	if (!$foto) {
		return false;
	}

	$query = "INSERT INTO anggota VALUES ('','$id_anggota','$nama','$jk','$alamat','$foto')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function upload(){
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];
	// cek apakah tidak ada file yang diupload
	if ($error === 4) {
		echo "<script>
		alert('upload file terlebih dahulu');
		</script>";
		return false;
	}
	// cek file apakah data foto atau bukan
	$ekstensiFileValid = ['png','jpg','jpeg'];
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
	mysqli_query($conn, "DELETE FROM anggota WHERE id = $id");
	unlink('img/'.$_GET['foto']);
	return mysqli_affected_rows($conn);
}
// ubah data
function ubah($data){
	global $conn;
	$id = $data['id'];
	$id_anggota = htmlspecialchars($data['id_anggota']);
	$nama = htmlspecialchars($data['nama']);
	$jk = htmlspecialchars($data['jk']);
	$alamat = htmlspecialchars($data['alamat']);
	$fotoLama = htmlspecialchars($data['fotoLama']);
	// cek apakah user upload file baru?
	if ($_FILES['foto']['error'] === 4) {
		$foto = $fotoLama;
	}else {
		$foto = upload();
	}
	

	$query = "UPDATE anggota SET 
	id_anggota = '$id_anggota',
	nama = '$nama',
	jk = '$jk',
	alamat = '$alamat',
	foto = '$foto'
	WHERE id = $id
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// cari
function search($keyword){
	$query = "SELECT * FROM anggota
	WHERE id_anggota LIKE '%$keyword%' OR 
	nama LIKE '%$keyword%' OR
	jk LIKE '%$keyword%' OR
	alamat LIKE '%$keyword%' OR
	foto LIKE '%$keyword%'
	";
	return query($query);
}

?>