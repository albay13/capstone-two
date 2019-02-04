<?php
include '../init.php';
if(isset($_FILES["attachment"]["name"]) && isset($_POST["reply"]) && $_FILES["attachment"]["name"] != ''){
	$data = explode(".",$_FILES["attachment"]["name"] );
	$extension = $data[1];
	$allowed_extension = array("jpg","png","pdf","doc","xlsx","ppt","pptx","docx");
	if(in_array($extension, $allowed_extension)){
		$new_file_name = rand().'.'.$extension;
		$path          = '../../user/uploaded_files'.'/'.$new_file_name;
		if(move_uploaded_file($_FILES["attachment"]["tmp_name"],$path)){
			$data = array(
				"ticket_id"              => $_POST["ticket_id"],
				"assisting_personnel_id" => $_SESSION["id"],
				"reply"                  => $_POST["reply"],
				"uploaded_file"          => $new_file_name,
				"reply_status"           => "1",
			);
			if($crud->insert_data("ticket_reply_tbl",$data)){
				echo "Ticket reply success";
			}else{
				echo "Ticket reply failed";
			}
		}else{
			echo "Failed to upload";
		}		
	}else{
		echo "Invalid file type";
	}
}else{
	echo "Not set";
}

?>