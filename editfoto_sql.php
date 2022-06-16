<?php

require_once "koneksi.php";

  function redirect($url){
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' .$url. '"';
    $string .= '</script>';

    echo $string;

    if(isset($_SESSION['nik'])){}
	else{ redirect('logout.php');}
}

if(isset($_POST['editfoto'])){
	
	//inlcude atau memasukkan file koneksi ke database
	$nik   		= $_POST['nik'];
	$foto   	= $_FILES['foto']['name'];

    $host = mysql_connect("localhost","root","");
    $db   = mysql_select_db("skripsi0005"); 

    //Hapus Foto di Folder
    $pilih = mysql_query("SELECT * FROM dosen WHERE nik= '$nik'");
    $data = mysql_fetch_array($pilih);

    $foto = $data['foto'];
    unlink("foto/".$foto); 

	//melakukan query dengan perintah UPDATE untuk memasukkan data foto baru ke database
	$input = mysql_query("UPDATE dosen SET foto = '$foto' WHERE nik='$nik'") or die(mysql_error());
    
    //simpan gambar baru ke folder
    move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
    //move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
	
	//jika query input sukses
	if($input){
		
		echo 'Foto berhasil di ubah! ';		//Pesan jika proses ubah sukses
		echo '<a href="index-admin.php">Kembali</a>';	//membuat Link untuk kembali ke halaman admin
		
	}else{
		
		echo 'Gagal mengubah foto! ';		//Pesan jika proses ubah gagal
		echo '<a href="editfoto.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}
 
}else{	//jika tidak terdeteksi tombol tambah di klik
 
	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';
 
}
?>