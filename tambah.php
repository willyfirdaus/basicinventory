
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functions.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
        document.location.href = 'datamaster.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
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
    <title>Tambah Data Master</title>
</head>
<body>
    <h1>Tambah Data Master</h1>
    <form action="" method="post"> 
<!-- pelengkap insert data ke DB saat tambah barang awal  -->
<input type="hidden" name="stok_awal" id="stok_awal">
<input type="hidden" name="stok_masuk" id="stok_masuk">    
<input type="hidden" name="stok_keluar" id="stok_keluar">
<input type="hidden" name="penyesuaian" id="penyesuaian">
<input type="hidden" name="retur" id="retur">   
<input type="hidden" name="stok_final" id="stok_final">


<ul>
<li>
    <label for="kode_material">kode material :</label>
    <p><input type="text" name="kode_material" id="kode_material" required ></p>
</li>
<li>
    <label for="nama_barang">nama barang :</label>
    <p><input type="text" name="nama_barang" id="nama_barang" required ></p>
</li>
<li>
    <label for="satuan">satuan :</label>
   <p><input type="text" name="satuan" id="satuan" required ></p> 
</li>
<li>
    <label for="jenis">jenis :</label>
 <p><select  id="jenis" name="jenis" required >
    <option value disable> pilih jenis </option>
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
  <p><select id="asal" name="asal" required>
    <option value disable> pilih asal barang </option>
    <option value="Import">Import</option>
    <option value="Lokal">Lokal</option>    
    </select></p>
</li>

<li>
    <label for="hs_code">hs_code :</label>
   <p><input type="text" name="hs_code" id="hs_code" required></p> 
</li>


<br>
<button type="submit" name="submit" >Tambah Data</button>

<a href="index.php" class="btn btn-default">Kembali</a>
<!-- contoh dengan button -->
    <!-- <button type="submit" name="submit" >Tambah Data</button>
    <a href="tambah.php"><button type="submit" name="kembali">Kembali</button></a> -->

</ul>

         </form>
    
</body>
</html>