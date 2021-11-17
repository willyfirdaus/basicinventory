<?php

require 'functionspurchaseorder.php';


$id = $_GET["id"];

if( hapus($id) >0 )



{
    echo "<script>
    alert('data berhasil di hapus');
    document.location.href = 'purchaseorder.php';
    </script>
    ";

} else {
    echo "<script>
    alert('data gagal di hapus');
    document.location.href = 'purchaseorder.php';
    </script>
    ";

}


?>  






