<?php
//mulai proses tambah akun dosen
 
//cek dahulu, jika tombol buat di klik

require_once "koneksi.php";

  function redirect($url){
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' .$url. '"';
    $string .= '</script>';

    echo $string;

    if(isset($_SESSION['nik'])){}
	else{ redirect('logout.php');}
}

if(isset($_POST['edit'])){
	
	//inlcude atau memasukkan file koneksi ke database
	$nik   		= $_POST['nik'];
	$nama		= $_POST['nm_dosen'];
	$prodi		= $_POST['prodi'];
	$status		= $_POST['status'];
	$bidang		= $_POST['bd_minat'];
	$password	= $_POST['password'];
	//$fotobaru	= $_FILES['foto']['name'];


    $host = mysql_connect("localhost","root","");
    $db   = mysql_select_db("skripsi0005"); 

	//melakukan query dengan perintah INSERT INTO untuk memasukkan data baru ke database
	$input = mysql_query("UPDATE dosen SET nik = '$nik', nm_dosen = '$nama', prodi='$prodi', status='$status', bd_minat='$bidang', password= '$password' WHERE nik='$nik'") or die(mysql_error());
    
    //simpan gambar baru ke folder
    //move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
    //move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di ubah! ';		//Pesan jika proses ubah sukses
		echo '<a href="index-admin.php">Kembali</a>';	//membuat Link untuk kembali ke halaman admin
		
	}else{
		
		echo 'Gagal menambahkan ubah! ';		//Pesan jika proses ubah gagal
		echo '<a href="editdosen.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}
 
}else{	//jika tidak terdeteksi tombol tambah di klik
 
	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';
 
}
?>