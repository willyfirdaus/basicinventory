<?php
//koneksi database dan tarik data table
$db = mysqli_connect("localhost","root","","basicinventory");

function query ($query) {
    global $db;
    $result = mysqli_query ($db,$query);
    $rows = [];
    while ( $row = mysqli_fetch_array($result) ) {
         $rows [] = $row;
    }
    return $rows;
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
$status_bc = htmlspecialchars ($data["status_bc"]);
$no_aju = htmlspecialchars ($data["no_aju"]);
$no_pendaftaran = htmlspecialchars ($data["no_pendaftaran"]);
$no_surat_jalan = htmlspecialchars ($data["no_surat_jalan"]);
$tanggal_bcmasuk = htmlspecialchars ($data["tanggal_bcmasuk"]);



//query insert data ke data base
$query = "UPDATE purchaseorder SET
        status_bc ='$status_bc',
        no_aju = '$no_aju',
        no_pendaftaran = '$no_pendaftaran',
        no_surat_jalan = '$no_surat_jalan',
        tanggal_bcmasuk = '$tanggal_bcmasuk'
        
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
    no_invoice LIKE '%$keyword%'
    ";
    return query ($query);
}


?>