<?php
//koneksi ke database
require 'functionspurchaseorder.php';
//ambil data dari tabel basicinventory / query data basicinventory
$arrays = query ("SELECT * FROM purchaseorder ORDER BY id DESC");

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
    <title>penerimaan barang</title>

    
</head>
<body>

<h1>Penerimaan Barang</h1>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>
<a href="penerimaanbarang.php"><button type="submit" name="cari">Reset</button></a>
 

<p></p>

</form>
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  >
    <th>No</th>  
    <th>Tanggal diterima</th>    
    <th>Lokasi gudang</th>    
    <th>Qty real</th>      
    <th>Qty dokumen</th>
    <th>No invoice</th>
    <th>Kode</th>
    <th>Deskripsi</th>
</tr>


<?php $i = 1; ?>
<?php foreach ( $arrays as $array ) : ?>
<tr>
<td><?= $i ?> </td>  
 <td><?=$array["tanggal_diterima"];?></td> 
 <td><?=$array["lokasi_gudang"];?></td>   
 <td><?=$array["qty_real"];?></td>   
 <td><?=$array["qty"];?></td>
 <td><?=$array["no_invoice"];?></td>     
 <td><?=$array["kode"];?></td>     
 <td><?=$array["deskripsi"];?></td>     
     
 <td>
     <!-- tag konfirmasi untuk ubah data -->
     <a href="tambahpenerimaanbarang.php?id=<?= $array["id"]; ?>">Tambah Detail penerimaan barang /</a>
     <a href="ubahpenerimaanbarang.php?id=<?= $array["id"]; ?>">ubah </a>

</td>

</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>
</body>
</html>