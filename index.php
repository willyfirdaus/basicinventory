<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> APLIKASI INVENTORY PT RF HIGHTEK INDONESIA </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>


  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">RF INVENTORY</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="dashboard.php">Data Master</a></li>
        </ul>
      </li>



      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Data Master</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Data master</a></li>
          <li><a href="datamaster.php">Barang</a></li>
          <li><a href="gudangpenyimpanan.php">Gudang Penyimpanan</a></li>
          <li><a href="kantorpabean.php">Kantor Pabean</a></li>
          <li><a href="kursmatauang.php">Kurs Mata Uang</a></li>
          <li><a href="supplier.php">Supplier</a></li>
        </ul>
      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-cart' ></i>
            <span class="link_name">Pembelian</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Pembelian</a></li>
          <li><a href="purchaseorder.php">Purchase Order</a></li>
          <li><a href="invoicepembelian.php">Invoice Pembelian</a></li>
        </ul>
      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-dollar-circle' ></i>
            <span class="link_name">Penjualan</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Penjualan</a></li>
          <li><a href="penerimaanpesanan.php">Penerimaan Pesananan</a></li>
          <li><a href="pengirimanpesanan.php">Pengiriman Pesanan</a></li>
        </ul>
      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-box' ></i>
            <span class="link_name">Gudang</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Gudang</a></li>
          <li><a href="penerimaanbarang.php">Penerimaan Barang</a></li>
          <li><a href="">Pengembalian Barang</a></li>
          <li><a href="pengirimanpesanan.php">Pengiriman Pesanan</a></li>
          <li><a href="penyesuaianbarang.php">Penyusaian Barang</a></li>
          <li><a href="konversi.php">Konversi</a></li>
          <li><a href="">Stock Opname</a></li>
          <li><a href="requestproduksi.php">Request Produksi</a></li>
        </ul>
      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-chip' ></i>
            <span class="link_name">Produksi</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Produksi</a></li>
          <li><a href="consumtion.php">Consumption</a></li>
          <li><a href="finishgood.php">Finish Good</a></li>
          <li><a href="">Scrap</a></li>
        </ul>
      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-calendar-edit' ></i>
            <span class="link_name">ProsesCMT</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">ProsesCMT</a></li>
          <li><a href="">Pengajuan</a></li>
          <li><a href="">Keluar Bahan</a></li>
          <li><a href="">Invoice</a></li>
        </ul>
      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-calculator' ></i>
            <span class="link_name">Akunting</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Akunting</a></li>
          <li><a href="">Akun</a></li>
          <li><a href="">Klien</a></li>
          <li><a href="">Tipe Jurnal</a></li>
          <li><a href="">Hutang</a></li>
          <li><a href="">Piutang</a></li>
          <li><a href="">Jurnal</a></li>
          <li><a href="">Neraca</a></li>
          <li><a href="">Laba Rugi</a></li>
        </ul>
    </li>
      
      
     
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-check-shield' ></i>
            <span class="link_name">Exim</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Exim</a></li>
          <li><a href="">Kontrak Kerja CMT</a></li>
          <li><a href="bcmasuk.php">BC Masuk</a></li>
          <li><a href="bckeluar.php">BC Keluar</a></li>
        </ul>
      </li>

      


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-paste' ></i>
            <span class="link_name">Laporan</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Laporan</a></li>
          <li><a href="stockreal.php">Stock Real</a></li>
          <li><a href="stockdokumen.php">Stock Dokumen</a></li>
          <li><a href="mutasibarang.php">Mutasi Barang</a></li>
          <li><a href="bcpemasukanbarang.php">BC Pemasukan Barang</a></li>
          <li><a href="bcpengeluaranbarang.php">BC Pengeluaran Barang</a></li>
          <li><a href="posisibarangwip.php">Posisi Barang WIP</a></li>
        </ul>
      </li>



      <li>
        <div class="iocn-link">
          <a href="#">
          <i class='bx bx-history'></i>
            <span class="link_name">Riwayat Aktifitas</span>
          </a>
        </div>



        <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="link_name">Pengaturan</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Pengaturan</a></li>
          <li><a href="registrasi.php">registrasi user</a></li>
          <li><a href="">Pengaturan Role</a></li>
         
        </ul>
      </li>
      



    <div class="profile-details">
      <div class="profile-content">
        <img src="profile.jpg"  alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">user</div>
        <div class="job">Inventory</div>
      </div>
      <i class='bx bx-log-out' ></i>
      <a href="logout.php">Logout</a>
    </div>
  </li>
</ul>
  </div>

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      
    </div>
  </section>

  <script src="script.js"></script>

</body>
</html>
