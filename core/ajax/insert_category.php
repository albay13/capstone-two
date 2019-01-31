<?php
include '../init.php';
if(isset($_FILES["category_icon"]["name"]) && $_FILES["category_icon"]["name"] != ''){
	$data = explode(".",$_FILES["category_icon"]["name"]);
	$extension = $data[1];
	$allowed_extension = array("jpg","png","gif");
	if (in_array($extension, $allowed_extension)) {
		$new_file_name = rand().'.'.$extension;
		$path = '../../assets/images'.'/'.$new_file_name;
		if(move_uploaded_file($_FILES["category_icon"]["tmp_name"],$path)){
			$user_group = $_POST["user_group"];
			foreach ($user_group as $ug) {
				$data = array(
					"category_name" => $_POST["category_name"],
					"category_description" => $_POST["category_desc"],
					"category_icon" => $new_file_name,
					"parent_category" => $_POST["parent_category"],
					"user_group" => $ug,
					"category_status" => "1"
				);
				$crud->insert_data("categories_tbl",$data);	
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