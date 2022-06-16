<p><a href="index-admin.php">Kembali</a>
<form method ="POST" action="editfoto_sql.php">
<?php
	$nik	          =$_GET['nik'];
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("skripsi0005") or die("Database tidak ditemukan");
	$querynya = mysql_query("Select * from dosen where nik = '$nik'");
	$ab = mysql_fetch_assoc($querynya);
   	$foto             =$ab['foto'];

?>
<h3>Ubah Foto Dosen</h3>

<form method ="POST" action="editdosen_sql.php" enctype="multipart/form-data">
<table cellpadding="3" cellspacing="0">

<tr><td width=120>NIK </td><td><input type="hidden" name="nik" 
value="<?=$nik?>"/><?=$nik?></td></tr>

<tr><td>Foto</td>
	<td>
		<?php echo "<img src='foto/".$ab['foto']."' width='254px' height='220px'/>"?>
		<input type="file" name="foto" value="<?=$foto?>">
	</td>
</tr>

<tr><th colspan=2>
<input type="submit" name="editfoto" value="SUBMIT"></th></tr>
	
</table>
</form>
