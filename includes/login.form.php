<?php 
	if(isset($_POST["btn_signin"])){
		$username = mysqli_real_escape_string($con,$_POST["username"]);
		$password = mysqli_real_escape_string($con,$_POST["password"]);
		if($login->check_user($username,$password)){
			header('Location:withLogin/index.php');
		}else{
			echo "<div class='alert alert-danger'>
				<strong>Login Failed!</strong> Username / password is incorrect.
				</div>";
		}
	}

?>
<form method="post" class="text-light" id="login_form">
<div class="form-group row">
<div class="col-lg-12">
	<label class="control-label">Username</label>
	<div class="form-input">
		<input type="text" name="username" id="username" placeholder="Enter username or email" class="form-control">
	</div>
</div>
</div>
<div class="form-group row">
<div class="col-lg-12">
	<label class="control-label">Password</label>
	<div class="form-input">
	<input type="password" id="password" name="password" placeholder="Enter password" class="form-control">
	</div>
</div>
</div>
<div class="custom-control custom-checkbox mb-3">
<input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
<label class="custom-control-label" for="customCheck">Remember Password</label>
</div>
<div class="form-group row">
<div class="col-lg-12">
	<button id="btn_signin" name="btn_signin" class="btn btn-primary form-control mx-auto">Sign In</button>
</div>
</div>
<div class="form-group row">
<div class="col-lg-12 text-center">
Having trouble with your password? <a href="#">Forgot Password</a>
</div>  			
</div>
</form>