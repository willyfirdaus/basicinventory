<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsmutasipemasukan.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
        document.location.href = 'tambahmutasipemasukan.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
        document.location.href = 'tambahmutasipemasukan.php';
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
    <title>Tambah Mutasi Adjustmnet</title>


    <!-- untuk mengfungsikan kali pada kolom qty dan price-->
    <script type="text/javascript">
           
           function tambah(){
                
           nilai1 = document.getElementById("stok_awal").value;
                        
           nilai2 = document.getElementById("stok_masuk").value;

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
    <h1>Tambah Mutasi Pemasakan</h1>
    <form action="" method="post" class="control-group after-add-more"> 
<!-- pelengkap insert data ke DB saat tambah barang awal  -->
<input type="hidden" name="kategori" id="kategori">
<input type="hidden" name="stok_keluar" id="stok_keluar">
<input type="hidden" name="penyesuaian" id="penyesuaian">
<input type="hidden" name="retur" id="retur">


<ul>

<li>
<form>
<label for="tanggal">tanggal :</label>
<input name='tanggal' type='date' class="form-control"  id="tanggal" required >
</form>
</li>



<!-- input data melalui search metode down dengan terkoneksi pada DB basic inventory supplier -->
<li>
        <label for="kode">kode </label>
        <input type='text' name="kode" 
        id='kode' class='form-control'
        onkeyup="GetDetail(this.value)" required >
 </li>


 <!-- tarik data deskripsi dari fungsi seacrh metode -->



<li>
    <label for="deskripsi">Deskripsi:</label>
    <input type="text" name="deskripsi" 
    id="deskripsi" required >
</li>


<li>
    <label for="satuan">satuan:</label>
    <input type="text" name="satuan" 
    id="satuan" required >
</li>


<li>
    <label for="stok_awal">stok awal:</label>
    <input type="number" name="stok_awal" 
    id="stok_awal" required >
</li>


<li>
    <label for="stok_masuk">stok masuk:</label>
    <input type="number" name="stok_masuk" 
    id="stok_masuk" required >
</li>



<li>
    <label for="stok_final">stok final:</label>
    <input type="number" name="stok_final" 
    id="stok_final" required ><button type="button" id="btnHitung" value="Test" onclick="tambah();">=</button>
</li>


<li>
    <label for="asal">asal:</label>
    <input type="text" name="asal" 
    id="asal" required >
</li>







<!-- <li>
    <label for="hs_code">hs code :</label>
    <input type="text" name="hs_code" id="hs_code" >   
</li> -->
<!-- <button class="btn btn-success add-more" type="button">
              <i class="glyphicon glyphicon-plus"></i> Tambahkan lebih
            </button> -->


<li>
    <button onclick="tambah();" name="submit" >Simpan</button>
</li>

<a href="mutasipemasukan.php" class="btn btn-default">Kembali</a>
</ul>
        
</form>

</body>
</html>

       

 


 



   

   



