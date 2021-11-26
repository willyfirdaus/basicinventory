<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data</title>
</head>
<body>

<?php
    require 'functionsbcpemasukanbarang.php';

    $data = cari();

    $file="Laporan.xls";
    header("Content-type: application/excel");
    header("Content-Disposition: attachment; filename=$file");
?>
    
<table cellpadding="10" cellspacing="10" >
    <tr> 
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
        <td><?=$array1["nomor_bukti_penerimaan"];?></td> 
        <td><?=$array1["tanggal_diterima"];?></td> 
        <td><?=$array1["hs_code"];?></td> 
        <td><?=$array1["deskripsi"];?></td>
        <td><?=$array1["qty_real"];?></td>
        <td><?=$array1["satuan"];?></td>
        <td><?=$array1["nilai_barang_idr"];?></td>
        <td><?=$array1["currency_rate"];?></td>
        <td><?=$array1["nilai_barang_usd"];?></td>
        <td><?=$array1["no_invoice"];?></td>
        <td><?=$array1["tanggal_invoice"];?></td>
        <td><?=$array1["supplier"];?></td>
        <td><?=$array1["kode"];?></td>
        <td><?=$array1["deskripsi"];?></td>
        <td><?=$array1["asal"];?></td>
        <td><?=$array1["no_aju"];?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>