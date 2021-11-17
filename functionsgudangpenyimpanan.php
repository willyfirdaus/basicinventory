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


//ambil data dari elemen form gudangpenyimpanan
function tambah2 ($data) {
    global $db;
    //ambil data dari tiap elemen form
$kode_gudang = htmlspecialchars ($data["kode_gudang"]);
$nama_gudang = htmlspecialchars ($data["nama_gudang"]);
$jenis =htmlspecialchars ($data["jenis"]);
$keterangan = htmlspecialchars ($data["keterangan"]);

//query insert data ke data base
$query = "INSERT INTO gudangpenyimpanan
            VALUES
        ('','$kode_gudang','$nama_gudang', '$jenis','$keterangan')
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;

}


//fungsi hapus data pada tambahgudang
function hapus2 ($id2) {
    global $db;

mysqli_query ($db,"DELETE FROM gudangpenyimpanan WHERE id = $id2");   
return mysqli_affected_rows ($db) ;
}


//fungsi ubah data
//ambil data dari elemen form
function ubah($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$kode_gudang = htmlspecialchars ($data["kode_gudang"]);
$nama_gudang = htmlspecialchars ($data["nama_gudang"]);
$jenis =htmlspecialchars ($data["jenis"]);
$keterangan = htmlspecialchars ($data["keterangan"]);

//query insert data ke data base
$query = "UPDATE gudangpenyimpanan SET
        kode_gudang ='$kode_gudang',
        nama_gudang = '$nama_gudang',
        jenis = '$jenis',
        keterangan =  '$keterangan'
            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}

//function search
function cari ($keyword) {
    $query = "SELECT * FROM gudangpenyimpanan
    WHERE
    kode_gudang LIKE '%$keyword%' OR
    nama_gudang LIKE '%$keyword%' OR
    jenis LIKE '%$keyword%' OR
    keterangan LIKE '%$keyword%' 
    
    ";
    return query ($query);
}


// funtion registrasi

function registrasi ($data) {
global $db ;
$username = strtolower (stripslashes($data["username"]));
$password = mysqli_real_escape_string ($db, $data["password"]);
$password2 = mysqli_real_escape_string ($db, $data["password2"]);

if ($password !== $password2 ) {
    echo "<script>
    alert ('konfirmasi password tidak sesuai ');
    </script>";
    return false;

}
// enkrpsi pasword
$password = password_hash ($password , PASSWORD_DEFAULT) ;
mysqli_query ($db, "INSERT INTO user VALUES('', '$username', '$password')");

return mysqli_affected_rows ($db);

}

?>