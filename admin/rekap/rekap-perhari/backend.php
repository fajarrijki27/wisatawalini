<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_wisatawalini");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil parameter tanggal dan halaman
if (isset($_GET['tanggal'])) {
    $tanggal = $_GET['tanggal'];
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $limit = 13; // Batasi 25 data per halaman
    $offset = ($page - 1) * $limit;

    // Query untuk mengambil data berdasarkan tanggal dengan pagination
    $query = $conn->prepare("SELECT * FROM transactions WHERE DATE(tanggal_transaksi) = ? LIMIT ? OFFSET ?");
    $query->bind_param("sii", $tanggal, $limit, $offset);
    $query->execute();

    $result = $query->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Query untuk menghitung total data
    $countQuery = $conn->prepare("SELECT COUNT(*) AS total FROM transactions WHERE DATE(tanggal_transaksi) = ?");
    $countQuery->bind_param("s", $tanggal);
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
    echo json_encode(['error' => 'Tanggal tidak diberikan']);
    exit();
}
?>
