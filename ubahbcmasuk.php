
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
    <title>ubah BC masuk</title>


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
    <h1>ubah BC masuk</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 


<li>
    <label for="supplier">supplier </label>
    <input type='text' name="supplier" funt
        id='supplier' class='form-control' readonly
        value ="<?= $data ["supplier"] ?>" >
 </li>
<li>
    <label for="no_invoice">no_invoice </label>
    <input type='text' name="no_invoice" funt
        id='no_invoice' class='form-control' readonly
        value ="<?= $data ["no_invoice"] ?>" >
 </li>
<li>
    <label for="no_po">no_po </label>
    <input type='text' name="no_po" funt
        id='no_po' class='form-control' readonly
        value ="<?= $data ["no_po"] ?>" >
 </li>
<li>
    <label for="kode">kode </label>
    <input type='text' name="kode" funt
        id='kode' class='form-control' readonly
        value ="<?= $data ["kode"] ?>" >
 </li>
<li>
    <label for="deskripsi">deskripsi </label>
    <input type='text' name="deskripsi" funt
        id='deskripsi' class='form-control' readonly
        value ="<?= $data ["deskripsi"] ?>" >
 </li>
<li>
    <label for="qty">qty </label>
    <input type='text' name="qty" funt
        id='qty' class='form-control' readonly
        value ="<?= $data ["qty"] ?>" >
 </li>
<li>
    <label for="price">price </label>
    <input type='text' name="price" funt
        id='price' class='form-control' readonly
        value ="<?= $data ["price"] ?>" >
 </li>
<li>
    <label for="nilai_barang_usd">nilai_barang_usd </label>
    <input type='text' name="nilai_barang_usd" funt
        id='nilai_barang_usd' class='form-control' readonly
        value ="<?= $data ["nilai_barang_usd"] ?>" >
 </li>
<li>
    <label for="nilai_barang_idr">nilai_barang_idr </label>
    <input type='text' name="nilai_barang_idr" funt
        id='nilai_barang_idr' class='form-control' readonly
        value ="<?= $data ["nilai_barang_idr"] ?>" >
 </li>
<li>
    <label for="hs_code">hs_code </label>
    <input type='text' name="hs_code" funt
        id='hs_code' class='form-control' readonly
        value ="<?= $data ["hs_code"] ?>" >
 </li>


<br>
<br>

<h3>isi Detail BC Masuk Disini</h3>

<li>
    <label for="status_bc">status bc :</label>
 <p><select name="status_bc" id="status_bc"   value ="<?= $data ["status_bc"] ?>" required>
    <option value="non bc"> non bc</option>
    <option value="23"> BC 23 Import</option>
    <option value="262"> BC 262</option>
    <option value="23"> BC 23 Import PJT</option>
    <option value="27"> BC 27 masuk</option>
    <option value="40"> BC 40</option>
    </select></p>
</li>

<li>
    <label for="no_aju">no aju`:</label>
    <input type="text" name="no_aju" id="no_aju" 
    value ="<?= $data ["no_aju"] ?>">
</li>

<li>
    <label for="no_pendaftaran">no pendaftaran:</label>
    <input type="text" name="no_pendaftaran" id="no_pendaftaran"
    value ="<?= $data ["no_pendaftaran"] ?>">
</li>
<li>
    <label for="no_surat_jalan">No Surat jalan/BL/AWB</label>
    <input type="text" name="no_surat_jalan" id="no_surat_jalan"
    value ="<?= $data ["no_surat_jalan"] ?>">
</li>
<li>
    <form >
    <label for="tanggal_bcmasuk">tanggal BC masuk :</label>
    <input name='tanggal_bcmasuk' type='date' class="form-control"  id="tanggal_bcmasuk"
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