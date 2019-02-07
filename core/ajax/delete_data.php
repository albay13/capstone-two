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
if(isset($_POST["article_id"])){
	if($crud->delete_data("articles_tbl"," SET article_status = 0 WHERE id=".$_POST["article_id"])){
		return true;
	}else{
		return false;
	}
}
if(isset($_POST["article_category_id"])){
	if($crud->delete_data("article_categories_tbl"," SET category_status = 0 WHERE id=".$_POST["article_category_id"])){
		return true;
	}else{
		return false;
	}
}
if(isset($_POST["question_id"])){
	if($crud->delete_data("faqs_tbl"," SET question_status = 0 WHERE id=".$_POST["question_id"])){
		return true;
	}else{
		return false;
	}
}
if(isset($_POST["ticket_id"])){
	if($crud->delete_data("ticket_info_tbl"," SET visibility_status = 0 WHERE id=".$_POST["ticket_id"])){
		return true;
	}else{
		return false;
	}
}
