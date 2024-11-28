<?php
session_start();
require '../../includes/db_connect.php';

// Query untuk menghapus semua diskon
$sql = "DELETE FROM discounts";

// Mengeksekusi query
if ($conn->query($sql) === TRUE) {
    // Redirect kembali ke halaman utama setelah berhasil menghapus
    header("Location: discount.php"); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
