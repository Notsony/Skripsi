<?php
//mulai proses tambah data


require_once "koneksi.php";
if(isset($_POST['tambah'])){
	
	//inlcude atau memasukkan file koneksi ke database
	$kode 		= $_POST['kode_pnl'];
	$nik		= $_POST['nik'];
	$judul		= $_POST['judul'];
	$smb_dana	= $_POST['smb_dana'];
	$jml_dana	= $_POST['jml_dana'];
	$proposal	= $_POST['proposal'];
	$akhir		= $_POST['akhir'];
	$tahun		= $_POST['tahun'];

	function redirect($url){
	    $string = '<script type="text/javascript">';
	    $string .= 'window.location = "' .$url. '"';
	    $string .= '</script>';

	    echo $string;
	}
	$host = mysql_connect("localhost","root","");
 	$db = mysql_select_db("skripsi0005");

	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database

	$input = mysql_query("INSERT INTO laporan VALUES(NUll, '$judul', '$smb_dana', '$jml_dana', '$proposal', '$akhir', '$tahun')") or die(mysql_error());
	$input2 = mysql_query[("INSERT INTO daftar_pnl VALUES(NULL, '$nik', '".mysql_insert_id()."'") or die(mysql_error());
	//$hasil = mysqli_multi_query($koneksi, $input);

	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="index-admin-p.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="tambah-pnl.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}
 
}else{	//jika tidak terdeteksi tombol tambah di klik
 
	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';
 
}
?>