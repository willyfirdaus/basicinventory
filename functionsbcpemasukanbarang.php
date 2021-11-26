<?php
//koneksi database dan tarik data table
$db = mysqli_connect("localhost","root","","basicinventory");

function query ($query) {
    global $db;
    $result = mysqli_query ($db,$query);
    $rows = [];
    if ($result === false) {
        echo mysqli_error($db);
    }else{
        while ( $row = mysqli_fetch_array($result) ) {
            $rows [] = $row;
        }
        return $rows;
    }
}



//function search
function cari ($keyword = "") {

    $tanggal_awal = $_POST['tanggal_awal']??"";  
    $tanggal_akhir = $_POST['tanggal_akhir']??"";  
    $keyword = $_POST["keyword"] ?? "";
    $jenis_dok = $_POST["jenis_dok"] ?? "";
    
    $query = "SELECT * FROM purchaseorder
    WHERE
    (no_po LIKE '%$keyword%' OR
    kode LIKE '%$keyword%' OR
    no_kontrak LIKE '%$keyword%') 
    ";

    if ($tanggal_awal != "" && $tanggal_akhir != "") {
        $query.=" AND DATE(tanggal_bcmasuk) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
        // $query.=" AND DATE(tanggal_bcmasuk) = '$tanggal_awal'"; 
    }
    
    if ($jenis_dok != "") {
        $query.=" AND status_bc = '$jenis_dok'";
    }
    return query ($query);
}


?>