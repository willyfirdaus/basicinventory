
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsgudangpenyimpanan.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM gudangpenyimpanan WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di rubah');
        document.location.href = 'gudangpenyimpanan.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di rubah');
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
    <title>Ubah gudang penyimpanan</title>
</head>
<body>
    <h1>Ubah gudang penyimpanan</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 
<li>
    <label for="kode_gudang">kode gudang :</label>
    <input type="text" name="kode_gudang" id="kode_gudang" required
    value ="<?= $data ["kode_gudang"] ?>">
</li>
<li>
    <label for="nama_gudang">nama gudang :</label>
    <input type="text" name="nama_gudang" id="nama_gudang" required
    value ="<?= $data ["nama_gudang"] ?>"> 
</li>
<li>
    <label for="jenis">jenis :</label>
    <input type="text" name="jenis" id="jenis" required 
    value ="<?= $data ["jenis"] ?>">    
</li>

<li>
    <label for="keterangan">keterangan :</label>
    <input type="text" name="keterangan" id="keterangan" required
    value ="<?= $data ["keterangan"] ?>">    
</li>

<br>

    <button type="submit" name="submit" >ubah Data</button>

<a href="gudangpenyimpanan.php" class="btn btn-default">Kembali</a>
</ul>



         </form>
    
</body>
</html>