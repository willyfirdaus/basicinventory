<?php
//koneksi ke database
require 'functionsbcpemasukanbarang.php';


//ambil data dari tabel basicinventory / query data basicinventory
// $arrays1 = query ("SELECT *, (SELECT SUM(qty_real) FROM `purchaseorder` WHERE kode = dm.kode_material) as stok_masuk, COALESCE((SELECT SUM(qty_out) FROM `requestproduksi` WHERE kode = dm.kode_material), 0) as stok_keluar FROM datamaster as dm ORDER BY id DESC");

$data = query ("SELECT * FROM purchaseorder ORDER BY id DESC");




//tombol cari di tekan
if (isset ($_POST["cari"])) {
    $arrays = cari ($_POST["keyword"]);

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BC Pemasukan Barang</title>

    
</head>
<body>

<h1>BC Pemasukan Barang</h1>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>



<p></p> </form> 
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  > 
<th>Jenis Dokumen</th>
<th>Nomor Pendaftaran</th> 
<th>Tanggal Pendaftaran</th> 
<th>Nomor Bukti Penerimaan</th> 
<th>Tanggal Bukti Penerimaan</th> 
<th>HS Code</th> 
<th>Nama Barang</th> 
<th>Jumlah Satuan</th> 
<th>Kode Satuan</th> 
<th>Nilai Barang (Rp)</th> 
<th>Rate</th>
<th>Nilai Barang ($)</th>
<th>Invoice</th>
<th>Tanggal Invoice</th>
<th>Supplier</th>
<th>Material Code</th>
<th>Kategori</th>
<th>Asal Barang</th>
<th>Nomor Aju</th>

</tr>


<?php foreach ( $data as $array1 ) : ?>

<tr>
 <td><?=$array1["status_bc"];?></td> 
 <td><?=$array1["no_pendaftaran"];?></td> 
 <td><?=$array1["tanggal_bcmasuk"];?></td> 
 <td>nomor bukti belum isi</td> 
 <td><?=$array1["tanggal_diterima"];?></td> 
 <td><?=$array1["hs_code"];?></td> 
 <td><?=$array1["deskripsi"];?></td>
 <td><?=$array1["qty_real"];?></td>
 <td>kode satuan belum isi</td>
 <td>nilai barang Rp blm isi</td>
 <td>rate blm isi</td>
 <td>nilai barang $ blm isi </td>
 <td><?=$array1["no_invoice"];?></td>
 <td><?=$array1["tanggal_invoice"];?></td>
 <td><?=$array1["supplier"];?></td>
 <td><?=$array1["kode"];?></td>
 <td><?=$array1["deskripsi"];?></td>
 <td>asal barang blm isi</td>
 <td><?=$array1["no_aju"];?></td>

</tr>
<?php endforeach; ?>



</table>
</body>
</html>