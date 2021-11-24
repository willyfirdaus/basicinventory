
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionspengirimanpesanan.php';

//ambil data di URL
$id = $_GET["id"];

$data = query ("SELECT * FROM penerimaanpesanan WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di ubah');
   
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di ubah ');

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
    <title>Tambah pengiriman pesanan</title>


<!-- sciprt untuk tarik kode barang dan hs code untuk fungsi kode, deskripsi, dan hs code dari DB master -->

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







<script>
  
        // onkeyup event will occur when the user 
        // release the key and calls the function
        // assigned to this event
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("alamat").value = "";
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
                        ("alamat").value = myObj[0];

                            // Returns the response data as a
                        // string and store this array in
                        // a variable assign the value 
                        // received to hs code input field


                     
                    }
                };
  
                // xhttp.open("GET", "ambil data pada file", true);
                xmlhttp.open("GET", "tarikdatasupplier.php?kode=" + str, true);
                  
                // Sends the request to the server
                xmlhttp.send();
            }
        }
    </script>

</head>
<body>
    <h1>Ubah pengiriman pesanan</h1>
    <form action="" method="post"> 
    <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">           
<ul> 


<li>
    <label for="nomor_bukti_pengeluaran">Nomor Bukti Pengeluaran:</label>
    <input type="text" name="nomor_bukti_pengeluaran" id="nomor_bukti_pengeluaran" 
    value ="<?= $data ["nomor_bukti_pengeluaran"] ?>">
</li>

<li>
    
    <label for="tanggal_bukti_pengeluaran">Tanggal Bukti Pengeluaran :</label>
    <input name='tanggal_bukti_pengeluaran' type='date' class="form-control"  id="tanggal_bukti_pengeluaran"
    value ="<?= $data ["tanggal_bukti_pengeluaran"] ?>"> 

</li>


<li>
    <label for="no_invoice">No Invoice:</label>
    <input type="text" name="no_invoice" id="no_invoice" 
    value ="<?= $data ["no_invoice"] ?>">
</li>


<li>
    
    <label for="tanggal_invoice">Tanggal Invoice :</label>
    <input name='tanggal_invoice' type='date' class="form-control"  id="tanggal_invoice"
    value ="<?= $data ["tanggal_invoice"] ?>"> 

</li>

<li>
    <label for="penerima_barang">penerima barang :</label>
    <input type="text" name="penerima_barang" id="penerima_barang"
    value ="<?= $data ["penerima_barang"] ?>">    
</li>


<li>
        <label for="buyer">buyer </label>
        <input type='text' name="buyer" 
        id='buyer' class='form-control'
        onkeyup="GetDetail(this.value)" value ="<?= $data ["buyer"] ?>" >
 </li>


<li>
    <label for="alamat">alamat :</label>
    <input type="text" name="alamat" id="alamat"
    value ="<?= $data ["alamat"] ?>">    
</li>


<li>
    <label for="no_surat_jalan">no surat jalan :</label>
    <input type="text" name="no_surat_jalan" id="no_surat_jalan"
    value ="<?= $data ["no_surat_jalan"] ?>">    
</li>



<li>
     <label for="stuffing_record">stuffing record :</label>
    <input name='stuffing_record' type='date' class="form-control"  id="stuffing_record"
    value ="<?= $data ["stuffing_record"] ?>"> 
</li>


<li>
    <label for="negara_tujuan">negara tujuan :</label>
    <input type="text" name="negara_tujuan" id="negara_tujuan"
    value ="<?= $data ["negara_tujuan"] ?>">    
</li>
<li>
    <label for="pelabuan_muat">pelabuan muat :</label>
    <input type="text" name="pelabuan_muat" id="pelabuan_muat"
    value ="<?= $data ["pelabuan_muat"] ?>">    
</li>

<li>
    <label for="no_container">no container :</label>
    <input type="text" name="no_container" id="no_container"
    value ="<?= $data ["no_container"] ?>">    
</li>


<li>
    <label for="status_bc">statu BC :</label>
    <input type="text" name="status_bc" id="status_bc"
    value ="<?= $data ["status_bc"] ?>">    
</li>


<li>
    <label for="currency_rate">currency rate : ( isikan sesuai curency yang berlaku di hari penginputan pada link </label><a href="https://www.beacukai.go.id/kurs.html" target='_blank'>https://www.beacukai.go.id/kurs.html </a>)
    <br>
    <input type="text" name="currency_rate" id="currency_rate"
    value ="<?= $data ["currency_rate"] ?>">    
</li>


<li>
    <label for="price">price:</label>
    <input type="number" name="price" id="price"
    value ="<?= $data ["price"] ?>">    
</li>



<li>
    <label for="amount_usd">amount usd :</label>
   $ <input type="text" name="amount_usd" id="amount_usd"
    value ="<?= $data ["amount_usd"] ?>"> <button type="button" id="btnHitung" value="Test" onclick="tugas();">=</button>   
</li>
<li>
    <label for="amount_idr">amount idr :</label>
   Rp <input type="text" name="amount_idr" id="amount_idr"
    value ="<?= $data ["amount_idr"] ?>"> <button type="button" id="btnHitung" value="Test" onclick="tugas1();">=</button>
</li>


<br><br><br><br><br>

<li>
    <label for="job_order">Job Order:</label>
    <input type="text" name="job_order" id="job_order" readonly
    value ="<?= $data ["job_order"] ?>">
</li>

<li>
    <label for="kode1">kode :</label>
    <input type="text" name="kode1" id="kode1" readonly
    value ="<?= $data ["kode"] ?>">    
</li>

<li>
    <label for="deskripsi">deskripsi :</label>
    <input type="text" name="deskripsi" id="deskripsi" readonly
    value ="<?= $data ["deskripsi"] ?>">    
</li>


<li>
    <label for="qty_finish_good">Qty Finish Good :</label>
    <input type="number" name="qty_finish_good" id="qty_finish_good" readonly
    value ="<?= $data ["qty_finish_good"] ?>">    
</li>



<br>
<button type="submit" name="submit" >simpan</button>
<!-- <button onclick="tambah();" name="submit" >ubah Data</button> -->

<a href="pengirimanpesanan.php" class="btn btn-default">Kembali</a>
</ul>


</form>
    
</body>
</html>