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


//ambil data dari elemen form mutasibarang
function tambah($data) {
    global $db;
    //ambil data dari tiap elemen form
$tanggal = htmlspecialchars ($data["tanggal"]);
$kode = htmlspecialchars ($data["kode"]);
$kategori =htmlspecialchars ($data["kategori"]);
$deskripsi =htmlspecialchars ($data["deskripsi"]);
$satuan =htmlspecialchars ($data["satuan"]);
$stok_awal =htmlspecialchars ($data["stok_awal"]);
$stok_masuk =htmlspecialchars ($data["stok_masuk"]);
$stok_keluar =htmlspecialchars ($data["stok_keluar"]);
$penyesuaian =htmlspecialchars ($data["penyesuaian"]);
$retur =htmlspecialchars ($data["retur"]);
$stok_final =htmlspecialchars ($data["stok_final"]);
$asal =htmlspecialchars ($data["asal"]);



//query insert data ke data base
$query = "INSERT INTO mutasibarang 
            VALUES
        ('',
        '$tanggal',
        '$kode',
        '$kategori',
        '$deskripsi',
        '$satuan',
        '$stok_awal',
        '$stok_masuk',
        '$stok_keluar',
        '$penyesuaian',
        '$retur',
        '$stok_final',
        '$asal')
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;

}


//fungsi hapus data pada supplier
function hapus($id) {
    global $db;

mysqli_query ($db,"DELETE FROM mutasibarang WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}




//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
    $id = ($data["id"]);
    $tanggal = htmlspecialchars ($data["tanggal"]);
    $kode = htmlspecialchars ($data["kode"]);
    $deskripsi = htmlspecialchars ($data["deskripsi"]);
    $satuan = htmlspecialchars ($data["satuan"]);
    $stok_awal = htmlspecialchars ($data["stok_awal"]);
    $stok_adjustment = htmlspecialchars ($data["stok_adjustment"]);
    $stok_final = htmlspecialchars ($data["stok_final"]);
    $asal = htmlspecialchars ($data["asal"]);




//query insert data ke data base
$query = "UPDATE mutasibarang SET
        tanggal ='$tanggal',
        kode ='$kode',
        deskripsi ='$deskripsi',
        satuan ='$satuan',
        stok_awal ='$stok_awal',
        stok_adjustment ='$stok_adjustment',
        stok_final ='$stok_final',
        asal = '$asal'
        
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}



//function search
function cari ($keyword) {
    $query = "SELECT * FROM mutasibarang
    WHERE
    
    kode LIKE '%$keyword%' OR
    tanggal LIKE '%$keyword%'
    ";
    return query ($query);
}


?>