<?php
include_once('fix_mysql.inc.php');

require_once "koneksi.php";
function redirect($url){
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' .$url. '"';
    $string .= '</script>';

    echo $string;
}

 $host = mysql_connect("localhost","root","");
 $db = mysql_select_db("skripsi0005");
 $nik=$_POST['nik'];
 $password=($_POST['password']);

 $check="SELECT * from dosen where nik='$nik' and password='$password'";

 $result=mysql_query($check);

 if(mysql_num_rows($result)== 0 ){
    $_SESSION['error'] = 'Error: Nama atau Password salah &nbsp;';
 	redirect('index-home.php');
 }elseif(mysql_num_rows($result)== 1){

    $host = mysql_connect("localhost","root","");
    $db = mysql_select_db("skripsi0005");

    $nik=$_POST['nik'];
    $_SESSION['nik'] = $nik;
    $select2 = mysql_query($koneksi, "SELECT * from dosen where nik='$nik' and password='$password'");
    while($row = mysql_fetch_array($select2)){

        $status = $row['status'];

        if ($status == "Dosen")
        {
            redirect('index-dosensi.php');
        }
        elseif ($status == "Kaprodi")
        {
            redirect('index-kaprodi.php');
        }
        elseif ($status == "Dekan")
        {
            redirect('index-dekan.php');
        }
        elseif ($status == "Admin")
        {
            redirect('index-admin.php');
        }
    }        
}
?>