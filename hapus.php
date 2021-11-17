<?php

require 'functions.php';


$id = $_GET["id"];

if( hapus($id) >0 )



{
    echo "<script>
    alert('data berhasil di hapus');
    document.location.href = 'datamaster.php';
    </script>
    ";

} else {
    echo "<script>
    alert('data gagal di hapus');
    document.location.href = 'datamaster.php';
    </script>
    ";

}


$id2 = $_GET["id"];

if( hapus2($id2) > 0 )


?>  






