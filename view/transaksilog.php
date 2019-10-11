<!----------------- Detail ------------------>
<?php
  include "../template/koneksi.php";
    if(isset($_GET['detail'])){
      $kd_nota = $_GET['id'];
  ?>
<div id="njobo">
  <div id="inputan" class="inputan animate" >
  <span id=batal onclick="metu()" title="Keluar">&times;</span>
  <h2 id=tulisan>Detail Transaksi</h2>
  <table border=0 id="tabel">
    <tr id=ndastabel>
      <td>Kode Barang</td> <td>Jumlah</td> <td>Total</td>
    </tr>
    <tr>
    <?php
    $pilih = "SELECT * FROM detailnota WHERE kd_nota='$kd_nota'";
    $warna = 'zebra1';
    $tampil = mysqli_query($konek, $pilih) or die ("Querynya salah : ".mysqli_error($konek));
    while($data = mysqli_fetch_array($tampil)){
      if($warna=='zebra1'){
        $warna = 'zebra2';
      } else {
        $warna = 'zebra1';
      }
      echo '<tr id='.$warna.'>';
      echo "<td>              ".$data[1]." </td>";
      echo "<td align=right>  ".$data[2]." </td>";
      echo "<td align=right>  ".$data[3]." </td></tr>";
    }
    ?>
  </table>
  </div>
</div>

<script type="text/javascript">
  document.getElementById('njobo').style.display="block";
</script>

<?php
  }
	include "../template/header.php"; ?>
<form>
  <select class="txt">
    <option value="1">Januari</option>
    <option value="2">Februari</option>
  </select>
</form>
<table border=0 id=tabel>
  <tr id=ndastabel>
  <td>Kode Nota</td> <td>Kasir</td> <td>Bruto</td> <td>Disc</td> <td>Total</td> <td>Bayar</td> <td>Kembali</td> <td>Tanggal</td> <td>Waktu</td> <td colspan='2'>Action</td>
</tr>
<tr>
<?php
$pilih = "SELECT * FROM nota";
$warna = 'zebra1';
$tampil = mysqli_query($konek, $pilih) or die ("Querynya salah : ".mysqli_error($konek));
while($data = mysqli_fetch_array($tampil)){
  if($warna=='zebra1'){
    $warna = 'zebra2';
  } else {
    $warna = 'zebra1';
  }
  echo '<tr id='.$warna.'>';
  echo "<td> 				      ".$data[0]." </td>";
  echo "<td>	            ".$data[1]." </td>";
  echo "<td align=right> 	".$data[2]." </td>";
  echo "<td align=right> 	".$data[3]." </td>";
  echo "<td align=right>  ".$data[4]." </td>";
  echo "<td align=right>  ".$data[5]." </td>";
  echo "<td align=right>  ".$data[6]." </td>";
  echo "<td align=right> 	".$data[7]." </td>";
  echo "<td align=right> 	".$data[8]." </td>";
	echo '<td width=10><a href=../view/transaksilog.php?id='.$data[0].'&detail=oke>detail</a></td>'; ?>
  <td width=10><a onclick="return confirm('Anda yakin ingin menghapus data <?php echo $data[0]; ?> ?')" href="../proses/busakproses.php?id=<?php echo $data[0]; ?>&opo=log"><img src="../css/gambar/delet.png" height=30px width=30px/></a></td></tr><?php
  $total1 = $total1+$data[2];
  $total2 = $total2+$data[3];
  $total3 = $total3+$data[4];
  $total4 = $total4+$data[5];
  $total5 = $total5+$data[6];
  $ttl = $ttl+1;
}
$total1 = isset($total1)?$total1:'';
$total2 = isset($total2)?$total2:'';
$total3 = isset($total3)?$total3:'';
$total4 = isset($total4)?$total4:'';
$total5 = isset($total5)?$total5:'';
$ttl = isset($ttl)?$ttl:'';
echo "<tr class=ngisor><td colspan=2>[$ttl] Jumlah</td><td align=right>$total1</td><td align=right>$total2</td><td align=right>$total3</td><td align=right>$total4</td><td align=right>$total5</td></tr>";
?>
</table>
<?php include "../template/footer.php"; ?>
