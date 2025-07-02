<?php
require 'function.php';
require 'cek.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<html>
<head>
<title>Stock Barang</title>
    <!-- CSS DataTables -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <!-- Styling tambahan untuk tombol DataTables -->
    <style>
    .dt-buttons {
      margin-bottom: 20px;
      display: flex;
      justify-content: flex-start;
      flex-wrap: wrap;
      gap: 10px;
    }
    .dt-button {
      padding: 10px 15px;
      font-size: 14px;
      border-radius: 5px;
      color: #fff;
      background-color: #007bff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .dt-button:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }
  </style>
    
    <!-- JS Libraries -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

</head>
<body>
    <div class="container">
      <h2>Laporan</h2>
      <h4>(Inventory)</h4>
      <div class="data-tables datatable-dark">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">Terima Tgl</th>
                <th rowspan="2">Dari</th>
                <th colspan="2">Dokumen / Faktur</th>
                <th colspan="2">Dasar Penerimaan</th>
                <th rowspan="2">Banyaknya</th>
                <th rowspan="2">Nama Barang</th>
                <th rowspan="2">Harga Satuan</th>
                <th colspan="2">Buku Penerimaan B.A/Srt.Penerimaan</th>
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
                <th>Jenis Surat</th>
                <th>Nomor</th>
                <th>Nomor</th>
                <th>Tanggal</th>
                <th>Nomor</th>
                <th>Tanggal</th>
              </tr>
          </thead>

      <tbody>
        <?php
        $total_qty = 0;
        $total_hargasatuan = 0;
        $total_hargasatuantot = 0;
        // Ambil data barang masuk
        $ambilsemuadatamasuk = mysqli_query($conn, "
            SELECT m.idmasuk, m.idbarang, m.tanggal, m.dari, m.jenissurat, m.nomodok, m.nomobuk, m.qty, m.satuan, m.hargasatuan, 
                  s.namabarang 
            FROM masuk m
            JOIN stock s ON s.idbarang = m.idbarang
        ");
        if (mysqli_num_rows($ambilsemuadatamasuk) == 0) {
          echo "Tidak ada data barang masuk.";
        }

        // Ambil data barang keluar
        $ambilsemuadatakeluar = mysqli_query($conn, "
            SELECT k.idkeluar, k.idbarang, k.tanggal, k.tanggalpe, k.tanggalpeng, k.tanggalsu, k.tanggalnye, k.penerima, k.nomorbuk, 
                  k.ket, k.nomoru, k.nomosu, k.qty, k.satuan, k.totalharga, s.namabarang, s.deskripsi, m.hargasatuan, m.satuan
            FROM keluar k
            JOIN stock s ON s.idbarang = k.idbarang
            LEFT JOIN masuk m ON m.idbarang = k.idbarang
        ");

        if (mysqli_num_rows($ambilsemuadatakeluar) == 0) {
          echo "Tidak ada data barang keluar.";
        }

        // Menyimpan data keluar dalam array untuk pencocokan
        $keluar_data = [];
        while ($data_keluar = mysqli_fetch_array($ambilsemuadatakeluar)) {
            $keluar_data[] = $data_keluar;
        }

        // Menyimpan data keluar yang sudah ditampilkan
        $keluar_ditampilkan = [];

        $i = 1;
        // Proses data masuk
        while ($data_masuk = mysqli_fetch_array($ambilsemuadatamasuk)) {
            $idm = $data_masuk['idmasuk'];
            $namabarang_masuk = $data_masuk['namabarang'];
            $idb_masuk = $data_masuk['idbarang'];
            $tanggal_masuk = $data_masuk['tanggal'];
            $dari = $data_masuk['dari'];
            $nomodok = $data_masuk['nomodok'];
            $jenissurat = $data_masuk['jenissurat'];
            $nomobuk = $data_masuk['nomobuk'];
            $qty_masuk = $data_masuk['qty'];
            $hargasatuan = $data_masuk['hargasatuan'];

            // Set kolom keluar kosong
            $idk = $namabarang_keluar = $idb_keluar = $nomorbuk = $tanggalpe = $ket = $nomoru = $tanggalpeng = $nomosu = $tanggalsu = $penerima = $qty_keluar = $idbarang = $deskripsi = $tanggalnye = $totalharga = "";

            // Cari barang keluar yang sesuai dengan barang masuk
            foreach ($keluar_data as $data_keluar) {
                if ($data_keluar['idbarang'] == $idb_masuk && !in_array($data_keluar['idkeluar'], $keluar_ditampilkan)) {
                    $idk = $data_keluar['idkeluar'];
                    $tanggal_keluar = $data_keluar['tanggal'];
                    $namabarang_keluar = $data_keluar['namabarang'];
                    $idb_keluar = $data_keluar['idbarang'];
                    $nomorbuk = $data_keluar['nomorbuk'];
                    $tanggalpe = $data_keluar['tanggalpe'];
                    $ket = $data_keluar['ket'];
                    $nomoru = $data_keluar['nomoru'];
                    $tanggalpeng = $data_keluar['tanggalpeng'];
                    $nomosu = $data_keluar['nomosu'];
                    $tanggalsu = $data_keluar['tanggalsu'];
                    $penerima = $data_keluar['penerima'];
                    $qty_keluar = $data_keluar['qty'];
                    $idbarang = $data_keluar['idbarang'];
                    $deskripsi = $data_keluar['deskripsi'];
                    $tanggalnye = $data_keluar['tanggalnye'];
                    $hargasatuan = $data_keluar['hargasatuan'];
                    $totalharga = $qty_keluar * $hargasatuan;

                    // Tandai barang keluar ini sudah ditampilkan
                    $keluar_ditampilkan[] = $data_keluar['idkeluar'];
                    break;
                }
            }

            // Menghitung total
            $total_qty += $qty_masuk;
            $total_hargasatuan += $hargasatuan;
            $total_hargasatuantot += $totalharga;
          ?>
            <tr>
            <td><?= $i++; ?></td>
            <td><?php echo $tanggal_masuk;?></td>
            <td><?php echo $dari;?></td>
            <td><?php echo $nomodok;?></td>
            <td><?php echo $tanggal_masuk;?></td>
            <td><?php echo $jenissurat;?></td>
            <td><?php echo $nomobuk;?></td>
            <td><?php echo $qty_masuk;?></td>
            <td><?php echo $namabarang_masuk;?></td>
            <td><?php echo $hargasatuan; ?></td>
            <td><?php echo $nomorbuk; ?></td>
            <td><?php echo $tanggalpe; ?></td>
            <td><?php echo $ket; ?></td>
            <td><?php echo $nomoru; ?></td>
            <td><?php echo $tanggalpeng; ?></td>
            <td><?php echo $nomosu; ?></td>
            <td><?php echo $tanggalsu; ?></td>
            <td><?php echo $penerima; ?></td>
            <td><?php echo $qty_keluar; ?></td>
            <td><?php echo $idbarang; ?></td>
            <td><?php echo $namabarang_masuk; ?></td>
            <td><?php echo $hargasatuan; ?></td>
            <td><?php echo $totalharga; ?></td>
            <td><?php echo $tanggalnye; ?></td>
            <td><?php echo $deskripsi; ?></td>
            </tr>

            
        <?php
        }
        ?>

        <?php
        // Proses barang keluar yang belum ditampilkan
        foreach ($keluar_data as $data_keluar) {
          if (!in_array($data_keluar['idkeluar'], $keluar_ditampilkan)) {

              $idk = $data_keluar['idkeluar'];
              $namabarang_keluar = $data_keluar['namabarang'];
              $idb_keluar = $data_keluar['idbarang'];
              $nomorbuk = $data_keluar['nomorbuk'];
              $tanggalpe = $data_keluar['tanggalpe'];
              $ket = $data_keluar['ket'];
              $nomoru = $data_keluar['nomoru'];
              $tanggalpeng = $data_keluar['tanggalpeng'];
              $nomosu = $data_keluar['nomosu'];
              $tanggalsu = $data_keluar['tanggalsu'];
              $penerima = $data_keluar['penerima'];
              $qty_keluar = $data_keluar['qty'];
              $idbarang = $data_keluar['idbarang'];
              $deskripsi = $data_keluar['deskripsi'];
              $tanggalnye = $data_keluar['tanggalnye'];
              $hargasatuan = $data_keluar['hargasatuan'];
              $totalharga = $qty_keluar * $hargasatuan;

              // Set kolom masuk kosong
              $idm = $namabarang_masuk = $idb_masuk = $tanggal_masuk = $dari = $nomodok = $jenissurat = $nomobuk = $qty_masuk = "";

              // Ambil stock barang berdasarkan idbarang untuk keluar
              $stock_query = mysqli_query($conn, "SELECT stock FROM stock WHERE idbarang = '$idb_keluar'");
              $stock_data = mysqli_fetch_array($stock_query);
              $stock = $stock_data['stock'];

              $total_hargasatuantot += $totalharga;
          ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?php echo $tanggal_masuk;?></td>
            <td><?php echo $dari;?></td>
            <td><?php echo $nomodok;?></td>
            <td><?php echo $tanggal_masuk;?></td>
            <td><?php echo $jenissurat;?></td>
            <td><?php echo $nomobuk;?></td>
            <td><?php echo $qty_masuk;?></td>
            <td><?php echo $namabarang_masuk;?></td>
            <td><?php echo $hargasatuan; ?></td>
            <td><?php echo $nomorbuk; ?></td>
            <td><?php echo $tanggalpe; ?></td>
            <td><?php echo $ket; ?></td>
            <td><?php echo $nomoru; ?></td>
            <td><?php echo $tanggalpeng; ?></td>
            <td><?php echo $nomosu; ?></td>
            <td><?php echo $tanggalsu; ?></td>
            <td><?php echo $penerima; ?></td>
            <td><?php echo $qty_keluar; ?></td>
            <td><?php echo $idbarang; ?></td>
            <td><?php echo $namabarang_masuk; ?></td>
            <td><?php echo $hargasatuan; ?></td>
            <td><?php echo $totalharga; ?></td>
            <td><?php echo $tanggalnye; ?></td>
            <td><?php echo $deskripsi; ?></td>
          </tr>
        <?php
          }
        }
        ?>

      </tbody>
      <tfoot>
      <tr>
        <td colspan="1"><strong>Jumlah:</strong></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="1"><?php echo $total_qty; ?></td>
        <td></td>
        <td colspan="2"><?php echo $total_hargasatuan; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="1"></td>
        <td colspan="1"><?php echo $total_hargasatuan; ?></td>
        <td colspan="1"><?php echo $total_hargasatuantot; ?></td>
        <td></td>
        <td></td>
      </tr>
    </tfoot>
    </table>
    </div>
    </div>

    <script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      dom: 'Bfrtip', // Menentukan layout DataTables
      buttons: [
        'copy', 'csv', 'excel', {
          extend: 'pdf',
          orientation: 'landscape',  // Menentukan orientasi landscape
          pageSize: 'A4',            // Ukuran halaman A4
          pageMargins: [40, 60, 40, 60], // Menambahkan margin agar lebih panjang
          title: 'Laporan Stok Barang', // Judul PDF
          download: 'open', // Menampilkan PDF langsung di browser
          customize: function(doc) {
            // Mengurangi ukuran font agar lebih kecil dan menyesuaikan kolom
            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length).fill('*'); // Menyesuaikan lebar kolom
            doc.styles.tableHeader.fontSize = 4;  // Mengurangi ukuran font header
            doc.styles.tableBodyOdd.fontSize = 4;  // Mengurangi ukuran font body
            doc.styles.tableBodyEven.fontSize = 4; // Mengurangi ukuran font body
          }
        },
        'print' // Tombol print
      ]
    });
  });
</script>


  </body>
</html>
