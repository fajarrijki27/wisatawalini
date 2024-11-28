<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_wisatawalini");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil parameter bulanTahun dan halaman
if (isset($_GET['bulanTahun'])) {
    $bulanTahun = $_GET['bulanTahun'];
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $limit = 13; // Batasi 13 data per halaman
    $offset = ($page - 1) * $limit;

    // Pisahkan tahun dan bulan dari parameter bulanTahun
    $year = substr($bulanTahun, 0, 4); // Ambil tahun
    $month = substr($bulanTahun, 5, 2); // Ambil bulan

    // Query untuk mengambil data berdasarkan bulan dan tahun dengan pagination
    $query = $conn->prepare("SELECT * FROM transactions WHERE YEAR(tanggal_transaksi) = ? AND MONTH(tanggal_transaksi) = ? LIMIT ? OFFSET ?");
    $query->bind_param("iiii", $year, $month, $limit, $offset);
    $query->execute();

    $result = $query->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Query untuk menghitung total data
    $countQuery = $conn->prepare("SELECT COUNT(*) AS total FROM transactions WHERE YEAR(tanggal_transaksi) = ? AND MONTH(tanggal_transaksi) = ?");
    $countQuery->bind_param("ii", $year, $month);
    $countQuery->execute();
    $countResult = $countQuery->get_result();
    $total = $countResult->fetch_assoc()['total'];

    // Tutup koneksi
    $query->close();
    $countQuery->close();
    $conn->close();

    // Return data sebagai JSON
    echo json_encode([
        'data' => $data,
        'total' => $total,
        'limit' => $limit,
        'current_page' => $page
    ]);
    exit();
} else {
    echo json_encode(['error' => 'Bulan dan tahun tidak diberikan']);
    exit();
}
?>
