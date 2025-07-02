<?php
session_start();
//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stockbarang");



//menambah barang baru
if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];
    $satuan = $_POST['satuan'];

    $addtotable = mysqli_query($conn,"insert into stock (namabarang, deskripsi, stock) values('$namabarang','$deskripsi','$stock')");
    if($addtotable){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

// Menambah barang baru
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $dari = $_POST['dari'];
    $tanggal = $_POST['tanggal'];
    $nomodok = $_POST['nomodok'];
    $jenissurat = $_POST['jenissurat'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $hargasatuan = $_POST['hargasatuan'];
    

    // Cek harga satuan dari tabel stock
    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];

    // Menambahkan stock baru
    $tambahkanstockdenganquanty = $stocksekarang + $qty;

    // Menyimpan data barang masuk
    $addtomasuk = mysqli_query($conn, "INSERT INTO masuk (idbarang, dari, tanggal, nomodok, jenissurat, qty, satuan, hargasatuan) VALUES ('$barangnya', '$dari', '$tanggal', '$nomodok', '$jenissurat', '$qty', '$satuan', '$hargasatuan')");
    $updatestockmasuk = mysqli_query($conn, "UPDATE stock SET stock='$tambahkanstockdenganquanty' WHERE idbarang='$barangnya'");

    if($addtomasuk && $updatestockmasuk){
        header('location:masuk.php');
    } else {
        echo 'Gagal';
        header('location:masuk.php');
    }
}



// Mengurangi barang
if(isset($_POST['barangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $nomorbuk = $_POST['nomorbuk'];
    $tanggalpe = $_POST['tanggalpe'];
    $ket = $_POST['ket'];
    $nomoru = $_POST['nomoru'];
    $tanggalpeng = $_POST['tanggalpeng'];
    $nomosu = $_POST['nomosu'];
    $tanggalsu = $_POST['tanggalsu'];
    $tanggalnye = $_POST['tanggalnye'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];
    $hargasatuan = $_POST['hargasatuan'];
    $hargatotal = $_POST['hargatotal'];

    // Cek stock dan harga satuan dari tabel stock
    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $hargasatuanmasuk = $ambildatanya['hargasatuan'];  // Ambil harga satuan

    if($stocksekarang >= $qty){
        // Jika stock cukup
        $tambahkanstockdenganquanty = $stocksekarang - $qty;

        // Hitung total harga
        $totalharga = $hargasatuanmasuk * $qty;

        // Menyimpan data barang keluar dengan total harga
        $addtokeluar = mysqli_query($conn, "INSERT INTO keluar (idbarang, nomorbuk, tanggalpe, ket, nomoru, tanggalpeng, nomosu, tanggalsu, tanggalnye, penerima, qty, totalharga) 
        VALUES ('$barangnya','$nomorbuk','$tanggalpe','$ket','$nomoru','$tanggalpeng', '$nomosu', '$tanggalsu','$tanggalnye','$penerima', '$qty', '$totalharga')");
        $updatestockkeluar = mysqli_query($conn, "UPDATE stock SET stock='$tambahkanstockdenganquanty' WHERE idbarang='$barangnya'");

        if($addtokeluar && $updatestockkeluar){
            header('location:keluar.php');
        } else {
            echo 'Gagal';
            header('location:keluar.php');
        }
    } else {
        // Jika stock tidak mencukupi
        echo '
        <script>
            alert("Stock saat ini tidak mencukupi");
            window.location.href="keluar.php";
        </script>
        ';
    }
}


//update info
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idbarang'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $satuan = $_POST['satuan'];

    $update = mysqli_query($conn,"update stock set namabarang='$namabarang', deskripsi='$deskripsi', satuan='$satuan' where idbarang ='$idb'");
    if($update){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

//hapus
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idbarang'];

    $hapus = mysqli_query($conn,"delete from stock where idbarang='$idb'");
    if($hapus){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

//update barang masuk
if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $namabarang = $_POST['namabarang'];
    $dari = $_POST['dari'];
    $qty = $_POST['qty'];


    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "select * from masuk where idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];
    
    if($qty>$qtyskrg){
        $selisihnya = $qty-$qtyskrg;
        $kurangi = $stockskrg + $selisihnya;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update masuk set qty='$qty' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
            } else {
                echo 'Gagal';
                header('location:masuk.php');
            }
    } else {
        $selisihnya = $qtyskrg-$qty;
        $kurangi = $stockskrg - $selisihnya;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update masuk set qty='$qty' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
            } else {
                echo 'Gagal';
                header('location:masuk.php');
            }

    }
};

//hapus barang masuk
if(isset($_POST['hapusbarangmasuk'])){
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idm = $_POST['idm'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock-$qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn,"delete from masuk where idmasuk='$idm'");
    if($update&&$hapusdata){
        header('location:masuk.php');
    } else {
        echo 'Gagal';
        header('location:masuk.php');
    }
};


//update barang keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $namabarang = $_POST['namabarang'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];


    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "select * from keluar where idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];
    
    if($qty>$qtyskrg){
        $selisihnya = $qty-$qtyskrg;
        $kurangi = $stockskrg - $selisihnya;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('location:keluar.php');
            } else {
                echo 'Gagal';
                header('location:keluar.php');
            }
    } else {
        $selisihnya = $qtyskrg-$qty;
        $kurangi = $stockskrg + $selisihnya;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('location:keluar.php');
            } else {
                echo 'Gagal';
                header('location:keluar.php');
            }

    }
};

//hapus barang keluar
if(isset($_POST['hapusbarangkeluar'])){
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idk = $_POST['idk'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock+$qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn,"delete from keluar where idkeluar='$idk'");
    if($update&&$hapusdata){
        header('location:keluar.php');
    } else {
        echo 'Gagal';
        header('location:keluar.php');
    }
};

//menambahadminbaru
if(isset($_POST['addnewadmin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryinsert = mysqli_query($conn,"insert into login (email, password) values('$email','$password')");
    if($queryinsert){
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }
}

//editadmin
if(isset($_POST['updateadmin'])){
    $emailbaru = $_POST['emailadmin'];
    $passwordbaru = $_POST['passwordbaru'];
    $idnya = $_POST['id'];

    $queryupdate = mysqli_query($conn,"update login set email='$emailbaru', password='$passwordbaru' where iduser='$idnya'");
    if($queryupdate){
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }
}

//hapusadmin
if(isset($_POST['hapusadmin'])){
    $id = $_POST['id'];

    $querydelete = mysqli_query($conn,"delete from login where iduser='$id'");
    if($querydelete){
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }
}

?>