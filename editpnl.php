<p><a href="index-admin-p.php">Kembali</a>
<form method ="POST" action="editpnl_sql.php">
<?php
	$id	      =$_GET['id'];
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("skripsi0005") or die("Database tidak ditemukan");
	$querynya = mysql_query("Select * from pnl_dosen where id = '$id'");
	$ab = mysql_fetch_assoc($querynya);
	$nik          =$ab['nik'];
   	$judul	      =$ab['judul'];
   	$smb_dana	  =$ab['smb_dana'];
   	$jml_dana	  =$ab['jml_dana'];
   	$proposal	  =$ab['proposal'];
   	$akhir		  =$ab['akhir'];
   	$tahun        =$ab['tahun']
?>
<h3>Edit Penelitian Dosen</h3>

<form method ="POST" action="editpnl_sql.php">
<table cellpadding="3" cellspacing="0">

<tr><td>No.Penelitian</td><td><input type="hidden" name="id" 
value="<?=$id?>"/><?=$id?></td></tr>	

<tr><td width=120>NIK </td><td><input type="hidden" name="nik" 
value="<?=$nik?>"/><?=$nik?></td></tr>

<tr><td>Judul</td><td><input type="text" name="judul"
value="<?=$judul?>" ></td></tr>

<tr><td>Sumber Dana</td>
<td>
<?php
	if ($smb_dana == "LPPM")
	{
		echo "<input type='radio' name='smb_dana' value='LPPM'checked>LPPM";
		echo "<input type='radio' name='smb_dana' value='FTI'>FTI";
	}
	elseif ($smb_dana == "FTI")
	{
		echo "<input type='radio' name='smb_dana' value='LPPM'>LPPM";
		echo "<input type='radio' name='smb_dana' value='FTI'checked>FTI";
	}
	
?>
</td></tr>

<tr><td>Total</td><td><input type="text" name="jml_dana"
value="<?=$jml_dana?>" ></td></tr>

<tr><td>Berkas Proposal ?</td>
<td>
<?php
	if ($proposal == "V")
	{
		echo "<input type='radio' name='proposal' value='V'checked>V";
		echo "<input type='radio' name='proposal' value=''>";
	}
	elseif ($proposal == "")
	{
		echo "<input type='radio' name='proposal' value='V'>V";
		echo "<input type='radio' name='proposal' value=''checked>";
	}
	
?>
</td></tr>

<tr><td>Berkas Laporan ?</td>
<td>
<?php
	if ($akhir == "V")
	{
		echo "<input type='radio' name='akhir' value='V'checked>V";
		echo "<input type='radio' name='akhir' value=''>";
	}
	elseif ($akhir == "")
	{
		echo "<input type='radio' name='akhir' value='V'>V";
		echo "<input type='radio' name='akhir' value=''checked>";
	}
	
?>
</td></tr>

<tr><td>Tahun</td>
<td>
<?PHP
	$ntahun = array("2013","2014","2015","2016","2017");
		echo"<select name=tahun>";
		foreach($ntahun as $nilai)
		if($nilai==$tahun)
			echo "<option value='$nilai' selected>$nilai</option>";
		else
			echo "<option value='$nilai'>$nilai</option>";
		echo "</select>";
?>
</td></tr>

<tr><th colspan=2>
<input type="submit" name="editp" value="SUBMIT"></th></tr>
	
</table>
</form>
