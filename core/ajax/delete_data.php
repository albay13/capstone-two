<?php
include '../init.php';
if(isset($_POST["category_id"])){
	if($crud->delete_data("categories_tbl"," SET category_status = 0 WHERE id=".$_POST["category_id"])){
		return true;
	}else{
		return false;
	}
}
if(isset($_POST["status_id"])){
	if($crud->delete_data("status_tbl"," SET visibility_status = 0 WHERE id=".$_POST["status_id"])){
		return true;
	}else{
		return false;
	}
}
if(isset($_POST["view_id"])){
	if($crud->delete_data("custom_views_tbl"," SET view_status = 0 WHERE id=".$_POST["view_id"])){
		return true;
	}else{
		return false;
	}
}
