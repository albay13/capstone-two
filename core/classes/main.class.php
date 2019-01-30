<?php
class main{
	public $con;
	function __construct($con){
		$this->con = $con;
	}
	function check_reg($username,$password,$user_level,$table,$data){
		$password = md5($password);
		$query = "SELECT * FROM accounts_tbl WHERE username = '$username'";
		$output = array(
			"username" => $username,
			"password" => $password,
			"user_level" => $user_level,
			"accounts_status" => "1"
		);
		$result = mysqli_query($this->con,$query);
		$count_rows = $result->num_rows;
		if($count_rows > 0){
			echo '<div class="alert alert-danger alert-bordered"><strong>Registration Failed!</strong> Username already exist!</div>';
			return false;
		}else{
			if($this->insert_data('accounts_tbl',$output)){
				$last_id = array(
					"login_id" => mysqli_insert_id($this->con)
				);
				$output2 = array_merge($last_id, $data);
			}
			$this->insert_data($table,$output2);
			echo "<div class='alert alert-success'>
						<strong>Registration Success!</strong> You have successfully created an account.
						</div>";
		}
	}
	function insert_data($table,$data){
		$sql = "";
		$sql .= "INSERT INTO ".$table;
		$sql .= " (".implode(",", array_keys($data)).") VALUES";
		$sql .= " ('".implode("','", array_values($data))."')";
		$query = mysqli_query($this->con,$sql);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	function logout(){

	}
	


}

?>