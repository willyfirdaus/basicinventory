
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionskantorpabean.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM kantorpabean WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di rubah');
        document.location.href = 'kantorpabean.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di rubah');
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
    <title>ubah kantor pabean</title>
</head>
<body>
    <h1>ubah kantor pabean</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 
<li>
    <label for="kode_kantor">kode kantor :</label>
    <input type="text" name="kode_kantor" id="kode_kantor" required
    value ="<?= $data ["kode_kantor"] ?>">
</li>
<li>
    <label for="nama_kantor">nama kantor :</label>
    <input type="text" name="nama_kantor" id="nama_kantor" required
    value ="<?= $data ["nama_kantor"] ?>"> 
</li>
<li>
    <label for="alamat_kantor">alamat kantor :</label>
    <input type="text" name="alamat_kantor" id="alamat_kantor" required
    value ="<?= $data ["alamat_kantor"] ?>">    
</li>

<li>
    <label for="telepon">telepon :</label>
    <input type="text" name="telepon" id="telepon" required
    value ="<?= $data ["telepon"] ?>">    
</li>

<li>
    <label for="hp">hp :</label>
    <input type="text" name="hp" id="hp" required
    value ="<?= $data ["hp"] ?>">    
</li>
<li>
    <label for="kota">kota :</label>
    <input type="text" name="kota" id="kota" required
    value ="<?= $data ["kota"] ?>">    
</li>
<li>
    <label for="jenis_tpb">jenis TPB :</label>  
    <input type="text" name="jenis_tpb" id="jenis_tpb" required
    value ="<?= $data ["jenis_tpb"] ?>">    
</li>
<li>
    <label for="statuss">status :</label>
    <input type="text" name="statuss" id="statuss" required
    value ="<?= $data ["statuss"] ?>">    
</li>
<li>
    <label for="npwp">npwp :</label>
    <input type="text" name="npwp" id="npwp" required
    value ="<?= $data ["npwp"] ?>">    
</li>

<br>

    <button type="submit" name="submit" >ubah Data</button>

<a href="kantorpabean.php" class="btn btn-default">Kembali</a>
</ul>



         </form>
    
</body>
</html>