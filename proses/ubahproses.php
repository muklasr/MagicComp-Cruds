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
	$ubah = "UPDATE barang SET nm_barang='$b', harga='$c', stok='$d', spesifikasi='$e', foto='$failnya' WHERE kd_barang='$a'";
	mysqli_query($konek, $ubah) or die (mysqli_error($konek));
	header("location:../view/Tampil.php");?>
	<script type="text/javascript">
		alert("Data berhasil diubah");
	</script><?php
	}
}
else if($_POST['kd_kasir']){
	$a = $_POST['kd_kasir'];	
	$b = $_POST['b'];	
	$c = $_POST['c'];
	$d = $_POST['d'];	
	$e = $_POST['e'];
	$failnya=$_FILES['f']['name']; 
	$tujuan="../data/gkasir/$failnya";		//FOLDER tujuan = foto 
	$sementara=$_FILES['f']['tmp_name']; 

	if(!empty($failnya)) 	 {
	move_uploaded_file("$sementara","$tujuan"); 
	$ubah = "UPDATE kasir SET nm_kasir='$b', jk='$c', telp='$d', alamat='$e', foto='$failnya' WHERE kd_kasir='$a'";
	mysqli_query($konek, $ubah) or die (mysqli_error($konek));
	header("location:../view/kasir.php");?>
	<script type="text/javascript">
		alert("Data berhasil diubah");
	</script><?php
	}
}
else {
	# Jika tidak ada aksi post dari form
	header("location:../view/Tampil.php");
	?>
	<script type="text/javascript">
		alert("Data gagal diubah");
	</script><?php
}
?>
