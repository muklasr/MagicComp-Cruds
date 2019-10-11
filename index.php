<?php session_start(); 
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
body {
	background: url('css/gambar/abc.jpg');
    background-size: 150%;
}
#kotak {
    display: none;
    background-color: #fefefe;
    margin: 90px auto;
    border: 1px solid #888;
    width: 350; 
    padding:20 20 20 20;
    text-align: center;
}
.txt {
    border-radius: 0;
    border: 1px solid #ccc;
    padding: 5 5 5 5;
    margin: 0 0 5 0;
    font-size: 20px;
    width:88%;
    height: 35;
    display: inline-block;
}
i {
	border-top-left-radius: 25%;
	border-bottom-left-radius: 25%;
    background: rgba(0,0,0,0.1);
	padding: 5 5 5 5;
	margin: 0 0 0 0;
	height: 25;
	width: 25;
}
.simpan {
    display: block;
    background: #1de9b6; 
    border-style: ridge; 
    width:98%;
    height: 40px;
    font-weight: bold;
    color: white;
    font-size: 24px;
    margin: 5px auto;
}
.simpan:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.simpan:active {
    background: #00bfa5;
}
.animate {
    -webkit-animation: animatezoom 1s;
    animation: animatezoom 1s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}
</style>

<?php 
include 'template/koneksi.php';
$user = isset($_POST['usr']) ? $_POST['usr'] :'';
if($user){
$kueri = mysqli_query($konek, "SELECT * FROM kasir WHERE nm_kasir='$user'") or die(mysqli_error($konek));
$muk = mysqli_fetch_array($kueri);
 $_SESSION['namauser'] = $muk[1];
  $_SESSION['kduser'] = $muk[0];
if(isset($_SESSION)){header("location:view/Tampil.php");}
}
?>

<title>Masuk</title>
<link rel="icon" type="image/png" href="css/gambar/Crazy.png">
<div id="kotak" class="animate">
	<img src="aa.png" height=250px width=250px/><br><br>
	<form method="POST" action="index.php">
		<big><big><i class="fa fa-user"></i></big></big><input type="text" class="txt" name="usr" placeholder="Nama pengguna" required><br>
		<big><big><i class="fa fa-lock"></i></big></big><input type="password" class="txt" name="pw" placeholder="Kata sandi" minlength="5" required><br>
		<input type="submit" name="login" class="simpan" value="Masuk">
	</form>
</div>

<script type="text/javascript">
    document.getElementById('kotak').style.display="block";
</script>