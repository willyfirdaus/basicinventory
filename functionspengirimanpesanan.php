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


//fungsi hapus data pada supplier
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





//query insert data ke data base
$query = "UPDATE penerimaanpesanan SET
        no_invoice ='$no_invoice',
        tanggal_invoice = '$tanggal_invoice',
        buyer = '$buyer',
        alamat = '$alamat',
        no_surat_jalan = '$no_surat_jalan',
        stuffing_record = '$stuffing_record',
        negara_tujuan = '$negara_tujuan',
        pelabuan_muat = '$pelabuan_muat',
        no_container = '$no_container',
        status_bc = '$status_bc',
        currency_rate = '$currency_rate',
        amount_usd = '$amount_usd',
        amount_idr = '$amount_idr',
        price = '$price'
        
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}



//function search
function cari ($keyword) {
    $query = "SELECT * FROM penerimaanpesanan
    WHERE
    no_po LIKE '%$keyword%' OR
    no_kontrak LIKE '%$keyword%'
    ";
    return query ($query);
}


?>