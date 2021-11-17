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
$kode_penyesuaian = htmlspecialchars ($data["kode_penyesuaian"]);
$kode_gudang = htmlspecialchars ($data["kode_gudang"]);
$kode =htmlspecialchars ($data["kode"]);
$deskripsi =htmlspecialchars ($data["deskripsi"]);
$stok_final = htmlspecialchars ($data["stok_final"]);
$adjust = htmlspecialchars ($data["adjust"]);
$keterangan = htmlspecialchars ($data["keterangan"]);



//query insert data ke data base
$query = "INSERT INTO penyesuaianbarang
            VALUES
        ('',
        '$kode_penyesuaian',
        '$kode_gudang',
        '$kode',
        '$deskripsi',
        '$stok_final',
        '$adjust',
        '$keterangan')";

mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;

}


//fungsi hapus data pada kode
function hapus($id) {
    global $db;

mysqli_query ($db,"DELETE FROM penyesuaianbarang WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}




//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$kode_penyesuaian = htmlspecialchars ($data["kode_penyesuaian"]);
$kode_gudang = htmlspecialchars ($data["kode_gudang"]);
$kode =htmlspecialchars ($data["kode"]);
$deskripsi =htmlspecialchars ($data["deskripsi"]);
$stok_final = htmlspecialchars ($data["stok_final"]);
$adjust = htmlspecialchars ($data["adjust"]);
$keterangan = htmlspecialchars ($data["keterangan"]);




//query insert data ke data base
$query = "UPDATE penyesuaianbarang SET
        kode_penyesuaian = '$kode_penyesuaian',
        kode_gudang = '$kode_gudang',
        kode = '$kode',
        deskripsi = '$deskripsi',
        stok_final = '$stok_final',
        adjust = '$adjust',
        keterangan = '$keterangan'
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}



//function search
function cari ($keyword) {
    $query = "SELECT * FROM penyesuaianbarang
    WHERE
    kode LIKE '%$keyword%'
    ";
    return query ($query);
}


?>