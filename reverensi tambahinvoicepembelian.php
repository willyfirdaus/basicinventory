<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsinvoicepembelian.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
        document.location.href = 'tambahinvoicepembelian.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
        document.location.href = 'tambahinvoicepembelian.php';
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
    <title>Tambah Invoice Pembelian</title>


    <!-- untuk mengfungsikan kali pada kolom qty dan price-->
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
                xmlhttp.open("GET", "tarikdatainvoicepembelian.php?kode_material=" + str, true);
                  
                // Sends the request to the server
                xmlhttp.send();
            }
        }
    </script>


</head>
<body>
    <h1>Tambah Invoice Pembelian</h1>
    <form action="" method="post"> 
<ul>
<li>
<label for="select">Supplier </label>
<select name="supplier" class="textfields" id="supplier" required>
    <option id = "" value disable> pilih supplier </option>
    <?php
        $con = mysqli_connect("localhost","root","","basicinventory");
        $result = mysqli_query($con, "SELECT * FROM supplier WHERE 1"); 
        while ($row = $result->fetch_assoc()){
     ?>
     <option><?php echo $row['kode'];?></option> 
     <?php } ?>
</select>
</li>

<li>
<form>
<label for="tanggal_po">tanggal invoice :</label>
<input value="2021-01-01" name='tanggal_po' type='date' class="form-control"  id="tanggal_po" required >
</form>
</li>


<li>
    <label for="no_invoice">No invoice :</label>
    <input type="text" name="no_invoice" id="no_invoice" required>
</li>

<!-- <li>
    <label for="total_amount">total amount :</label>
    <input type="text" name="total_amount" id="total_amount" readonly >   
</li> -->
<br><br><br><br>

<!-- input data melalui drop down dengan terkoneksi pada DB basic inventory supplier -->



<li>
    <label for="no_faktur">no faktur :</label>
    <input type="text" name="no_faktur" id="no_faktur" required >   
</li>


<li>
    <label for="status_bc">status bc :</label>
 <p><select   select id="status_bc" name="status_bc" required>
    <option value="non bc"> non bc</option>
    <option value="BC 23 Import"> BC 23 Import</option>
    <option value="BC 262"> BC 262</option>
    <option value="BC 23 Import PJT"> BC 23 Import PJT</option>
    <option value="BC 27 masuk"> BC 27 masuk</option>
    <option value="BC 40"> BC 40</option>
    </select></p>
</li>


<li>
    <label for="no_surat_jalan">no surat jalan / BL :</label>
    <input type="text" name="no_surat_jalan" id="no_surat_jalan" required >   
</li>

<li>
    <label for="currency_rate">currency rate : ( isikan sesuai curency yang berlaku di hari penginputan pada link </label><a href="https://www.beacukai.go.id/kurs.html" target='_blank'>https://www.beacukai.go.id/kurs.html </a>)
        <br>
    <input type="number" name="currency_rate" id="currency_rate" required> 
</li>


<li>
    <label for="kode_po">kode po :</label>
    <input type="text" name="kode_po" id="kode_po" required >   
</li>

<li>
    <label for="total_amount">total amount :</label>
    <input type="text" name="total_amount" id="total_amount" required >   
</li>

<li>
    <label for="po">po</label>
    <input type="text" name="po" id="po" required >   
</li>
<li>
    <label for="kode">kode :</label>
    <input type="text" name="kode" id="kode" required >   
</li>
<li>
    <label for="deskripsi">deskripsi :</label>
    <input type="text" name="deskripsi" id="deskripsi" required >   
</li>
<li>
    <label for="qty">qty :</label>
    <input type="number" name="qty" id="qty" required>
</li>

<li>
<label for="select">currency </label>
<select name="currency" class="textfields" id="currency" required>
    <option id = "" value disable> pilih currency </option>
    <?php
   
        $con = mysqli_connect("localhost","root","","basicinventory");
        $result = mysqli_query($con, "SELECT * FROM kursmatauang WHERE 1"); 
        while ($row = $result->fetch_assoc()){
     ?>
     <option><?php echo $row ['mata_uang'];?></option> 
     <?php } ?>
</select>
</li>

<li>
    <label for="price">price :</label>
    <input type="number" name="price" id="price" required > 
</li>

<li>
    <label for="amount">amount :</label>
    <input type="text" name="amount" id="amount" readonly required><button type="button" id="btnHitung" value="Test" onclick="tugas();">=</button>
</li>






<br><br><br><br><br>
























<!-- input data melalui search metode down dengan terkoneksi pada DB basic inventory supplier -->
<li>
        <label for="kode">kode </label>
        <input type='text' name="kode" 
        id='kode' class='form-control'
        onkeyup="GetDetail(this.value)" required >
 </li>


 <!-- tarik data deskripsi dari fungsi seacrh metode -->
<li>
    <label for="deskripsi">deskripsi:</label>
    <input type="text" name="deskripsi" 
    id="deskripsi" required >
</li>



<li>
    <label for="qty">qty :</label>
    <input type="number" name="qty" id="qty" required>
</li>

<!-- tarik data curecny dari fungsi seacrh metode -->
<li>
<label for="select">currency </label>
<select name="currency" class="textfields" id="currency" required>
    <option id = "" value disable> pilih currency </option>
    <?php
   
        $con = mysqli_connect("localhost","root","","basicinventory");
        $result = mysqli_query($con, "SELECT * FROM kursmatauang WHERE 1"); 
        while ($row = $result->fetch_assoc()){
     ?>
     <option><?php echo $row ['mata_uang'];?></option> 
     <?php } ?>
</select>
</li>


<li>
    <label for="price">price :</label>
    <input type="number" name="price" id="price" required > 
</li>

<!-- ambil fungsi perkalian antara qty & price -->
<li>
    <label for="amount">amount :</label>
    <input type="text" name="amount" id="amount" readonly required><button type="button" id="btnHitung" value="Test" onclick="tugas();">=</button>
</li>


<li>
 <label for="hs_code">hs code:</label>
 <input type="text" name="hs_code" id="hs_code" required >
</li>


<!-- <li>
    <label for="hs_code">hs code :</label>
    <input type="text" name="hs_code" id="hs_code" >   
</li> -->
<li>
    <button onclick="tambah();" name="submit" >Tambah Data</button>
</li>

<a href="invoicepembelian.php" class="btn btn-default">Kembali</a>
</ul>
        
</form>

</body>
</html>

       

 


 



   

   



