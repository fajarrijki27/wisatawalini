<?php
// Konfigurasi koneksi ke database
$host = "localhost";
$user = "root"; // Ubah jika menggunakan user database lain
$password = ""; // Ubah jika menggunakan password database
$db_name = "db_wisatawalini";

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $db_name);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
