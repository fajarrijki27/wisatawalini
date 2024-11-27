<?php
// Mulai session
session_start();

// Periksa keberadaan file koneksi database
if (!file_exists('../../../includes/db_connect.php')) {
    die("File db_connect.php tidak ditemukan.");
}

// Muat file koneksi database
include '../../../includes/db_connect.php';

// Periksa metode request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama_product = htmlspecialchars(trim($_POST['nama_product']));
    $kategori_product = htmlspecialchars(trim($_POST['kategori_product']));
    $sub_kategori_product = htmlspecialchars(trim($_POST['sub_kategori_product']));
    $harga_weekday = htmlspecialchars(trim($_POST['harga_weekday']));
    $harga_weekend = htmlspecialchars(trim($_POST['harga_weekend']));
    $updated_by = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; // Ambil ID user dari session

    // Validasi foreign key (jika session kosong)
    if ($updated_by === null) {
        die("Error: User tidak terdeteksi. Harap login terlebih dahulu.");
    }

    // Validasi input
    if (empty($nama_product) || empty($kategori_product) || empty($sub_kategori_product) || empty($harga_weekday) || empty($harga_weekend)) {
        die("Error: Semua field harus diisi.");
    }

    // Cek apakah ada file yang diunggah
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

                // Buat folder uploads jika belum ada
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Pindahkan file ke direktori tujuan
                if (move_uploaded_file($image_tmp, $upload_path)) {
                    // Simpan data ke database
                    $stmt = $conn->prepare("
                        INSERT INTO products 
                        (nama_product, kategori_product, sub_kategori_product, harga_weekday, harga_weekend, created_at, updated_by, img) 
                        VALUES (?, ?, ?, ?, ?, NOW(), ?, ?)
                    ");
                    $stmt->bind_param('sssddis', $nama_product, $kategori_product, $sub_kategori_product, $harga_weekday, $harga_weekend, $updated_by, $new_image_name);

                    if ($stmt->execute()) {
                        echo "<script>alert('Product berhasil ditambahkan!'); window.location.href='penginapan.php';</script>";
                    } else {
                        echo "<script>alert('Gagal Menambahkan Product: " . $stmt->error . "'); window.location.href='penginapan.php';</script>";
                    }

                    $stmt->close();
                } else {
                    echo "<script>alert('Gagal mengunggah gambar'); window.location.href='penginapan.php';</script>";
                }
            } else {
                echo "<script>alert('Ukuran file gambar terlalu besar (maksimal 2MB).'); window.location.href='penginapan.php';</script>";
            }
        } else {
            echo "<script>alert('Format file tidak valid. Hanya JPG, JPEG, PNG, atau GIF yang diperbolehkan.'); window.location.href='penginapan.php';</script>";
        }
    } else {
        echo "<script>alert('Harap unggah gambar produk.'); window.location.href='penginapan.php';</script>";
    }
}

$conn->close();
?>
