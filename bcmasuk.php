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
    <title>BC Masuk</title>

    
</head>
<body>

<h1>BC Masuk</h1>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>
<a href="purchaseorder.php"><button type="submit" name="cari">Reset</button></a>
 

<p></p>

</form>
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  >
    <th>No</th>  
    <th>Status BC</th>    
    <th>No Aju</th>      
    <th>No Pendaftaran</th>
    <th>No Surat jalan/BL/AWB</th>
    <th>Tanggal masuk</th>
    <th>No Invoice</th>
    <th>No PO</th>
    <th>Kode</th>
    <th>Deskripsi</th>
    <th>Qty</th>
    <th>Currency</th>
    <th>Price</th>
    <th>nilai barang usd</th>
    <th>nilai barang idr</th>
    <th>HS code</th>
</tr>


<?php $i = 1; ?>
<?php foreach ( $arrays as $array ) : ?>
<tr>
<td><?= $i ?> </td>  
 <td><?=$array["status_bc"];?></td> 
 <td><?=$array["no_aju"];?></td>    
 <td><?=$array["no_pendaftaran"];?></td>     
 <td><?=$array["no_surat_jalan"];?></td>
 <td><?=$array["tanggal_bcmasuk"];?></td>     
 <td><?=$array["no_invoice"];?></td>     
 <td><?=$array["no_po"];?></td>     
 <td><?=$array["kode"];?></td>     
 <td><?=$array["deskripsi"];?></td>     
 <td><?=$array["qty"];?></td>     
 <td><?=$array["currency"];?></td>     
 <td><?=$array["price"];?></td>     
 <td><?=$array["nilai_barang_usd"];?></td>     
 <td><?=$array["nilai_barang_idr"];?></td>     
 <td><?=$array["hs_code"];?></td>     
 <td>
     <!-- tag konfirmasi untuk ubah data -->
     <a href="tambahbcmasuk.php?id=<?= $array["id"]; ?>">Tambah Detail BC Masuk /</a>
     <a href="ubahbcmasuk.php?id=<?= $array["id"]; ?>">ubah </a>

</td>

</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>
</body>
</html>