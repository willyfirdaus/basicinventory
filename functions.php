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


//ambil data dari elemen form datamaster
function tambah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$kode_material = htmlspecialchars ($data["kode_material"]);
$nama_barang = htmlspecialchars ($data["nama_barang"]);
$satuan = htmlspecialchars ($data["satuan"]);
$jenis =htmlspecialchars ($data["jenis"]);
$asal = htmlspecialchars ($data["asal"]);
$hs_code = htmlspecialchars ($data["hs_code"]);
$stok_awal = htmlspecialchars ($data["stok_awal"]);
$stok_masuk = htmlspecialchars ($data["stok_masuk"]);
$stok_keluar = htmlspecialchars ($data["stok_keluar"]);
$penyesuaian = htmlspecialchars ($data["penyesuaian"]);
$retur = htmlspecialchars ($data["retur"]);
$stok_final = htmlspecialchars ($data["stok_final"]);

//query insert data ke data base
$query = "INSERT INTO datamaster
            VALUES
        ('','$kode_material','$nama_barang','$satuan','$jenis','$asal','$hs_code'
        ,'$stok_awal','$stok_masuk','$stok_keluar','$penyesuaian','$retur','$stok_final')";
mysqli_query ($db,$query);   
$tanggal = date("Y-m-d");
$queryStok = "INSERT INTO stok_final VALUES ('', '$kode_material', '$tanggal', 0)";
mysqli_query ($db,$queryStok);   
return mysqli_affected_rows ($db) ;
}




//fungsi hapus data pada data master
function hapus ($id) {
    global $db;

mysqli_query ($db,"DELETE FROM datamaster WHERE id = $id");   
return mysqli_affected_rows ($db) ;
}


//fungsi ubah data
//ambil data dari elemen form
function ubah ($data) {
    global $db;
    //ambil data dari tiap elemen form
$id = ($data["id"]);
$kode_material = htmlspecialchars ($data["kode_material"]);
$nama_barang = htmlspecialchars ($data["nama_barang"]);
$satuan = htmlspecialchars ($data["satuan"]);
$jenis =htmlspecialchars ($data["jenis"]);
$asal = htmlspecialchars ($data["asal"]);
$hs_code = htmlspecialchars ($data["hs_code"]);
$stok_awal = htmlspecialchars ($data["stok_awal"]);
$stok_masuk = htmlspecialchars ($data["stok_masuk"]);
$stok_keluar = htmlspecialchars ($data["stok_keluar"]);
$penyesuaian = htmlspecialchars ($data["penyesuaian"]);
$retur = htmlspecialchars ($data["retur"]);
$stok_final = htmlspecialchars ($data["stok_final"]);

//query insert data ke data base
$query = "UPDATE datamaster SET
        kode_material ='$kode_material',
        nama_barang = '$nama_barang',
        satuan =  '$satuan',
        jenis = '$jenis',
        asal =  '$asal',
        hs_code =  '$hs_code',
        stok_awal =  '$stok_awal',
        stok_masuk =  '$stok_masuk',
        stok_keluar =  '$stok_keluar',
        penyesuaian =  '$penyesuaian',
        retur =  '$retur',
        stok_final =  '$stok_final'

            WHERE id = $id 
            ";
mysqli_query ($db,$query);   
return mysqli_affected_rows ($db) ;
}

//function search
function cari ($keyword) {
    $query = "SELECT * FROM datamaster
    WHERE
    kode_material LIKE '%$keyword%' OR
    nama_barang LIKE '%$keyword%' OR
    satuan  LIKE '%$keyword%' OR
    jenis LIKE '%$keyword%' OR
    asal LIKE '%$keyword%' 
    
    ";
    return query ($query);
}

// funtion registrasi

function registrasi($data) {
	global $db;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($db, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($db);

}




?>