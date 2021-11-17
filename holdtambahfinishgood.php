<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsfinishgood.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
        document.location.href = 'tambahfinishgood.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
        document.location.href = 'tambahfinishgood.php';
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




<!-- isi data tampilan web  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Finish Good</title>



</head>
<body>
    <h1>Tambah Finish Good</h1>
    <form action="" method="post" class="control-group after-add-more"> 
<ul>

<li>
    <label for="qty_finish_good">qty finish good :</label>
    <input type="number" name="qty_finish_good" id="qty_finish_good" required>
</li>


<li>
<form>
<label for="tanggal_finish">tanggal finish :</label>
<input value="2021-01-01" name='tanggal_finish' type='date' class="form-control"  id="tanggal_finish" required >
</form>
</li>


<li>
    <label for="job_order">job order :</label>
    <input type="text" name="job_order" id="job_order" required>
</li>



<!-- <li>
    <label for="total_amount">total amount :</label>
    <input type="text" name="total_amount" id="total_amount" readonly >   
</li> -->

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
    <label for="request_qty">request_qty :</label>
    <input type="number" name="request_qty" id="request_qty" required>
</li>


<li>
    <button onclick="tambah();" name="submit" >Simpan</button>
</li>

<a href="finishgood.php" class="btn btn-default">Kembali</a>
</ul>
        
</form>

</body>
</html>

       

 


 



   

   



