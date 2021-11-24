<?php
//koneksi ke database
require 'functionsmutasibarang.php';


//ambil data dari tabel basicinventory / query data basicinventory
// $arrays1 = query ("SELECT *, (SELECT SUM(qty_real) FROM `purchaseorder` WHERE kode = dm.kode_material) as stok_masuk, COALESCE((SELECT SUM(qty_out) FROM `requestproduksi` WHERE kode = dm.kode_material), 0) as stok_keluar FROM datamaster as dm ORDER BY id DESC");



function KodeMaterial()
{
    $data = queryObject("SELECT * FROM penerimaanpesanan");
    $data2 = queryObject("SELECT * FROM purchaseorder");
    $data3 = queryObject("SELECT * FROM requestproduksi");
    
    foreach ($data2 as $key => $value)
    {
        array_push($data, $value );
    }

    foreach ($data3 as $key => $value)
    {
        array_push($data, $value );
    }
    
    return $data;
}








// function hitungQtyOut($kode = null)
// {
//     if ($kode == null) {
//         return "Parameter kosong";
//     }else{
//         $data = queryObject("SELECT COALESCE(SUM(qty_out), 0) as stok_keluar FROM `requestproduksi` WHERE kode = '".$kode."'");
//         return $data['stok_keluar'];
//     }
// }



// function hitungQtyAdj($kode = null)
// {
//     if ($kode == null) {
//         return "Parameter kosong";
//     }else{
//         $data = queryObject("SELECT COALESCE(SUM(adjust), 0) as penyesuaian FROM `penyesuaianbarang` WHERE kode = '".$kode."'");
//         return $data['penyesuaian'];
//     }
// }




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

// echo json_encode(KodeMaterial());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mutasi barang</title>

    
</head>
<body>

<h1>mutasi barang</h1>
<a href="index.php">Kembali ke Home</a>
<br><br>
<form action="" method="post">
<input type="text" name="keyword" size="40" autocfocus
placeholder ="masukan data pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>



<p></p> </form> 
<table  border="5" cellpadding="10" cellspacing="10" >
<tr bgcolor="Cornsilk"  > 
<th>No</th>
<th>tanggal</th>
<th>kode material</th> 
<th>kategori</th> 
<th>nama barang</th> 
<th>satuan</th> 
<th>stok awal</th> 
<th>stok masuk</th> 
<th>stok keluar</th> 
<th>penyesuaian</th> 
<th>retur</th> 
<th>stok final</th>
<th>asal</th> </tr>





<?php foreach ( KodeMaterial() as $key => $array ) : ?>

<tr>
    <td><?= $key+1 ?></td>
    <td><?= $array['tanggal'] ?? $array['tanggal_diterima'] ?? $array['kode'] ?></td> 
    <td><?= $array['kode'] ?></td> 
    <td><?= $array['deskripsi'] ?></td> 
    <td><?= $array['deskripsi'] ?></td> 
    <td>satuan belum di isi</td> 
    <td>stok awal belum di isi</td> 
    <td><?= $array['qty_real'] ?? 0 ?></td>
    <td><?= $array['qty_finish_good'] ?? 0 ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>

</tr>
<?php endforeach; ?>



</table>
</body>
</html>