
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functions.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM datamaster WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di rubah');
        document.location.href = 'datamaster.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di rubah');
        document.location.href = 'datamaster.php';
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
    <title>ubah Data Master</title>
</head>
<body>
    <h1>ubah Data Master</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 
<li>
    <label for="kode_material">kode material :</label>
    <input type="text" name="kode_material" id="kode_material" required
    value ="<?= $data ["kode_material"] ?>">
</li>
<li>
    <label for="nama_barang">nama barang :</label>
    <input type="text" name="nama_barang" id="nama_barang" required
    value ="<?= $data ["nama_barang"] ?>"> 
</li>
<li>
    <label for="satuan">satuan :</label>
    <input type="text" name="satuan" id="satuan" required 
    value ="<?= $data ["satuan"] ?>">    
</li>
<li>
    <label for="jenis">jenis :</label>
 <p><select   select id="jenis" name="jenis" required>
    <option value="bahan baku"> bahan baku</option>
    <option value="bahan penolong"> bahan penolong</option>
    <option value="bahan baku"> bahan baku</option>
    <option value="barang jadi"> barang jadi</option>
    <option value="mesin dan sparepart"> mesin dan sparepart</option>
    <option value="peralatan kantor"> peralatan kantor</option>
    <option value="reject dan scraft"> reject dan scraft</option>
    <option value="lain lain"> lain lain</option>
    </select></p>
</li>
<li>
    <label for="asal">asal :</label>
  <p><select   select id="asal" name="lokal" required>
    <option value="Import">Import</option>
    <option value="Lokal">Lokal</option>    
    </select></p>
</li>

<li>
    <label for="hs_code">hs_code :</label>
    <input type="text" name="hs_code" id="hs_code" required 
    value ="<?= $data ["hs_code"] ?>">    
</li>




<br>

    <button type="submit" name="submit" >Tambah Data</button>

<a href="datamaster.php" class="btn btn-default">Kembali</a>
</ul>



         </form>
    
</body>
</html>