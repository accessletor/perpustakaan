-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2022 pada 04.36
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `id_anggota` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jk` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `id_anggota`, `nama`, `jk`, `alamat`, `foto`) VALUES
(19, '0001', 'Asep Saefuddin', 'laki-laki', 'Dukupuntang', '6300460b5985d.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(200) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `tahun_terbit` varchar(200) NOT NULL,
  `rak` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul_buku`, `kategori`, `tahun_terbit`, `rak`, `foto`) VALUES
(4, '0002', 'asep saefuddin', 'umum', '2002', '1', '63004642a8702.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_peminjaman`
--

CREATE TABLE `transaksi_peminjaman` (
  `id` int(11) NOT NULL,
  `id_anggota` varchar(200) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `kode_buku` varchar(200) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `tgl_pinjam` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_peminjaman`
--

INSERT INTO `transaksi_peminjaman` (`id`, `id_anggota`, `nama_anggota`, `kode_buku`, `judul_buku`, `tgl_pinjam`) VALUES
(1, '0001', 'sajkbnjks', 'sabjkas', 'asep saefuddin', '2022-08-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pengembalian`
--

CREATE TABLE `transaksi_pengembalian` (
  `id` int(11) NOT NULL,
  `id_anggota` varchar(200) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `kode_buku` varchar(200) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `tgl_pengembalian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_pengembalian`
--

INSERT INTO `transaksi_pengembalian` (`id`, `id_anggota`, `nama_anggota`, `kode_buku`, `judul_buku`, `tgl_pengembalian`) VALUES
(1, '0001', 'Asep Saefuddin', '0001A', 'Overloard', '2022-08-22'),
(2, '0002', 'Asep san', '0001B', 'Konosuba', '2022-08-23'),
(3, '0003', 'Asep Sang Raja Iblis', '0001C', 'Anya Forger', '2022-08-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'asep', '$2y$10$OZGqyg9WGlVIzAl4DFOQpOGzgCz0roWnYckAEZIF22w4Cv/WuzZWe');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
