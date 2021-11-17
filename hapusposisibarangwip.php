
<?php
if(isset($_GET['hapus'])){
    $id_buku = $_GET['hapus'];
    if(!empty($id_buku)){
        $sql="DELETE FROM buku WHERE id_buku='$id_buku'";
          
        if($mysqli->query($sql) === false) { // Jika gagal meng-hapus data tampilkan pesan dibawah 'Perintah SQL Salah'
          trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
        } else { // Jika berhasil alihkan ke halaman tampil.php
          header('location: tampil.php');
        }
    }
}
?>