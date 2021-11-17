<?php
//koneksi ke database
require 'functionsposisibarangwip.php';


//ambil data dari tabel basicinventory / query data basicinventory
// $arrays1 = query ("SELECT *, (SELECT SUM(qty_real) FROM `purchaseorder` WHERE kode = dm.kode_material) as stok_masuk, COALESCE((SELECT SUM(qty_out) FROM `requestproduksi` WHERE kode = dm.kode_material), 0) as stok_keluar FROM datamaster as dm ORDER BY id DESC");

$data = query ("SELECT * FROM datamaster ORDER BY id DESC");




//tombol cari di tekan
if (isset ($_POST["cari"])) {
    $arrays = cari ($_POST["keyword"]);

}



function hitungQtyReal($kode = null)
{
    if($kode == null){
        return "Parameter kosong";
    }else{
        $data = queryObject("SELECT COALESCE(SUM(qty_out), 0) qty_out FROM `requestproduksi` WHERE kode = '".$kode."'");
        return $data['qty_out'];
    }
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posisi Barang Dalam Poroses</title>

    
</head>
<body>

<h1>Posisi Barang Dalam Poroses</h1>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>



<p></p> </form> 
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  > 
<th>Material Code</th>
<th>Material Name</th> 
<th>Satuan</th> 
<th>Total Dalam Proses</th> 
</tr>


<?php foreach ( $data as $array1 ) : ?>
<tr>
 <td><?=$array1["kode_material"];?></td> 
 <td><?=$array1["nama_barang"];?></td> 
 <td><?=$array1["satuan"];?></td> 
 <?php 
    $qty_out = hitungQtyReal($array1["kode_material"]);
?>
<td><?= $qty_out ?></td> 
</tr>
<?php endforeach; ?>
</table>
</body>
</html>