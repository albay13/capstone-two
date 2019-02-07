<?php 
include 'core/init.php';
if(isset($_SESSION["id"])){
	header('Location:withLogin/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>About | Rephil IT Help Desk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/rephil.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<style type="text/css">
		.parallax{
			background-image: url("assets/images/header-img.jpeg");

			/* Set a specific height */
			height: 220px; 

			/* Create the parallax scrolling effect */
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			padding-top: 100px;
			text-align: center;
		}
	</style>
</head>
<body>
	<?php 
		include 'includes/nav.html';
	?>
	<div class="parallax">
	</div>
	<div class="container">
		<center>
		<div class="card" style="margin-top: -50px; width: 700px;">
			<h2 class="text-dark p-3 text-center">About Us</h2>
			
		</div>
		</center>
	</div>
</body>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
	<script src="assets/js/validations.js"></script>
</html>