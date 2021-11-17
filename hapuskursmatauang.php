<?php

require 'functionskursmatauang.php';


$id = $_GET["id"];

if( hapus($id) >0 )



{
    echo "<script>
    alert('data berhasil di hapus');
    document.location.href = 'kursmatauang.php';
    </script>
    ";

} else {
    echo "<script>
    alert('data gagal di hapus');
    document.location.href = 'kursmatauang.php';
    </script>
    ";

}


?>  






