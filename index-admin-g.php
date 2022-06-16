<!DOCTYPE html>
<html>
<?php 
if (isset($_POST['tahun'])){
$awal=$_POST['tahun'];


}else{
	$awal= date("Y");
}

require_once "koneksi.php";
function redirect($url){
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' .$url. '"';
    $string .= '</script>';

    echo $string;
}


if(isset($_SESSION['nik'])){}
	else{ redirect('logout.php');}

?>
<head>
	<title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="css/styles.css">-->
	<link rel="stylesheet" href="css/W3.css">
	<link rel="stylesheet" href="css/dashboard3.css">
	<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--GRAFIKNYA-->
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
	<nav class="w3-black">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
		  		<li class><a href="index-admin.php">Data Dosen <span class="sr-only">(current)</span></a></li>
				<li class><a href="index-admin-p.php" >Data Penelitian <span class="sr-only">(current)</span></a></li>
				<li class="w3-orange"><a href="index-admin-g.php">Grafik <span class="sr-only">(current)</span></a></li>
		  </ul>

		  <ul class="nav navbar-nav navbar-right">
			<li>
				<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<?php
                	$nik=$_SESSION['nik'];
                	$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
                	while($baris = mysqli_fetch_array($select)){
                	?>

                	<?php
						echo "Hi, ".$baris['nm_dosen']."<br>";
					}
					?>
				</a>
			</li>
			<li><a href="logout.php">Logout</a></li>
		  </ul>

		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<!--selesai-->
	<div class="col-md-12">
	
	<h2> Dashboard Admin</h2>
										<div>
	                                        <form action="index-admin-g.php" method="post">
	                                       	<br>
	                                       	<?php

	                                          echo "Pilih Tahun awal <b>(Min: 2013)</b>"
	                                       	?>
	                                       	<input type="number" name="tahun" min="2013" max="3000"/>
	                                       	<input type="submit" name="submit" value="Pilih"/>
	                                        </form>
										</div>

	<div class="col-md-12">
		<div class="container emp-profile">

			<label>Kontribusi Penelitian (Sumber Dana berdasarkan Prodi Sistem Informasi)</label>
			    <div>
				    <canvas id="myChart1"></canvas>
			    </div> 
		    <br><br>
			<label>Kontribusi Penelitian (Bidang Minat berdasarkan Prodi Sistem Informasi)</label>
				<div>
					<canvas id="myChart2"></canvas>
				</div> 
			<br><br>
			<label>Kontribusi Penelitian (Bidang Minat berdasarkan Prodi Informatika)</label>
				<div>
					<canvas id="myChart3"></canvas>
				</div> 
			<br><br>
			<label>Kontribusi Penelitian (Bidang Minat berdasarkan Prodi Informatika)</label>
				<div>
					<canvas id="myChart4"></canvas>
				</div> 
			<br><br>
		</div>
	</div>

<script>
        <?php
		$nik=$_SESSION['nik'];
		$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
		while($baris = mysqli_fetch_array($select)){
		?>

		var ctx1 = document.getElementById("myChart1").getContext('2d');
		var myChart = new Chart(ctx1, {
			type: 'line',
			data: {
				labels: ["2013", "2014", "2015", "2016", "2017"],
				datasets: [
				{
					label: 'LPPM',
					data: [
				<?php
					$lppm_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2013' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2014' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php 
					$lppm_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2015' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi= 'Sistem Informasi' and tahun='2016' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2017' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2017)){
						echo $baris2['SUM(jml_dana)'];}
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				},
				{

				label : 'FTI',
				data : [<?php
					$fti_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2013' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2014' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2015' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2016' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php
					$fti_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2017' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2017)){
						echo $baris2['SUM(jml_dana)'];}
					?>],
				backgroundColor : [
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)"
				],
				borderColor : [
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)"
				],
				borderWidth : 1
			   }


				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
		
			}
		});
  		<?PHP } ?>
</script>


<script>
        <?php
		$nik=$_SESSION['nik'];
		$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
		while($baris = mysqli_fetch_array($select)){
		?>

		var ctx1 = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx1, {
			type: 'line',
			data: {
				labels: ["2013", "2014", "2015", "2016", "2017"],
				datasets: [
				{
					label: 'Analisis',
					data: [
				<?php
					$an_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2013' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2013);
					?>,
					<?php 
					$an_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2014' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2014);
					?>, 
					<?php 
					$an_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2015' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2015);
					?>,
					<?php 
					$an_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2016' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2016);
					?>,
					<?php 
					$an_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2017' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2017);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				},
				{

				label : 'Programming',
				data : [<?php
					$pr_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2013' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2013);
					?>,
					<?php 
					$pr_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2014' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2014);
					?>, 
					<?php 
					$pr_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2015' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2015);
					?>,
					<?php 
					$pr_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2016' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2016);
					?>,
					<?php 
					$pr_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2017' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2017);
					?>],
				backgroundColor : [
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)"
				],
				borderColor : [
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)"
				],
				borderWidth : 1
			   },
			   {
					label: 'Statistika',
					data: [
				<?php
					$st_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2013' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2013);
					?>,
					<?php 
					$st_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2014' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2014);
					?>, 
					<?php 
					$st_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2015' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2015);
					?>,
					<?php 
					$st_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2016' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2016);
					?>,
					<?php 
					$st_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='2017' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2017);
					?>
					],
					backgroundColor: [
					'rgba(255, 255, 0, 0.2)',
					'rgba(255, 255, 0, 0.2)',
					'rgba(255, 255, 0, 0.2)',
					'rgba(255, 255, 0, 0.2)',
					'rgba(255, 255, 0, 0.2)'
					],
					borderColor: [
					'rgba(255,225,0,1)',
					'rgba(255,225,0,1)',
					'rgba(255,225,0,1)',
					'rgba(255,225,0,1)',
					'rgba(255,225,0,1)'
					],
					borderWidth: 1
				}


				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
		
			}
		});
  		<?PHP } ?>
</script>

<script>
        <?php
		$nik=$_SESSION['nik'];
		$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
		while($baris = mysqli_fetch_array($select)){
		?>

		var ctx1 = document.getElementById("myChart3").getContext('2d');
		var myChart = new Chart(ctx1, {
			type: 'line',
			data: {
				labels: ["2013", "2014", "2015", "2016", "2017"],
				datasets: [
				{
					label: 'LPPM',
					data: [
				<?php
					$lppm_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2013' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2014' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php 
					$lppm_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2015' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi= 'Informatika' and tahun='2016' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2017' and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2017)){
						echo $baris2['SUM(jml_dana)'];}
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				},
				{

				label : 'FTI',
				data : [<?php
					$fti_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2013' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2014' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2015' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2016' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php
					$fti_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2017' and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2017)){
						echo $baris2['SUM(jml_dana)'];}
					?>],
				backgroundColor : [
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)"
				],
				borderColor : [
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)"
				],
				borderWidth : 1
			   }


				]
			},
			options: {
		
			}
		});
  		<?PHP } ?>
</script>


<script>
        <?php
		$nik=$_SESSION['nik'];
		$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
		while($baris = mysqli_fetch_array($select)){
		?>

		var ctx1 = document.getElementById("myChart4").getContext('2d');
		var myChart = new Chart(ctx1, {
			type: 'line',
			data: {
				labels: ["2013", "2014", "2015", "2016", "2017"],
				datasets: [
				{
					label: 'Analisis',
					data: [
				<?php
					$an_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2013' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2013);
					?>,
					<?php 
					$an_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2014' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2014);
					?>, 
					<?php 
					$an_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2015' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2015);
					?>,
					<?php 
					$an_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2016' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2016);
					?>,
					<?php 
					$an_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2017' and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2017);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				},
				{

				label : 'Programming',
				data : [<?php
					$pr_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2013' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2013);
					?>,
					<?php 
					$pr_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2014' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2014);
					?>, 
					<?php 
					$pr_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2015' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2015);
					?>,
					<?php 
					$pr_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2016' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2016);
					?>,
					<?php 
					$pr_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2017' and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2017);
					?>],
				backgroundColor : [
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)"
				],
				borderColor : [
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)"
				],
				borderWidth : 1
			   },
			   {
					label: 'Statistika',
					data: [
				<?php
					$st_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2013' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2013);
					?>,
					<?php 
					$st_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2014' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2014);
					?>, 
					<?php 
					$st_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2015' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2015);
					?>,
					<?php 
					$st_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2016' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2016);
					?>,
					<?php 
					$st_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='2017' and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2017);
					?>
					],
					backgroundColor: [
					'rgba(255, 255, 0, 0.2)',
					'rgba(255, 255, 0, 0.2)',
					'rgba(255, 255, 0, 0.2)',
					'rgba(255, 255, 0, 0.2)',
					'rgba(255, 255, 0, 0.2)'
					],
					borderColor: [
					'rgba(255,225,0,1)',
					'rgba(255,225,0,1)',
					'rgba(255,225,0,1)',
					'rgba(255,225,0,1)',
					'rgba(255,225,0,1)'
					],
					borderWidth: 1
				}


				]
			},
			options: {
		
			}
		});
  		<?PHP } ?>
</script>

</body>
</html>