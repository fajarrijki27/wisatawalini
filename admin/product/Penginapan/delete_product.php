<?php
// Mulai session
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    die("Error: Anda harus login terlebih dahulu.");
}

// Periksa keberadaan file koneksi database
if (!file_exists('../../../includes/db_connect.php')) {
    die("File db_connect.php tidak ditemukan.");
}

// Muat file koneksi database
include '../../../includes/db_connect.php';

// Cek apakah request POST diterima
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil ID produk yang akan dihapus
    $id_product = $_POST['id_product'];

    // Validasi ID produk
    if (empty($id_product)) {
        die("Error: ID Produk tidak valid.");
    }

    // Siapkan query untuk menghapus produk
    $query = "DELETE FROM products WHERE id_product = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_product);

    // Eksekusi query untuk menghapus produk
    if ($stmt->execute()) {
        // Setelah menghapus produk, redirect ke halaman produk
        echo "<script>alert('Produk berhasil dihapus!'); window.location.href='penginapan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus produk.'); window.location.href='penginapan.php';</script>";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
