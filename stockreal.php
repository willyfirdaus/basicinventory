<?php
//koneksi ke database
require 'functionsstockreal.php';


//ambil data dari tabel basicinventory / query data basicinventory
// $arrays1 = query ("SELECT *, (SELECT SUM(qty_real) FROM `purchaseorder` WHERE kode = dm.kode_material) as stok_masuk, COALESCE((SELECT SUM(qty_out) FROM `requestproduksi` WHERE kode = dm.kode_material), 0) as stok_keluar FROM datamaster as dm ORDER BY id DESC");

$data = query ("SELECT * FROM datamaster as dm ORDER BY id DESC");




function hitungQtyReal($kode = null)
{
    if($kode == null){
        return "Parameter kosong";
    }else{
        $data = queryObject("SELECT COALESCE(SUM(qty_real), 0) stok_masuk FROM `purchaseorder` WHERE kode = '".$kode."'");
        return $data['stok_masuk'];
    }
}






function hitungQtyOut($kode = null)
{
    if ($kode == null) {
        return "Parameter kosong";
    }else{
        $data = queryObject("SELECT COALESCE(SUM(qty_out), 0) as stok_keluar FROM `requestproduksi` WHERE kode = '".$kode."'");
        return $data['stok_keluar'];
    }
}



function hitungQtyAdj($kode = null)
{
    if ($kode == null) {
        return "Parameter kosong";
    }else{
        $data = queryObject("SELECT COALESCE(SUM(adjust), 0) as penyesuaian FROM `penyesuaianbarang` WHERE kode = '".$kode."'");
        return $data['penyesuaian'];
    }
}




//tombol cari di tekan
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stock real</title>

    
</head>
<body>

<h1>stock real</h1>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>


<p></p>

</form>
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  >
    <th>kode material</th>  
    <th>kode material BC</th>    
    <th>Kategori</th>      
    <th>nama barang</th>
    <th>jenis</th>
	<th>satuan</th>
	<th>stok awal</th>
	<th>stok masuk</th>
	<th>stok keluar</th>
	<th>penyesuaian</th>
	<th>stok final</th>
	<th>asal</th>
</tr>


<?php foreach ( $data as $array1 ) : ?>

<tr>
 <td><?=$array1["kode_material"];?></td> 
 <td><?=$array1["kode_material"];?></td> 
 <td><?=$array1["nama_barang"];?></td> 
 <td><?=$array1["nama_barang"];?></td> 
 <td><?=$array1["jenis"];?></td> 
 <td><?=$array1["satuan"];?></td> 
 <td><?=$array1["stok_awal"];?></td>
 <?php 
    $stok_masuk = hitungQtyReal($array1["kode_material"]);
    $stok_keluar = hitungQtyOut($array1["kode_material"]); 
    $stok_adjust = hitungQtyAdj($array1["kode_material"]); 
?>
 <td><?= $stok_masuk ?></td>
 <td><?= $stok_keluar ?></td>
 <td><?= $stok_adjust ?> </td>
 <td><?= ($array1["stok_awal"] ?? 0) +$stok_masuk-$stok_keluar+$stok_adjust ?></td>
 <td><?=$array1["asal"];?></td>

</tr>
<?php endforeach; ?>



</table>
</body>
</html>