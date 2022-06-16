<!DOCTYPE html>
<html>
<?php require_once "koneksi.php" ;
function redirect($url){
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' .$url. '"';
    $string .= '</script>';

    echo $string;}

  if(isset($_SESSION['nik']))
  {   redirect("logout.php");?>
   
  <?php }?>

<head>
	<title>PENELITIAN DOSEN FTI UKDW</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="css/styles.css">-->
	<link rel="stylesheet" href="css/W3.css">
	<link rel="stylesheet" href="css/dashboard3.css">
	<link rel="stylesheet" href="css/navbar_inverse.css">
	<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <!--<a class="navbar-brand" href="index-humas.php">HMSI</a></li>-->
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		  <ul class="nav navbar-nav navbar-right">
			<li>
				<form action="login_sql.php" method="POST">
					   
				<?php if (isset($_SESSION['error'])) {
			     echo $_SESSION['error'];
			     unset($_SESSION['error']);}?>
					      <input style="color:black" type="text" placeholder="NIK" name="nik">
					      <input style="color:black" type="password" placeholder="Password" name="password">&nbsp;
					      <button style="background-color:gray" type="submit">Login</button>
			    </form>
			</li>
		  </ul>

		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<!--selesai-->
	<div class="col-md-12">
	
	<h2>SELAMAT DATANG DI BERKAS PENELITIAN DOSEN FTI UKDW</h2>
	<div class="container emp-profile"></div>
            
	</div>
</body>
</html>