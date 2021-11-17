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


//ambil data dari elemen form kursmatauang
function tambah($data) {
    global $db;
    //ambil data dari tiap elemen form
$mata_uang = htmlspecialchars ($data["mata_uang"]);
$rate_idr = htmlspecialchars ($data["rate_idr"]);

//query insert data ke data base
$query = "INSERT INTO kursmatauang
            VALUES
        ('','$mata_uang','$rate_idr')
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;

}


//fungsi hapus data pada tambahgudang
function hapus($id) {
    global $db;

mysqli_query ($db,"DELETE FROM kursmatauang WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}

//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$mata_uang = htmlspecialchars ($data["mata_uang"]);
$rate_id = htmlspecialchars ($data["rate_id"]);


//query insert data ke data base
$query = "UPDATE kursmatauang SET
        mata_uang ='$mata_uang',
        rate_id = '$rate_id'
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}



//function search
function cari ($keyword) {
    $query = "SELECT * FROM kursmatauang
    WHERE
    mata_uang LIKE '%$keyword%' OR
    rate_idr LIKE '%$keyword%' 
    ";
    return query ($query);
}

?>