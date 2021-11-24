
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsinvoicepembelian.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM purchaseorder WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('invoice berhasil di tambahkan');
        document.location.href = 'invoicepembelian.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('invoice gagal di tambahkan perika kembali');
        document.location.href = 'invoicepembelian.php';
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
    <title>ubah No invoice untuk P.O.</title>


    <script type="text/javascript">
           
           function tugas(){
                
           nilai1 = document.getElementById("price").value;
                        
           nilai2 = document.getElementById("qty_finish_good").value;

           kali = nilai1*nilai2;
              
              document.getElementById("amount_usd").value =  kali;
        }
          </script>

<script type="text/javascript">
           
           function tugas1(){
                
           nilai1 = document.getElementById("currency_rate").value;
                        
           nilai2 = document.getElementById("amount_usd").value;

           kali = nilai1*nilai2;
              
              document.getElementById("amount_idr").value =  kali;
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
    <h1>ubah No invoice untuk P.O.</h1>
    <form action="" method="post"> 
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
<ul> 

<li>
    <label for="no_po">No P.O.:</label>
    <input type="text" name="no_po" id="no_po" readonly
    value ="<?= $data ["no_po"] ?>">
</li>

<li>
        <label for="kode">kode </label>
        <input type='text' name="kode" 
        id='kode' class='form-control' readonly
        value ="<?= $data ["kode"] ?>" >
 </li>

 <li>
    <label for="deskripsi">deskripsi :</label>
    <input type="text" name="deskripsi" id="deskripsi" readonly
    value ="<?= $data ["deskripsi"] ?>">    
</li>

<li>
        <label for="qty">qty </label>
    <input type='text' name="qty" funt
        id='qty' class='form-control' readonly
        value ="<?= $data ["qty"] ?>" >
 </li>

<li>
        <label for="nilai_barang_usd">nilai barang USD </label>
        <input type='text' name="nilai_barang_usd" 
        id='nilai_barang_usd' class='form-control' readonly
        value ="<?= $data ["nilai_barang_usd"] ?>" >
 </li>

<li>
        <label for="nilai_barang_idr">nilai barang IDR </label>
        <input type='text' name="nilai_barang_idr" 
        id='nilai_barang_idr' class='form-control' readonly
        value ="<?= $data ["nilai_barang_idr"] ?>" >
 </li>




<br><br><br>

<li>
    <label for="no_invoice">No Invoice:</label>
    <input type="text" name="no_invoice" id="no_invoice" 
    value ="<?= $data ["no_invoice"] ?>">Isikan nomor invoice
</li>
<li>
    <form >
    <label for="tanggal_po">tanggal Invoice :</label>
    <input name='tanggal_invoice' type='date' class="form-control"  id="tanggal_invoice"
    value ="<?= $data ["tanggal_invoice"] ?>"> Isikan tanggal invoice
    </form>
    </li>


    
<br>

<button onclick="tambah();" name="submit" >simpan Data</button>

<a href="invoicepembelian.php" class="btn btn-default">Kembali</a>
</ul>


</form>
    
</body>
</html>