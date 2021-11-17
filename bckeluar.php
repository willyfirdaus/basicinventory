<?php
//koneksi ke database
require 'functionspenerimaanpesanan.php';
//ambil data dari tabel basicinventory / query data basicinventory
$arrays = query ("SELECT * FROM penerimaanpesanan ORDER BY id DESC");

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
    <title>BC keluar</title>

    
</head>
<body>

<h1>BC Keluar</h1>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>
<a href="bckeluar.php"><button type="submit" name="cari">Reset</button></a>
 

<p></p>

</form>
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  >
    <th>No</th> 
    <th>status BC</th>  
    <th>No Aju</th>      
    <th>No Pendaftaran</th>
    <th>No NPE</th>
    <th>Tanggal</th>
    <th>Price</th>
    <th>Amount $</th>
    <th>Amount Rp</th>
    <th>job order</th>
    <th>kode</th>
    <th>deskripsi</th>
    <th>qty finish good</th>
    <th>remark</th>

</tr>


<?php $i = 1; ?>
<?php foreach ( $arrays as $array ) : ?>
<tr>
<td><?= $i ?> </td>  
<td><?=$array["status_bc"];?></td> 
 <td><?=$array["no_aju"];?></td>   
 <td><?=$array["no_pendaftaran"];?></td>    
 <td><?=$array["no_npe"];?></td>    
 <td><?=$array["tanggal"];?></td>    
 <td><?=$array["price"];?></td>
 <td><?=$array["amount_usd"];?></td>
 <td><?=$array["amount_idr"];?></td>
 <td><?=$array["job_order"];?></td>
 <td><?=$array["kode"];?></td>
 <td><?=$array["deskripsi"];?></td>
 <td><?=$array["qty_finish_good"];?></td>
 <td><?=$array["remark"];?></td>
 <td>
     <!-- tag konfirmasi untuk ubah data -->
     <a href="tambahbckeluar.php?id=<?= $array["id"]; ?>">Tambah BC keluar /</a>
     <a href="ubahbckeluar.php?id=<?= $array["id"]; ?>">ubah</a>

</td>

</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>
</body>
</html>