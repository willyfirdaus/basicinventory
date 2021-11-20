
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionspenerimaanbarang.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM purchaseorder WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('Detail penerimaan di tambahkan');
        document.location.href = 'penerimaanbarang.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('Detail penerimaan gagal di tambahkan periksa kembali');
        document.location.href = 'penerimaanbarang.php';
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
    <h1>Tambah Detail Penerimaan Barang</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 

<li>
    <label for="no_invoice">no_invoice </label>
    <input type='text' name="no_invoice" 
        id='no_invoice' class='form-control' readonly
        value ="<?= $data ["no_invoice"] ?>" >
 </li>
<li>
    <label for="no_po">no_po </label>
    <input type='text' name="no_po" 
        id='no_po' class='form-control' readonly
        value ="<?= $data ["no_po"] ?>" >
 </li>
<li>
    <label for="kode">kode </label>
    <input type='text' name="kode" 
        id='kode' class='form-control' readonly
        value ="<?= $data ["kode"] ?>" >
 </li>
<li>
    <label for="deskripsi">deskripsi </label>
    <input type='text' name="deskripsi" 
        id='deskripsi' class='form-control' readonly
        value ="<?= $data ["deskripsi"] ?>" >
 </li>






<br><br>


<li>
    <label for="nomor_bukti_penerimaan">nomor bukti penerimaan:</label>
    <input type="text" name="nomor_bukti_penerimaan" id="nomor_bukti_penerimaan" 
    value ="<?= $data ["nomor_bukti_penerimaan"] ?>">
</li>


<li>
    <form >
    <label for="tanggal_diterima">tanggal diterima :</label>
    <input name='tanggal_diterima' type='date' class="form-control"  id="tanggal_diterima"
    value ="<?= $data ["tanggal_diterima"] ?>"> 
    </form>
</li>

<li>
<label for="select">Lokasi gudang </label>
<select name="lokasi_gudang" class="textfields" id="lokasi_gudang" required>
    <option id = "" value disable> Lokasi gudang </option>
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
    <label for="qty">qty dokumen :</label>
    <input type="number" name="qty" id="qty"
    value ="<?= $data ["qty"] ?>" readonly> untuk referensi
</li>


<li>
    <label for="qty_real">qty real`:</label>
    <input type="number" name="qty_real" id="qty_real" 
    value ="<?= $data ["qty_real"] ?>">
</li>


<br>

<button onclick="tambah();" name="submit" >simpan Data</button>

<a href="penerimaanbarang.php" class="btn btn-default">Kembali</a>
</ul>


</form>
    
</body>
</html>