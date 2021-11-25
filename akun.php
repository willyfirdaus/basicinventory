<?php
//koneksi ke database
require 'functionsmutasibarang.php';


//ambil data dari tabel basicinventory / query data basicinventory
// $arrays1 = query ("SELECT *, (SELECT SUM(qty_real) FROM `purchaseorder` WHERE kode = dm.kode_material) as stok_masuk, COALESCE((SELECT SUM(qty_out) FROM `requestproduksi` WHERE kode = dm.kode_material), 0) as stok_keluar FROM datamaster as dm ORDER BY id DESC");



$arrays = query ("SELECT * FROM mutasibarang ORDER BY id DESC");


//tombol cari di tekan
if (isset ($_POST["cari"])) {
    $arrays = cari ($_POST["keyword"]);

}


//cari berdasarkan tanggal cari di tekan
if (isset ($_POST["cari"])) {
    $arrays = cari ($_POST["keyword"]);

}



//ambil data fetch basic inventory dari object result
// mysqli_fetch_row() mengembalikan array numerik
// mysqli_fetch_assoc() mengembalikan array associative
// mysqli_fetch_array() mengembalikan array numerik dan associative
// mysqli_fetch_object()

// untuk menampilkan data pada SQL sebagian array numeric
// $datamaster = mysqli_fetch_row($result);
// var_dump($datamaster[3]);

// untuk menampilkan seluruh data pada DB
// while ($datamaster = mysqli_fetch_array($result)){
// var_dump($datamaster);
// }

// echo json_encode(KodeMaterial());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mutasi barang</title>

    
</head>
<body>

<h1>mutasi barang</h1>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>



<p></p> </form> 
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  > 
<th>tanggal</th>
<th>kode material</th> 
<th>kategori</th> 
<th>nama barang</th> 
<th>satuan</th> 
<th>stok awal</th> 
<th>stok masuk</th> 
<th>stok keluar</th> 
<th>penyesuaian</th> 
<th>retur</th> 
<th>stok final</th>
<th>asal</th> </tr>





<?php foreach  ( $arrays as $array ) : ?>

<tr>
    <td><?= $array['tanggal'] ?></td> 
    <td><?= $array['kode'] ?></td> 
    <td><?= $array['deskripsi'] ?></td> 
    <td><?= $array['deskripsi'] ?></td> 
    <td><?= $array['satuan'] ?></td>
    <td><?= $array['stok_awal'] ?></td> 
    <td><?= $array['stok_masuk'] ?></td>
    <td><?= $array['stok_keluar'] ?></td>
    <td><?= $array['penyesuaian'] ?></td>
    <td><?= $array['retur'] ?></td>
    <td><?= $array['stok_final'] ?></td>
    <td><?= $array['asal'] ?></td>
   

</tr>
<?php endforeach; ?>



</table>
</body>
</html>