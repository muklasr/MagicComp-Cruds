<?php
session_start();

if(!isset($_SESSION['namauser'])){
    //jika session belum di set/register
  header("location:../index.php");
    //die("Anda belum register kan session");
}
//jika sudah register kita lanjut
?>
<title>Magic Comp.</title>
<link rel="icon" type="image/png" href="../css/gambar/Crazy.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">
<script type="text/javascript" src="../muc.js"></script>
<div id="sidebar">
     <a class="nav"> Menu </a>
     <a href="../view/Tampil.php" class="nav"><i class="fa fa-laptop"></i> Produk </a>
     <a href="../view/kasir.php" class="nav"><i class="fa fa-cart-arrow-down"></i> Kasir </a>
     <a href="../view/transaksi.php" class="nav"><i class="fa fa-exchange"></i> Transaksi </a>
     <a href="" class="nav"><i class="fa fa-info-circle"></i> Lain-lain </a>
</div>
<div id="wadah">
<header id="header">
     <p id="tulisan">&nbsp;
     <i onclick="buka();" class="fa fa-navicon" id="buka" title="Buka Menu"></i>
     <i onclick="tutup();" class="fa fa-navicon" id="tutup" title="Tutup Menu"></i>
     <b>Magic Comp.</b></p>
     <p id="hkanan"><i class="fa fa-user"></i><?php echo $_SESSION['namauser'];?>&nbsp;<a onclick="return confirm('Anda Yakin Ingin Keluar ?')" href="../proses/logout.php">keluar</a>&nbsp;<i class="fa fa-calendar"></i><?php echo date('d-m-Y'); ?> &nbsp;</p>
</header>
<script>
function buka(){
           document.getElementById('tutup').style.visibility = "visible";
           document.getElementById("buka").style.visibility= "hidden";
           document.getElementById("buka").style.position= "absolute";
           document.getElementById("tutup").style.position= "relative";
           document.getElementById("sidebar").style.width  = "250px";
           document.getElementById("wadah").style.margin = "0 0 0 250";
}
function tutup() {
           document.getElementById("sidebar").style.width  = "0px";  
           document.getElementById("wadah").style.margin = "0 0 0 0"; 
           document.getElementById("buka").style.visibility= "visible";
           document.getElementById("tutup").style.visibility= "hidden"; 
}
</script>
<div id="isi">
