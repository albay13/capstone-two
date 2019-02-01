<?php
include '../../core/init.php';
if(isset($_POST["id"])){
	$id = $_POST["id"];
	$mysql = $crud->fetch_data("SELECT * FROM sub_categories_tbl where parent_category_id = '$id'");
	$count_rows = $mysql->num_rows;
	$output = "";
	if($count_rows > 0){
		$output .= "<select class='form-control' name='sub_category' id='sub_category' required>";
		foreach($mysql as $rows){
			$output.="<option value='".$rows["id"]."'>".$rows["sub_category_name"]."</option>";
		}
		$output .="</select>";
		echo $output;
	}else{
		echo 'false';
	}
}

?>