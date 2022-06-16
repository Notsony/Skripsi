<!--<?php
//$host = "localhost";
//$user = "root";
//$pass = "";
//$db_name = "skripsi0005";


//mysql_connect($host, $user, $pass) or die (mysql_error());
//mysql_select_db($db_name) or die (mysql_error());

?>-->

<?php
include_once('fix_mysql.inc.php');
//default Timezone
session_start();

$koneksi=mysqli_connect('localhost','root','','skripsi0005');
if(mysqli_connect_errno()){
	echo mysqli_connect_error();
}


function base_url($url = null) {
	$base_url = "http://localhost/Skripsi";
	if($url != null) {
		return $base_url."/".$url;
	} else {
		return $base_url;
	}
}
?>