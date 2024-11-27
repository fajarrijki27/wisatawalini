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
    // Ambil data dari form
    $id_product = $_POST['id_product'];  // ID produk yang akan diupdate
    $nama_product = htmlspecialchars($_POST['nama_product']);
    $kategori_product = htmlspecialchars($_POST['kategori_product']);
    $harga_weekday = htmlspecialchars($_POST['harga_weekday']);
    $harga_weekend = htmlspecialchars($_POST['harga_weekend']);
    $updated_by = $_SESSION['user_id']; // ID user dari session

    // Validasi ID produk
    if (empty($id_product)) {
        die("Error: ID Produk tidak valid.");
    }

    // Siapkan query untuk memperbarui data produk
    $query = "UPDATE products SET nama_product = ?, kategori_product = ?, harga_weekday = ?, harga_weekend = ?, updated_at = NOW(), updated_by = ? WHERE id_product = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssddii', $nama_product, $kategori_product, $harga_weekday, $harga_weekend, $updated_by, $id_product);

    // Eksekusi query untuk memperbarui data
    if ($stmt->execute()) {
        // Cek apakah ada gambar baru yang diunggah
        if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
            $image_name = $_FILES['product_image']['name'];
            $image_tmp = $_FILES['product_image']['tmp_name'];
            $image_size = $_FILES['product_image']['size'];
            $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

            // Validasi tipe file gambar
            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($image_ext, $allowed_ext)) {
                // Validasi ukuran file (maksimal 2MB)
                if ($image_size <= 2 * 1024 * 1024) {
                    // Generate nama unik untuk gambar
                    $new_image_name = uniqid('product_', true) . '.' . $image_ext;

                    // Path untuk menyimpan gambar
                    $upload_dir = '../../../uploads/';
                    $upload_path = $upload_dir . $new_image_name;

                    // Pindahkan file gambar ke direktori tujuan
                    if (move_uploaded_file($image_tmp, $upload_path)) {
                        // Perbarui gambar di database
                        $updateImageQuery = "UPDATE products SET img = ? WHERE id_product = ?";
                        $updateImageStmt = $conn->prepare($updateImageQuery);
                        $updateImageStmt->bind_param('si', $new_image_name, $id_product);

                        if ($updateImageStmt->execute()) {
                            echo "<script>alert('Product berhasil diperbarui!'); window.location.href='kendaraan.php';</script>";
                        } else {
                            echo "<script>alert('Gagal memperbarui gambar produk.'); window.location.href='kendaraan.php';</script>";
                        }

                        $updateImageStmt->close();
                    } else {
                        echo "<script>alert('Gagal mengunggah gambar produk.'); window.location.href='kendaraan.php';</script>";
                    }
                } else {
                    echo "<script>alert('Ukuran gambar terlalu besar, maksimal 2MB.'); window.location.href='kendaraan.php';</script>";
                }
            } else {
                echo "<script>alert('Format gambar tidak valid. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.'); window.location.href='kendaraan.php';</script>";
            }
        } else {
            echo "<script>alert('Product berhasil diperbarui!'); window.location.href='kendaraan.php';</script>";
        }
    } else {
        echo "<script>alert('Gagal memperbarui produk.'); window.location.href='kendaraan.php';</script>";
    }

    $stmt->close();
}

// Tutup koneksi database
$conn->close();
?>
