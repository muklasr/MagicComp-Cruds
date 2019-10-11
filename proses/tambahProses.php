<?php
include "../template/koneksi.php";
if($_POST['kd_barang']){
	$a = $_POST['kd_barang'];	
	$b = $_POST['b'];	
	$c = $_POST['c'];
	$d = $_POST['d'];	
	$e = $_POST['e'];
	$failnya = $_FILES['f']['name']; 
	$tujuan = "../data/gbarang/$failnya";		//FOLDER tujuan = foto 
	$sementara = $_FILES['f']['tmp_name']; 
	if(!empty($failnya)) 	 {
		move_uploaded_file("$sementara","$tujuan"); 		
		$simpan = "INSERT INTO barang VALUES('$a','$b','$c','$d','$e','$failnya')";
		mysqli_query($konek, $simpan) or die (mysqli_error($konek));
		header("location:../view/Tampil.php");?>
		<script type="text/javascript">
			alert("Data berhasil ditambah");
		</script><?php 
	}
}
else if($_POST['kd_kasir']){
	$a = $_POST['kd_kasir'];	
	$b = $_POST['b'];	
	$c = $_POST['c'];
	$d = $_POST['d'];	
	$e = $_POST['e'];
	$failnya = $_FILES['f']['name']; 
	$tujuan = "../data/gkasir/$failnya";		//FOLDER tujuan = foto 
	$sementara = $_FILES['f']['tmp_name']; 
	if(!empty($failnya)) 	 {
		move_uploaded_file("$sementara","$tujuan"); 
		$simpan = "INSERT INTO kasir VALUES('$a','$b','$c','$d','$e','$failnya')";
		mysqli_query($konek, $simpan) or die (mysqli_error($konek));
		header("location:../view/kasir.php");?>
		<script type="text/javascript">
			alert("Data berhasil ditambah");
		</script><?php
	}
}
else {
	# Jika tidak ada aksi post dari form
	header("location:../view/Tampil.php");
	?>
	<script type="text/javascript">
		alert("Data gagal ditambah");
	</script><?php
}
?>
