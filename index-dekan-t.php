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
				<li class><a href="index-dekan-s.php">Biaya Penelitian Fakultas <span class="sr-only">(current)</span></a></li>
				<li class="w3-orange"><a href="index-dekan-t.php">Bidang Minat Fakultas <span class="sr-only">(current)</span></a></li>
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
	                                        <form action="index-dekan-t.php" method="post">
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

                                             <!--<div class='col-md-6'>
                                                <label>NIK</label>
												<br>
												<label>Prodi</label>
												<br>
												<label>Bidang Minat</label>
												<br>
												<label>Status</label>
                                            </div>
                                            <div class='col-md-2'>
												<p>164KE282</p>
												<p>SI</p>
												<p>Programming</p>
												<p>Dosen SI</p>
                                            </div>-->
											
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
        
										<label>Kontribusi Penelitian (Total Penelitian FTI)</label>
										<div>
											<canvas id="myChart1"></canvas>
										</div> 
										<br>
										<label>Kontribusi Penelitian (Bidang Minat Prodi Sistem Informasi)</label>
										<div>
											<canvas id="myChart2"></canvas>
										</div> 
										<br>
										<label>Kontribusi Penelitian (Bidang Minat Prodi Informatika)</label>
										<div>
											<canvas id="myChart3"></canvas>
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
                    <!--<td><a href="editbarang.php?edit=<?php echo $baris['kd_barang']?>" class="btn btn-info">Edit</a></td>
                    <td><a href="deletebarangsql.php?delete=<?php echo $baris['kd_barang']?>" class="btn btn-danger">Delete</a></td>-->
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
					label: 'Analisis',
					data: [
				<?php
					$an_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-4 and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2013);
					?>,
					<?php 
					$an_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-3 and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2014);
					?>, 
					<?php 
					$an_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-2 and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2015);
					?>,
					<?php 
					$an_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-1 and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2016);
					?>,
					<?php 
					$an_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal' and bd_minat='Analisis'");
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
					$pr_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-4 and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2013);
					?>,
					<?php 
					$pr_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-3 and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2014);
					?>, 
					<?php 
					$pr_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-2 and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2015);
					?>,
					<?php 
					$pr_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-1 and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2016);
					?>,
					<?php 
					$pr_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal' and bd_minat='Programming'");
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
					$st_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-4 and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2013);
					?>,
					<?php 
					$st_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-3 and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2014);
					?>, 
					<?php 
					$st_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-2 and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2015);
					?>,
					<?php 
					$st_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-1 and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2016);
					?>,
					<?php 
					$st_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal' and bd_minat='Statistika'");
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
			type: 'bar',
			data: {
				labels: ["2013", "2014", "2015", "2016", "2017"],
				datasets: [
				{
					label: 'Analisis',
					data: [
				<?php
					$an_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-4 and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2013);
					?>,
					<?php 
					$an_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-3 and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2014);
					?>, 
					<?php 
					$an_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-2 and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2015);
					?>,
					<?php 
					$an_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-1 and bd_minat='Analisis'");
					echo mysqli_num_rows($an_2016);
					?>,
					<?php 
					$an_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal' and bd_minat='Analisis'");
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
					$pr_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-4 and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2013);
					?>,
					<?php 
					$pr_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-3 and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2014);
					?>, 
					<?php 
					$pr_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-2 and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2015);
					?>,
					<?php 
					$pr_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-1 and bd_minat='Programming'");
					echo mysqli_num_rows($pr_2016);
					?>,
					<?php 
					$pr_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal' and bd_minat='Programming'");
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
					$st_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-4 and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2013);
					?>,
					<?php 
					$st_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-3 and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2014);
					?>, 
					<?php 
					$st_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-2 and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2015);
					?>,
					<?php 
					$st_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-1 and bd_minat='Statistika'");
					echo mysqli_num_rows($st_2016);
					?>,
					<?php 
					$st_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal' and bd_minat='Statistika'");
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

<script>
        <?php
		$nik=$_SESSION['nik'];
		$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nik= '$nik'");
		while($baris = mysqli_fetch_array($select)){
		?>

		var ctx1 = document.getElementById("myChart1").getContext('2d');
		var myChart1 = new Chart(ctx1, {
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

				label : 'Sistem Informasi',
				data : [<?php
					$pr_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-4");
					echo mysqli_num_rows($pr_2013);
					?>,
					<?php 
					$pr_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-3");
					echo mysqli_num_rows($pr_2014);
					?>, 
					<?php 
					$pr_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-2");
					echo mysqli_num_rows($pr_2015);
					?>,
					<?php 
					$pr_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'-1");
					echo mysqli_num_rows($pr_2016);
					?>,
					<?php 
					$pr_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Sistem Informasi' and tahun='$awal'");
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
					label: 'Informatika',
					data: [
				<?php
					$st_2013 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-4");
					echo mysqli_num_rows($st_2013);
					?>,
					<?php 
					$st_2014 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-3");
					echo mysqli_num_rows($st_2014);
					?>, 
					<?php 
					$st_2015 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-2");
					echo mysqli_num_rows($st_2015);
					?>,
					<?php 
					$st_2016 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'-1");
					echo mysqli_num_rows($st_2016);
					?>,
					<?php 
					$st_2017 = mysqli_query($koneksi,"select * from daftar_pnl join laporan on daftar_pnl.kode_pnl = laporan.kode_pnl join dosen on daftar_pnl.nik = dosen.nik where prodi='Informatika' and tahun='$awal'");
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


</body>
</html>