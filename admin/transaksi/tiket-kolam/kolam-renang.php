<?php 
session_start();
// Sertakan file koneksi database dari folder includes
require '../../../includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.html"); // Redirect ke login jika sesi hilang
    exit;
}

// Query untuk mengambil data produk yang kategorinya adalah 'Kolam Renang' dengan diskon jika ada
$query = "
    SELECT 
        p.id_product, 
        p.nama_product, 
        p.kategori_product, 
        p.harga_weekday, 
        p.harga_weekend, 
        COALESCE(d.id_discount, NULL) AS id_discount, 
        COALESCE(d.discount_value, 0) AS discount_value
    FROM 
        products p
    LEFT JOIN 
        discounts d ON p.id_product = d.id_product
    WHERE 
        p.kategori_product = 'Kolam Renang';  -- Hanya produk Kolam Renang
";

// Eksekusi query
$result = $conn->query($query);

if (!$result) {
    die("Query error: " . $conn->error); // Tambahkan debugging jika query gagal
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
    <link rel="stylesheet" href="../../../assets/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
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
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link"> <!--begin::Brand Image-->  <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Wisata Air Panas Walini</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"> 
                            <a href="../../index.html" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item"> 
                            <a href="#" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-clipboard-fill"></i>
                                <p>Transaksi Walini
                                    <span class="nav-badge badge text-bg-secondary me-3"></span> 
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" role="group">
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket Kolam</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kolam Renang</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kolam Rendam</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kolam Rendam Keluarga</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Terapi Ikan</p>
                                            </a>
                                        </li>
                                    </ul> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket Kendaraan</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kendaraan roda 2</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kendaraan roda 4</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kendaraan roda 6 Bis</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- tiket playground -->
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket PlayGround</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>ATV Adventure</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>ATV Tea Tour</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>ATV Mini</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>F Fox Besar Extream</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>F Fox Mini</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Go Car</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kereta Api</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Bajaj</p>
                                            </a>
                                        </li>
                                    </ul> 
                                </li>

                                <!-- penginapan -->
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Penginapan</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Bungalow</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kerucut</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Lumbung</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Panggung</p>
                                            </a>
                                        </li>
                                    </ul> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Fasilitas</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Toilet</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Loker</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Tikar</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Ban</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kelengkapan Renang</p>
                                            </a>
                                        </li>
                                    </ul>
                            </ul>
                        </li>

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
                                <li class="nav-item"> 
                                    <a href="user.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>User</p>
                                    </a>
                                </li>

                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Product</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Tiket Kolam</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kendaraan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>PlayGround</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Penginapan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Fasilitas</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Discount</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Tiket Kolam</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kendaraan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>PlayGround</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Penginapan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Fasilitas</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item"> 
                            <a href="#" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-table"></i>
                                <p>Rekap Data Walini
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" role="group">
                                <li class="nav-item"> 
                                    <a href="./tables/simple.html" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Sumary</p>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Rekap Data Per Hari</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap Tiket Kolam</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap Kendaraan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap PlayGround</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap Penginapan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap Fasilitas</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Rekap Bulanan -->
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Rekap Data Bulanan</p>
                                    </a>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap Tiket Kolam</p>
                                            </a>
                                        </li>
                                    </ul> 
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap Kendaraan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap PlayGround</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap Penginapan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="./layout/tiket-kolam-anak.html" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Rekap Fasilitas</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item"> 
                            <a href="./docs/introduction.html" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-box-arrow-in-left"></i>
                                <p>Log out</p>
                            </a> 
                        </li>
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
                            <h3 class="mb-0">Tabel Transaksi Kolam</h3>
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
                                    <h3 class="card-title">Product Kolam List</h3>
                                </div> <!-- /.card-header -->

                                <!-- Tabel Product -->
                                    <div class="container-fluid">
                                        <div class="card mt-3 p-3"> <!-- Menambahkan margin-top dan padding -->
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nama Produk</th>
                                                                <th>Kategori Produk</th>
                                                                <th>Diskon (%)</th>
                                                                <th>Harga WeekDay + Diskon</th>
                                                                <th>Harga WeekEnd + Diskon</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            // Cek hasil query
                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    // Ambil diskon dari tabel discounts, jika tidak ada, set nilai 0
                                                                    $diskon = isset($row['discount_value']) ? $row['discount_value'] : 0;

                                                                    // Menghitung harga setelah diskon untuk weekday dan weekend
                                                                    $harga_weekday_diskon = $row['harga_weekday'] * (1 - $diskon / 100);
                                                                    $harga_weekend_diskon = $row['harga_weekend'] * (1 - $diskon / 100);

                                                                    // Output data ke tabel
                                                                    echo "<tr>";
                                                                    echo "<td>" . htmlspecialchars($row['id_product']) . "</td>";
                                                                    echo "<td>" . htmlspecialchars($row['nama_product']) . "</td>";
                                                                    echo "<td>" . htmlspecialchars($row['kategori_product']) . "</td>";

                                                                    // Menampilkan diskon (jika ada, tampilkan persentase, jika tidak, tampilkan 0%)
                                                                    echo "<td>" . number_format($diskon, 2, ',', '.') . "%</td>";

                                                                    // Menampilkan harga setelah diskon (weekday dan weekend)
                                                                    echo "<td>Rp" . number_format($harga_weekday_diskon, 0, ',', '.') . "</td>";
                                                                    echo "<td>Rp" . number_format($harga_weekend_diskon, 0, ',', '.') . "</td>";

                                                                    // Tombol untuk transaksi
                                                                    echo "<td>
                                                                            <a href='#' 
                                                                            class='btn btn-primary text-light' 
                                                                            data-bs-toggle='modal' 
                                                                            data-bs-target='#addtransaksiModal'>
                                                                                Transaksi
                                                                            </a>
                                                                        </td>";

                                                                    echo "</tr>";
                                                                }
                                                            } else {
                                                                // Jika tidak ada produk
                                                                echo "<tr><td colspan='6' class='text-center'>Tidak ada data produk.</td></tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    // Tutup koneksi database
                                    $conn->close();
                                    ?>
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->  
            
            <!-- Modal Transaksi -->
            <div class="modal fade" id="addtransaksiModal" tabindex="-1" aria-labelledby="addtransaksiModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addtransaksiModalLabel">Detail Transaksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formTransaksi" method="POST" action="save_transaksi.php">
                                <!-- Input tersembunyi untuk ID -->
                                <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                    <input type="hidden" name="id_user" value="<?= $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="id_product" value="<?= htmlspecialchars($row['id_product']); ?>">
                                    <input type="hidden" id="idDiscount" name="idDiscount" value="<?= isset($_GET['id_discount']) ? intval($_GET['id_discount']) : ''; ?>">


                                <!-- Input lainnya -->
                                <div class="mb-3">
                                    <label for="namaProduct" class="form-label">Nama Produk</label>
                                    <select id="namaProduct" name="namaProduct" class="form-select" onchange="updateProductInfo()">
                                        <option value="#">Pilih Produk</option>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            $result->data_seek(0);
                                            while ($row = $result->fetch_assoc()) {
                                                $diskon = isset($row['discount_value']) ? $row['discount_value'] : null;
                                                echo "<option value='" . $row['nama_product'] . "' 
                                                    data-id='" . $row['id_product'] . "' 
                                                    data-harga-weekday='" . $row['harga_weekday'] . "' 
                                                    data-harga-weekend='" . $row['harga_weekend'] . "' 
                                                    data-diskon='" . ($diskon !== null ? $diskon : "") . "'>" . htmlspecialchars($row['nama_product']) . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Kategori Produk, Diskon, dan Pilihan Hari -->
                                <div class="mb-3">
                                    <label for="kategoriProduct" class="form-label">Kategori Produk</label>
                                    <input type="text" id="kategoriProduct" name="kategoriProduct" class="form-control" value="Kolam Renang" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="diskon" class="form-label">Diskon (%)</label>
                                    <select id="diskon" name="diskon" class="form-select">
                                        <?php
                                        if ($result->num_rows > 0) {
                                            $result->data_seek(0); // Reset pointer ke awal hasil query
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['discount_value'] . "'>" . number_format($row['discount_value'], 2, ',', '.') . "%</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="hari" class="form-label">Pilih Hari</label>
                                    <select id="hari" name="hari" class="form-select" onchange="updateProductInfo()">
                                        <option value="weekday">Weekday</option>
                                        <option value="weekend">Weekend</option>
                                    </select>
                                </div>

                                <!-- Jumlah Barang -->
                                <div class="mb-3">
                                    <label for="jumlahBarang" class="form-label">Jumlah Barang</label>
                                    <input type="number" id="jumlahBarang" name="jumlahBarang" class="form-control" min="1" value="1" oninput="updateTotal()">
                                </div>

                                <!-- Harga dan Total Bayar -->
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="text" id="harga" name="harga" class="form-control" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="totalBayar" class="form-label">Total Bayar</label>
                                    <input type="text" id="totalBayar" name="totalBayar" class="form-control" readonly>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../../assets/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
    // Fungsi untuk update harga dan total bayar
    function updateProductInfo() {
        const selectedProduct = document.getElementById("namaProduct").selectedOptions[0];
        const hargaWeekday = selectedProduct.getAttribute("data-harga-weekday");
        const hargaWeekend = selectedProduct.getAttribute("data-harga-weekend");
        const diskon = selectedProduct.getAttribute("data-diskon");

        // Validasi harga dan diskon
        const hargaWeekdayParsed = parseFloat(hargaWeekday) || 0;
        const hargaWeekendParsed = parseFloat(hargaWeekend) || 0;
        const diskonParsed = parseFloat(diskon) || 0;

        // Update harga berdasarkan pilihan hari
        const hari = document.getElementById("hari").value;
        let harga;
        if (hari === "weekday") {
            harga = hargaWeekdayParsed * (1 - diskonParsed / 100);
        } else {
            harga = hargaWeekendParsed * (1 - diskonParsed / 100);
        }

        // Update harga di form
        document.getElementById("harga").value = formatCurrency(harga);

        // Update total bayar
        updateTotal();
    }

    // Fungsi untuk update total bayar
    function updateTotal() {
        const harga = parseFloat(document.getElementById("harga").value.replace("Rp", "").replace(/,/g, "")) || 0;
        const jumlahBarang = parseInt(document.getElementById("jumlahBarang").value) || 1;
        const totalBayar = harga * jumlahBarang;
        document.getElementById("totalBayar").value = formatCurrency(totalBayar);
    }

    // Fungsi untuk memformat angka menjadi mata uang
    function formatCurrency(value) {
        return "Rp" + value.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
</script>
</body><!--end::Body-->
</html>