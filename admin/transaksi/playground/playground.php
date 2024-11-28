<?php 
session_start();
// Sertakan file koneksi database dari folder includes
require '../../../includes/db_connect.php';

// Query untuk mengambil data produk yang kategorinya adalah 'Kolam Renang'
$sql = "SELECT * FROM products WHERE kategori_product = 'PlayGround'";
$result = $conn->query($sql);
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
    <script>
         function logout() {
            // Ganti URL dengan rute logout yang sesuai
            alert('Apakah anda yakin logout?')
            window.location.href = '../../../login.html'; // Atur URL logout sesuai rute Laravel Anda
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
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="../../index.php" class="brand-link"> <!--begin::Brand Image-->  <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Wisata Air Panas Walini</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"> 
                            <a href="../../index.php" class="nav-link" role="menuitem"> 
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
                                    <a href="../kolam/kolam-renang.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket Kolam</p>
                                    </a>
                                </li>
                                <!-- transaksi kolam end -->

                                <!-- transaksi kendaraan -->
                                <li class="nav-item"> 
                                    <a href="../kendaraan/kendaraan.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket Kendaraan</p>
                                    </a>
                                </li>
                                <!-- transaksi kendaraan end -->

                                <!-- transaksi playground -->
                                <li class="nav-item"> 
                                    <a href="playground.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket PlayGround</p>
                                    </a>
                                </li>
                                <!-- transaksi playground end -->


                                <!-- transaksi penginapan -->
                                <li class="nav-item"> 
                                    <a href="../penginapan/penginapan.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Penginapan</p>
                                    </a>
                                </li>
                                <!-- transaksi penginapan end -->

                                <!-- transaksi kelengkapan -->
                                <li class="nav-item"> 
                                    <a href="../kelengkapan/kelengkapan.php" class="nav-link" role="menuitem"> 
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
                                    <a href="../../user/user.php" class="nav-link" role="menuitem"> 
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
                                            <a href="../../product/tiketkolam/tiket-kolam.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Tiket Kolam</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../../product/kendaraan/kendaraan.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kendaraan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../../product/PlayGround/playground.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>PlayGround</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../../product/Penginapan/penginapan.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Penginapan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../../product/kelengkapan/kelengkapan.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Fasilitas</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- product -->

                                <!-- discount -->
                                <li class="nav-item"> 
                                    <a href="../../discount/discount.php" class="nav-link" role="menuitem"> 
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
                                    <a href="../../rekap/sumary.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Sumary</p>
                                    </a> 
                                </li>
                                <!-- total perhari end  -->

                                <!-- rekap data per hari -->
                                <li class="nav-item"> 
                                    <a href="../../rekap/rekap-perhari/perhari.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Rekap Data Per Hari</p>
                                    </a>
                                </li>
                                <!-- rekap data end perhari -->

                                <!-- Rekap Bulanan -->
                                <li class="nav-item"> 
                                    <a href="../../rekap/rekap-perbulan/perbulan.php" class="nav-link" role="menuitem"> 
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
                            <h3 class="mb-0">Tabel Transaksi PlayGround</h3>
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
                                    <h3 class="card-title">Product PlayGround List</h3>
                                </div> <!-- /.card-header -->

                                <div class="container-fluid">
                                    <div class="card mt-3 p-3">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Produk</th>
                                                            <th>Qty</th>
                                                            <th>Harga</th>
                                                            <th>Diskon (%)</th>
                                                            <th>Harga + Diskon</th>
                                                            <th>Total Bayar</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT p.*, d.discount_value 
                                                                FROM products p
                                                                LEFT JOIN discounts d ON p.id_product = d.id_product
                                                                WHERE p.kategori_product = 'PlayGround'";
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $hari = date('l');
                                                                $harga = ($hari == 'Saturday' || $hari == 'Sunday') ? $row['harga_weekend'] : $row['harga_weekday'];
                                                                $diskon = isset($row['discount_value']) ? $row['discount_value'] : 0;
                                                                $harga_diskon = $diskon > 0 ? $harga - ($harga * ($diskon / 100)) : $harga;
                                                                ?>
                                                            <tr 
                                                            data-id-product="<?= $row['id_product']; ?>" 
                                                            data-id-discount="<?= isset($row['discount_value']) ? $row['discount_value'] : 0; ?>"
                                                            data-nama-product="<?= htmlspecialchars($row['nama_product']); ?>" 
                                                            data-username="<?= $_SESSION['username']; ?>"
                                                            >
                                                                    <td><?= htmlspecialchars($row['nama_product']); ?></td>
                                                                    <td>
                                                                        <input type="number" class="form-control qty-input" value="1" data-harga="<?= $harga; ?>" data-diskon="<?= $diskon; ?>" />
                                                                    </td>
                                                                    <td><?= number_format($harga, 2); ?></td>
                                                                    <td>
                                                                        <select class="form-select diskon-select">
                                                                            <option value="0" <?= ($diskon == 0) ? 'selected' : ''; ?>>Tidak ada diskon</option>
                                                                            <option value="<?= $diskon; ?>" <?= ($diskon > 0) ? 'selected' : ''; ?>><?= $diskon; ?>%</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="harga-diskon"><?= number_format($harga_diskon, 2); ?></td>
                                                                    <td class="total-bayar">0.00</td>
                                                                    <td>
                                                                        <button class="btn btn-primary btn-total-bayar" onclick="calculateRowTotal(this)">Total Bayar</button>
                                                                        
                                                                        <!-- Tombol Transaksi mengarah ke save_transaksi.php dengan data produk dan qty -->
                                                                        <button class="btn btn-success btn-transaksi" onclick="prosesTransaksi(this)">Transaksi</button>


                                                                        <button class="btn btn-secondary btn-reset" onclick="resetRow(this)">Reset</button>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            echo '<tr><td colspan="7" class="text-center">Tidak ada data produk.</td></tr>';
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
        </main>
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script>
        function prosesTransaksi(button) {
        var tr = button.closest('tr'); // Ambil elemen <tr>
        var idProduct = tr.getAttribute('data-id-product'); // Ambil ID produk
        var idDiscount = tr.querySelector('.diskon-select').value; // Ambil nilai diskon
        var qty = tr.querySelector('.qty-input').value; // Ambil jumlah qty
        var namaProduct = tr.getAttribute('data-nama-product'); // Ambil nama produk dari atribut data
        var username = tr.getAttribute('data-username'); // Ambil username dari atribut data

        // Menyusun URL dengan data produk, qty, diskon, nama produk, dan username
        var url = 'save_transaksi.php?id_product=' + idProduct +
                '&qty=' + qty +
                '&diskon=' + idDiscount +
                '&nama_product=' + encodeURIComponent(namaProduct) +
                '&username=' + encodeURIComponent(username);

        // Mengarahkan pengguna ke URL tersebut
        window.location.href = url;
    }
        // Fungsi untuk menghitung total bayar
    function calculateRowTotal(button) {
        const row = button.closest('tr');
        const qtyInput = row.querySelector('.qty-input');
        const diskonSelect = row.querySelector('.diskon-select');
        const hargaDiskonCell = row.querySelector('.harga-diskon');
        const totalBayarCell = row.querySelector('.total-bayar');

        const qty = parseInt(qtyInput.value, 10) || 0;
        const harga = parseFloat(qtyInput.getAttribute('data-harga')) || 0;
        const diskon = parseFloat(diskonSelect.value) || 0;

        // Menghitung harga setelah diskon
        const hargaDiskon = diskon > 0 ? harga - (harga * (diskon / 100)) : harga;
        const totalBayar = hargaDiskon * qty;

        // Memperbarui tampilan harga diskon dan total bayar
        hargaDiskonCell.innerText = hargaDiskon.toFixed(2);
        totalBayarCell.innerText = totalBayar.toFixed(2);

        // Mengubah teks tombol menjadi 'Transaksi' dan menonaktifkan tombol
        button.innerText = 'Transaksi';
        button.classList.remove('btn-primary');
        button.classList.add('btn-success');
        button.disabled = true;
    }

    // Fungsi untuk mereset baris ke nilai awal
    function resetRow(button) {
        const row = button.closest('tr');
        const qtyInput = row.querySelector('.qty-input');
        const diskonSelect = row.querySelector('.diskon-select');
        const hargaDiskonCell = row.querySelector('.harga-diskon');
        const totalBayarCell = row.querySelector('.total-bayar');
        const totalBayarButton = row.querySelector('.btn-total-bayar');

        const harga = parseFloat(qtyInput.getAttribute('data-harga')) || 0;
        const diskon = parseFloat(qtyInput.getAttribute('data-diskon')) || 0;
        const hargaDiskon = diskon > 0 ? harga - (harga * (diskon / 100)) : harga;

        qtyInput.value = 1;
        diskonSelect.value = diskon;
        hargaDiskonCell.innerText = hargaDiskon.toFixed(2);
        totalBayarCell.innerText = '0.00';

        totalBayarButton.innerText = 'Total Bayar';
        totalBayarButton.classList.remove('btn-success');
        totalBayarButton.classList.add('btn-primary');
        totalBayarButton.disabled = false;
    }
    </script>
    <!-- Link jQuery (Diperlukan untuk modal Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Link Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../../assets/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
</body><!--end::Body-->
</html>