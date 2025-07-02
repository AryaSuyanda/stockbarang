<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stock Barang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="C:\xamppp\htdocs\stockbarang\css\styles.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/metisMenu.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slicknav.min.css">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-144808195-1');
        </script>
        <!-- amchart css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <!-- Start datatable css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
        
        <!-- others css -->
        <link rel="stylesheet" href="assets/css/typography.css">
        <link rel="stylesheet" href="assets/css/default-css.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Inventory</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Sidebar menu area end -->

    <!-- Main content area start -->
    <div class="main-content">
        <!-- Header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- Nav and search button -->
                <div class="col-md-6 col-sm-8 d-flex align-items-center">
                    <div class="nav-btn me-3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="search-box">
                        <h2>Hi, Admin!</h2>
                    </div>
                </div>
                
                <!-- Profile info & task notification -->
                <div class="col-md-6 col-sm-4 d-flex justify-content-end">
                    <ul class="notification-area list-unstyled d-flex align-items-center">
                        <li class="me-3">
                            <h3>
                                <div class="date">
                                    <script type="text/javascript">
                                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                        var date = new Date();
                                        var day = date.getDate(); // Mengambil tanggal
                                        var month = date.getMonth(); // Mengambil bulan
                                        var thisDay = date.getDay(); // Mengambil hari dalam angka
                                        var thisDayName = myDays[thisDay]; // Mengambil nama hari
                                        var yy = date.getFullYear(); // Mengambil tahun penuh
                                        document.write(thisDayName + ', ' + day + ' ' + months[month] + ' ' + yy); 
                                    </script>
                                </div>
                            </h3>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class='fab fa-codepen' style='font-size:18px'></i></div>
                        Stock Barang
                    </a>
                    <a class="nav-link" href="masuk.php">
                        <div class="sb-nav-link-icon"><i class='fas fa-download' style='font-size:18px'></i></div>
                        Barang Masuk
                    </a>
                    <a class="nav-link" href="keluar.php">
                        <div class="sb-nav-link-icon"><i class='fas fa-upload' style='font-size:18px'></i></div>
                        Barang Keluar
                    </a>
                    <a class="nav-link" href="laporan.php">
                        <div class="sb-nav-link-icon"><i class='fas fa-briefcase' style='font-size:18px'></i></div>
                        Laporan
                    </a>
                    <a class="nav-link" href="admin.php">
                        <div class="sb-nav-link-icon"><i class='fas fa-user-tie' style='font-size:18px'></i></div>
                        Kelola Admin
                    </a>

                    <!-- Menggunakan CSS untuk memberikan jarak antara elemen -->
                    <a class="nav-link logout" href="logout.php">
                        <div class="sb-nav-link-icon"><i style='font-size:18px' class='fas fa-user-tie'>&#xf2f5;</i></div>
                        Keluar
                    </a>
                        </div>
                    </div>
                </nav>
                
            </div>
            
            
            
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Stock Barang</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                                  <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Tambah Barang
                                        <i class="material-icons" style="font-size: 18px;">&#xe39d;</i>
                                    </button>
                                    
                            </div>
                            <div class="card-body">
                            <?php
                                $ambildatastock = mysqli_query($conn,"select * from stock where stock < 1");
                                while($fecth=mysqli_fetch_array($ambildatastock)){
                                    $barang = $fecth['namabarang'];

                                

                            ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Perhatian!</strong> Stock Barang <?=$barang;?> telah abis!
                            </div>
                            <?php

                                }

                            ?>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Id Barang</th>
                                                <th>Deskripsi</th>
                                                <th>Stock</th>
                                                <th>Satuan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilsemuadatastock = mysqli_query($conn,"select * from stock");
                                            $i = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                $namabarang = $data['namabarang'];
                                                $idb = $data['idbarang'];
                                                $deskripsi = $data['deskripsi'];
                                                $stock = $data['stock'];
                                                $satuan = $data['satuan'];

                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$idb;?></td>
                                                <td><?=$deskripsi;?></td>
                                                <td><?=$stock;?></td>
                                                <td><?=$satuan;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                                        Edit
                                                    </button>
                                                    <input type="hidden" name="idbarangyangmaudihapus" value="<?=$idb;?>">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- edit Modal -->
                                            <div class="modal fade" id="edit<?=$idb;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control"required>
                                                    <br>
                                                    <input type="text" name="deskripsi" value="<?=$deskripsi;?>" class="form-control"required>
                                                    <input type="hidden" name="idbarang" value="<?=$idb;?>">
                                                    <br>
                                                    <input type="text" name="satuan" value="<?=$satuan;?>"placeholder="Satuan" class="form-control"required>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                                                    <br>
                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>

                                            <!-- delete Modal -->
                                            <div class="modal fade" id="delete<?=$idb;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus <?=$namabarang;?> ?
                                                    <input type="hidden" name="idbarang" value="<?=$idb;?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                                                    <br>
                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>

                                            <?php
                                            };

                                            

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <style>
                                .align-right {
                                    text-align: right;
                                }
                            </style>
                            <div class="card-body">
                                <div class="align-right">
                                    <a href="export.php" class="btn btn-info">Export Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Tabel Baru untuk Stok di Bawah 10 -->
                    <div class="card mb-4">
                            <div class="card-header">
                                Barang Yang Akan Habis
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Id Barang</th>
                                                <th>Deskripsi</th>
                                                <th>Stock</th>
                                                <th>Satuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Query untuk mengambil barang dengan stok kurang dari 10
                                            $ambilsemuadatastock_bawah_10 = mysqli_query($conn, "SELECT * FROM stock WHERE stock < 10");
                                            $i = 1;
                                            while($data = mysqli_fetch_array($ambilsemuadatastock_bawah_10)){
                                                $namabarang = $data['namabarang'];
                                                $idb = $data['idbarang'];
                                                $deskripsi = $data['deskripsi'];
                                                $stock = $data['stock'];
                                                $satuan = $data['satuan'];
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$idb;?></td>
                                                <td><?=$deskripsi;?></td>
                                                <td><?=$stock;?></td>
                                                <td><?=$satuan;?></td>
                                            </tr>
                                            <?php
                                            };
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Barang</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
            <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control"required>
            <br>
            <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control"required>
            <br>
            <input type="number" name="stock" placeholder="Stock" class="form-control"required>
            <br>
            <input type="text" name="satuan" placeholder="Satuan" class="form-control"required>
            <br>
            <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
            <br>
            </div>
            </form>
            
        </div>
        </div>
    </div>
  
</div>
</html>
