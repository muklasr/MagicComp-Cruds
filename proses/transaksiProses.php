<?php
session_start();
include "../template/koneksi.php";
if($_POST){
	$tgl = date('Y-m-d');	
	$jam = date('G:i');
	$kode1 = $_POST['kd_nota']; 
	$kd = $_POST['kd'];	
	$kd_kasir = $_POST['kd_kasir']; 
	$qty = $_POST['qty'];
	$delok = "SELECT * FROM barang WHERE kd_barang='$kd'";
	$kuerine = mysqli_query($konek,$delok) or die(mysqli_error($konek));
  
	$hasile = mysqli_fetch_array($kuerine);
	$kd = $hasile[0]; 
	$jeneng = $hasile[1]; 
	$regane = $hasile[2]; 
	$stok = $hasile[3];
	$total = $regane*$qty-$disc; 
	$stok = $stok-$qty;
  
	mysqli_query($konek, "UPDATE barang SET stok='$stok' WHERE kd_barang='$kd'") or die(mysqli_error($konek));
	if($_POST['bayar']){
		$total = $_POST['ttl'];
		$byr = $_POST['bayar'];
		$susuk = $byr-$total;
		$kodene = $_SESSION['kn'];
		mysqli_query($konek, "UPDATE nota SET  total='$total', bayar='$byr', kembali='$susuk' WHERE kd_nota='$kodene'") or die(mysqli_error($konek));
		?>
		
		<script type="text/javascript">alert('Uang Kembali: <?php echo $susuk; ?>');</script>
		<?php
		unset($_SESSION['kn']);
		unset($_SESSION['proses']);
	}
	else {
	if(!isset($_SESSION['proses'])){
	mysqli_query($konek, "INSERT INTO nota VALUES('$kode1','$kd_kasir','0','0','0','$tgl','$jam')") or die(mysqli_error($konek));
	$_SESSION['proses'] = 'muklasss';
	
	}
	
	mysqli_query($konek, "INSERT INTO detailnota VALUES('$kode1','$kd','$qty','$total')");
}
  header("location:../view/transaksi.php");
}
else { echo "Gagal!";}
 ?>
