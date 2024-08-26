<?php

include('koneksi.php');

$nisn           = $_POST['nisn'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat       = $_POST['alamat'];

$query = "INSERT INTO siswa (nisn, nama_lengkap, alamat) VALUES ('$nisn', '$nama_lengkap', '$alamat')";

if($connection->query($query)) {

    header("location: index.php");

} else {

    echo "Data Gagal Disimpan!";

}

?>