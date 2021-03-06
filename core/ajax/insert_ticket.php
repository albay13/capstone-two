<?php
include '../init.php';
if(isset($_FILES["uploaded_file"]["name"]) && $_FILES["uploaded_file"]["name"] != ''){
	$data = explode(".",$_FILES["uploaded_file"]["name"]);
	$extension = $data[1];
	$allowed_extension = array("jpg","png","pdf","doc","xls","ppt","pptx","docx");
	if (in_array($extension, $allowed_extension)) {
		$new_file_name = rand().'.'.$extension;
		$path = '../../user/uploaded_files'.'/'.$new_file_name;
		if(move_uploaded_file($_FILES["uploaded_file"]["tmp_name"],$path)){
				$ticket = array(
				"requester_id"       => $_SESSION["id"],
				"department_id"      => mysqli_real_escape_string($con,$_POST["department"]),
				"ticket_category_id" => mysqli_real_escape_string($con,$_POST["ticket_category"]),
				"visibility_status"  => "1"
				);
			if($crud->insert_data("ticket_tbl",$ticket)){
				$last_id = mysqli_insert_id($con);
				$ticket_info = array(
					"ticket_id"         => mysqli_insert_id($con),
					"sub_category_id"   => mysqli_real_escape_string($con,$_POST["sub_category"]),
					"ticket_title"      => mysqli_real_escape_string($con,$_POST["ticket_title"]),
					"query"             => mysqli_real_escape_string($con,$_POST["content"]),
					"ticket_priority"   => mysqli_real_escape_string($con, $_POST["priority"]),
					"attachment"        => $new_file_name,
					"ticket_status"     => mysqli_real_escape_string($con, $_POST["status"]),
					"ticket_notes"      => mysqli_real_escape_string($con,$_POST["notes"]),
					"visibility_status" => "1"
				);
				if ($crud->insert_data("ticket_info_tbl",$ticket_info)) {
					$json_data = '{
						"title":"Success!",
						"type":"success",
						"data":"Ticket was successfully added"
					}';
					echo $json_data;
				}else{
					$json_data = '{
						"title":"Failed!"
						"type":"error",
						"data":"Ticket was not added."
					}';
					echo $json_data;
				}
			}else{
					$json_data = '{
						"title":"Failed!"
						"type":"error",
						"data":"Creating ticket failed."
					}';
					echo $json_data;
					
			}	
		}else{
				$json_data = '{
					"title":"Failed!"
					"type":"error",
					"data":"There are some error"
				}';
				echo $json_data;
		}	
	}else{
		$json_data = '{
			"title":"Failed!"
			"type":"error",
			"data":"Invalid File Type"
		}';
		echo $json_data;
	}
}else{
	return false;
}





?>