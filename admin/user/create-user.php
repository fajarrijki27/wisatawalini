<?php
// Include koneksi database
require '../../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    // Ambil data dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $kategori_user = $_POST['kategori_user'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Cek apakah username atau email sudah ada
    $checkQuery = "SELECT * FROM users WHERE username = ? OR email = ?";
    $checkStmt = $conn->prepare($checkQuery);
    if ($checkStmt) {
        $checkStmt->bind_param('ss', $username, $email);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // Jika username atau email sudah ada
            echo "<script>alert('Username atau email sudah digunakan. Silakan gunakan yang lain.'); window.history.back();</script>";
        } else {
            // Jika username dan email tidak ada, lanjutkan proses insert
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
        }
        $checkStmt->close();
    } else {
        echo "<script>alert('Kesalahan pada server saat validasi.'); window.history.back();</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('Akses tidak valid.'); window.history.back();</script>";
}
?>
