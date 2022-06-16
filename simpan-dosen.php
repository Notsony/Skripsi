<?php
//mulai proses tambah akun dosen
 
//cek dahulu, jika tombol buat di klik

session_start();
if(isset($_POST['buat'])){
	
	//inlcude atau memasukkan file koneksi ke database
	$nik		= $_POST['nik'];
	$nama		= $_POST['nm_dosen'];
	$prodi		= $_POST['prodi'];
	$status		= $_POST['status'];
	$bidang		= $_POST['bd_minat'];
	$password	= $_POST['password'];
	$foto	    = $_FILES['foto']['name'];

	function redirect($url){
	    $string = '<script type="text/javascript">';
	    $string .= 'window.location = "' .$url. '"';
	    $string .= '</script>';

	    echo $string;
	}
	$host = mysql_connect("localhost","root","");
 	$db = mysql_select_db("skripsi0005");

	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO dosen VALUES('$nik', '$nama', '$prodi', '$status', '$bidang', '$password', '$foto')") or die(mysql_error());
    
    //simpan gambar ke folder
    move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
    //move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="index-admin.php">Kembali</a>';	//membuat Link untuk kembali ke halaman admin
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="tambah-dosen.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}
 
}else{	//jika tidak terdeteksi tombol tambah di klik
 
	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';
 
}
?>