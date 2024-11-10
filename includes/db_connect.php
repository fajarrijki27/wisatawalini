<?php
$servername = "localhost";
$username = "root";  // ganti sesuai username database
$password = "";      // ganti sesuai password database
$dbname = "db_wisatawalini";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>