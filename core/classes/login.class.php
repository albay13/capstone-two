<?php
class login{
	public $con;
	function __construct($con){
		$this->con = $con;
		$this->if_logout();
	}
	function check_user($username,$password){
		$query = "SELECT * FROM accounts_tbl where username = '$username' AND password = '$password'";
		$result = mysqli_query($this->con,$query);
		$row = mysqli_fetch_array($result);
		$count_rows = $result->num_rows;
		if($count_rows > 0){
			$_SESSION['login'] = true;
			$_SESSION['id'] = $row["id"];
			return true;
		}else{
			return false;
		}
	}
	function if_logout(){
		if(isset($_GET["logout"])){
			$this->logout();
			header('Location:../index.php');
		}
	}
	function logout(){
		$_SESSION['login'] = false;
		session_destroy();
	}
}
?>