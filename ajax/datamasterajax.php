<?php 
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM datamaster
            WHERE
            kode_material LIKE '%$keyword%' OR
    nama_barang LIKE '%$keyword%' OR
    satuan  LIKE '%$keyword%' OR
    jenis LIKE '%$keyword%' OR
    asal LIKE '%$keyword%' 
        ";
$arrays = query($query);
?>

<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  >
    <th>No </th>      
    <th>kode material</th>
    <th>Nama Barang</th>
    <th>satuan</th>
    <th>jenis</th>
    <th>asal</th>
    <th>HS Code</th>
</tr>

<?php $i = 1; ?>
<?php foreach ( $arrays as $array ) : ?>
<tr>
<td><?= $i ?> </td>  
 <td><?=$array["kode_material"];?></td>   
 <td><?=$array["nama_barang"];?></td>   
 <td><?=$array["satuan"];?></td>   
 <td><?=$array["jenis"];?></td>   
 <td><?=$array["asal"];?></td>   
 <td><?=$array["hs_code"];?></td>   
 <td>
     <!-- tag konfirmasi untuk ubah data -->
     <a href="ubah.php?id=<?= $array["id"]; ?>">ubah /</a>

     <!-- tag konfirmasi delete dan fungsi delete -->
     <a href="hapus.php?id=<?= $array["id"]; ?>"  
     onclick="return confirm('Are you sure you want to delete?')">Delete</a>
</td>

</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>