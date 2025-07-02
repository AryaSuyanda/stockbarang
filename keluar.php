<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Keluar</title>
        <link href="css/styles.css" rel="stylesheet" />
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
                        <h1 class="mt-4">Barang Keluar</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                                  <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Tambah Barang Keluar
                                        <i class="material-icons" style="font-size: 18px;">&#xe39d;</i>
                                    </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No.</th>
                                            <th rowspan="2">Nama Barang</th>
                                            <th colspan="2">Buku Penerimaan B.A / Srt. Penerimaan</th>
                                            <th rowspan="2">Ket</th>
                                            <th rowspan="2">No. Urut</th>
                                            <th rowspan="2">Tanggal Pengeluaran</th>
                                            <th colspan="2">Surat Bon</th>
                                            <th rowspan="2">Untuk</th>
                                            <th rowspan="2">Banyaknya</th>
                                            <th rowspan="2">Kode Barang</th>
                                            <th rowspan="2">Nama Barang</th>
                                            <th rowspan="2">Harga Satuan</th>
                                            <th rowspan="2">Jumlah Harga</th>
                                            <th rowspan="2">Tanggal Penyerahan</th>
                                            <th rowspan="2">Ket</th>
                                            <th rowspan="2">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Tanggal</th>
                                            <th>Nomor</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <?php
                                        $ambilsemuadatakeluar = mysqli_query($conn, "
                                        SELECT k.idkeluar, k.idbarang, k.tanggal, k.tanggalpe, k.tanggalpeng, k.tanggalsu, k.tanggalnye, k.penerima, k.nomorbuk, k.ket, k.nomoru, k.nomosu, k.qty, k.satuan, k.totalharga,
                                            s.namabarang, s.deskripsi, m.hargasatuan, m.satuan
                                        FROM keluar k
                                        JOIN stock s ON s.idbarang = k.idbarang
                                        LEFT JOIN masuk m ON m.idbarang = k.idbarang
                                    ");
                                    
                                    $i = 1;
                                    while ($data = mysqli_fetch_array($ambilsemuadatakeluar)) {
                                        $idk = $data['idkeluar'];
                                        $namabarang = $data['namabarang'];
                                        $nomorbuk = $data['nomorbuk'];
                                        $tanggalpe = $data['tanggalpe'];
                                        $ket = $data['ket'];
                                        $nomoru = $data['nomoru'];
                                        $tanggalpeng = $data['tanggalpeng'];
                                        $nomosu = $data['nomosu'];
                                        $tanggalsu = $data['tanggalsu'];
                                        $penerima = $data['penerima'];
                                        $qty = $data['qty'];
                                        $satuan = $data['satuan'];
                                        $idbarang = $data['idbarang'];
                                        $deskripsi = $data['deskripsi'];
                                        $tanggalnye = $data['tanggalnye'];
                                        $hargasatuan = $data['hargasatuan'];
                                        $totalharga = $qty * $hargasatuan;
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $namabarang; ?></td>
                                            <td><?= $nomorbuk; ?></td>
                                            <td><?= $tanggalpe; ?></td>
                                            <td><?= $ket; ?></td>
                                            <td><?= $nomoru; ?></td>
                                            <td><?= $tanggalpeng; ?></td>
                                            <td><?= $nomosu; ?></td>
                                            <td><?= $tanggalsu; ?></td>
                                            <td><?= $penerima; ?></td>
                                            <td><?= $qty; ?></td>
                                            <td><?= $idbarang; ?></td>
                                            <td><?= $namabarang; ?></td>
                                            <td><?= number_format($hargasatuan, 0, ',', '.'); ?></td>
                                            <td><?= number_format($totalharga, 0, ',', '.'); ?></td>
                                            <td><?= $tanggalnye; ?></td>
                                            <td><?= $deskripsi; ?></td>
                                            <td>
                                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $idk; ?>">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $idk; ?>">
                                                                Delete
                                                            </button>
                                                </td>
                                            </tr>
                                            <!-- edit Modal -->
                                            <div class="modal fade" id="edit<?=$idk;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang keluar</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    <input type="text" name="penerima" value="<?=$penerima;?>" class="form-control"required>
                                                    <br>
                                                    <input type="number" name="qty" value="<?=$qty;?>" class="form-control"required>
                                                    <br>
                                                    <input type="hidden" name="idb" value="<?=$idb;?>">
                                                    <input type="hidden" name="idk" value="<?=$idk;?>">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="updatebarangkeluar">Submit</button>
                                                    <br>
                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                            <!-- delete Modal -->
                                            <div class="modal fade" id="delete<?=$idk;?>">
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
                                                    Apakah anda yakin ingin menghapus <?=$namabarang;?> dari <?=$penerima;?> ?
                                                    <input type="hidden" name="idb" value="<?=$idb;?>">
                                                    <input type="hidden" name="kty" value="<?=$qty;?>">
                                                    <input type="hidden" name="idk" value="<?=$idk;?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapusbarangkeluar">Hapus</button>
                                                    <br>
                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                        <?php 
                                        
                                        
                                        } ?>
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
                                    <a href="export keluar.php" class="btn btn-info">Export Data</a>
                                </div>
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
        
            <!-- Modal body -->
<form method="post">
  <div class="modal-body">
    <label class="small mb-1">Buku Penerimaan B.A/Srt.Penerimaan</label>
    <input type="text" name="nomorbuk" placeholder="Nomor" class="form-control">
    <br>
    <input type="date" name="tanggalpe" placeholder="Tanggal" class="form-control">
    <br>
    <input type="text" name="ket" placeholder="Keterangan" class="form-control">
    <br>
    <input type="text" name="nomoru" placeholder="No. Urut" class="form-control">
    <br>
    <label class="small mb-1">Tanggal Pengeluaran</label>
    <input type="date" name="tanggalpeng" placeholder="Tanggal Pengeluaran" class="form-control">
    <br>
    <label class="small mb-1">Surat Bon</label>
    <input type="text" name="nomosu" placeholder="Nomor Surat Bon" class="form-control">
    <br>
    <input type="date" name="tanggalsu" placeholder="Tanggal Surat Bon" class="form-control">
    <br>
    <select name="barangnya" class="form-control" required>
      <?php
      $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM stock");
      while ($fectharray = mysqli_fetch_array($ambilsemuadatanya)) {
        $namabarangnya = $fectharray['namabarang'];
        $idbarangnya = $fectharray['idbarang'];
      ?>
        <option value="<?= $idbarangnya; ?>"><?= $namabarangnya; ?></option>
      <?php } ?>
    </select>
    <br>
    <input type="number" name="qty" placeholder="Jumlah Barang" class="form-control" required>
    <br>
    <input type="text" name="penerima" placeholder="Penerima Barang" class="form-control" required>
    <br>
    <label class="small mb-1">Tanggal Penyerahan</label>
    <input type="date" name="tanggalnye" placeholder="Tanggal Penyerahan" class="form-control">
    <br>
    <button type="submit" class="btn btn-primary" name="barangkeluar">Submit</button>
  </div>
</form>

            
        </div>
        </div>
    </div>
</html>
