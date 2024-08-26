<?php

include('koneksi.php');

// Mengambil data dari form dan melakukan sanitasi
$id = $_POST['id_siswa'];
$nisn = $_POST['nisn'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];

// Validasi input: pastikan ID adalah angka
if (!is_numeric($id)) {
    die("ID tidak valid.");
}

// Mempersiapkan query untuk mencegah SQL Injection
$query = $connection->prepare("UPDATE siswa SET nisn = ?, nama_lengkap = ?, alamat = ? WHERE id = ?");
$query->bind_param("sssi", $nisn, $nama_lengkap, $alamat, $id);

// Eksekusi query
if ($query->execute()) {
    header("location: index.php");
} else {
    echo "Data gagal diupdate! Error: " . $query->error;
}

// Menutup statement dan koneksi
$query->close();
$connection->close();

?>
