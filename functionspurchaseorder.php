<?php
//koneksi database dan tarik data table
$db = mysqli_connect("localhost","root","","basicinventory");

function query ($query) {
    global $db;
    $result = mysqli_query ($db,$query);
    $rows = [];
    if ($result === false) {
        echo mysqli_error($db);
    }else{
        while ( $row = mysqli_fetch_array($result) ) {
            $rows [] = $row;
        }
        return $rows;
    }
}

function queryObject ($query) {
    global $db;
    $result = mysqli_query ($db,$query);
    $rows = [];
    if ($result === false) {
        echo mysqli_error($db);
    }else{
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows = $row;
        }
        return $rows;
    }
}


//ambil data dari elemen form purchaseorder
function tambah($data) {
    global $db;
    //ambil data dari tiap elemen form
$no_po = htmlspecialchars ($data["no_po"]);
$tanggal_po = htmlspecialchars ($data["tanggal_po"]);
$supplier =htmlspecialchars ($data["supplier"]);
$no_kontrak = htmlspecialchars ($data["no_kontrak"]);
$kode = htmlspecialchars ($data["kode"]);
$deskripsi = htmlspecialchars ($data["deskripsi"]);
$qty = htmlspecialchars ($data["qty"]);
$currency = htmlspecialchars ($data["currency"]);
$currency_rate = htmlspecialchars ($data["currency_rate"]);
$price = htmlspecialchars ($data["price"]);
$nilai_barang_usd = htmlspecialchars ($data["nilai_barang_usd"]);
$nilai_barang_idr = htmlspecialchars ($data["nilai_barang_idr"]);
$hs_code = htmlspecialchars ($data["hs_code"]);
$no_invoice = htmlspecialchars ($data["no_invoice"]);
$tanggal_invoice = htmlspecialchars ($data["tanggal_invoice"]);
$status_bc = htmlspecialchars ($data["status_bc"]);
$no_aju = htmlspecialchars ($data["no_aju"]);
$no_pendaftaran = htmlspecialchars ($data["no_pendaftaran"]);
$tanggal_bcmasuk = htmlspecialchars ($data["tanggal_bcmasuk"]);
$no_surat_jalan = htmlspecialchars ($data["no_surat_jalan"]);
$qty_real = htmlspecialchars ($data["qty_real"]);
$lokasi_gudang = htmlspecialchars ($data["lokasi_gudang"]);
$tanggal_diterima = htmlspecialchars ($data["tanggal_diterima"]);
$nomor_bukti_penerimaan = htmlspecialchars ($data["nomor_bukti_penerimaan"]);
$satuan = htmlspecialchars ($data["satuan"]);
$asal = htmlspecialchars ($data["asal"]);

//query insert data ke data base
$query = "INSERT INTO purchaseorder
            VALUES
        ('',
        '$no_po',
        '$tanggal_po',
        '$supplier',
        '$no_kontrak',
        '$kode',
        '$deskripsi',
        '$qty',
        '$currency',
        '$currency_rate',
        '$price',
        '$nilai_barang_usd',
        '$nilai_barang_idr',
        '$hs_code',
        '$no_invoice',
        '$tanggal_invoice',
        '$status_bc',
        '$no_aju',
        '$no_pendaftaran',
        '$tanggal_bcmasuk',
        '$no_surat_jalan',
        '$qty_real' ,
        '$lokasi_gudang',
        '$tanggal_diterima',
        '$nomor_bukti_penerimaan',
        '$satuan',
        '$asal')
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;

}


//fungsi hapus data pada supplier
function hapus($id) {
    global $db;

mysqli_query ($db,"DELETE FROM purchaseorder WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}




//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
    $id = ($data["id"]);
    $no_po = htmlspecialchars ($data["no_po"]);
    $tanggal_po = htmlspecialchars ($data["tanggal_po"]);
    $supplier =htmlspecialchars ($data["supplier"]);
    $no_kontrak = htmlspecialchars ($data["no_kontrak"]);
    $kode = htmlspecialchars ($data["kode"]);
    $deskripsi = htmlspecialchars ($data["deskripsi"]);
    $satuan = htmlspecialchars ($data["satuan"]);
    $qty = htmlspecialchars ($data["qty"]);
    $currency = htmlspecialchars ($data["currency"]);
    $currency_rate = htmlspecialchars ($data["currency_rate"]);
    $price = htmlspecialchars ($data["price"]);
    $nilai_barang_usd = htmlspecialchars ($data["nilai_barang_usd"]);
    $nilai_barang_idr = htmlspecialchars ($data["nilai_barang_idr"]);
    $hs_code = htmlspecialchars ($data["hs_code"]);
    $asal = htmlspecialchars ($data["asal"]);



//query insert data ke data base
$query = "UPDATE purchaseorder SET
        no_po ='$no_po',
        tanggal_po = '$tanggal_po',
        supplier = '$supplier',
        no_kontrak ='$no_kontrak',
        kode = '$kode',
        deskripsi = '$deskripsi',
        satuan = '$satuan',
        qty = '$qty',
        currency = '$currency',
        currency_rate = '$currency_rate',
        price = '$price',
        nilai_barang_usd = '$nilai_barang_usd',
        nilai_barang_idr = '$nilai_barang_idr',
        hs_code = '$hs_code',
        asal = '$asal'
        
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}



//function search
function cari ($keyword) {
    $query = "SELECT * FROM purchaseorder
    WHERE
    no_po LIKE '%$keyword%' OR
    kode LIKE '%$keyword%' OR
    no_kontrak LIKE '%$keyword%'
    ";
    return query ($query);
}


?>