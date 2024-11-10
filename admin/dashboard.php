<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style-dashboard.css">
</head>
<body>
    <header class="d-flex align-items-center justify-content-between bg-primary text-white p-2">
        <button class="navbar-toggler" type="button" onclick="toggleSidebar()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="m-0" class="header"><p>Admin Panel</p><em>Air Panas</em> Walini</h1>
    </header>
    
    <div class="d-flex flex-grow-1" id="main-container">
        <aside id="sidebar" class="bg-primary text-white">
            <nav class="nav flex-column p-3">
                <a href="#" class="nav-link text-white"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</a>
                <a href="#dataUser" data-toggle="collapse" data-target="#dataUser" class="nav-link text-white"><i class="fas fa-cogs"></i> Manajemen Data</a>
                    <div id="dataUser" class="collapse submenu">
                        <a href="manajemen-produk.php"><i class="bi bi-box-seam"></i> Manajemen Produk</a>
                        <a href="manajemen-pengguna.php"><i class="bi bi-people"></i> Manajemen Pengguna</a>
                        <a href="manajemen-ulasan.php"><i class="bi bi-chat-dots"></i> Manajemen Ulasan & Komentar</a>
                    </div>
                <a href="#" class="nav-link text-white"><i class="fas fa-chart-line"></i> Report Penjualan</a>
                <a href="#" class="nav-link text-white"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </nav>
        </aside>
        
        <main class="flex-fill p-4" id="content">
            <div class="content bg-light p-3 rounded h-100">
                <!-- Konten admin panel -->
                <p>Konten utama ditampilkan di sini.</p>
            </div>
        </main>
    </div>

    <!-- Link Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script-dashboard.js"></script>
</body>
</html>
