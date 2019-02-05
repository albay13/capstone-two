<?php
class crud{
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
	function count_rows($query){
		$result = mysqli_query($this->con,$query);
		$count_rows = $result->num_rows;
		return $count_rows;
	}
	function fetch_data($query){
		$result = mysqli_query($this->con,$query);
		return $result;
	}
	function update_data($query){
		$result = mysqli_query($this->con,$query);
		return $result;
	}
	function custom_view(){
            $output = '';
            $output .= "<div class='dropdown'><button type='button' class='btn btn-primary dropdown-toggle btn-sm ml-2' data-toggle='dropdown'>Custom views <span class='caret'></button><div class='dropdown-menu dm_custom_view'>";
            $custom_view = $this->fetch_data("SELECT * FROM custom_views_tbl");
            foreach($custom_view as $row){
            $output .= "<a class='dropdown-item filter-table' data-id='".$row["id"]."' >".$row["name"]."</a>"; 
            }       
            $output.="</div></div>";
            echo $output;
    }

}