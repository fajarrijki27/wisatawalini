<?php
session_start(); // Panggil di awal
require 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan password tidak boleh kosong!'); window.history.back();</script>";
        exit;
    }

    // Query untuk memeriksa username
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "<script>alert('Terjadi kesalahan pada server!'); window.history.back();</script>";
        exit;
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ambil data user
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Jika password benar
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: admin/index.php");
            exit;
        } else {
            // Jika password salah
            echo "<script>alert('Password salah!'); window.location.href='login.html';</script>";
        }
    } else {
        // Jika username tidak ditemukan
        echo "<script>alert('Username tidak ditemukan!'); window.location.href='login.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
