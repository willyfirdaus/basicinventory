<?php
  
// Get the user id 
$kode = $_REQUEST['kode'];
  
// Database connection
$con = mysqli_connect("localhost", "root", "", "basicinventory");
  
if ($kode !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($con, "SELECT  alamat
       FROM supplier WHERE kode ='$kode'");
  
    $row = mysqli_fetch_array($query);
  
   
  
    // Get the first name
    $alamat = $row["alamat"];
  
}
  
// Store it in a array
$result = array("$alamat") ;
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;


?>