<?php
// Start session untuk menyimpan status pesan
session_start();

// Include koneksi database
require '../../includes/db_connect.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    die("User tidak terautentikasi.");
}

$id_user = $_SESSION['user_id']; // Ambil id_user dari sesi

// Proses data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['diskon'])) {
    $diskonData = $_POST['diskon']; // Ambil data diskon dari input
    $successCount = 0;
    $errorCount = 0;

    // Persiapkan query untuk setiap produk
    foreach ($diskonData as $id_product => $discount_value) {
        // Validasi data
        if (!is_numeric($discount_value) || $discount_value < 0) {
            $errorCount++;
            continue; // Lewati iterasi jika data tidak valid
        }

        // Query untuk memasukkan data ke tabel discounts
        $stmt = $conn->prepare("INSERT INTO discounts (id_product, discount_value, id_user, created_at, updated_at) 
                                VALUES (?, ?, ?, NOW(), NOW()) 
                                ON DUPLICATE KEY UPDATE 
                                discount_value = VALUES(discount_value), 
                                updated_at = NOW()");
        $stmt->bind_param("idi", $id_product, $discount_value, $id_user);

        if ($stmt->execute()) {
            $successCount++;
        } else {
            $errorCount++;
        }
    }

    // Pesan hasil
    $message = "$successCount diskon berhasil disimpan.";
    if ($errorCount > 0) {
        $message .= " ";
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();

    // Tampilkan alert dan redirect
    echo "<script>
        alert('$message');
        window.location.href = 'discount.php';
    </script>";
    exit;
} else {
    // Jika tidak ada data yang diterima
    echo "<script>
        alert('Tidak ada data yang diterima.');
        window.location.href = 'discount.php';
    </script>";
    exit;
}

// Tutup koneksi
$conn->close();
?>
