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
	$nama_anggota = htmlspecialchars($data['nama_anggota']);
	$kode_buku = htmlspecialchars($data['kode_buku']);
	$judul_buku = htmlspecialchars($data['judul_buku']);
	$tgl_pengembalian = htmlspecialchars($data['tgl_pengembalian']);

	$query = "INSERT INTO transaksi_pengembalian VALUES ('','$id_anggota','$nama_anggota','$kode_buku','$judul_buku','$tgl_pengembalian')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// -
// hapus
function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM transaksi_pengembalian WHERE id = $id");
	return mysqli_affected_rows($conn);
}
// ubah data
function ubah($data){
	global $conn;
	$id = $data['id'];
	$id_anggota =htmlspecialchars($data['id_anggota']);
	$nama_anggota = htmlspecialchars($data['nama_anggota']);
	$kode_buku = htmlspecialchars($data['kode_buku']);
	$judul_buku = htmlspecialchars($data['judul_buku']);
	$tgl_pengembalian = htmlspecialchars($data['tgl_pengembalian']);

	$query = "UPDATE transaksi_pengembalian SET 
	id_anggota = '$id_anggota',
	nama_anggota = '$nama_anggota',
	kode_buku = '$kode_buku',
	judul_buku = '$judul_buku',
	tgl_pengembalian = '$tgl_pengembalian'
	WHERE id = $id
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// cari
function search($keyword){
	$query = "SELECT * FROM transaksi_pengembalian
	WHERE id_anggota LIKE '%$keyword%' OR 
	nama_anggota LIKE '%$keyword%' OR
	kode_buku LIKE '%$keyword%' OR
	judul_buku LIKE '%$keyword%' OR
	tgl_pengembalian LIKE '%$keyword%'
	";
	return query($query);
}

?>