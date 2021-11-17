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


//ambil data dari elemen form gudangpenyimpanan
function tambah($data) {
    global $db;
    //ambil data dari tiap elemen form
$kode_kantor = htmlspecialchars ($data["kode_kantor"]);
$nama_kantor = htmlspecialchars ($data["nama_kantor"]);
$alamat_kantor =htmlspecialchars ($data["alamat_kantor"]);
$telepon = htmlspecialchars ($data["telepon"]);
$hp = htmlspecialchars ($data["hp"]);
$kota = htmlspecialchars ($data["kota"]);
$jenis_tpb = htmlspecialchars ($data["jenis_tpb"]);
$statuss = htmlspecialchars ($data["statuss"]);
$npwp = htmlspecialchars ($data["npwp"]);

//query insert data ke data base
$query = "INSERT INTO kantorpabean
            VALUES
        ('','$kode_kantor','$nama_kantor','$alamat_kantor','$telepon'
        ,'$hp','$kota','$jenis_tpb','$statuss ','$npwp')
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}


//fungsi hapus data pada tambahgudang
function hapus($id) {
    global $db;

mysqli_query ($db,"DELETE FROM kantorpabean WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}



//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$kode_kantor = htmlspecialchars ($data["kode_kantor"]);
$nama_kantor = htmlspecialchars ($data["nama_kantor"]);
$alamat_kantor =htmlspecialchars ($data["alamat_kantor"]);
$telepon = htmlspecialchars ($data["telepon"]);
$hp = htmlspecialchars ($data["hp"]);
$kota = htmlspecialchars ($data["kota"]);
$jenis_tpb = htmlspecialchars ($data["jenis_tpb"]);
$statuss = htmlspecialchars ($data["statuss"]);
$npwp = htmlspecialchars ($data["npwp"]);

//query insert data ke data base
$query = "UPDATE kantorpabean SET
        kode_kantor ='$kode_kantor',
        nama_kantor = '$nama_kantor',
        alamat_kantor = '$alamat_kantor',
        telepon =  '$telepon',
        hp =  '$hp',
        kota =  '$kota',
        jenis_tpb =  '$jenis_tpb',
        statuss =  '$statuss',
        npwp =  '$npwp'
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}

//function search
function cari ($keyword) {
    $query = "SELECT * FROM kantorpabean
    WHERE
    kode_kantor LIKE '%$keyword%' OR
    nama_kantor LIKE '%$keyword%'
    ";
    return query ($query);
}



?>