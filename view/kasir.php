<!----------------- Tambah ------------------>
<div id="njobo">
	<div id="inputan" class="inputan animate" >
	<span id=batal onclick="metu()" title="Keluar">&times;</span>
	<?php
		include '../template/koneksi.php';   //nggo ngonekkan ning server
		$sikil = "SELECT MAX(right(kd_kasir,4)) FROM kasir";
		$kueri = mysqli_query($konek,$sikil) or die(mysqli_error($konek));
		$kode = mysqli_fetch_array($kueri);
		$jml = $kode[0];	
		$jml = $jml+1;	
		$panjang = strlen($jml);
		if($panjang == 1){ $kode1 = 'K000'.$jml;}
		else if($panjang == 2){ $kode1 = 'K00'.$jml;}
		else if($panjang == 3){ $kode1 = 'K0'.$jml;}
		else if($panjang == 4){ $kode1 = 'K'.$jml;}
	?>
		<h2 id=tulisan>Tambah Data</h2>
		<form method=POST action=../proses/tambahProses.php enctype=multipart/form-data>
			Kode<br><input type=text name=kd_kasir value=<?php echo $kode1; ?> class=txt placeholder='Kode Kasir' maxlength=5 required><br>
			Nama Kasir<br><input type=text name=b class=txt placeholder='Nama' maxlength=30 required><br>
			Jenis Kelamin<br><Select class=pilih name=c required>
			<option value=L>Laki-laki
			<option value=P>Perempuan</Select><br>
			No. Telepon<br><input type=text name=d class=txt placeholder='No. Telp.' maxlength=12 required><br>
			Alamat<br><textarea name=e class=txt placeholder=Alamat maxlength=50 required></textarea><br>
			Foto &nbsp;	<input type=file name=f accept=image/*><br>
			<input type=Submit name=simpan class=simpan value=Simpan><br>
		</form>
	</div>
</div>

<!----------------- Update ------------------>
<?php
		if(isset($_GET['kd_kasir'])){
			$aa = $_GET['kd_kasir'];
			$bb = $_GET['b'];
			$cc = $_GET['c'];
			$dd = $_GET['d'];
			$ee = $_GET['e'];
	?>
<div id="njobo2">
	<div id="inputan2" class="inputan animate" >
	<span id=batal onclick="metu()" title="Keluar">&times;</span>
		<h2 id=tulisan>Ubah Data</h2>
		<form method=POST action=../proses/ubahproses.php enctype=multipart/form-data>
			Kode Kasir<br>
			<input type=text name=kd_kasir value=<?php echo $aa; ?> class=txt placeholder='Kode Kasir' maxlength=5 required><br>
			Nama Kasir<br>			
			<input type=text name=b value='<?php echo $bb; ?>' class=txt placeholder='Nama Kasir' maxlength=30 required><br>
			Jenis Kelamin<br>			
			<select name=c value=<?php echo $cc; ?> class=txt required><option value="L">Laki-laki</option><option value="P">Perempuan</option></select><br>
			No. Telepon<br>			
			<input type=text name=d value=<?php echo $dd; ?> class=txt placeholder='No. Telepon' maxlength=11 required><br>
			Alamat<br>			
			<textarea name=e class=txt placeholder=Alamat maxlength=100 required><?php echo $ee; ?></textarea><br>
			Foto &nbsp;			
			<input type=file name=f accept=image/*><br>
			<input type=Submit name=simpan class=simpan value=Simpan><br>
		</form>
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
?>
	<div id="njobo3">
	<div id="gambar" class="inputan animate" >
	<span id=batal onclick="metu()" title="Keluar">&times;</span>
		<img src="../data/gkasir/<?php echo $gbr; ?>" width='500'>
	</div>
</div>
<script type="text/javascript">
	document.getElementById('njobo3').style.display="block";
	
</script>
<?php
}

include "../template/header.php"; //nggo nampilkan header?>

<!-- tabel nggo nampilkan datane -->
<h3>Data Kasir</h3><br>
<form class="tg" method="POST" action="../view/kasir.php">
	<span onclick="njedul()" id=btnTambah class="btnTambah"><i class="fa fa-plus"></i>&nbsp;Tambah</span>
	<input type="text" name="golek" id="txtgolek" class="txtgolek" placeholder="Cari..."><big><i onclick="muncul()" class="fa fa-search" id="golek"></i><i onclick="gaksida()" class="fa fa-close" id="gaksida"></i></big>
</form>

	<table border=0 id=tabel>
	<tr id=ndastabel>
		<td>Kode</td> <td>Nama Kasir</td> <td width="10">JK</td> <td>No. Telepon</td> <td>Alamat</td> <td colspan=2>Action</td>
	</tr>
	<tr>
<?php
	$ttl = 0;
	$y = $_POST['golek'];
	if ($y) {$pilih = "SELECT * FROM kasir WHERE nm_kasir LIKE '%$y%'";}
	else { $pilih = "SELECT * FROM kasir"; }
	$warna='zebra1';
	$tampil= mysqli_query($konek, $pilih) or die ("Querynya salah : ".mysqli_error($konek));
	while($data = mysqli_fetch_array($tampil)){
		if($warna=='zebra1'){$warna='zebra2';} else {$warna='zebra1';}
		echo '<tr id='.$warna.'>';
		echo "<td> 				".$data[0]." </td>";
		echo "<td><a href=../view/kasir.php?gambar=".$data[5].">	".$data[1]." </a></td>";
		echo "<td align=right>".$data[2]." </td>";
		echo "<td align=right> 	".$data[3]." </td>";
		echo "<td> 				".$data[4]." </td>";
		echo "<td width=10><a href=\"../view/kasir.php?kd_kasir=".$data[0]."&b=".$data[1]."&c=".$data[2]."&d=".$data[3]."&e=".$data[4]."&f=".$data[5]."\">
		<img src=../css/gambar/update.png height=30px width=30px/></a></td>";?>
  <td width=10><a onclick="return confirm('Anda yakin ingin menghapus data <?php echo $data[1]; ?> ?')" href="../proses/busakproses.php?id=<?php echo $data[0]; ?>&opo=kasir"><img src="../css/gambar/delet.png" height=30px width=30px/></a></td></tr><?php
		$ttl = $ttl+1;
	}
	echo "<tr class=ngisor><td colspan=2>Jumlah</td><td align=right>$ttl</td></tr>";
?>
</table>
<?php
include '../template/footer.php'; 
?>