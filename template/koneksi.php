<?php
$host='127.0.0.1';    $db='toko';
$user='root';         $pw='';
//echo "hose $_GET['$host']";
//$konek=mysql_connect($_GET['host'],$_GET['user'],$_GET['pw']) or die(mysql_error());
$konek=mysqli_connect($host,$user,$pw, $db);
// if($konek&&$selekdb){echo "	<table border=1><tr align=center bgcolor=cyan><td colspan=4 >SAMPUN KONEK</td></tr>
// 							<tr align=center><td>Host</td><td>User</td><td>Password</td><td>Database</td></tr>
// 							<tr align=center><td>$host</td><td>$user</td><td>$pw</td><td>$db</td></tr></table>";}
// else{echo "Mboten konek";}
?>