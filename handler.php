<?php
// Sertakan file koneksi database
require 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan password tidak boleh kosong!'); window.history.back();</script>";
        exit;
    }

    // Query untuk memeriksa username
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ambil data user
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Jika password benar
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: admin/index.html");
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
