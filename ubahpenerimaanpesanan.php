
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionspenerimaanpesanan.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM penerimaanpesanan WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di rubah');
        document.location.href = 'penerimaanpesanan.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di rubah pastikan supplier & currency terisi');
        document.location.href = 'penerimaanpesanan.php';
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
    <title>Ubah Penerimaan Pesanan</title>


   <!-- sciprt untuk tarik kode barang dan hs code untuk fungsi kode, deskripsi, dan hs code dari DB master -->
<script>
  
  // onkeyup event will occur when the user 
  // release the key and calls the function
  // assigned to this event
  function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("deskripsi").value = "";
                document.getElementById("hs_code").value = "";
                document.getElementById("satuan").value = "";
                document.getElementById("asal").value = "";
                return;
            }
            else {
  
                // Creates a new XMLHttpRequest object
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
  
                    // Defines a function to be called when
                    // the readyState property changes
                    if (this.readyState == 4 && 
                            this.status == 200) {
                          
                        // Typical action to be performed
                        // when the document is ready
                        var myObj = JSON.parse(this.responseText);
  
                       
                        
                        // Assign the value received to
                        // deskripsi input field
                        document.getElementById
                        ("deskripsi").value = myObj[0];

                        document.getElementById
                        ("hs_code").value = myObj[1];

                        document.getElementById
                        ("satuan").value = myObj[3]
                        
                        document.getElementById
                        ("asal").value = myObj[4]

                            // Returns the response data as a
                        // string and store this array in
                        // a variable assign the value 
                        // received to hs code input field


                     
                    }
                };
  
          // xhttp.open("GET", "ambil data pada file", true);
          xmlhttp.open("GET", "tarikdatapurchaseorder.php?kode_material=" + str, true);
            
          // Sends the request to the server
          xmlhttp.send();
      }
  }
</script>

</head>
<body>
    <h1>Ubah Penerimaan Pesanan</h1>
    <form action="" method="post"> 
    <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">           

<ul> 
<li>
    <label for="job_order">Job Order:</label>
    <input type="text" name="job_order" id="job_order" 
    value ="<?= $data ["job_order"] ?>">
</li>
<li>
    <form >
    <label for="tanggal_registrasi">Tanggal Registrasi :</label>
    <input name='tanggal_registrasi' type='date' class="form-control"  id="tanggal_registrasi"
    value ="<?= $data ["tanggal_registrasi"] ?>"> 
    </form>
    </li>
<br><br><br><br>


<li>
        <label for="kode">kode </label>
        <input type='text' name="kode" 
        id='kode' class='form-control'
        onkeyup="GetDetail(this.value)" value ="<?= $data ["kode"] ?>" >
 </li>

<li>
    <label for="deskripsi">deskripsi :</label>
    <input type="text" name="deskripsi" id="deskripsi" readonly
    value ="<?= $data ["deskripsi"] ?>">    
</li>

<li>
    <label for="satuan" >satuan  :</label>
    <input type="text" name="satuan" id="satuan" 
    value ="<?= $data ["satuan"] ?>">    
</li>

<li>
    <label for="hs_code" >hs_code  :</label>
    <input type="text" name="hs_code" id="hs_code" 
    value ="<?= $data ["hs_code"] ?>">    
</li>


<li>
    <label for="request_qty">request qty :</label>
    <input type="number" name="request_qty" id="request_qty"
    value ="<?= $data ["request_qty"] ?>">    
</li>


<li>
    <label for="asal" >asal  :</label>
    <input type="text" name="asal" id="asal" 
    value ="<?= $data ["asal"] ?>">    
</li>

<li>
    <label for="catatan" >catatan  :</label>
    <input type="text" name="catatan" id="catatan" 
    value ="<?= $data ["catatan"] ?>">    
</li>





<br>
<button type="submit" name="submit" >ubah Data</button>
<!-- <button onclick="tambah();" name="submit" >ubah Data</button> -->

<a href="penerimaanpesanan.php" class="btn btn-default">Kembali</a>
</ul>


</form>
    
</body>
</html>