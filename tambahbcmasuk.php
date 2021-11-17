
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsbcmasuk.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM purchaseorder WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('bc berhasil di tambahkan');
        document.location.href = 'bcmasuk.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('bc gagal di tambahkan perika kembali');
        document.location.href = 'bcmasuk.php';
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
    <title>Tambah No invoice untuk P.O.</title>


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
                document.getElementById("hs_code").value = "";
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

                            // Returns the response data as a
                        // string and store this array in
                        // a variable assign the value 
                        // received to hs code input field
                          
                        document.getElementById
                        ("hs_code").value = myObj[1];


                     
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
    <h1>Tambah No invoice untuk P.O.</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 
<li>
    <label for="status_bc">status bc :</label>
 <p><select name="status_bc" id="status_bc"   value ="<?= $data ["status_bc"] ?>" required>
    <option value="non bc"> non bc</option>
    <option value="BC 23 Import"> BC 23 Import</option>
    <option value="BC 262"> BC 262</option>
    <option value="BC 23 Import PJT"> BC 23 Import PJT</option>
    <option value="BC 27 masuk"> BC 27 masuk</option>
    <option value="BC 40"> BC 40</option>
    </select></p>
</li>

<li>
    <label for="no_aju">no aju`:</label>
    <input type="number" name="no_aju" id="no_aju" 
    value ="<?= $data ["no_aju"] ?>">
</li>

<li>
    <label for="no_pendaftaran">no pendaftaran:</label>
    <input type="number" name="no_pendaftaran" id="no_pendaftaran"
    value ="<?= $data ["no_pendaftaran"] ?>">
</li>
<li>
    <label for="no_surat_jalan">No Surat jalan/BL/AWB</label>
    <input type="text" name="no_surat_jalan" id="no_surat_jalan"
    value ="<?= $data ["no_surat_jalan"] ?>">
</li>
<li>
    <form >
    <label for="tanggal_bcmasuk">tanggal Invoice :</label>
    <input value="2021-01-01" name='tanggal_bcmasuk' type='date' class="form-control"  id="tanggal_bcmasuk"
    value ="<?= $data ["tanggal_bcmasuk"] ?>"> 
    </form>
</li>
<br>

<button onclick="tambah();" name="submit" >simpan Data</button>

<a href="bcmasuk.php" class="btn btn-default">Kembali</a>
</ul>


</form>
    
</body>
</html>