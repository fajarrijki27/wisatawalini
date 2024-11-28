<?php
session_start();
require '../../includes/db_connect.php';

// Cek apakah pengguna sudah login dan memiliki session
if (!isset($_SESSION['user_id'])) {
    die("Anda harus login terlebih dahulu.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $discount_value = $_POST['discount_value'];
    $user_id = $_SESSION['user_id'];  // Ambil id_user dari session

    if ($discount_value > 0) {
        // Ambil semua id_product dari tabel products
        $sql_products = "SELECT id_product FROM products";
        $result_products = $conn->query($sql_products);

        if ($result_products->num_rows > 0) {
            // Loop melalui semua produk dan tambahkan diskon
            while ($row = $result_products->fetch_assoc()) {
                $product_id = $row['id_product'];

                // Query untuk memasukkan diskon dengan id_user
                $sql = "INSERT INTO discounts (discount_value, id_product, id_user) VALUES (?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("dii", $discount_value, $product_id, $user_id);  // Bind parameter diskon, id_product, dan id_user
                    if (!$stmt->execute()) {
                        echo "Gagal menambahkan diskon untuk produk ID: " . $product_id;
                    }
                } else {
                    echo "Gagal menyiapkan query.";
                }
            }

            // Redirect setelah berhasil menambahkan diskon
            header("Location: discount.php?add_success=1");
            exit;
        } else {
            echo "Tidak ada produk yang ditemukan.";
        }
    } else {
        echo "Nilai diskon harus lebih besar dari 0.";
    }
}
?>
