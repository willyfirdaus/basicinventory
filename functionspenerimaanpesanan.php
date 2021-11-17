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
$deskripsi =htmlspecialchars ($data["deskripsi"]);
$request_qty = htmlspecialchars ($data["request_qty"]);
$remark = htmlspecialchars ($data["remark"]);
$qty_finish_good = htmlspecialchars ($data["qty_finish_good"]);
$tanggal_finish = htmlspecialchars ($data["tanggal_finish"]);


//query insert data ke data base
$query = "INSERT INTO penerimaanpesanan
            VALUES
        ('','$job_order','$tanggal_registrasi', '$kode', '$deskripsi','$request_qty','$remark',
        '$qty_finish_good','$tanggal_finish')
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
$request_qty = htmlspecialchars ($data["request_qty"]);
$remark = htmlspecialchars ($data["remark"]);
$qty_finish_good = htmlspecialchars ($data["qty_finish_good"]);
$tanggal_finish = htmlspecialchars ($data["tanggal_finish"]);





//query insert data ke data base
$query = "UPDATE penerimaanpesanan SET
        job_order = '$job_order',
        tanggal_registrasi = '$tanggal_registrasi',
        kode = '$kode',
        deskripsi = '$deskripsi',
        request_qty ='$request_qty',
        remark = '$remark',
        qty_finish_good = '$qty_finish_good',
        tanggal_finish = '$tanggal_finish'
     
        
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
    request_qty LIKE '%$keyword%'
    ";
    return query ($query);
}


?>