<?php
	include "../template/header.php";
	include "../template/koneksi.php";?>
	<div class=transaksi>
	<form method=post action=../proses/transaksiProses.php>
	<table>
		<tr>
<?php
	if(!isset($_SESSION['kn'])){
		$kuerii = mysqli_query($konek,"SELECT MAX(right(kd_nota,4)) FROM nota") or die(mysqli_error($konek));
		$kode = mysqli_fetch_row($kuerii);
		$jml = $kode[0];	
		$jml = $jml+1;	
		$panjang = strlen($jml);
		if($panjang==1){ $kode1="N000".$jml; }
		else if($panjang==2){ $kode1="N00".$jml; }
		else if($panjang==3){ $kode1="N0".$jml; }
		else if($panjang==4){ $kode1="N".$jml; }
		else { echo "Error!"; }
		$_SESSION['kn'] = $kode1;
	}
	$jam = date('G:i');
	echo "<tr><td>Kode Nota </td><td>:</td><td>".$_SESSION['kn']."</td></tr><tr><td>Jam		 </td><td>:</td><td>".$jam."</td></tr><tr><td>Kasir  </td><td>:</td><td>".$_SESSION['namauser']."</td></tr></table>";
	echo "<input type=hidden name=kd_nota value=".$_SESSION['kn'].">";
	echo "<input type=hidden name=kd_kasir value=".$_SESSION['kduser'].">";
?>
	<a href=../view/transaksilog.php class="btnTambah tg">Delok log</a>
<table border=0 id=tabel>
	<tr id=ndastabel>
    <td>Kode Barang</td> <td width=350>Nama Barang</td> <td>Harga Satuan</td> <!-- <td width=150>Potongan</td> --> <td>Jumlah</td> <td>SubTotal</td>
  </tr>
<?php

	$warna = "zebra1";
	$sikil = mysqli_query($konek, "SELECT * FROM detailnota WHERE kd_nota='$_SESSION[kn]'") or die(mysqli_error($konek));
	while($hasile=mysqli_fetch_array($sikil)){
	if($warna=="zebra1"){
		$warna="zebra2";
	} else {
		$warna="zebra1";
	}

  	$kuerine = mysqli_query($konek, "SELECT nm_barang,harga FROM barang WHERE kd_barang='$hasile[1]'") or die(mysqli_error($konek));
	  $hasil = mysqli_fetch_array($kuerine);
	  
    echo "<tr id=".$warna.">
    		<td>$hasile[1]</td>
    		<td>$hasil[0]</td>
    		<td align=right>".number_format($hasil[1])."</td>
    		<td align=center>$hasile[2]</td>
    		<td align=right>".number_format($hasile[3])."</td></tr>";
    }
    $sikil2 = mysqli_query($konek, "SELECT total_harga FROM detailnota WHERE kd_nota='$_SESSION[kn]'") or die(mysqli_error($konek));
	while($hasile2=mysqli_fetch_array($sikil2)){
		$ttl=$ttl+$hasile2[0];
	}
?>
	<tr class=ngisor>	
	<td><input type="text" class="txt mumuk" name=kd required></td><td></td><td></td>
	<td><input type="text" class="txt mumuk" name=qty required>&nbsp;<input type="submit" style="display: none" name="go" value="&plus;"></td><td></td>
	</tr></form>
	<form method="POST" action="../proses/transaksiProses.php">
	<!-- <input type="hidden" name="tbruto" value=<?php echo isset($tbruto); ?>>
	<input type="hidden" name="tdisc" value=<?php echo isset($tdisc); ?>> -->
	<input type="hidden" name="ttl" value=<?php echo isset($ttl); ?>>
	<tr class=ngisor>	<td colspan=2></td><td>Total Bayar : </td><td></td><td align="right"><?php echo number_format($ttl); ?><br></td></tr>
	<tr class=ngisor>	<td colspan=2></td><td>Uang Bayar : </td><td></td><td align="right"><input type=text class="txt" name=bayar id=disc></td></tr>
	<tr class=ngisor>	<td colspan=2></td><td>Uang Kembali : </td><td></td><td align="right"><?php echo number_format(isset($susuk)); ?></td></tr>
	</form>
</table>
</div>
<?php
include "../template/footer.php"; ?>
