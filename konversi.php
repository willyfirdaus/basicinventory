<?php
//koneksi ke database
require 'functionskonversi.php';
//ambil data dari tabel basicinventory / query data basicinventory
$arrays = query ("SELECT * FROM konversi ORDER BY id DESC");

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
    <title>penyesuaian barang</title>

    
</head>
<body>

<h1>penyesuaian barang</h1>
<a href="tambahkonversi.php">Tambah penyesuaian barang</a>
<h>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>
<a href="konversi.php"><button type="submit" name="cari">Reset</button></a>
 

<p></p>

</form>
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  >
    <th>No</th> 
    <th>kode penyesuaian</th>  
    <th>kode gudang</th>      
    <th>kode material</th>
    <th>deskripsi</th>
    <th>qty awal</th>
    <th>adjust</th>
    <th>qty real</th>
    <th>keterangan</th>
</tr>


<?php $i = 1; ?>
<?php foreach ( $arrays as $array ) : ?>
<tr>
<td><?= $i ?> </td>  
<td><?=$array["kode_penyesuaian"];?></td>    
 <td><?=$array["kode_gudang"];?></td>    
 <td><?=$array["kode"];?></td>    
 <td><?=$array["deskripsi"];?></td>    
 <td><?=$array["stok_final"];?></td>    
 <td><?=$array["adjust"];?></td>       
 <td><?=$array["keterangan"];?></td> 
 <td>
     <!-- tag konfirmasi untuk ubah data -->
     <a href="ubahkonversi.php?id=<?= $array["id"]; ?>">ubah /</a>

     <!-- tag konfirmasi delete dan fungsi delete -->
     
     <a href="hapuskonversi.php?id=<?= $array["id"]; ?>"  
     onclick="return confirm('Are you sure you want to delete?')">Delete</a>
</td>

</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>
</body>
</html>