<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionskursmatauang.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
        document.location.href = 'kursmatauang.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
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
    <title>Tambah Kurs Mata Uang</title>
</head>
<body>
    <h1>Tambah Kurs Mata Uang</h1>
    <form action="" method="post"> 
<ul>
<li>
    <label for="mata_uang">mata uang :</label>
    <input type="text" name="mata_uang" id="mata_uang" required>
</li>
<li>
    <label for="rate_idr">rate idr :</label>
    <input type="text" name="rate_idr" id="rate_idr" required>   
</li>

<li>

    <button type="submit" name="submit" >Tambah Data</button>
</li>
</ul>
         </form>
    
</body>
</html>