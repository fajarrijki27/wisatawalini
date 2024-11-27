<?php
// Sertakan koneksi database
require '../../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari POST
    $id = intval($_POST['id']);
    $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $kategori_user = htmlspecialchars(trim($_POST['kategori_user']), ENT_QUOTES, 'UTF-8');
    $password = trim($_POST['password']); // Tidak perlu htmlspecialchars untuk password

    // Validasi input
    if (empty($username) || empty($name) || empty($email) || empty($kategori_user)) {
        header('Location: user.php?message=Data tidak lengkap');
        exit();
    }

    // Siapkan query
    if (!empty($password)) {
        // Jika password diisi, lakukan hashing
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "UPDATE users SET username = ?, name = ?, email = ?, kategori_user = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssssi', $username, $name, $email, $kategori_user, $hashed_password, $id);
    } else {
        // Jika password kosong, abaikan perubahan password
        $query = "UPDATE users SET username = ?, name = ?, email = ?, kategori_user = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $username, $name, $email, $kategori_user, $id);
    }

    // Eksekusi query
    if ($stmt->execute()) {
        // Redirect dengan pesan sukses
        header('Location: user.php?message=Data berhasil diupdate');
    } else {
        // Redirect dengan pesan error
        header('Location: user.php?message=Gagal mengupdate data');
    }

    $stmt->close();
    $conn->close();
}