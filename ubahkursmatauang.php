
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionskursmatauang.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM kursmatauang WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di rubah');
        document.location.href = 'kursmatauang.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di rubah');
        document.location.href = 'kursmatauang.php';
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
    <title>Ubah kurs mata uang</title>
</head>
<body>
    <h1>Ubah kurs mata uang</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 
<li>
    <label for="mata_uang">mata uang :</label>
    <input type="text" name="mata_uang" id="mata_uang" required
    value ="<?= $data ["mata_uang"] ?>">
</li>
<li>
    <label for="rate_idr">rate idr :</label>
    <input type="text" name="rate_idr" id="rate_idr" required
    value ="<?= $data ["rate_idr"] ?>"> 
</li>

<br>

    <button type="submit" name="submit" >ubah Data</button>

<a href="kursmatauang.php" class="btn btn-default">Kembali</a>
</ul>



         </form>
    
</body>
</html>