<?php
session_start();
// Pastikan sudah terkoneksi dengan database
require '../../../includes/db_connect.php';

// Pastikan id ada dalam session
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Session expired. Silakan login terlebih dahulu.');
            window.location.href = '../../../login.html';
          </script>";
    exit();
}

$id_user = $_SESSION['user_id'];  // Ambil id dari sesi login

// Ambil data dari URL dan pastikan tipe datanya benar
if (isset($_GET['id_product']) && isset($_GET['qty']) && isset($_GET['diskon'])) {
    $id_product = (int) $_GET['id_product'];  // Pastikan ID produk adalah integer
    $qty = (int) $_GET['qty'];  // Pastikan qty adalah integer
    $diskon = (float) $_GET['diskon'];  // Diskon dari URL (persen)

    // Validasi input
    if ($qty <= 0) {
        echo "<script>
                alert('Jumlah produk tidak valid.');
                window.location.href = 'playground.php';
              </script>";
        exit();
    }
    if ($diskon < 0 || $diskon > 100) {
        echo "<script>
                alert('Diskon tidak valid.');
                window.location.href = 'playground.php';
              </script>";
        exit();
    }

    // Ambil harga produk dan diskon dari database
    $sql = "SELECT p.harga_weekday, p.harga_weekend, p.nama_product, d.id_discount, d.discount_value
            FROM products p
            LEFT JOIN discounts d ON p.id_product = d.id_product AND d.discount_value = ?
            WHERE p.id_product = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $diskon, $id_product);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Tentukan harga berdasarkan hari (weekday atau weekend)
        $hari = date('l');
        $harga = ($hari == 'Saturday' || $hari == 'Sunday') ? $row['harga_weekend'] : $row['harga_weekday'];

        // Tentukan nilai diskon
        $id_discount = $row['id_discount'] ?? NULL; // Ambil ID diskon jika ada
        $nama_product = $row['nama_product']; // Nama produk
        $harga_diskon = $harga * (1 - $diskon / 100); // Harga setelah diskon
        $total_harga = $harga_diskon * $qty;

        // Ambil username dari id_user
        $sql_user = "SELECT username FROM users WHERE id = ?"; // Ganti 'id_user' dengan 'id'
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->bind_param("i", $id_user);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();

        if ($result_user->num_rows > 0) {
            $row_user = $result_user->fetch_assoc();
            $username = $row_user['username'];

            // Simpan transaksi ke database
            $sql_insert = "INSERT INTO transactions (id_product, id_user, tanggal_transaksi, id_discount, qty, harga_product, total_harga_tambah_diskon, diskon, nama_product, username)
                           VALUES (?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisdiddss", $id_product, $id_user, $id_discount, $qty, $harga, $total_harga, $diskon, $nama_product, $username);

            if ($stmt_insert->execute()) {
                // Setelah transaksi berhasil disimpan, arahkan ke playground.php dan beri alert
                echo "<script>
                        alert('Transaksi berhasil disimpan!');
                        window.location.href = 'playground.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Gagal menyimpan transaksi. Coba lagi!');
                        window.location.href = 'playground.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('User tidak ditemukan.');
                    window.location.href = 'playground.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Produk tidak ditemukan atau diskon tidak valid.');
                window.location.href = 'playground.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Data tidak lengkap.');
            window.location.href = 'playground.php';
          </script>";
}
?>
