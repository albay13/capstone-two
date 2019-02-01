<?php
include '../init.php';
if(isset($_FILES["category_icon"]["name"]) && $_FILES["category_icon"]["name"] != ''){
	$data = explode(".",$_FILES["category_icon"]["name"]);
	$extension = $data[1];
	$allowed_extension = array("jpg","png","gif");
	if (in_array($extension, $allowed_extension)) {
		$new_file_name = rand().'.'.$extension;
		$path = '../../user/uploaded_images'.'/'.$new_file_name;
		if(move_uploaded_file($_FILES["category_icon"]["tmp_name"],$path)){
			$user_group = $_POST["user_group"];
			if($_POST["parent_category"] == "0"){
					$data = array(
							"category_name" => mysqli_real_escape_string($con,$_POST["category_name"]),
							"category_description" => mysqli_real_escape_string($con,$_POST["category_desc"]),
							"category_icon" => $new_file_name,
							"user_group" => mysqli_real_escape_string($con,$ug),
							"category_status" => "1"
					);
					$crud->insert_data("categories_tbl",$data);		
			}else{
				foreach ($user_group as $ug) {
					$data = array(
						"parent_category_id" => mysqli_real_escape_string($con,$_POST["parent_category"]),
						"sub_category_name" => mysqli_real_escape_string($con,$_POST["category_name"]),
						"description" => mysqli_real_escape_string($con,$_POST["category_desc"]),
						"icon" => mysqli_real_escape_string($con,$new_file_name),
						"user_group" => mysqli_real_escape_string($con,$ug),
						"sub_cat_status" => "1"
					);
					$crud->insert_data("sub_categories_tbl",$data);	
				}
			}
			echo 'Custom status was added';
		}else{
			echo "There are some error";
			return false;
		}	
	}else{
		echo "Invalid Image File Type";
		return false;
	}
}else{
	return false;
}





?>