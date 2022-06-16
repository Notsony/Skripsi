<p><a href="index-admin.php">Kembali</a>
<form method ="POST" action="editdosen_sql.php">
<?php
	$nik	          =$_GET['nik'];
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("skripsi0005") or die("Database tidak ditemukan");
	$querynya = mysql_query("Select * from dosen where nik = '$nik'");
	$ab = mysql_fetch_assoc($querynya);
   	$nm_dosen	      =$ab['nm_dosen'];
   	$prodi	          =$ab['prodi'];
   	$status	          =$ab['status'];
   	$bd_minat	   	  =$ab['bd_minat'];
   	$password		  =$ab['password'];
   	//$foto             =$ab['foto'];

?>
<h3>Edit Akun Dosen</h3>

<form method ="POST" action="editdosen_sql.php" enctype="multipart/form-data">
<table cellpadding="3" cellspacing="0">

<tr><td width=120>NIK </td><td><input type="hidden" name="nik" 
value="<?=$nik?>"/><?=$nik?></td></tr>

<tr><td>Nama</td><td><input textarea name="nm_dosen" cols="45" rows="5"
value="<?=$nm_dosen?>" ></td></tr>

<tr><td>Prodi</td>
<td>
<?php
	if ($prodi == "Sistem Informasi")
	{
		echo "<input type='radio' name='prodi' value='Sistem Informasi'checked>Sistem Informasi";
		echo "<input type='radio' name='prodi' value='Informatika'>Informatika";
	}
	elseif ($prodi == "Informatika")
	{
		echo "<input type='radio' name='prodi' value='Sistem Informasi'>Sistem Informasi";
		echo "<input type='radio' name='prodi' value='Informatika'checked>Informatika";
	}
	
?>
</td></tr>

<tr><td>Status</td>
<td>
<?php
	if ($status == "Dosen")
	{
		echo "<input type='radio' name='status' value='Dosen'checked>Dosen";
		echo "<input type='radio' name='status' value='Kaprodi'>Kaprodi";
		echo "<input type='radio' name='status' value='Dekan'>Dekan";
	}
	elseif ($status == "Kaprodi")
	{
		echo "<input type='radio' name='status' value='Dosen'>Dosen";
		echo "<input type='radio' name='status' value='Kaprodi'checked>Kaprodi";
		echo "<input type='radio' name='status' value='Dekan'>Dekan";
	}
	elseif ($status == "Dekan")
	{
		echo "<input type='radio' name='status' value='Dosen'>Dosen";
		echo "<input type='radio' name='status' value='Kaprodi'>Kaprodi";
		echo "<input type='radio' name='status' value='Dekan'checked>Dekan";
	}
	
?>
</td></tr>

<tr><td>Bidang</td>
<td>
<?PHP
	$bidang = array("Analisis","Programming","Statistik");
		echo"<select name=bd_minat>";
		foreach($bidang as $nilai)
		if($nilai==$bd_minat)
			echo "<option value='$nilai' selected>$nilai</option>";
		else
			echo "<option value='$nilai'>$nilai</option>";
		echo "</select>";
?>
</td></tr>

<tr><td>Password</td><td><input type="password" name="password"
value="<?=$password?>"></td></tr>

<!--<tr><td>Foto</td>
	<td>
		<?php //echo "<img src='foto/".$ab['foto']."' width='254px' height='220px'/>"?>
		<input type="file" name="foto" value="Add New Image">
	</td>
</tr>-->


<tr><th colspan=2>
<input type="submit" name="edit" value="SUBMIT"></th></tr>
	
</table>
</form>
