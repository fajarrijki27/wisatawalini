<?php
// Sertakan koneksi database
require '../../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']); // Pastikan ID adalah integer

    // Validasi ID
    if (empty($id)) {
        header('Location: user.php?message=ID tidak valid');
        exit();
    }

    // Prepared statement untuk menghapus data
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('i', $id); // Bind ID sebagai integer

        // Eksekusi query
        if ($stmt->execute()) {
            // Redirect dengan pesan sukses
            header('Location: user.php?message=Pengguna berhasil dihapus');
        } else {
            // Redirect dengan pesan error
            header('Location: user.php?message=Gagal menghapus pengguna');
        }
        $stmt->close();
    } else {
        // Query gagal disiapkan
        header('Location: user.php?message=Query tidak dapat disiapkan');
    }

    $conn->close();
}
?>
