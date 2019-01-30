<?php 
include 'core/init.php';
if(isset($_SESSION["id"])){
	header('Location:withLogin/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Rephil IT Help Desk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/rephil.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/mdb.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Merienda+One" rel="stylesheet">
</head>
<body class="without-login">
	<?php 
		include 'includes/nav.html';
	?>
	<br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<!-- Material form login -->
				<div class="card wow fadeInUp" style="opacity: 0.8">
				  <div class="card-header bg-dark black-text py-4 text-light" style="border-bottom: 1px solid white;">
				   	<div class="float-left">
				   	<h5>Login via</h5>
				   	<h6>Account Information</h6>
				   	</div>
				   	<div class="float-right">
				   		<i class="fas fa-lock fa-3x"></i>
				   	</div>
				  </div>
				  <div class="card-body bg-dark" >
				  	<?php 
				  		include 'includes/login.form.php';
				  	?>
				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/mdb.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
	<script src="assets/js/login_validation.js"></script>
</html>