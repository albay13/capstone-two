<?php
include '../init.php';
if(isset($_POST)){
	$data = array(
		"name"        => $_POST["query_name"],
		"status"      => $_POST["status"],
		"category"    => $_POST["category"],
		"order_by"    => $_POST["order_by"],
		"sort_by"     => $_POST["sort_by"],
		"view_status" => "1"
	);
	if($crud->insert_data('custom_views_tbl',$data)){
		echo "You have successfully added a custom view";
	}else{
		echo "Custom view was not added";
		return false;
	}
}

?>