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

mysqli_query ($db,"DELETE FROM purchaseorder WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}




//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$nomor_bukti_penerimaan = htmlspecialchars ($data["nomor_bukti_penerimaan"]);
$qty_real = htmlspecialchars ($data["qty_real"]);
$lokasi_gudang = htmlspecialchars ($data["lokasi_gudang"]);
$tanggal_diterima = htmlspecialchars ($data["tanggal_diterima"]);




//query insert data ke data base
$query = "UPDATE purchaseorder SET

        nomor_bukti_penerimaan ='$nomor_bukti_penerimaan',
        qty_real ='$qty_real',
        lokasi_gudang = '$lokasi_gudang',
        tanggal_diterima = '$tanggal_diterima'
    
        
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