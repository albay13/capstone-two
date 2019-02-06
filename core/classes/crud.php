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
	function count_all_data($table){
		$query = "SELECT count(*) as total FROM ".$table;
		$result = mysqli_query($this->con,$query);
		$row = mysqli_fetch_array($result);
		return $row["total"];
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
	function delete_data($table,$condition){
		$query = "UPDATE ".$table.$condition;
		$result = mysqli_query($this->con,$query);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	function update_data($query){
		$result = mysqli_query($this->con,$query);
		return $result;
	}
	function custom_view(){
            $output = '';
            $output .= "<div class='dropdown'><button type='button' class='btn btn-danger dropdown-toggle btn-sm ml-2' data-toggle='dropdown'>Select custom view<span class='caret'></button><div class='dropdown-menu dm_custom_view'>";
            $custom_view = $this->fetch_data("SELECT * FROM custom_views_tbl");
            foreach($custom_view as $row){
            $output .= "<a class='dropdown-item filter-table' data-id='".$row["id"]."' >".$row["name"]."</a>"; 
            }       
            $output.="</div></div>";
            echo $output;
    }
    function priority_badge($priority){
		if($priority == "high"){
		    $priority_badge =  '<span style="text-transform:capitalize" class="badge badge-danger">'.$priority.'</span>';
		}elseif($priority == "medium"){
		    $priority_badge ='<span style="text-transform:capitalize" class="badge badge-warning">'.$priority.'</span>';
		}else{
		    $priority_badge ='<span style="text-transform:capitalize" class="badge badge-primary">'.$priority.'</span>';
		}
		echo $priority_badge;
	}
    function filter_table($query){
		$result = $this->fetch_data($query);
		$count = $this->count_rows($query);
		$data = array();
		foreach ($result as $rows) {
			if($rows["ticket_priority"] == "high"){
		    $priority = '<span style="text-transform:capitalize" class="badge badge-danger">'.$rows["ticket_priority"].'</span>';
			}elseif($rows["ticket_priority"] == "medium"){
			$priority = '<span style="text-transform:capitalize" class="badge badge-warning">'.$rows["ticket_priority"].'</span>';
			}else{
			$priority = '<span style="text-transform:capitalize" class="badge badge-primary">'.$rows["ticket_priority"].'</span>';	
			}
			$sub_array   = array();
			$sub_array[] = $rows["ticket_title"];
			$sub_array[] = $priority;
			$sub_array[] = $rows["ticket_status"];
			$sub_array[] = '<a href="view_ticket.php?ticket_id='.$rows["id"].'" data-toggle="tooltip" title="View Ticket" class="btn btn-warning btn-sm text-light"><i class="fa fa-eye"></i></a> | <a data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm text-light"><i class="fa fa-cog"></i></a> | <a data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm text-light"><i class="fa fa-trash"></i></a>';
			$data[]      = $sub_array;
	    }
		$output = array(
			'draw'            => intval($_POST["draw"]),
			'recordsTotal'    => $count,
			'recordsFiltered' => $count,
			'data'            => $data
		);
		echo json_encode($output);
	}

}