<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionssupplier.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
        document.location.href = 'supplier.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
        document.location.href = 'supplier.php';
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
    <title>Tambah Supllier</title>
</head>
<body>
    <h1>Tambah Supllier</h1>
    <form action="" method="post"> 
<ul>
<li>
    <label for="kode">kode kantor :</label>
    <input type="text" name="kode" id="kode" required>
</li>
<li>
    <label for="nama">nama :</label>
    <input type="text" name="nama" id="nama" required>
</li>
<li>
    <label for="alamat">alamat kantor :</label>
    <input type="text" name="alamat" id="alamat" required>   
</li>
<li>
    <label for="kota">kota :</label>
    <input type="text" name="kota" id="kota" required>   
</li>
<li>
    <label for="no_izin_tpb">no izin tpb :</label>
    <input type="text" name="no_izin_tpb" id="no_izin_tpb" required>   
</li>
<li>
    <label for="status_perusahaan">status perusahaan :</label>
    <input type="text" name="status_perusahaan" id="status_perusahaan" required>   
</li>
<li>
    <button type="submit" name="submit" >Tambah Data</button>
</li>
</ul>
         </form>
</body>
</html>