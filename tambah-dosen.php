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
	<title>Tambah Akun Dosenn</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<p><a href="index-admin.php">Kembali</a></p>
	
	<h3>Tambah Akun Dosen</h3>
	
	<form action="simpan-dosen.php" method="post" enctype="multipart/form-data">
		<table cellpadding="3" cellspacing="0">

			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<input type="text" name="nik" required>
				</td>
			</tr>

			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nm_dosen" required></td>
			</tr>

			<tr>
				<td>Prodi</td>
				<td>:</td>
				<td>
					<input type="radio" name="prodi" value="Sistem Informasi">Sistem Informasi
					<input type="radio" name="prodi" value="Informatika" checked>Informatika
				</td>
			</tr>
			
			<tr>
				<td>Status</td>
				<td>:</td>
				<td>
					<input type="radio" name="status" value="Dosen" checked>Dosen
					<input type="radio" name="status" value="Kaprodi">Kaprodi
					<input type="radio" name="status" value="Dekan">Dekan
				</td>
			</tr>

			<tr>
				<td>Bidang Minat</td>
				<td>:</td>
				<td>
				<select name="bd_minat">
					<option value="Analisis">Analisis</option>
					<option value="Programming">Programming</option>
					<option value="Statistik">Statistik</option>
				</select>
				</td>
			</tr>

			<tr>
				<td>Password</td>
				<td>:</td>
				<td>
					<input type="password" name="password" required>
				</td>
			</tr>

			<tr>
				<td>Foto</td>
				<td>:</td>
				<td>
					<input type="file" name="foto" value="Add Image">
				</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="buat" value="Buat"></td>
			</tr>
		</table>
	</form>
</body>
</html>