<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsgudangpenyimpanan.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah2($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
        document.location.href = 'gudangpenyimpanan.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
        document.location.href = 'gudangpenyimpanan.php';
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
    <title>Tambah Gudang Penyimpanan</title>
</head>
<body>
    <h1>Tambah Gudang Penyimpanan</h1>
    <form action="" method="post"> 
<ul>
<li>
    <label for="kode_gudang">kode gudang :</label>
    <input type="text" name="kode_gudang" id="kode_gudang" required>
</li>
<li>
    <label for="nama_gudang">nama gudang :</label>
    <input type="text" name="nama_gudang" id="nama_gudang" required>   
</li>
<li>
    <label for="jenis">jenis :</label>
    <input type="text" name="jenis" id="jenis" required>   
</li>
<li>
    <label for="keterangan">keterangan :</label>
    <input type="text" name="keterangan" id="keterangan" required>   
</li>

    <button type="submit" name="submit" >Tambah Data</button>
</li>
</ul>



         </form>
    
</body>
</html>