
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionspenyesuaianbarang.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM penyesuaianbarang WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('penerimaan berhasil di ubah');
        document.location.href = 'penyesuaianbarang.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('penerimaan berhasil gagal di ubah perika kembali');
        document.location.href = 'penyesuaianbarang.php';
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
    <title>ubah penerimaan barang</title>


    <script type="text/javascript">
           
           function tugas(){
                
           nilai1 = document.getElementById("qty").value;
                        
           nilai2 = document.getElementById("price").value;

           kali = nilai1*nilai2;
              
              document.getElementById("amount").value =  kali;
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
                document.getElementById("stok_final").value = "";
        
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
                        ("stok_final").value = myObj[2];

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
    <h1>ubah penerimaan barang</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 



<li>
    <label for="kode_penyesuaian">kode_penyesuaian :</label>
    <input type="text" name="kode_penyesuaian" id="kode_penyesuaian"
    value ="<?= $data ["kode_penyesuaian"] ?>">    
</li>


<li>
<label for="select">kode gudang </label>
<select name="kode_gudang" class="textfields" id="kode_gudang" required>
    <option id = "" value disable> pilih gudang penyimpanan </option>
    <?php
        $con = mysqli_connect("localhost","root","","basicinventory");
        $result = mysqli_query($con, "SELECT * FROM gudangpenyimpanan WHERE 1"); 
        while ($row = $result->fetch_assoc()){
     ?>
     <option><?php echo $row['kode_gudang'];?></option> 
     <?php } ?>
</select>
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
    <label for="stok_final">stok_final :</label>
    <input type="number" name="stok_final" id="stok_final"
    value ="<?= $data ["stok_final"] ?>">    
</li>


<li>
    <label for="adjust">adjust :</label>
    <input type="text" name="adjust" id="adjust"
    value ="<?= $data ["adjust"] ?>">    
</li>

<li>
    <label for="keterangan">keterangan :</label>
    <input type="text" name="keterangan" id="keterangan"
    value ="<?= $data ["keterangan"] ?>">    
</li>


<br>

<button onclick="tambah();" name="submit" >simpan Data</button>

<a href="penyesuaianbarang.php" class="btn btn-default">Kembali</a>
</ul>


</form>
    
</body>
</html>