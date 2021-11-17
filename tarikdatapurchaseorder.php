<?php
  
// Get the user id 
$kode_material = $_REQUEST['kode_material'];
  
// Database connection
$con = mysqli_connect("localhost", "root", "", "basicinventory");
  
if ($kode_material !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($con, "SELECT  nama_barang , hs_code , stok_final , satuan
       FROM datamaster WHERE kode_material ='$kode_material'");
  
    $row = mysqli_fetch_array($query);
  
   
  
    // Get the first name
       $deskripsi = $row["nama_barang"];

       // Get the first name
       $hs_code = $row["hs_code"];

       // Get the first name
       $stok_final = $row["stok_final"];


       $satuan = $row["satuan"];

  
}
  
// Store it in a array
$result = array( "$deskripsi" , "$hs_code" , "$stok_final" , "$satuan" ) ;
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;


?>