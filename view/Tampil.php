<?php $hrg=0;
$stk=0;
$ttl=0;?>
<!----------------- Tambah ------------------>
<div id="njobo">
	<div id="inputan" class="inputan animate" >
	<span id=batal onclick="metu()" title="Keluar">&times;</span>
	<?php
		include '../template/koneksi.php';   //nggo ngonekkan ning server
		$sikil = "SELECT MAX(right(kd_barang,4)) FROM barang";
		$kueri = mysqli_query($konek, $sikil) or die(mysqli_error($konek));
		$kode = mysqli_fetch_row($kueri);
		$jml = $kode[0];	
		$jml = $jml+1;	
		$panjang = strlen($jml);
		if($panjang==1){ $kode1='B000'.$jml;}
		else if($panjang==2){ $kode1='B00'.$jml;}
		else if($panjang==3){ $kode1='B0'.$jml;}
		else if($panjang==4){ $kode1='B'.$jml;}
	?>
		<h2 id=tulisan>Tambah Data</h2>
		<form method=POST action=../proses/tambahProses.php enctype=multipart/form-data>
			Kode Produk<br>	<input type=text name=kd_barang value=<?php echo $kode1; ?> class=txt placeholder='Kode Produk' maxlength=5 required><br>
			Nama Produk<br>	<input type=text name=b class=txt placeholder='Nama Produk' maxlength=30 required><br>
			Harga<br> <input type=text name=c class=txt placeholder='Harga' maxlength=11 required><br>
			Stok<br> <input type=text name=d class=txt placeholder='Stok' maxlength=11 required><br>
			Spesifikasi<br>	<textarea name=e class=txt placeholder=Spesifikasi maxlength=100 required></textarea><br>
			Foto &nbsp;	<input type=file name=f accept=image/*><br>
			<input type=Submit name=simpan class=simpan value=Simpan><br></form>
	</div>
</div>

<!----------------- Update ------------------>
<?php
		if(isset($_GET['kd_barang'])){
			$aa = $_GET['kd_barang'];
			$bb = $_GET['b'];
			$cc = $_GET['c'];
			$dd = $_GET['d'];
			$ee = $_GET['e'];
			$ff = $_GET['f'];
	?>
<div id="njobo2">
	<div id="inputan2" class="inputan animate" >
	<span id=batal onclick="metu()" title="Keluar">&times;</span>
		<h2 id=tulisan>Ubah Data</h2>
		<form method=POST action=../proses/ubahproses.php enctype=multipart/form-data>
			Kode Produk<br>			<input type=text name=kd_barang value=<?php echo $aa; ?> class=txt placeholder='Kode Produk' maxlength=5 required><br>
			Nama Produk<br>			<input type=text name=b value='<?php echo $bb; ?>' class=txt placeholder='Nama Produk' maxlength=30 required><br>
			Harga<br>			<input type=text name=c value=<?php echo $cc; ?> class=txt placeholder='Harga' maxlength=11 required><br>
			Stok<br>			<input type=text name=d value=<?php echo $dd; ?> class=txt placeholder='Stok' maxlength=11 required><br>
			Spesifikasi<br>			<textarea name=e class=txt placeholder=Spesifikasi maxlength=100 required><?php echo $ee; ?></textarea><br>
			Foto &nbsp;			<input type=file name=f accept=image/*><br>
			<input type=Submit name=simpan class=simpan value=Simpan><br></form>
	</div>
</div>
<script type="text/javascript">
	document.getElementById('njobo2').style.display="block";
</script>
<?php 
}
// ------------------------- Gambar ------------------------- //
if (isset($_GET['gambar'])) {
	$gbr = $_GET['gambar'];
	$jeneng = isset($_GET['jeneng'])?$_GET['jeneng']:'';
?>
	<div id="njobo3">
	<div id="gambar" class="inputan animate" >
	<span id=batal onclick="metu()" title="Keluar">&times;</span>
	<h2><?php echo $jeneng;?></h2>
			 <img src="../data/gbarang/<?php echo $gbr; ?>.jpg" height=350px>
	</div>
</div>
<script type="text/javascript">
	document.getElementById('njobo3').style.display="block";
</script>
<?php
}

include "../template/header.php"; //nggo nampilkan header?>

<!-- tabel nggo nampilkan datane -->
<h3>Data Produk</h3><br>
<form class="tg" method="POST" action="../view/Tampil.php">
	<span onclick="njedul()" id=btnTambah class="btnTambah"><i class="fa fa-plus"></i>&nbsp;Tambah</span>
	<input type="text" name="golek" id="txtgolek" class="txtgolek" placeholder="Cari..."><big><i onclick="muncul()" class="fa fa-search" id="golek"></i><i onclick="gaksida()" class="fa fa-close" id="gaksida"></i></big>
</form>

	<table border=0 id=tabel>
	<tr id=ndastabel>
		<td>Kode</td> <td>Nama Produk</td> <td>Harga (Rp.)</td> <td>Stok</td> <td>Spesifikasi</td> <td colspan=2>Action</td>
	</tr>
	<tr>
<?php
	
	$y = $_POST['golek'];
	if ($y) {
		$pilih = "SELECT * FROM barang WHERE nm_barang LIKE '%$y%'";
	} else {
		 $pilih = "SELECT * FROM barang"; 
	}
	$warna = 'zebra1';
	$tampil = mysqli_query($konek, $pilih) or die ("Querynya salah : ".mysqli_error($konek));
	while($data = mysqli_fetch_array($tampil)){
		if($warna == 'zebra1'){ 
			$warna='zebra2'; 
		} else { 
			$warna = 'zebra1'; 
		}
		echo '<tr id='.$warna.'>';
		echo "<td> 				".$data[0]." </td>";
		echo "<td><a href=../view/Tampil.php?gambar=".$data[5]."&jeneng=".$data[1].">	".$data[1]." </a></td>";
		echo "<td align=right>".number_format($data[2])." </td>";
		echo "<td align=right width=10> 	".$data[3]." </td>";
		echo "<td> 				".$data[4]." </td>";
		echo "<td width=10><a href=\"../view/Tampil.php?kd_barang=".$data[0]."&b=".$data[1]."&c=".$data[2]."&d=".$data[3]."&f=".$data[5]."&e=".$data[4]."\">
		<img src=../css/gambar/update.png height=30px width=30px/></a></td>";?>
  <td width=10><a onclick="return confirm('Anda yakin ingin menghapus data <?php echo $data[1]; ?> ?')" href="../proses/busakproses.php?id=<?php echo $data[0]; ?>&opo=barang"><img src="../css/gambar/delet.png" height=30px width=30px/></a></td></tr><?php

		$hrg=$hrg+$data[2];
		$stk=$stk+$data[3];
		$ttl=$ttl+1;
	}
	$hrg=number_format($hrg);
	echo "<tr class=ngisor><td colspan=2>[$ttl] Jumlah</td><td align=right width=150>Rp. $hrg</td><td align=right>$stk</td></tr>";
?>
</table>
<?php
include '../template/footer.php'; 
?>