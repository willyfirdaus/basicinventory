
<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionspurchaseorder.php';

//ambil data di URL
$id =$_GET["id"];

$data = query ("SELECT * FROM purchaseorder WHERE id = $id")[0]; 



// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di rubah');
        document.location.href = 'purchaseorder.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di rubah pastikan supplier & currency terisi');
        document.location.href = 'purchaseorder.php';
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
    <title>Ubah purchase order</title>


    <!-- sciprt untuk tarik kode barang dan hs code untuk fungsi kode, deskripsi, dan hs code dari DB master -->
<script>
  
        // onkeyup event will occur when the user 
        // release the key and calls the function
        // assigned to this event
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("deskripsi").value = "";
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
    <h1>Ubah purchase order</h1>
    <form action="" method="post"> 
        <!-- saat ubah data setiap row harus ada isi tiap field data base yang tidak ingin di rubah simpan sebagai hiden-->
        <input type="hidden" name="id" value="<?= $data ["id"] ; ?>">
        <input type="hidden" name="no_invoice" value="<?= $data ["no_invoice"] ; ?>">
        <input type="hidden" name="tanggal_invoice" value="<?= $data ["tanggal_invoice"] ; ?>">    
          <!-- saat ubah data setiap row harus ada isi tiap field data base -->         
<ul> 
<li>
    <label for="no_po">No P.O.:</label>
    <input type="text" name="no_po" id="no_po" 
    value ="<?= $data ["no_po"] ?>">
</li>
<li>
    <form >
    <label for="tanggal_po">tanggal po :</label>
    <input value="2021-01-01" name='tanggal_po' type='date' class="form-control"  id="tanggal_po"
    value ="<?= $data ["tanggal_po"] ?>"> 
    </form>
    </li>
<br><br><br><br>

<li>
<label for="select">Supplier </label>
<select name="supplier" class="textfields" id="supplier" value ="<?= $data ["supplier"] ?>" required >
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

</li>

<li>
    <label for="no_kontrak">no kontrak :</label>
    <input type="text" name="no_kontrak" id="no_kontrak" 
    value ="<?= $data ["no_kontrak"] ?>">    
</li>

<li>
        <label for="kode">kode </label>
        <input type='text' name="kode" 
        id='kode' class='form-control'
        onkeyup="GetDetail(this.value)" value ="<?= $data ["kode"] ?>" >
 </li>

<li>
    <label for="deskripsi">deskripsi :</label>
    <input type="text" name="deskripsi" id="deskripsi" readonly
    value ="<?= $data ["deskripsi"] ?>">    
</li>

<li>
    <label for="qty">qty :</label>
    <input type="number" name="qty" id="qty"
    value ="<?= $data ["qty"] ?>">    
</li>

<li>
<label for="select">currency </label>
<select name="currency" class="textfields" id="currency" value ="<?= $data ["supplier"] ?>" required>
    <option id = "0"> pilih currency </option>
    <?php
        $con = mysqli_connect("localhost","root","","basicinventory");
        $result = mysqli_query($con, "SELECT * FROM kursmatauang WHERE 1"); 
        while ($row = $result->fetch_assoc()){
     ?>
     <option><?php echo $row['mata_uang'];?></option> 
     <?php } ?>
</select>

</li>

<li>
    <label for="price">price :</label>
    <input type="number" name="price" id="price" 
    value ="<?= $data ["price"] ?>">    
</li>

<li>
    <label for="amount">amount :</label>
    <input type="text" name="amount" id="amount" 
    value ="<?= $data ["amount"] ?>"> <button type="button" id="btnHitung" value="Test" onclick="tugas();">=</button> 
</li>

<li>
    <label for="hs_code" >hs code :</label>
    <input type="text" name="hs_code" id="hs_code" readonly
    value ="<?= $data ["hs_code"] ?>">    
</li>





<br>
<button type="submit" name="submit" >ubah Data</button>
<!-- <button onclick="tambah();" name="submit" >ubah Data</button> -->

<a href="purchaseorder.php" class="btn btn-default">Kembali</a>
</ul>


</form>
    
</body>
</html>