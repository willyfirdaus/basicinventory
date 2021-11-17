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




//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$no_aju = htmlspecialchars ($data["no_aju"]);
$no_pendaftaran = htmlspecialchars ($data["no_pendaftaran"]);
$no_npe = htmlspecialchars ($data["no_npe"]);
$tanggal = htmlspecialchars ($data["tanggal"]);






//query insert data ke data base
$query = "UPDATE penerimaanpesanan SET
        no_aju ='$no_aju',
        no_pendaftaran = '$no_pendaftaran',
        no_npe = '$no_npe',
        tanggal = '$tanggal'
     
        
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