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
					$id = $_POST["id"];
						
					foreach($user_group as $ug){
							$data = array(
							"category_name"        => $_POST["category_name"],
							"category_description" => $_POST["category_desc"],
							"category_icon"        => $new_file_name,
							"user_group"           => $ug,
							"category_status"      => "1"
							);
						$where = array("id" => $id);
						$crud->dynamic_update_data("categories_tbl",$where,$data);		
					}
					$json_data = '{
						"title":"Success!",
						"text":"Custom status without sub-category was added ",
						"type":"success"
					}';
		}else{
			return false;
			$json_data = '{
				"title":"Failed to insert category!",
				"text":"Unable to upload Image",
				"type":"error"
			}';
		}	
	}else{
		$json_data = '{
			"title":"Failed to insert category!",
			"text":"Invalid Image File Type",
			"type":"error"
		}';
	}
}else{
	$json_data = '{
		"title":""Failed to insert category!",
		"text":"Category Icon or category name is not set",
		"type":"error";
	}';
}
echo $json_data;





?>