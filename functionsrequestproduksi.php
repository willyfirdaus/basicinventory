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
$kode = htmlspecialchars ($data["kode"]);
$deskripsi =htmlspecialchars ($data["deskripsi"]);
$satuan =htmlspecialchars ($data["satuan"]);
$qty_out = htmlspecialchars ($data["qty_out"]);


//query insert data ke data base
$query = "INSERT INTO requestproduksi
            VALUES
        ('','$job_order','$kode', '$deskripsi','$satuan','$qty_out')";
mysqli_query ($db,$query);     
return mysqli_affected_rows ($db) ;
}


//fungsi hapus data pada kode
function hapus($id) {
    global $db;

mysqli_query ($db,"DELETE FROM requestproduksi WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}


//fungsi hapus posisi wip
function hapuswip($id2) {
    global $db;

mysqli_query ($db,"DELETE FROM posisibarangwip WHERE id = $id2");   
return mysqli_affected_rows ($db) ;
}




//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$job_order = htmlspecialchars ($data["job_order"]);
$kode = htmlspecialchars ($data["kode"]);
$deskripsi =htmlspecialchars ($data["deskripsi"]);
$satuan =htmlspecialchars ($data["satuan"]);
$qty_out = htmlspecialchars ($data["qty_out"]);





//query insert data ke data base
$query = "UPDATE requestproduksi SET
        job_order = '$job_order',
        kode = '$kode',
        deskripsi = '$deskripsi',
        satuan = '$satuan',
        qty_out = '$qty_out'
     
        
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}



//function search
function cari ($keyword) {
    $query = "SELECT * FROM requestproduksi
    WHERE
    po LIKE '%$keyword%' OR
    request_qty LIKE '%$keyword%'
    ";
    return query ($query);
}


?>