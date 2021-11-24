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


//ambil data dari elemen form purchaseorder
function tambah($data) {
    global $db;
    //ambil data dari tiap elemen form
$job_order = htmlspecialchars ($data["job_order"]);
$tanggal_registrasi = htmlspecialchars ($data["tanggal_registrasi"]);
$kode =htmlspecialchars ($data["kode"]);
$deskripsi = htmlspecialchars ($data["deskripsi"]);
$request_qty = htmlspecialchars ($data["request_qty"]);
$catatan = htmlspecialchars ($data["catatan"]);
$qty_finish_good = htmlspecialchars ($data["qty_finish_good"]);
$tanggal_finish = htmlspecialchars ($data["tanggal_finish"]);
$no_invoice = htmlspecialchars ($data["no_invoice"]);
$tanggal_invoice = htmlspecialchars ($data["tanggal_invoice"]);
$buyer = htmlspecialchars ($data["buyer"]);
$alamat = htmlspecialchars ($data["alamat"]);
$no_surat_jalan = htmlspecialchars ($data["no_surat_jalan"]);
$stuffing_record = htmlspecialchars ($data["stuffing_record"]);
$negara_tujuan = htmlspecialchars ($data["negara_tujuan"]);
$pelabuan_muat = htmlspecialchars ($data["pelabuan_muat"]);
$no_container = htmlspecialchars ($data["no_container"]);
$status_bc = htmlspecialchars ($data["status_bc"]);
$currency_rate = htmlspecialchars ($data["currency_rate"]);
$amount_usd = htmlspecialchars ($data["amount_usd"]);
$amount_idr = htmlspecialchars ($data["amount_idr"]);
$price = htmlspecialchars ($data["price"]);
$no_aju = htmlspecialchars ($data["no_aju"]);
$no_pendaftaran = htmlspecialchars ($data["no_pendaftaran"]);
$no_npe = htmlspecialchars ($data["no_npe"]);
$tanggal = htmlspecialchars ($data["tanggal"]);
$nomor_bukti_pengeluaran = htmlspecialchars ($data["nomor_bukti_pengeluaran"]);
$tanggal_bukti_pengeluaran = htmlspecialchars ($data["tanggal_bukti_pengeluaran"]);
$satuan = htmlspecialchars ($data["satuan"]);
$asal = htmlspecialchars ($data["asal"]);
$hs_code = htmlspecialchars ($data["hs_code"]);
$penerima_barang = htmlspecialchars ($data["penerima_barang"]);


//query insert data ke data base
$query = "INSERT INTO penerimaanpesanan
            VALUES
        ('',
        '$job_order',
        '$tanggal_registrasi',
        '$kode',
        '$deskripsi',
        '$request_qty',
        '$catatan',
        '$qty_finish_good',
        '$tanggal_finish',
        '$no_invoice',
        '$tanggal_invoice',
        '$buyer',
        '$alamat',
        '$no_surat_jalan',
        '$stuffing_record',
        '$negara_tujuan',
        '$pelabuan_muat',
        '$no_container',
        '$status_bc',
        '$currency_rate',
        '$amount_usd',
        '$amount_idr',
        '$price',
        '$no_aju',
        '$no_pendaftaran',
        '$no_npe',
        '$tanggal',
        '$nomor_bukti_pengeluaran',
        '$tanggal_bukti_pengeluaran',
        '$satuan',
        '$asal',
        '$hs_code',
        '$penerima_barang')
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;

}


//fungsi hapus data pada kode
function hapus($id) {
    global $db;

mysqli_query ($db,"DELETE FROM penerimaanpesanan WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}




//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$job_order = htmlspecialchars ($data["job_order"]);
$tanggal_registrasi = htmlspecialchars ($data["tanggal_registrasi"]);
$kode = htmlspecialchars ($data["kode"]);
$deskripsi =htmlspecialchars ($data["deskripsi"]);
$satuan =htmlspecialchars ($data["satuan"]);
$hs_code =htmlspecialchars ($data["hs_code"]);
$request_qty = htmlspecialchars ($data["request_qty"]);
$asal = htmlspecialchars ($data["asal"]);
$catatan = htmlspecialchars ($data["catatan"]);






//query insert data ke data base
$query = "UPDATE penerimaanpesanan SET
        job_order = '$job_order',
        tanggal_registrasi = '$tanggal_registrasi',
        kode = '$kode',
        deskripsi = '$deskripsi',
        satuan = '$satuan',
        hs_code = '$hs_code',
        request_qty ='$request_qty',
        asal = '$asal',
        catatan = '$catatan'
        
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}



//function search
function cari ($keyword) {
    $query = "SELECT * FROM penerimaanpesanan
    WHERE
    po LIKE '%$keyword%' OR
    kode LIKE '%$keyword%' OR
    request_qty LIKE '%$keyword%'
    ";
    return query ($query);
}


?>