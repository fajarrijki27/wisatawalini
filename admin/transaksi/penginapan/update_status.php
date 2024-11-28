<?php
session_start();
require '../../../includes/db_connect.php';

// Pastikan id_user ada dalam session
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Session expired. Silakan login terlebih dahulu.');
            window.location.href = '../../../login.html';
          </script>";
    exit();
}

// Pastikan ada id_product dan status yang dikirim melalui GET
if (isset($_GET['id_product']) && isset($_GET['status'])) {
    $id_product = $_GET['id_product'];
    $status = $_GET['status'];

    // Validasi status
    if ($status !== 'kosong' && $status !== 'terisi') {
        echo "<script>
                alert('Status tidak valid.');
                window.location.href = 'penginapan.php';
              </script>";
        exit();
    }

    // Update status penginapan di database
    $sql_update = "UPDATE products SET status_penginapan = ? WHERE id_product = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("si", $status, $id_product);
    $stmt_update->execute();

    if ($stmt_update->affected_rows > 0) {
        echo "<script>
                alert('Status penginapan berhasil diubah!');
                window.location.href = 'penginapan.php'; // Kembali ke halaman penginapan
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengubah status penginapan.');
                window.location.href = 'penginapan.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Data tidak lengkap.');
            window.location.href = 'penginapan.php';
          </script>";
}
?>
