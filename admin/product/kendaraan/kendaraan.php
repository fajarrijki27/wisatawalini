<?php 
session_start();
// Sertakan file koneksi database dari folder includes
require '../../../includes/db_connect.php';

// Query untuk mengambil data produk yang kategorinya adalah 
$sql = "SELECT * FROM products WHERE kategori_product = 'Kendaraan'";
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
                                    <a href="../../transaksi/kolam/kolam-renang.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket Kolam</p>
                                    </a>
                                </li>
                                <!-- transaksi kolam end -->

                                <!-- transaksi kendaraan -->
                                <li class="nav-item"> 
                                    <a href="../../transaksi/kendaraan/kendaraan.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket Kendaraan</p>
                                    </a>
                                </li>
                                <!-- transaksi kendaraan end -->

                                <!-- transaksi playground -->
                                <li class="nav-item"> 
                                    <a href="../../transaksi/playground/playground.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tiket PlayGround</p>
                                    </a>
                                </li>
                                <!-- transaksi playground end -->


                                <!-- transaksi penginapan -->
                                <li class="nav-item"> 
                                    <a href="../../transaksi/penginapan/penginapan.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Penginapan</p>
                                    </a>
                                </li>
                                <!-- transaksi penginapan end -->

                                <!-- transaksi kelengkapan -->
                                <li class="nav-item"> 
                                    <a href="../../transaksi/kelengkapan/kelengkapan.php" class="nav-link" role="menuitem"> 
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
                                            <a href="../tiketkolam/tiket-kolam.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Tiket Kolam</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="kendaraan.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Kendaraan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../PlayGround/playground.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>PlayGround</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../Penginapan/penginapan.php" class="nav-link" role="menuitem">
                                                <i class="nav-icon bi bi-dot"></i>
                                                <p>Penginapan</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview" role="group">
                                        <li class="nav-item">
                                            <a href="../kelengkapan/kelengkapan.php" class="nav-link" role="menuitem">
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
                            <h3 class="mb-0">Tabel Kendaraan</h3>
                        </div>
                        <div class="col-sm-6 text-end">
                            <!-- Button to Add New User -->
                            <button class="btn btn-custom mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="bi bi-plus"></i>Add New Product</button>
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
                                    <h3 class="card-title">Product Kendaraan List</h3>
                                </div> <!-- /.card-header -->

                                <!-- Tabel Product -->
                                    <div class="container-fluid">
                                        <div class="card mt-3 p-3"> <!-- Menambahkan margin-top dan padding -->
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Img</th>
                                                                <th>Nama Produk</th>
                                                                <th>Harga WeekDay</th>
                                                                <th>Harga WeekEnd</th>
                                                                <th>Kategori</th>
                                                                <th style="width: 150px">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if ($result->num_rows > 0) {
                                                                // Loop melalui setiap data
                                                                while ($row = $result->fetch_assoc()) {
                                                                    ?>
                                                                    <tr>
                                                                        <!-- Menampilkan kolom img -->
                                                                        <td>
                                                                            <?php if (!empty($row['img'])): ?>
                                                                                <img src="../../../uploads/<?= htmlspecialchars($row['img']); ?>" alt="Product Image" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                                                            <?php else: ?>
                                                                                <span class="text-muted">No Image</span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <!-- Menampilkan kolom lainnya -->
                                                                        <td><?= htmlspecialchars($row['nama_product']); ?></td>
                                                                        <td>Rp<?= number_format($row['harga_weekday'], 0, ',', '.'); ?></td>
                                                                        <td>Rp<?= number_format($row['harga_weekend'], 0, ',', '.'); ?></td>
                                                                        <td><?= htmlspecialchars($row['kategori_product']); ?></td>
                                                                        <td>
                                                                            <div class="d-flex gap-2">
                                                                            <a href="#" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#editProductModal" 
                                                                                data-id="<?= htmlspecialchars($row['id_product']); ?>" 
                                                                                data-name="<?= htmlspecialchars($row['nama_product']); ?>" 
                                                                                data-category="<?= htmlspecialchars($row['kategori_product']); ?>" 
                                                                                data-weekday="<?= htmlspecialchars($row['harga_weekday']); ?>" 
                                                                                data-weekend="<?= htmlspecialchars($row['harga_weekend']); ?>">Edit</a>
                                                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal" onclick="setDeleteProductId(<?= htmlspecialchars($row['id_product']); ?>)">Hapus</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                // Jika tidak ada data
                                                                echo '<tr><td colspan="6" class="text-center">Tidak ada data produk.</td></tr>';
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
            
            <!-- Modal Add Product -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProductModalLabel">Tambah Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form id="addProductForm" action="save_product.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="nama_product" class="form-label">Nama Produk</label>
                                        <input type="text" name="nama_product" id="nama_product" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori_product" class="form-label">Kategori Produk</label>
                                        <select class="form-control" name="kategori_product" id="editKategori" required>
                                        <option value="Kendaraan">Kendaraan</option>
                                    </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_weekday" class="form-label">Harga Weekday</label>
                                        <input type="number" name="harga_weekday" id="harga_weekday" class="form-control" step="0.01" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_weekend" class="form-label">Harga Weekend</label>
                                        <input type="number" name="harga_weekend" id="harga_weekend" class="form-control" step="0.01" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_image" class="form-label">Gambar Produk</label>
                                        <input type="file" name="product_image" id="product_image" class="form-control" accept="image/*" required>
                                    </div>
                                </form>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" form="addProductForm" class="btn btn-primary">Simpan Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Modal Add Product -->

            <!-- Edit modal Product  -->
                <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="update_product.php" method="POST" enctype="multipart/form-data">
                                    <!-- ID Produk -->
                                    <input type="hidden" name="id_product" id="id_product">
                                    <div class="mb-3">
                                        <label for="nama_product" class="form-label">Nama Product</label>
                                        <input type="text" class="form-control" id="nama_product" name="nama_product" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori_product" class="form-label">Kategori Product</label>
                                        <select class="form-control" name="kategori_product" id="editKategori" required>
                                        <option value="Kendaraan">Kendaraan</option>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_weekday" class="form-label">Harga Weekday</label>
                                        <input type="number" class="form-control" id="harga_weekday" name="harga_weekday" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_weekend" class="form-label">Harga Weekend</label>
                                        <input type="number" class="form-control" id="harga_weekend" name="harga_weekend" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_image" class="form-label">Gambar Product</label>
                                        <input type="file" class="form-control" id="product_image" name="product_image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Edit modal Product  -->

                 <!-- Modal Delete Product -->
                 <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteProductModalLabel">Konfirmasi Hapus Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus produk ini?</p>
                                    <p><strong>Perhatian:</strong> Tindakan ini tidak dapat dibatalkan.</p>
                                </div>
                                <div class="modal-footer">
                                    <form id="deleteProductForm" action="delete_product.php" method="POST">
                                        <!-- Input tersembunyi untuk ID produk -->
                                        <input type="hidden" name="id_product" id="delete_product_id">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Delete Product --> 
        </main>
        <script>
            var editModal = document.getElementById('editProductModal');
            editModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Tombol yang membuka modal
                var productId = button.getAttribute('data-id'); // Ambil ID dari tombol
                document.getElementById('id_product').value = productId; // Isi ID produk ke input tersembunyi

                // Ambil data produk untuk menampilkan ke dalam form edit
                // Lakukan AJAX atau query database untuk mengambil data produk berdasarkan ID (misalnya)
                fetch(`get_product.php?id=${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('nama_product').value = data.nama_product;
                        document.getElementById('kategori_product').value = data.kategori_product;
                        document.getElementById('harga_weekday').value = data.harga_weekday;
                        document.getElementById('harga_weekend').value = data.harga_weekend;
                    });
            });
        </script>
        <script>
            function setDeleteProductId(productId) {
                // Set ID produk ke input tersembunyi dalam form delete
                document.getElementById('delete_product_id').value = productId;
            }
        </script>
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../../assets/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
</body><!--end::Body-->
</html>