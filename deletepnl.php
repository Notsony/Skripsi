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

   	$id	= $_GET['delete'];

    $host = mysql_connect("localhost","root","");
    $db   = mysql_select_db("skripsi0005"); 

    $update="DELETE FROM daftar_pnl where id='$id'";
    $exe=mysql_query($update);

    redirect('index-admin-p.php');
?>

