<?php
session_start();
require 'includes/db_connect.php';

// Pastikan hanya menerima request POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan sanitasi
    $user = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');

    // Gunakan prepared statements untuk mencegah SQL Injection
    $sql = "SELECT id, username FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pass); // "ss" artinya kedua parameter adalah string

    // Eksekusi query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika login berhasil, ambil user_id dari hasil query
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id']; // Simpan user_id ke dalam session
        header("Location: admin/dashboard.php");
        exit();
    } else {
        // Jika login gagal, tampilkan pesan error dengan aman
        echo "Username atau Password salah!";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    // Jika bukan POST, kembalikan ke halaman login
    header("Location: login.html");
    exit();
}
?>
