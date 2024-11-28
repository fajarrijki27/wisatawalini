<?php
session_start();
// Sertakan file koneksi database dari folder includes
require '../../includes/db_connect.php';

// Ambil kategori filter dari parameter GET (jika ada)
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Modifikasi query berdasarkan filter
if ($kategori && $kategori !== '') {
    $sql = "SELECT id, name, username, email, kategori_user FROM users WHERE kategori_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kategori);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT id, name, username, email, kategori_user FROM users"; // Tambahkan `id` di sini
    $result = $conn->query($sql);
}

// Cek apakah query berhasil dijalankan
if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>



<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Air Panas Walini</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../assets/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">

</head> <!--end::Head--> <!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <script>
         function logout() {
            // Ganti URL dengan rute logout yang sesuai
            alert('Apakah anda yakin logout?')
            window.location.href = '../../login.html'; // Atur URL logout sesuai rute Laravel Anda
        }
    </script>
    <div class="app-wrapper"> <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                    <!-- <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contact</a> </li> -->
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
                 <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="../index.php" class="brand-link"> <!--begin::Brand Image-->  <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Wisata Air Panas Walini</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"> 
                            <a href="../index.php" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <!-- data Transaksi -->
                        <li class="nav-item"> 
                            <a href="#" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-clipboard-fill"></i>
                                <p>Transaksi Walini
                                    <span class="nav-badge badge text-bg-secondary me-3"></span> 
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>

                            <!-- transaksi kolam -->
                            <ul class="nav nav-treeview" role="group">
                                <li class="nav-item"> 
                                    <a href="../transaksi/kolam/kolam-renang.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket Kolam</p>
                                    </a>
                                </li>
                                <!-- transaksi kolam end -->

                                <!-- transaksi kendaraan -->
                                <li class="nav-item"> 
                                    <a href="../transaksi/kendaraan/kendaraan.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket Kendaraan</p>
                                    </a>
                                </li>
                                <!-- transaksi kendaraan end -->

                                <!-- transaksi playground -->
                                <li class="nav-item"> 
                                    <a href="../transaksi/playground/playground.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket PlayGround</p>
                                    </a>
                                </li>
                                <!-- transaksi playground end -->


                                <!-- transaksi penginapan -->
                                <li class="nav-item"> 
                                    <a href="../transaksi/penginapan/penginapan.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Penginapan</p>
                                    </a>
                                </li>
                                <!-- transaksi penginapan end -->

                                <!-- transaksi kelengkapan -->
                                <li class="nav-item"> 
                                    <a href="../transaksi/kelengkapan/kelengkapan.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Fasilitas</p>
                                    </a>
                            </li>
                        </ul>
                        <!-- end data Transaksi -->

                        <!-- data -->
                        <li class="nav-item"> 
                            <a href="#" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-pencil-square"></i>
                                <p>Manage Data Walini
                                    <span class="nav-badge badge text-bg-secondary me-3"></span>
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" role="group">
                                <!-- user -->
                                <li class="nav-item"> 
                                    <a href="user.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                                <!-- user end -->

                                <!-- product -->
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Product</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../product/tiketkolam/tiket-kolam.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Tiket Kolam</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../product/kendaraan/kendaraan.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kendaraan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../product/PlayGround/playground.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>PlayGround</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../product/Penginapan/penginapan.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Penginapan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../product/kelengkapan/kelengkapan.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Fasilitas</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- product -->

                                <!-- discount -->
                                <li class="nav-item"> 
                                    <a href="../discount/discount.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Discount</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- data end -->

                        <!-- rekap data -->
                        <li class="nav-item"> 
                            <a href="#" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-table"></i>
                                <p>Rekap Data Walini
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" role="group">

                                <!-- total perhari -->
                                <li class="nav-item"> 
                                    <a href="../rekap/sumary.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Sumary</p>
                                    </a> 
                                </li>
                                <!-- total perhari end  -->

                                <!-- rekap data per hari -->
                                <li class="nav-item"> 
                                    <a href="../rekap/rekap-perhari/perhari.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Rekap Data Per Hari</p>
                                    </a>
                                </li>
                                <!-- rekap data end perhari -->

                                <!-- Rekap Bulanan -->
                                <li class="nav-item"> 
                                    <a href="../rekap/rekap-perbulan/perbulan.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Rekap Data Bulanan</p>
                                    </a>
                                </li>
                                <!-- end rekap bulanan -->
                            </ul>
                        </li>
                        <!-- rekap data end -->

                        <!-- logout  -->
                        <li class="nav-item"> 
                            <a href="#logout" onclick="logout()" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-box-arrow-in-left"></i>
                                <p>Log out</p>
                            </a> 
                        </li>
                        <!-- logout end -->
                    </ul>
                </nav>                
            </div> <!--end::Sidebar Wrapper-->
        </aside> <!--end::Sidebar--> <!--begin::App Main-->

        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Tabel Users</h3>
                        </div>
                        <div class="col-sm-6 text-end">
                            <!-- Button to Add New User -->
                            <button class="btn btn-custom mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="bi bi-plus"></i>Add New User</button>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header-->

            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">User List</h3>
                                </div> <!-- /.card-header -->

                                <!-- Filter Section -->
                                <div class="card-body">
                                    <form class="row g-3">
                                        <!-- Input Dropdown -->
                                        <div class="col-12">
                                            <label for="filterCategory" class="form-label">Category:</label>
                                            <select name="kategori" id="filterkategori" class="form-control">
                                                <option value="">All Categories</option>
                                                <option value="cashier" <?= $kategori === 'cashier' ? 'selected' : '' ?>>Cashier</option>
                                                <option value="manager" <?= $kategori === 'manager' ? 'selected' : '' ?>>Manager</option>
                                                <option value="administrator" <?= $kategori === 'administrator' ? 'selected' : '' ?>>Administrator</option>
                                                <option value="officer" <?= $kategori === 'officer' ? 'selected' : '' ?>>Officer</option>
                                                <option value="monitoring" <?= $kategori === 'monitoring' ? 'selected' : '' ?>>Monitoring</option>
                                            </select>
                                        </div>
                                        
                                        <!-- Filter Button -->
                                        <div class="col-md-4 align-self-end">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                    </form>
                                </div>

                                <!-- Tabel Users -->
                                <div class="container-fluid">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Daftar Pengguna</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>UserID</th>
                                                            <th>Username</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Kategori</th>
                                                            <th style="width: 150px">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (mysqli_num_rows($result) > 0): ?>
                                                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                                                <tr>
                                                                    <td><?= htmlspecialchars($row['id']); ?></td>
                                                                    <td><?= htmlspecialchars($row['username']); ?></td>
                                                                    <td><?= htmlspecialchars($row['name']); ?></td>
                                                                    <td><?= isset($row['email']) ? htmlspecialchars($row['email']) : 'Tidak Ada Data'; ?></td>
                                                                    <td><?= isset($row['kategori_user']) ? htmlspecialchars($row['kategori_user']) : 'Tidak Ada Data'; ?></td>
                                                                    <td>
                                                                        <div class="d-flex gap-2">
                                                                           <!-- <a href=""  >Ubah</a>  -->
                                                                           <a href="#" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</a>
                                                                           <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal" 
                                                                                onclick="setDeleteUserId(<?= htmlspecialchars($row['id']); ?>)">Hapus</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tabel -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->

            <!-- Add User Modal -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Ubah modal-sm ke modal-lg untuk ukuran lebih besar -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span>
                                    <span aria-hidden="true">&times;</span> 
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="create-user.php" method="POST">
                                <div class="form-group">
                                    <label for="userName">Name</label>
                                    <input type="text" class="form-control" name="name" id="Name" placeholder="Masukkan nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="userName">Username</label>
                                    <input type="text" class="form-control" name="username" id="userName" placeholder="Masukkan username" required>
                                </div>
                                <div class="form-group">
                                    <label for="userEmail">Email</label>
                                    <input type="email" class="form-control" name="email" id="userEmail" placeholder="Masukkan email" required>
                                </div>
                                <div class="form-group">
                                    <label for="userRole">Kategori</label>
                                    <select id="filterCategory" class="form-control" name="kategori_user" id="kategori_user" required>
                                        <option value="">All Categories</option>
                                        <option value="cashier">Cashier</option>
                                        <option value="manager">Manager</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="officer">Officer</option>
                                        <option value="monitoring">Monitoring</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editUserStatus">Password</label>
                                    <input class="form-control" name="password" id="editUserStatus" placeholder="masukkan password user" required>
                                </div>
                                <div class="col-12 mt-4"> <!-- Tambahkan margin top untuk memberi jarak antara form dan tombol -->
                                    <input type="hidden" name="action" value="add">
                                    <button type="submit" class="btn btn-primary w-100">Tambah Pengguna</button> <!-- Lebarkan tombol menjadi full width -->
                                </div>
                                <!-- Tombol Cancel -->
                                <div class="col-12 mt-2"> <!-- Margin top untuk memberi jarak dengan tombol sebelumnya -->
                                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button> <!-- Tombol Cancel -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end add user modal -->

            <!-- Modal Edit User -->
            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Edit Data Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="editUserForm" action="update_user.php" method="POST">
                            <div class="modal-body">
                                <!-- Hidden input untuk ID -->
                                <input type="hidden" name="id" id="editUserId">

                                <!-- Input Username -->
                                <div class="mb-3">
                                    <label for="editUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="editUsername" required>
                                </div>

                                <!-- Input Nama -->
                                <div class="mb-3">
                                    <label for="editName" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" id="editName" required>
                                </div>

                                <!-- Input Email -->
                                <div class="mb-3">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="editEmail" required>
                                </div>

                                <!-- Input Kategori -->
                                <div class="mb-3">
                                    <label for="editKategori" class="form-label">Kategori</label>
                                    <select class="form-control" name="kategori_user" id="editKategori" required>
                                        <option value="cashier">Cashier</option>
                                        <option value="manager">Manager</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="officer">Officer</option>
                                        <option value="monitoring">Monitoring</option>
                                    </select>
                                </div>

                                <!-- Input Password Baru -->
                                <div class="mb-3">
                                    <label for="editPassword" class="form-label">Password Baru (Opsional)</label>
                                    <input type="password" class="form-control" name="password" id="editPassword">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- End Modal Edit User -->   
             
            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="deleteUserForm" action="delete_user.php" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteUserModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                                <input type="hidden" name="id" id="deleteUserId">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Modal Konfirmasi Hapus -->                                                    
        </main>
        <?php
// Menutup koneksi database
mysqli_close($conn);
?>
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../assets/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        document.querySelectorAll('[data-bs-target="#editUserModal"]').forEach(function (editButton) {
    editButton.addEventListener('click', function () {
        const row = this.closest('tr');
        const id = row.querySelector('td:nth-child(1)').innerText;
        const username = row.querySelector('td:nth-child(2)').innerText;
        const name = row.querySelector('td:nth-child(3)').innerText;
        const email = row.querySelector('td:nth-child(4)').innerText;
        const kategori = row.querySelector('td:nth-child(5)').innerText;

        // Isi form di modal dengan data tersebut
        document.getElementById('editUserId').value = id;
        document.getElementById('editUsername').value = username;
        document.getElementById('editName').value = name;
        document.getElementById('editEmail').value = email;
        document.getElementById('editKategori').value = kategori;
    });
});
    function setDeleteUserId(userId) {
        document.getElementById('deleteUserId').value = userId;
    }
    </script>
</body><!--end::Body-->
</html>