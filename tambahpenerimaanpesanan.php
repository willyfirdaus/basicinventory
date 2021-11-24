<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionspenerimaanpesanan.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
      
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
        
        </script>
        ";
    }

}

?>



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




<!-- isi data tampilan web  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penerimaan Pesanan</title>



</head>
<body>
    <h1>Tambah Penerimaan Pesanan</h1>
    <form action="" method="post" class="control-group after-add-more"> 

<input type="hidden" name="qty_finish_good" id="qty_finish_good">
<input type="hidden" name="tanggal_finish" id="tanggal_finish">    
<input type="hidden" name="no_invoice" id="no_invoice">
<input type="hidden" name="tanggal_invoice" id="tanggal_invoice">
<input type="hidden" name="buyer" id="buyer">
<input type="hidden" name="alamat" id="alamat">   
<input type="hidden" name="no_surat_jalan" id="no_surat_jalan">
<input type="hidden" name="stuffing_record" id="stuffing_record">
<input type="hidden" name="negara_tujuan" id="negara_tujuan">
<input type="hidden" name="pelabuan_muat" id="pelabuan_muat">
<input type="hidden" name="no_container" id="no_container">
<input type="hidden" name="status_bc" id="status_bc">
<input type="hidden" name="currency_rate" id="currency_rate">
<input type="hidden" name="amount_usd" id="amount_usd">
<input type="hidden" name="amount_idr" id="amount_idr">
<input type="hidden" name="price" id="price">
<input type="hidden" name="no_aju" id="no_aju">
<input type="hidden" name="no_pendaftaran" id="no_pendaftaran">
<input type="hidden" name="no_npe" id="no_npe">
<input type="hidden" name="tanggal" id="tanggal">
<input type="hidden" name="nomor_bukti_pengeluaran" id="nomor_bukti_pengeluaran">
<input type="hidden" name="tanggal_bukti_pengeluaran" id="tanggal_bukti_pengeluaran">
<input type="hidden" name="penerima_barang" id="penerima_barang">


<ul>
<li>
    <label for="job_order">job order :</label>
    <input type="text" name="job_order" id="job_order" required>
</li>


<li>
<form>
<label for="tanggal_registrasi">tanggal registrasi :</label>
<input name='tanggal_registrasi' type='date' class="form-control"  id="tanggal_registrasi" required >
</form>
</li>
<!-- <li>
    <label for="total_amount">total amount :</label>
    <input type="text" name="total_amount" id="total_amount" readonly >   
</li> -->
<br><br><br><br>

<li>
        <label for="kode">kode </label>
        <input type='text' name="kode" 
        id='kode' class='form-control'
        onkeyup="GetDetail(this.value)" required >
 </li>

 <li>
    <label for="deskripsi">deskripsi:</label>
    <input type="text" name="deskripsi" 
    id="deskripsi" required >
</li>
 <li>
    <label for="satuan">satuan:</label>
    <input type="text" name="satuan" 
    id="satuan" required >
</li>
 <li>
    <label for="hs_code">hs_code:</label>
    <input type="text" name="hs_code" 
    id="hs_code" required >
</li>


<li>
    <label for="request_qty">request_qty :</label>
    <input type="number" name="request_qty" id="request_qty" required>
</li>


<li>
    <label for="asal">asal :</label>
    <input type="text" name="asal" id="asal" required >   
</li>

<li>
    <label for="catatan">catatan :</label>
    <input type="text" name="catatan" id="catatan" required >   
</li>

<li>
    <button onclick="tambah();" name="submit" >Simpan</button>
</li>

<a href="penerimaanpesanan.php" class="btn btn-default">Kembali</a>
</ul>
        
</form>

</body>
</html>

       

 


 



   

   



