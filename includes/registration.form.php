<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$first_name = mysqli_real_escape_string($con,$_POST["first_name"]);
		$middle_name = mysqli_real_escape_string($con,$_POST["middle_name"]);
		$last_name = mysqli_real_escape_string($con,$_POST["last_name"]);
		$birthdate = mysqli_real_escape_string($con,$_POST["birthdate"]);
		$email = mysqli_real_escape_string($con,$_POST["email"]);
		$contact_number = mysqli_real_escape_string($con,$_POST["contact_number"]);
		$username = mysqli_real_escape_string($con,$_POST["username"]);
		$user_level = mysqli_real_escape_string($con,$_POST["user_level"]);
		$password = mysqli_real_escape_string($con,$_POST["password"]);
		$data = array(
			"first_name" => $first_name,
			"middle_name" => $middle_name,
			"last_name" => $last_name,
			"birthdate" => $birthdate,
			"email" => $email,
			"contact_number" => $contact_number,
			"info_status" => '1',
		);
		$main->check_reg($username,$password,$user_level,"personal_info_tbl",$data);
	}

?>
<form action="#" id="myForm" role="form" data-toggle="validator" method="post">
<div id="smartwizard">
<ul>
<li><a href="#step-1">Step 1<br /><small>Personal Information</small></a></li>
<li><a href="#step-2">Step 2<br /><small>Account Information</small></a></li>
</ul>

<div>
<div id="step-1" class="">
<h5 class="border-bottom border-gray pb-2">Step 1. Personal Information</h5>
<h6><span class="badge badge-danger">Note :  Please fill-out all the information needed.</span></h6>
<div id="form-step-0" role="form" data-toggle="validator">
<div class="form-group row">
 <div class="col-lg-4">
 	<label class="control-label">First name : </label>
 	<input type="text" name="first_name" placeholder="Enter First Name" class="form-control" required>
 </div>
 <div class="col-lg-4">
 	<label class="control-label">Middle name : </label>
 	<input type="text" name="middle_name" placeholder="Enter Middle Name" class="form-control" required>
 </div>
 <div class="col-lg-4">
 	<label class="control-label">Last name : </label>
 	<input type="text" name="last_name" placeholder="Enter Last Name" class="form-control" required>
 </div>
</div>
<div class="form-group row">
 <div class="col-lg-4">
 	<label class="control-label">Birthdate</label>
 	<input type="date" name="birthdate" placeholder="YYYY-MM-DD" class="form-control" required>
 </div>
  <div class="col-lg-4">
 	<label class="control-label">E-Mail</label>
 	<input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" required>
 </div>
 <div class="col-lg-4">
 	<label class="control-label">Contact-Number</label>
 	<input type="text" name="contact_number" placeholder="Enter Contact Number" class="form-control" required>
 </div>
</div>
</div><!-- form step 0 -->
</div>
<div id="step-2" class="">
<h5 class="border-bottom border-gray pb-2">Step 2. Account Information</h5>
<div id="form-step-1" role="form" data-toggle="validator">
<div class="form-group row">
 <div class="col-lg-3">
 	<label class="control-label">Username : </label>
 	<input type="text" name="username" placeholder="Enter Username" class="form-control" required>
 </div>
 <div class="col-lg-3">
 	<label class="control-label">User Level : </label>
 	<select name="user_level" class="form-control" required>
 		<option value="">Select User Level</option>
 		<option value="staff">Staff</option>
 		<option value="administrator">Administrator</option>
 	</select>
 </div>
</div>
<div class="form-group row">
 <div class="col-lg-3">
 	<label class="control-label">Password</label>
 	<input type="password" name="password" id="password" placeholder="********" class="form-control" required>
 </div>
  <div class="col-lg-3">
 	<label class="control-label">Confirm Password</label>
 	<input type="password" name="confirmpassword" id="confirmpassword" placeholder="********" class="form-control" required>
 </div>
</div>
</div><!-- form step 0 -->
</div>
</div>
</div>
</form>