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
  <h2>Barang Masuk</h2>
  <h4>(Inventory)</h4>
  <div class="data-tables datatable-dark">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">Terima Tgl</th>
          <th rowspan="2">Nama Barang</th>
          <th rowspan="2">Dari</th>
          <th colspan="2">Dokumen/Faktur</th>
          <th colspan="2">Dasar Penerimaan</th>
          <th rowspan="2">Banyaknya</th>
          <th rowspan="2">Satuan</th>
          <th rowspan="2">Harga Satuan</th>
        </tr>
        <tr>
          <th>Nomor</th>
          <th>Tanggal</th>
          <th>Jenis Surat</th>
          <th>Nomor</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Mengambil data dari tabel masuk dan stock
        $ambilsemuadatastock = mysqli_query($conn, "
            SELECT m.idmasuk, m.idbarang, m.tanggal, m.dari, m.jenissurat, m.nomodok, m.nomobuk, m.qty, m.satuan, m.hargasatuan, 
                s.namabarang 
            FROM masuk m
            JOIN stock s ON s.idbarang = m.idbarang
        ");

        // Cek apakah query berhasil
        if (!$ambilsemuadatastock) {
            echo "Error in query: " . mysqli_error($conn);
            exit; // Jika query gagal, hentikan eksekusi kode lebih lanjut
        }

        $i = 1;
        while($data = mysqli_fetch_array($ambilsemuadatastock)) {
            $idm = $data['idmasuk'];
            $namabarang = $data['namabarang'];
            $idb = $data['idbarang'];
            $tanggal = $data['tanggal'];
            $dari = $data['dari'];
            $nomodok = $data['nomodok'];
            $jenissurat = $data['jenissurat'];
            $nomobuk = $data['nomobuk'];
            $qty = $data['qty'];
            $satuan = $data['satuan'];
            $hargasatuan = $data['hargasatuan'];
            ?>
            <tr>
                <td><?=$i++;?></td>
                <td><?php echo $tanggal;?></td>
                <td><?php echo $namabarang;?></td>
                <td><?php echo $dari;?></td>
                <td><?php echo $nomodok;?></td>
                <td><?php echo $tanggal;?></td>
                <td><?php echo $jenissurat;?></td>
                <td><?php echo $nomobuk;?></td>
                <td><?php echo $qty;?></td>
                <td><?php echo $satuan;?></td>
                <td><?php echo $hargasatuan;?></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script>
$(document).ready(function() {
  $('#dataTable').DataTable( {
    dom: 'Bfrtip', // Menentukan posisi tombol di atas tabel
    buttons: [
      'copy', // Tombol copy ke clipboard
      'csv',  // Tombol export CSV
      'excel', // Tombol export Excel
      'pdf',  // Tombol export PDF
      'print' // Tombol Print
    ]
  });
});
</script>

</body>
</html>
