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
$qty_finish_good = htmlspecialchars ($data["qty_finish_good"]);
$tanggal_finish = htmlspecialchars ($data["tanggal_finish"]);


//query insert data ke data base
$query = "UPDATE penerimaanpesanan SET
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