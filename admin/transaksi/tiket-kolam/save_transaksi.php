<?php
session_start();
require '../../../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $id_product = $_POST['id_product'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $id_discount = isset($_POST['idDiscount']) ? intval($_POST['idDiscount']) : null;
    $jumlah_beli = isset($_POST['jumlahBarang']) ? intval($_POST['jumlahBarang']) : 1;
    $total_harga = isset($_POST['harga']) ? floatval($_POST['harga']) : 0.00;
    $diskon = isset($_POST['diskon']) ? floatval($_POST['diskon']) : 0.00;

    // Validasi input
    if (empty($id_user) || empty($id_product)) {
        die("id_user atau id_product tidak ditemukan.");
    }

    // Hitung total harga setelah diskon
    $total_harga_tambah_diskon = $total_harga - ($total_harga * ($diskon / 100));

    // Siapkan query untuk menyimpan data transaksi
    $insertQuery = "INSERT INTO transactions (id_product, id_user, tanggal_transaksi, id_discount, total_beli, total_harga, total_harga_tambah_diskon, diskon) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($insertQuery);
    
    // Pastikan id_discount di-bind dengan benar
    if ($id_discount === null) {
        $stmt->bind_param('iisiddd', $id_product, $id_user, $tanggal_transaksi, $jumlah_beli, $total_harga, $total_harga_tambah_diskon, $diskon);
    } else {
        $stmt->bind_param('iisiddd', $id_product, $id_user, $tanggal_transaksi, $id_discount, $jumlah_beli, $total_harga, $total_harga_tambah_diskon, $diskon);
    }

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "Transaksi berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan saat menyimpan transaksi: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>