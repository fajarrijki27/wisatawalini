<?php
session_start();
// Pastikan sudah terkoneksi dengan database
require '../../../includes/db_connect.php';

// Pastikan id_user ada dalam session
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Session expired. Silakan login terlebih dahulu.');
            window.location.href = '../../../login.html';
          </script>";
    exit();
}

$id_user = $_SESSION['user_id'];  // Ambil id_user dari sesi login

// Ambil data dari URL dan pastikan tipe datanya benar
if (isset($_GET['id_product']) && isset($_GET['qty']) && isset($_GET['diskon'])) {
    $id_product = $_GET['id_product'];  // Ambil ID produk dari URL
    $qty = (int) $_GET['qty'];  // Pastikan qty adalah integer
    $diskon = (float) $_GET['diskon'];  // Diskon dari URL (persen)

    // Validasi input
    if ($qty <= 0) {
        echo "<script>
                alert('Jumlah produk tidak valid.');
                window.location.href = 'penginapan.php';  // Bisa diganti dengan halaman yang sesuai
              </script>";
        exit();
    }
    if ($diskon < 0 || $diskon > 100) {
        echo "<script>
                alert('Diskon tidak valid.');
                window.location.href = 'penginapan.php';  // Bisa diganti dengan halaman yang sesuai
              </script>";
        exit();
    }

    // Ambil harga produk, diskon, nama produk, dan status penginapan dari database
    $sql = "SELECT p.harga_weekday, p.harga_weekend, p.nama_product, d.id_discount, d.discount_value, p.status_penginapan
            FROM products p
            LEFT JOIN discounts d ON p.id_product = d.id_product
            WHERE p.id_product = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_product);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Tentukan harga berdasarkan hari (weekday atau weekend)
        $hari = date('l');
        $harga = ($hari == 'Saturday' || $hari == 'Sunday') ? $row['harga_weekend'] : $row['harga_weekday'];

        // Tentukan nilai diskon
        $id_discount = NULL; // Default NULL jika tidak ada diskon
        $discount_value = 0.00; // Default 0.00 jika tidak ada diskon

        if ($diskon > 0) {
            $id_discount = isset($row['id_discount']) ? $row['id_discount'] : NULL; // Ambil ID diskon dari database jika ada
            $discount_value = $diskon; // Ambil nilai diskon dari input
        }

        // Hitung total harga setelah diskon
        if ($diskon > 0) {
            // Jika ada diskon, hitung harga diskon
            $harga_diskon = $harga * (1 - $diskon / 100); // Harga setelah diskon
        } else {
            // Jika tidak ada diskon, harga tetap
            $harga_diskon = $harga;
        }
        
        $total_harga = $harga_diskon * $qty;

        // Ambil nama pengguna berdasarkan id_user
        $sql_user = "SELECT username FROM users WHERE id = ?"; // Ganti 'id' sesuai dengan nama kolom yang benar
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->bind_param("i", $id_user);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();

        if ($result_user->num_rows > 0) {
            $row_user = $result_user->fetch_assoc();
            $username = $row_user['username']; // Nama pengguna yang login
        } else {
            $username = "Unknown User"; // Default jika tidak ditemukan
        }

        // Simpan transaksi ke database, termasuk username dan nama produk
        $sql_insert = "INSERT INTO transactions (id_product, id_user, tanggal_transaksi, id_discount, qty, harga_product, total_harga_tambah_diskon, diskon, username, nama_product)
                       VALUES (?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?)";

        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iisdiddss", $id_product, $id_user, $id_discount, $qty, $harga, $total_harga, $discount_value, $username, $row['nama_product']);

        if ($stmt_insert->execute()) {
            // Setelah transaksi berhasil disimpan, update status penginapan menjadi "terisi"
            $sql_update = "UPDATE products SET status_penginapan = 'terisi' WHERE id_product = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("i", $id_product);
            $stmt_update->execute();

            // Tampilkan nama produk dan nama pengguna dalam pesan sukses
            echo "<script>
                    alert('Transaksi berhasil disimpan! Penginapan telah terisi.\\nNama Produk: " . $row['nama_product'] . "\\nNama Pengguna: " . $username . "');
                    window.location.href = 'penginapan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menyimpan transaksi. Coba lagi!');
                    window.location.href = 'penginapan.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Produk tidak ditemukan.');
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
