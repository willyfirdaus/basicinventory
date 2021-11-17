
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionssupplier.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM supplier WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di rubah');
        document.location.href = 'supplier.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di rubah');
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
    <title>Ubah Supplier</title>
</head>
<body>
    <h1>Ubah Supplier</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 
<li>
    <label for="kode">kode :</label>
    <input type="text" name="kode" id="kode" required
    value ="<?= $data ["kode"] ?>">
</li>
<li>
    <label for="nama">nama :</label>
    <input type="text" name="nama" id="nama" required
    value ="<?= $data ["nama"] ?>"> 
</li>
<li>
    <label for="alamat">alamat :</label>
    <input type="text" name="alamat" id="alamat" required
    value ="<?= $data ["alamat"] ?>"> 
</li>
<li>
    <label for="kota">kota :</label>
    <input type="text" name="kota" id="kota" required
    value ="<?= $data ["kota"] ?>"> 
</li>
<li>
    <label for="no_izin_tpb">no izin tpb :</label>
    <input type="text" name="no_izin_tpb" id="no_izin_tpb" required
    value ="<?= $data ["no_izin_tpb"] ?>"> 
</li>
<li>
    <label for="status_perusahaan">status perusahaan :</label>
    <input type="text" name="status_perusahaan" id="status_perusahaan" required
    value ="<?= $data ["status_perusahaan"] ?>"> 
</li>
<br>

    <button type="submit" name="submit" >ubah Data</button>

<a href="supplier.php" class="btn btn-default">Kembali</a>
</ul>



         </form>
    
</body>
</html>