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
	<title>Penelitian Dekan</title>
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
		  		<li class><a href="index-dekan.php">Pribadi <span class="sr-only">(current)</span></a></li>
				<li class="w3-orange"><a href="index-dekan-s.php">Biaya Penelitian Fakultas <span class="sr-only">(current)</span></a></li>
				<li class><a href="index-dekan-t.php">Bidang Minat Fakultas <span class="sr-only">(current)</span></a></li>
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
	

	<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <?php
								$nik=$_SESSION['nik'];
								$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
								while($baris = mysqli_fetch_array($select)){
									echo '<img src="foto/'.$baris['foto'].'" width="254px" height="220px"/>';
								}
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                        			<?php 
											if(isset($_SESSION['message'])):?>

											<div class="alert alert-<?=$_SESSION['msg_type']?>">
											<?php
												echo $_SESSION['message'];
												unset ($_SESSION['message']);
											?>
											</div>
									<?php endif ?>
									<?php
										$nik=$_SESSION['nik'];
										$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
										while($baris = mysqli_fetch_array($select)){
										?>
											<h1>
		                                        <?php echo $baris['nm_dosen']?>
		                                    </h1>
		                                    <h4>
		                                        <?php echo $baris['status']?> &nbsp;
		                                    </h4>
                                            
                                        <?PHP } ?>

                                        <div>
	                                        <form action="index-dekan-s.php" method="post">
	                                       	<br>
	                                       	<?php

	                                          echo "Pilih Tahun akhir"
	                                       	?>
	                                       	<input type="number" name="tahun" min="2013" max="3000"/>
	                                       	<input type="submit" name="submit" value="Pilih"/>
	                                        </form>
										</div>

                        </div>
                    </div>
                    <!--<div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>-->
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
										<div class='row'>

											
											<?php 
											if(isset($_SESSION['message'])):?>

											<div class="alert alert-<?=$_SESSION['msg_type']?>">
											<?php
												echo $_SESSION['message'];
												unset ($_SESSION['message']);
											?>
											</div>
											<?php endif ?>

											
                                             <div class='col-md-6'>
                                             	<br>
                                                <label>NIK</label>
												<br>
												<label>Prodi</label>
												<br>
												<label>Bidang</label>
												<br>
												<label>Status</label>
                                            </div>
                                            <div class='col-md-2'>
                                            	<br>

											<?php
											$nik=$_SESSION['nik'];
											$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
											while($baris = mysqli_fetch_array($select)){
											?>
												<p><?php echo $baris['nik']?></p>
												<p><?php echo $baris['prodi']?></p>
												<p><?php echo $baris['bd_minat']?></p>
												<p><?php echo $baris['status']?></p>
                                            
                                              <?PHP } ?>

											</div>
                                        </div>
										
                        </div>
                    </div>
                        <div class="col-md-8">
        
										<label>Kontribusi Penelitian (Sumber Dana dari LPPM)</label>
										<div>
											<canvas id="myChart2"></canvas>
										</div> 
										<br>
										<label>Kontribusi Penelitian (Sumber Dana dari FTI)</label>
										<div>
											<canvas id="myChart3"></canvas>
										</div>
										<label>Kontribusi Penelitian (Sumber Dana dari Pribadi)</label>
										<div>
											<canvas id="myChart4"></canvas>
										</div> 
										<br>
										<label>Kontribusi Penelitian (Sumber Dana dari Luar Negeri)</label>
										<div>
											<canvas id="myChart5"></canvas>
										</div> 
		            
                         </div>
                 </div>
            </form>           
        </div>
	
	<br/>
	<table class="w3-table-all w3-medium" border="3">

        <?php 
        if(isset($_SESSION['message'])):?>

        <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        ?>
        </div>
        <?php endif ?>
        
        <thead>
        	<tr class="w3-black">
	          <th>Nama</th>
	          <th>Judul</th>
	          <th>Prodi</th>
	          <th>Asal Dana</th>
	          <th>Total Dana</th>
	          <th>Proposal</th>
	          <th>Laporan</th>
	          <th>Tahun</th>
         	</tr>
        </thead>
            <tbody>
                <?php
                $nik=$_SESSION['nik'];
                $select = mysqli_query($koneksi, "SELECT * FROM daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik ORDER BY laporan.tahun DESC");
                while($baris = mysqli_fetch_array($select)){
                ?>

                <tr class="w3-dark-grey">
                    <td><?php echo $baris['nm_dosen']?></td>
                    <td><?php echo $baris['judul']?></td>
                    <td><?php echo $baris['prodi']?></td>
                    <td><?php echo $baris['smb_dana']?></td>
                    <td><?php echo " Rp. ".number_format($baris['jml_dana'], 0, ".", ".")?></td>
                    <td><?php echo $baris['proposal']?></td>
                    <td><?php echo $baris['akhir']?></td>
                    <td><?php echo $baris['tahun']?></td>	
                </tr>
                <?php }?>
               
            </tbody>

<script>
        <?php
		$nik=$_SESSION['nik'];
		$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
		while($baris = mysqli_fetch_array($select)){
		?>

		var ctx1 = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx1, {
			type: 'bar',
			data: {
				labels: [
				<?php if($awal){?>
					<?php echo $awal-4; ?>, <?php echo $awal-3; ?>, <?php echo $awal-2; ?>, <?php echo $awal-1; ?>, <?php echo $awal; ?>
				
				<?php } else {?>

				"2013", "2014", "2015", "2016", "2017"

			<?php }?>

				],
				datasets: [
				{
					label: 'Sistem Informasi',
					data: [
				<?php
					$lppm_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-4 and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-3 and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php 
					$lppm_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-2 and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-1 and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($lppm_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal' and smb_dana='LPPM'");
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

				label : 'Informatika',
				data : [<?php
					$fti_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-4 and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($fti_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-3 and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($fti_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-2 and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($fti_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-1 and smb_dana='LPPM'");
					while($baris2 = mysqli_fetch_array($fti_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php
					$fti_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal' and smb_dana='LPPM'");
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

		var ctx1 = document.getElementById("myChart3").getContext('2d');
		var myChart = new Chart(ctx1, {
			type: 'bar',
			data: {
				labels: [
				<?php if($awal){?>
					<?php echo $awal-4; ?>, <?php echo $awal-3; ?>, <?php echo $awal-2; ?>, <?php echo $awal-1; ?>, <?php echo $awal; ?>
				
				<?php } else {?>

				"2013", "2014", "2015", "2016", "2017"

			<?php }?>

				],
				datasets: [
				{
					label: 'Sistem Informasi',
					data: [
				<?php
					$lppm_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-4 and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($lppm_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-3 and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($lppm_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php 
					$lppm_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-2 and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($lppm_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-1 and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($lppm_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal' and smb_dana='FTI'");
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

				label : 'Informatika',
				data : [<?php
					$fti_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-4 and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-3 and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-2 and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-1 and smb_dana='FTI'");
					while($baris2 = mysqli_fetch_array($fti_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php
					$fti_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal' and smb_dana='FTI'");
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

		var ctx1 = document.getElementById("myChart4").getContext('2d');
		var myChart = new Chart(ctx1, {
			type: 'bar',
			data: {
				labels: [
				<?php if($awal){?>
					<?php echo $awal-4; ?>, <?php echo $awal-3; ?>, <?php echo $awal-2; ?>, <?php echo $awal-1; ?>, <?php echo $awal; ?>
				
				<?php } else {?>

				"2013", "2014", "2015", "2016", "2017"

			<?php }?>

				],
				datasets: [
				{
					label: 'Sistem Informasi',
					data: [
				<?php
					$lppm_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-4 and smb_dana='Pribadi'");
					while($baris2 = mysqli_fetch_array($lppm_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-3 and smb_dana='Pribadi'");
					while($baris2 = mysqli_fetch_array($lppm_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php 
					$lppm_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-2 and smb_dana='Pribadi'");
					while($baris2 = mysqli_fetch_array($lppm_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-1 and smb_dana='Pribadi'");
					while($baris2 = mysqli_fetch_array($lppm_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal' and smb_dana='Pribadi'");
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

				label : 'Informatika',
				data : [<?php
					$fti_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-4 and smb_dana='Pribadi'");
					while($baris2 = mysqli_fetch_array($fti_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-3 and smb_dana='Pribadi'");
					while($baris2 = mysqli_fetch_array($fti_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-2 and smb_dana='Pribadi'");
					while($baris2 = mysqli_fetch_array($fti_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-1 and smb_dana='Pribadi'");
					while($baris2 = mysqli_fetch_array($fti_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php
					$fti_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal' and smb_dana='Pribadi'");
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

		var ctx1 = document.getElementById("myChart5").getContext('2d');
		var myChart = new Chart(ctx1, {
			type: 'bar',
			data: {
				labels: [
				<?php if($awal){?>
					<?php echo $awal-4; ?>, <?php echo $awal-3; ?>, <?php echo $awal-2; ?>, <?php echo $awal-1; ?>, <?php echo $awal; ?>
				
				<?php } else {?>

				"2013", "2014", "2015", "2016", "2017"

			<?php }?>

				],
				datasets: [
				{
					label: 'Sistem Informasi',
					data: [
				<?php
					$lppm_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-4 and smb_dana='LuarNegeri'");
					while($baris2 = mysqli_fetch_array($lppm_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-3 and smb_dana='LuarNegeri'");
					while($baris2 = mysqli_fetch_array($lppm_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php 
					$lppm_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-2 and smb_dana='LuarNegeri'");
					while($baris2 = mysqli_fetch_array($lppm_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-1 and smb_dana='LuarNegeri'");
					while($baris2 = mysqli_fetch_array($lppm_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php 
					$lppm_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal' and smb_dana='LuarNegeri'");
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

				label : 'Informatika',
				data : [<?php
					$fti_2013 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-4 and smb_dana='LuarNegeri'");
					while($baris2 = mysqli_fetch_array($fti_2013)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2014 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-3 and smb_dana='LuarNegeri'");
					while($baris2 = mysqli_fetch_array($fti_2014)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2015 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-2 and smb_dana='LuarNegeri'");
					while($baris2 = mysqli_fetch_array($fti_2015)){
						echo $baris2['SUM(jml_dana)'];}
					?>, 
					<?php
					$fti_2016 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-1 and smb_dana='LuarNegeri'");
					while($baris2 = mysqli_fetch_array($fti_2016)){
						echo $baris2['SUM(jml_dana)'];}
					?>,
					<?php
					$fti_2017 = mysqli_query($koneksi,"select SUM(jml_dana) from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal' and smb_dana='LuarNegeri'");
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


</body>
</html>