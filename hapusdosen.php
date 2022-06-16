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

   	$nik	= $_GET['delete'];

    $host = mysql_connect("localhost","root","");
    $db   = mysql_select_db("skripsi0005"); 

    //Hapus Foto di Folder
    $pilih = mysql_query("SELECT * FROM dosen WHERE nik= '$nik'");
    $data = mysql_fetch_array($pilih);

    $foto = $data['foto'];
    unlink("foto/".$foto);  

    $update="DELETE FROM dosen where nik='$nik'";
    $exe=mysql_query($update);

    redirect('index-admin.php');
?>

