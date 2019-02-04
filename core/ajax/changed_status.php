<?php
include '../init.php';
if(isset($_POST["ticket_id"]) && isset($_POST["status"])){
	$ticket_status = $_POST["status"];
	$ticket_id     = $_POST["ticket_id"];
	$update        = $crud->update_data("UPDATE ticket_info_tbl SET ticket_status ='$ticket_status' WHERE ticket_id = '$ticket_id'");
	if($update){
		echo "You have successfully change the status";
		return true;
	}else{
		return false;
	}
}

?>