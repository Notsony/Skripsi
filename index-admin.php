<!DOCTYPE html>
<html>
<?php 
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
		<!--nav class="navbar navbar-light" style="background-color: #e3f2fd"-->
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
		  		<li class="w3-orange"><a href="index-admin.php">Data Dosen <span class="sr-only">(current)</span></a></li>
				<li class><a href="index-admin-p.php">Data Penelitian <span class="sr-only">(current)</span></a></li>
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

	<p class="btn btn-primary"><a href="tambah-dosen.php">Tambah Dosen</a></p>
	<br><br>

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
        	  <th>Foto</th>
        	  <th>Ubah Foto</th>
	          <th>NIK</th>
	          <th>Nama Dosen</th>
	          <th>Status</th>
	          <th>Prodi</th>
	          <th>Bidang Minat</th>
	          <th>Edit</th>
			  <th>Delete</th>
         	</tr>
        </thead>
            <tbody>
                <?php
                $select = mysqli_query($koneksi, "SELECT * FROM dosen");
                while($baris = mysqli_fetch_array($select)){
                ?>

                <tr class="w3-dark-grey">
                	<td><?php echo "<img src='foto/".$baris['foto']."' width='254px' height='220px'/>"?></td>
                	<td><a href="editfoto.php?nik=<?php echo $baris['nik']?>" class="btn btn-warning">Ubah</a></td>
                    <td><?php echo $baris['nik']?></td>
                    <td><?php echo $baris['nm_dosen']?></td>
                    <td><?php echo $baris['status']?></td>
                    <td><?php echo $baris['prodi']?></td>
                    <td><?php echo $baris['bd_minat']?></td>	
                    <td><a href="editdosen.php?nik=<?php echo $baris['nik']?>" class="btn btn-info">Edit</a></td>
                    <td><a href="hapusdosen.php?delete=<?php echo $baris['nik']?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php }?>
               
            </tbody>
</body>
</html>