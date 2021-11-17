<?php
//koneksi ke database
require 'functionsgudangpenyimpanan.php';
//ambil data dari tabel basicinventory / query data basicinventory
$arrays = query ("SELECT * FROM gudangpenyimpanan ORDER BY id DESC");

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
    <title>gudang penyimpanan</title>

    
</head>
<body>

<h1>Gudang Penyimpanan</h1>
<a href="tambahgudangpenyimpanan.php">Tambah Gudang</a>
<h>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>
<a href="gudangpenyimpanan.php"><button type="submit" name="cari">Reset</button></a>
 

<p></p>

</form>
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  >
    <th>No </th>      
    <th>kode Gudang</th>
    <th>Nama Gudang</th>
    <th>Jenis</th>
    <th>Keterangan</th>
</tr>


<?php $i = 1; ?>
<?php foreach ( $arrays as $array ) : ?>
<tr>
<td><?= $i ?> </td>  
 <td><?=$array["1"];?></td>   
 <td><?=$array["2"];?></td>   
 <td><?=$array["3"];?></td>   
 <td><?=$array["4"];?></td>   
 <td>
     <!-- tag konfirmasi untuk ubah data -->
     <a href="ubahgudangpenyimpanan.php?id=<?= $array["id"]; ?>">ubah /</a>

     <!-- tag konfirmasi delete dan fungsi delete -->
     
     <a href="hapusgudangpenyimpanan.php?id=<?= $array["id"]; ?>"  
     onclick="return confirm('Are you sure you want to delete?')">Delete</a>
</td>

</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>
</body>
</html>