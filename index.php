<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'functions.php';
// anggota
$get1 = mysqli_query($conn, "SELECT * from anggota");
$anggota = mysqli_num_rows($get1);
// buku
$get2 = mysqli_query($conn, "SELECT * from buku");
$buku = mysqli_num_rows($get2);
// transaksi peminjaman
$get3 = mysqli_query($conn, "SELECT * from transaksi_peminjaman");
$peminjaman = mysqli_num_rows($get3);
// pengembalian
$get4 = mysqli_query($conn, "SELECT * from transaksi_pengembalian");
$pengembalian = mysqli_num_rows($get4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perpustakaan</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<div class="navbar-brand"><a class="navbar-brand" href=""><b class="text-white">Ashurbanipal</b></a></div>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item dropdown">
						<a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Data Master
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="anggota/index.php">Data Anggota</a></li>
							<li><a class="dropdown-item" href="buku/index.php">Data Buku</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Data Transaksi
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="pinjaman/index.php">Transaksi Peminjaman</a></li>
							<li><a class="dropdown-item" href="pengembalian/index.php">Transaksi Pengembalian</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br>
	<main>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"><div class="card mb-auto">
					<img src="img/ainz.jpeg" class="card-img-top" alt="psda">
					<div class="card-body">
						<h5 class="card-title">ASHURBANIPAL</h5>
						<p class="card-text">Library Great Tomb of Nazarick</p>
						<br>
						<footer class="blockquote-footer">Perpustakaan ini adalah tempat tinggal Titus Annaeus Secundus. Di sinilah Ainz Ooal Gown, menyimpan Item berbentuk buku bersama dengan buku biasa.</cite></footer>
					</div>
				</div></div>
				<div class="col-sm-8">
					<h3><u>Data Perpustakaan</u></h3>
					<div class="row">
						<div class="col-md-6">
							<div class="card border-info mb-3">
								<div class="card-header">anggota</div>
								<div class="card-body text-dark mb-3 pt-4 pb-4">
									<p class="card-text fs-1 text-info"><i class="bi bi-microsoft-teams"></i> <?=$anggota; ?> Data</p>
								</div>
							</div>
							<div class="card border-info">
								<div class="card-header">Transaksi Peminjaman</div>
								<div class="card-body text-dark mb-3 pt-4 pb-4">
									<p class="card-text fs-1 text-info"><i class="bi bi-calendar-event-fill"></i> <?=$peminjaman; ?> Data</p>
								</div>
							</div>

						</div>
						<div class="col-md-6">
							<div class="card border-info mb-3">
								<div class="card-header">buku</div>
								<div class="card-body text-dark mb-3 pt-4 pb-4">
									<p class="card-text fs-1 text-info"><i class="bi bi-book-half"></i> <?=$buku; ?> Data</p>
								</div>
							</div>
							<div class="card border-info mb-3">
								<div class="card-header">Pengembalian</div>
								<div class="card-body text-dark mb-3 pt-4 pb-4">
									<p class="card-text fs-1 text-info"><i class="bi bi-calendar-check"></i> <?=$pengembalian; ?> Data</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mt-3">
							<div class="card border-info">
								<div class="card-header">Total Data</div>
								<div class="card-body text-dark mb-3 pt-4 pb-4">
									<p class="card-text fs-1 text-info"><i class="bi bi-calculator-fill"></i></i> <?=$buku+$anggota+$peminjaman+$pengembalian;?> Data</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!--modal tambah  -->
	<!-- modal ubah -->

	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>