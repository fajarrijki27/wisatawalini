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
    <style>
        /* Gaya untuk tabel agar dapat di-scroll secara horizontal */
        #dataContainer {
            overflow-x: auto; /* Mengaktifkan scroll horizontal */
            -webkit-overflow-scrolling: touch; /* Untuk perangkat sentuh */
        }

        /* Gaya untuk tabel */
        #dataTable {
            width: 100%;
            min-width: 800px; /* Menentukan lebar minimal untuk tabel */
            table-layout: auto;
        }

        @media (max-width: 768px) {
        #dataContainer {
            padding: 0 15px; /* Memberikan sedikit jarak di sisi */
        }

        #dataTable {
            min-width: 600px; /* Mengatur lebar tabel lebih kecil pada perangkat mobile */
        }
    }

    @media (max-width: 576px) {
        #dataContainer {
            padding: 0 10px; /* Memberikan ruang lebih kecil di sisi */
        }

        #dataTable {
            min-width: 500px; /* Menyesuaikan lebar tabel lebih kecil pada perangkat kecil */
        }
    }

    </style>
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
                                    <a href="../sumary.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Sumary</p>
                                    </a> 
                                </li>
                                <!-- total perhari end  -->

                                <!-- rekap data per hari -->
                                <li class="nav-item"> 
                                    <a href="perhari.php" class="nav-link" role="menuitem"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Rekap Data Per Hari</p>
                                    </a>
                                </li>
                                <!-- rekap data end perhari -->

                                <!-- Rekap Bulanan -->
                                <li class="nav-item"> 
                                    <a href="../rekap-perbulan/perbulan.php" class="nav-link" role="menuitem"> 
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
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Rekap Data Per-hari</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Rekap Data Per-hari</h3>
                                    <form id="filterForm" class="mt-3">
                                        <input type="date" id="tanggalInput" class="form-control" required />
                                        <button type="submit" class="btn btn-primary mt-3">Tampilkan rekap</button>
                                    </form>
                                </div>
                                <div class="card-body" id="dataContainer"></div>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-end" id="paginationContainer"></ul>
                                    <button id="printBtn" class="btn btn-secondary mt-3">Print</button>
                                    <button id="excelBtn" class="btn btn-success mt-3">Export to Excel</button>
                                </div>
                            </div>
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
        document.getElementById('filterForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const tanggal = document.getElementById('tanggalInput').value;
        loadPage(tanggal, 1); // Muat halaman pertama
    });

    // Fungsi untuk memuat data ke halaman
    function loadPage(tanggal, page) {
        fetch(`backend.php?tanggal=${tanggal}&page=${page}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('dataContainer').innerHTML = `<p class="text-danger">${data.error}</p>`;
                    return;
                }

                const { data: rows, total, limit, current_page } = data;

                // Buat tabel
                let html = `
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Nama Produk</th>
                                <th>User</th>
                                <th>Tanggal Transaksi</th>
                                <th>ID Diskon</th>
                                <th>Qty</th>
                                <th>Harga Produk</th>
                                <th>Total Harga</th>
                                <th>Diskon</th>
                            </tr>
                        </thead>
                        <tbody>
                `;
                rows.forEach((row) => {
                    const idDiscount = row.id_discount ? row.id_discount : 'Tidak Ada Diskon';

                    html += `
                        <tr>
                            <td>${row.id_transaksi}</td>
                            <td>${row.nama_product}</td>
                            <td>${row.username}</td>
                            <td>${row.tanggal_transaksi}</td>
                            <td>${idDiscount}</td>
                            <td>${row.qty}</td>
                            <td>${row.harga_product}</td>
                            <td>${row.total_harga_tambah_diskon}</td>
                            <td>${row.diskon}</td>
                        </tr>
                    `;
                });
                html += `</tbody></table>`;
                document.getElementById('dataContainer').innerHTML = html;

                // Pagination
                const totalPages = Math.ceil(total / limit);
                let paginationHtml = '';
                for (let i = 1; i <= totalPages; i++) {
                    paginationHtml += `
                        <li class="page-item ${i === current_page ? 'active' : ''}">
                            <a class="page-link" href="javascript:void(0)" onclick="loadPage('${tanggal}', ${i})">${i}</a>
                        </li>
                    `;
                }
                document.getElementById('paginationContainer').innerHTML = paginationHtml;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk mencetak tabel
    document.getElementById('printBtn').addEventListener('click', function () {
        const printContent = document.getElementById('dataTable').outerHTML;
        const newWindow = window.open();
        newWindow.document.write('<html><head><title>Print</title></head><body>');
        newWindow.document.write(printContent);
        newWindow.document.write('</body></html>');
        newWindow.document.close();
        newWindow.print();
    });

    // Fungsi untuk ekspor tabel ke Excel
    document.getElementById('excelBtn').addEventListener('click', function () {
        const table = document.getElementById('dataTable');
        let excelContent = "<table border='1'>";
        
        // Menambahkan header
        const headers = table.querySelectorAll('thead th');
        excelContent += "<tr>";
        headers.forEach(header => {
            excelContent += `<th>${header.innerText}</th>`;
        });
        excelContent += "</tr>";

        // Menambahkan baris data
        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            excelContent += "<tr>";
            const cells = row.querySelectorAll('td');
            cells.forEach(cell => {
                excelContent += `<td>${cell.innerText}</td>`;
            });
            excelContent += "</tr>";
        });

        excelContent += "</table>";

        // Membuat file Excel
        const blob = new Blob([excelContent], { type: 'application/vnd.ms-excel' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `rekap_data_${new Date().toLocaleDateString()}.xls`;
        a.click();
    });
    </script>
</body><!--end::Body-->
</html>