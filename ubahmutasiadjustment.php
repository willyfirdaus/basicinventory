
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsmutasiadjustment.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM mutasibarang WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di rubah');
        document.location.href = 'mutasiadjustment.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di rubah');
        document.location.href = 'mutasiadjustment.php';
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
    <title>Ubah mutasi adjustment </title>

    <script type="text/javascript">
           
           function tambah(){
                
           nilai1 = document.getElementById("stok_awal").value;
                        
           nilai2 = document.getElementById("stok_adjustment").value;

           jumlah = parseInt(nilai1)+parseInt(nilai2);
              
              document.getElementById("stok_final").value =  jumlah;
        }
          </script>


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
                  ("satuan").value = myObj[3];

                  document.getElementById
                  ("asal").value = myObj[4];
                

               
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
    <h1>Ubah mutasi adjustment </h1>
    <form action="" method="post"> 
        <!-- saat ubah data setiap row harus ada isi tiap field data base yang tidak ingin di rubah simpan sebagai hiden-->
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">        
<ul> 

<li>
    <label for="tanggal">tanggal:</label>
    <input type="date" name="tanggal" id="tanggal" 
    value ="<?= $data ["tanggal"] ?>">
</li>

<li>
        <label for="kode">kode </label>
        <input type='text' name="kode" 
        id='kode' class='form-control'
        onkeyup="GetDetail(this.value)" value ="<?= $data ["kode"] ?>" >
 </li>

<li>
    <label for="deskripsi">deskripsi :</label>
    <input type="text" name="deskripsi" id="deskripsi" 
    value ="<?= $data ["deskripsi"] ?>">    
</li>


<li>
    <label for="satuan">satuan :</label>
    <input type="text" name="satuan" id="satuan" readonly
    value ="<?= $data ["satuan"] ?>">    
</li>

<li>
    <label for="stok_awal">stok awal :</label>
    <input type="number" name="stok_awal" id="stok_awal"
    value ="<?= $data ["stok_awal"] ?>">    
</li>


<li>
    <label for="stok_adjustment">stok adjustment :</label>
    <input type="number" name="stok_adjustment" id="stok_adjustment"
    value ="<?= $data ["stok_adjustment"] ?>">    
</li>



<li>
    <label for="stok_final">stok final :</label>
    <input type="number" name="stok_final" id="stok_final" 
    value ="<?= $data ["stok_final"] ?>">    
</li>

<li>
    <label for="asal">asal :</label>
    <input type="text" name="asal" id="asal" 
    value ="<?= $data ["asal"] ?>">    
</li>




<br>
<button type="submit" name="submit" >ubah Data</button>
<!-- <button onclick="tambah();" name="submit" >ubah Data</button> -->

<a href="mutasiadjustment.php" class="btn btn-default">Kembali</a>
</ul>


</form>
    
</body>
</html>