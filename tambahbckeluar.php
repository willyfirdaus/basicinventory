<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsbckeluar.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM penerimaanpesanan WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambah');
        document.location.href = 'tambahbckeluar.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambah pastikan supplier & currency terisi');
        document.location.href = 'tambahbckeluar.php';
        </script>
        ";
    }

}
?>

<!-- isi data tampilan web  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah pengiriman pesanan</title>


</head>
<body>
    <h1>Tambah BC Keluar</h1>
    <form action="" method="post"> 
    <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">           
<ul> 



<li>
    <label for="no_aju">no aju :</label>
    <input type="text" name="no_aju" id="no_aju"
    value ="<?= $data ["no_aju"] ?>">    
</li>
<li>
    <label for="no_pendaftaran">no pendaftaran :</label>
    <input type="text" name="no_pendaftaran" id="no_pendaftaran"
    value ="<?= $data ["no_pendaftaran"] ?>">    
</li>
<li>
    <label for="no_npe">no NPE :</label>
    <input type="text" name="no_npe" id="no_npe"
    value ="<?= $data ["no_npe"] ?>">    
</li>

<li>
     <label for="tanggal">tanggal :</label>
    <input value="2021-01-01" name='tanggal' type='date' class="form-control"  id="tanggal"
    value ="<?= $data ["tanggal"] ?>"> 
</li>


<br><br><br><br><br>


<li>
<label for="status_bc">status bc :</label>
    <input type="text" name="status_bc" id="status_bc" readonly
    value ="<?= $data ["status_bc"] ?>">  
</li>


<li>
    <label for="price">price:</label>
    <input type="text" name="price" id="price" readonly
    value ="<?= $data ["price"] ?>">    
</li>



<li>
    <label for="amount_usd">amount usd :</label>
   $ <input type="text" name="amount_usd" id="amount_usd" readonly
    value ="<?= $data ["amount_usd"] ?>"> 
</li>
<li>
    <label for="amount_idr">amount idr :</label>
   Rp <input type="text" name="amount_idr" id="amount_idr" readonly
    value ="<?= $data ["amount_idr"] ?>"> 
</li>


<li>
    <label for="job_order">Job Order:</label>
    <input type="text" name="job_order" id="job_order" readonly
    value ="<?= $data ["job_order"] ?>">
</li>

<li>
    <label for="kode1">kode :</label>
    <input type="text" name="kode1" id="kode1" readonly
    value ="<?= $data ["kode"] ?>">    
</li>

<li>
    <label for="deskripsi">deskripsi :</label>
    <input type="text" name="deskripsi" id="deskripsi" readonly
    value ="<?= $data ["deskripsi"] ?>">    
</li>


<li>
    <label for="qty_finish_good">Qty Finish Good :</label>
    <input type="number" name="qty_finish_good" id="qty_finish_good" readonly
    value ="<?= $data ["qty_finish_good"] ?>">    
</li>



<br>
<button type="submit" name="submit" >simpan</button>
<!-- <button onclick="tambah();" name="submit" >ubah Data</button> -->

<a href="bckeluar.php" class="btn btn-default">Kembali</a>
</ul>


</form>
    
</body>
</html>