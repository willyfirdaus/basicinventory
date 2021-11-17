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


//ambil data dari elemen form supplier
function tambah($data) {
    global $db;
    //ambil data dari tiap elemen form
$kode = htmlspecialchars ($data["kode"]);
$nama = htmlspecialchars ($data["nama"]);
$alamat = htmlspecialchars ($data["alamat"]);
$kota = htmlspecialchars ($data["kota"]);
$no_izin_tpb = htmlspecialchars ($data["no_izin_tpb"]);
$status_perusahaan = htmlspecialchars ($data["status_perusahaan"]);


//query insert data ke data base
$query = "INSERT INTO supplier
            VALUES
        ('','$kode','$nama','$alamat','$kota'
        ,'$no_izin_tpb','$status_perusahaan')
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}


//fungsi hapus data pada supplier
function hapus($id) {
    global $db;

mysqli_query ($db,"DELETE FROM supplier WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}

//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$kode = htmlspecialchars ($data["kode"]);
$nama = htmlspecialchars ($data["nama"]);
$alamat = htmlspecialchars ($data["alamat"]);
$kota = htmlspecialchars ($data["kota"]);
$no_izin_tpb = htmlspecialchars ($data["no_izin_tpb"]);
$status_perusahaan = htmlspecialchars ($data["status_perusahaan"]);


//query insert data ke data base
$query = "UPDATE supplier SET
        kode ='$kode',
        nama = '$nama',
        alamat ='$alamat',
        kota = '$kota',
        no_izin_tpb ='$no_izin_tpb',
        status_perusahaan = '$status_perusahaan'
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}

//function search
function cari ($keyword) {
    $query = "SELECT * FROM supplier
    WHERE
    kode LIKE '%$keyword%' OR
    nama LIKE '%$keyword%'
    ";
    return query ($query);
}



?>