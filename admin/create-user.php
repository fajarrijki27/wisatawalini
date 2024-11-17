<?php
// Include koneksi database
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    // Ambil data dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $kategori_user = $_POST['kategori_user'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Query untuk menyimpan data
    $query = "INSERT INTO users (name, username, email, kategori_user, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('sssss', $name, $username, $email, $kategori_user, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Pengguna berhasil ditambahkan!'); window.location.href='user.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data pengguna.'); window.history.back();</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Kesalahan pada server.'); window.history.back();</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('Akses tidak valid.'); window.history.back();</script>";
}
?>
