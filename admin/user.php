<?php
session_start();
// Sertakan file koneksi database dari folder includes
require '../includes/db_connect.php';

// Ambil kategori filter dari parameter GET (jika ada)
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Modifikasi query berdasarkan filter
if ($kategori && $kategori !== '') {
    $sql = "SELECT name, username, email, kategori_user FROM users WHERE kategori_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kategori);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT name, username, email, kategori_user FROM users";
    $result = $conn->query($sql);
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
    <link rel="stylesheet" href="../assets/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
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
                            <a href="./index.html" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item"> 
                            <a href="#" class="nav-link" role="menuitem"> 
                                <i class="nav-icon bi bi-clipboard-fill"></i>
                                <p>Transaksi ArgoWalini
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
                                    <a href="" class="nav-link" role="menuitem"> 
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
                                                                    <td><?= htmlspecialchars($row['username']); ?></td>
                                                                    <td><?= htmlspecialchars($row['name']); ?></td>
                                                                    <td><?= isset($row['email']) ? htmlspecialchars($row['email']) : 'Tidak Ada Data'; ?></td>
                                                                    <td><?= isset($row['kategori_user']) ? htmlspecialchars($row['kategori_user']) : 'Tidak Ada Data'; ?></td>
                                                                    <td>
                                                                        <div class="d-flex gap-2">
                                                                            <a href="#" 
                                                                                class="btn btn-warning btn-sm" 
                                                                                data-bs-toggle="modal" 
                                                                                data-bs-target="#editUserModal"
                                                                                onclick="populateEditForm(<?= htmlspecialchars(json_encode($row)); ?>)">
                                                                                Edit
                                                                                </a>
                                                                            <a href="delete-user.php?id=<?= isset($row['id']) ? $row['id'] : ''; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Delete</a>
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
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->

            <!-- Add User Modal -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
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
                                <div class="col-12">
                                    <input type="hidden" name="action" value="add">
                                    <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span>
                        <span aria-hidden="true">&times;</span>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update-user.php" method="POST" id="editUserForm">
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input type="text" class="form-control" name="name" id="editName" required>
                    </div>
                    <div class="form-group">
                        <label for="editUsername">Username</label>
                        <input type="text" class="form-control" name="username" id="editUsername" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input type="email" class="form-control" name="email" id="editEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="editCategory">Kategori</label>
                        <select class="form-control" name="kategori_user" id="editCategory" required>
                            <option value="cashier">Cashier</option>
                            <option value="manager">Manager</option>
                            <option value="administrator">Administrator</option>
                            <option value="officer">Officer</option>
                            <option value="monitoring">Monitoring</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="editPassword" placeholder="Kosongkan jika tidak ingin mengubah password">
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="id" id="editUserId">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        </main>
        <?php
// Menutup koneksi database
mysqli_close($conn);
?>
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../assets/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        fetch('user.php?nocache=' + new Date().getTime())
        .then(response => response.text())
        .then(data => {
            console.log(data); // Lakukan sesuatu dengan data
        });

    function populateEditForm(userData) {
        // Parse data dan isi field dalam modal
        document.getElementById('editUserId').value = userData.id || '';
        document.getElementById('editName').value = userData.name || '';
        document.getElementById('editUsername').value = userData.username || '';
        document.getElementById('editEmail').value = userData.email || '';
        document.getElementById('editCategory').value = userData.kategori_user || '';
        document.getElementById('editPassword').value = ''; // Kosongkan password
    }
</script>
</body><!--end::Body-->
</html>