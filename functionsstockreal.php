<?php
//koneksi database dan tarik data table
$db = mysqli_connect("localhost","root","","basicinventory");

function query ($query) {
    global $db;
    $result = mysqli_query ($db,$query);
    $rows = [];
    while ( $row = mysqli_fetch_array($result) ) {
         $rows [] = $row;
    }
    return $rows;
}




function queryObject ($query) {
    global $db;
    $result = mysqli_query ($db,$query);
    $rows = [];
    if ($result === false) {
        echo mysqli_error($db);
    }else{
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows = $row;
        }
        return $rows;
    }
}

//function search
function cari ($keyword) {
    $query = "SELECT * FROM purchaseorder
    WHERE
    no_po LIKE '%$keyword%' OR
    no_kontrak LIKE '%$keyword%'
    ";
    return query ($query);
}


?>