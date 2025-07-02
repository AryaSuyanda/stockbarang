<?php
require 'function.php';
require 'cek.php';
?>

<html>
<head>
  <title>Stock Barang</title>
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- DataTables Buttons CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

  <!-- jQuery -->
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- DataTables JS -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <!-- DataTables Buttons JS -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <!-- JS for individual button functionalities (like 'Copy', 'Excel', etc.) -->
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
</head>

<body>
<div class="container">
  <h2>Barang Keluar</h2>
  <h4>(Inventory)</h4>
  <div class="data-tables datatable-dark">
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
                                        $ambilsemuadatastock = mysqli_query($conn, "
                                        SELECT k.idkeluar, k.idbarang, k.tanggal, k.tanggalpe, k.tanggalpeng, k.tanggalsu, k.tanggalnye, k.penerima, k.nomorbuk, k.ket, k.nomoru, k.nomosu, k.qty, k.satuan, k.totalharga,
                                            s.namabarang, s.deskripsi, m.hargasatuan, m.satuan
                                        FROM keluar k
                                        JOIN stock s ON s.idbarang = k.idbarang
                                        LEFT JOIN masuk m ON m.idbarang = k.idbarang
                                    ");
                                    
                                    $i = 1;
                                    while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
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
                                            <td><?php echo $namabarang; ?></td>
                                            <td><?php echo $nomorbuk; ?></td>
                                            <td><?php echo $tanggalpe; ?></td>
                                            <td><?php echo $ket; ?></td>
                                            <td><?php echo $nomoru; ?></td>
                                            <td><?php echo $tanggalpeng; ?></td>
                                            <td><?php echo $nomosu; ?></td>
                                            <td><?php echo $tanggalsu; ?></td>
                                            <td><?php echo $penerima; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $idbarang; ?></td>
                                            <td><?php echo $namabarang; ?></td>
                                            <td><?php echo $hargasatuan; ?></td>
                                            <td><?php echo $totalharga; ?></td>
                                            <td><?php echo $tanggalnye; ?></td>
                                            <td><?php echo $deskripsi; ?></td>
                                            </tr>
                                            
                                            
                                        <?php 
                                        
                                        
                                        } ?>
                                        </tbody>

                                    </table>
  </div>
</div>

<script>
$(document).ready(function() {
  $('#dataTable').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
});
</script>

</body>
</html>
