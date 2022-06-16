<!--<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?PHP
	//setcookie("nik","");
	//setcookie("password","");
	//header("Location:login.php");

?>

</body>
</html>-->

<?php
include_once('fix_mysql.inc.php');
session_start();
 session_destroy();



   $host = mysql_connect("localhost","root","");
    $db = mysql_select_db("skripsi0005");




function redirect($url){
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' .$url. '"';
    $string .= '</script>';

    echo $string;
}

redirect('index-home.php')
 ?>