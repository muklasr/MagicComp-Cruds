<?php
include "../template/koneksi.php";
if($_GET['opo']=='barang'){
	$txtid = $_GET['id'];
		$hps = "DELETE FROM barang WHERE kd_barang='$txtid'";
		mysqli_query($konek, $hps) or die ("Querynya salah : ".mysql_error());
		header("location:../view/Tampil.php");?>
		<script type="text/javascript">
			alert("Data berhasil dihapus");
		</script><?php
}
else if($_GET['opo']=='kasir'){
	$txtid = $_GET['id'];
		$hps = "DELETE FROM kasir WHERE kd_kasir='$txtid'";
		mysqli_query($konek, $hps) or die ("Querynya salah : ".mysql_error());
		header("location:../view/kasir.php");?>
		<script type="text/javascript">
			alert("Data berhasil dihapus");
		</script><?php
}
else if($_GET['opo']=='log'){
	$txtid = $_GET['id'];
		$hps = "DELETE FROM nota WHERE kd_nota='$txtid'";
		mysqli_query($konek, $hps) or die ("Querynya salah : ".mysql_error());
		header("location:../view/transaksilog.php");?>
		<script type="text/javascript">
			alert("Data berhasil dihapus");
		</script><?php
}
else {
	# Jika tidak ada aksi post dari form
	header("location:../view/Tampil.php");
	?>
	<script type="text/javascript">
		alert("Data gagal dihapus");
	</script><?php
}
?>
