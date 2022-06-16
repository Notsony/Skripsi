<!DOCTYPE html>
<html>
<head>
	<?php 
	require_once "koneksi.php";
	function redirect($url){
	    $string = '<script type="text/javascript">';
	    $string .= 'window.location = "' .$url. '"';
	    $string .= '</script>';

	    echo $string;
	}

	?>
	<title>Tambah Data Penelitian</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<p><a href="index-admin-p.php">Kembali</a></p>
	
	<h3>Tambah Penelitian Dosen</h3>
	
	<form action="simpan-pnl.php" method="post">
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>Isilah dengan Lengkap!!</td>
				<td><input type="hidden" name="id"></td>
			</tr>

			<tr>
				<td>-----------------------</td>
				<td><input type="hidden" name="kode_pnl"></td>
			</tr>

			<tr>
				<?php
					$select = mysqli_query($koneksi, "SELECT * FROM dosen;");
				?>
				<td>NIK</td>
				<td>:</td>
				<td>
				<select name="nik">
					<option>--NIK Dosen--</option>
					<?php if (mysqli_num_rows($select) > 0) {
		                while($baris = mysqli_fetch_array($select)){ ?>
		             		<option><?php echo $baris['nik']?></option>
                                            
                        <?PHP } ?>
                    <?PHP } ?>
				</select>
				</td>
			</tr>

			<tr>
				<td>Judul</td>
				<td>:</td>
				<td><input type="text" name="judul" required></td>
			</tr>

			<tr>
				<td>Sumber Dana</td>
				<td>:</td>
				<td>
					<input type="radio" name="smb_dana" value="LPPM">LPPM
					<input type="radio" name="smb_dana" value="FTI" checked>FTI
				</td>
			</tr>
			
			<tr>
				<td>Total Dana</td>
				<td>:</td>
				<td><input type="text" name="jml_dana" required></td>
			</tr>

			<tr>
				<td>Berkas Proposal ?</td>
				<td>:</td>
				<td>
					<input type="radio" name="proposal" value="V">Ada
					<input type="radio" name="proposal" value="" checked>Tidak ada
				</td>
			</tr>

			<tr>
				<td>Berkas Laporan Akhir ?</td>
				<td>:</td>
				<td>
					<input type="radio" name="akhir" value="V">Ada
					<input type="radio" name="akhir" value="" checked>Tidak ada
				</td>
			</tr>

			<tr>
				<td>Tahun</td>
				<td>:</td>
				<td>
				<select name="tahun">
					<option value="2013">2013</option>
					<option value="2014">2014</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					<option value="2029">2029</option>
					<option value="2030">2030</option>
				</select>
				</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
		</table>
	</form>
</body>
</html>