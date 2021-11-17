<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionskantorpabean.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
        document.location.href = 'kantorpabean.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
        document.location.href = 'kantorpabean.php';
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
    <label for="kode_kantor">kode kantor :</label>
    <input type="text" name="kode_kantor" id="kode_kantor" required>
</li>
<li>
    <label for="nama_kantor">nama_kantor :</label>
    <input type="text" name="nama_kantor" id="nama_kantor" required>
</li>
<li>
    <label for="alamat_kantor">alamat kantor :</label>
    <input type="text" name="alamat_kantor" id="alamat_kantor" required>   
</li>
<li>
    <label for="telepon">telepon :</label>
    <input type="text" name="telepon" id="telepon" required>   
</li>
<li>
    <label for="hp">hp :</label>
    <input type="text" name="hp" id="hp" required>   
</li>
<li>
    <label for="kota">kota :</label>
    <input type="text" name="kota" id="kota" required>   
</li>
<li>
    <label for="jenis_tpb">jenis TPB :</label>
    <input type="text" name="jenis_tpb" id="jenis_tpb" required>   
</li>
<li>
    <label for="statuss">statuss :</label>
    <input type="text" name="statuss" id="statuss" required>   
</li>
<li>
    <label for="npwp">npwp :</label>
    <input type="text" name="npwp" id="npwp" required>   
</li>
<li>
    <button type="submit" name="submit" >Tambah Data</button>
</li>
</ul>
         </form>
</body>
</html>