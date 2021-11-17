<?php
//link ke funtion untuk koneksi db dan tari data sql
require 'functionsrequestproduksi.php';

// notifikasi untuk menampilkan pop up berhasil atau tidak
if ( isset ($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
        document.location.href = 'tambahrequestproduksi.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('data gagal di tambahkan');
        document.location.href = 'tambahrequestproduksi.php';
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
    <title>Tambah Request Produksi</title>


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
    <h1>Tambah Request Produksi</h1>
    <form action="" method="post" class="control-group after-add-more"> 
<ul>
<li>
    <label for="job_order">job order :</label>  
    <input type="text" name="job_order" id="job_order" required>
</li>
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
    <label for="qty_out">qty out :</label>
    <input type="number" name="qty_out" id="qty_out" required>
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

<a href="requestproduksi.php" class="btn btn-default">Kembali</a>
</ul>
        
</form>

</body>
</html>

       

 


 



   

   



