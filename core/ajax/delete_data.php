<?php
include '../init.php';
if(isset($_POST["category_id"])){
	if($crud->delete_data("categories_tbl"," SET category_status = 0 WHERE id=".$_POST["category_id"])){
		$json_data = '{
			"title":"Deleted!",
			"text":"You have successfully deleted a category",
			"type":"success"
		}';
	}else{
		$json_data = '{
			"title":"Failed to delete category",
			"text":"Category was not deleted",
			"type":"error"
		}';
	}
}
if(isset($_POST["status_id"])){
	if($crud->delete_data("status_tbl"," SET visibility_status = 0 WHERE id=".$_POST["status_id"])){
		$json_data = '{
			"title":"Deleted!",
			"text":"You have successfully deleted a status",
			"type":"success"
		}';
	}else{
		$json_data = '{
			"title":"Failed to delete status!",
			"text":"Status was not deleted",
			"type":"error"
		}';
	}
}
if(isset($_POST["view_id"])){
	if($crud->delete_data("custom_views_tbl"," SET view_status = 0 WHERE id=".$_POST["view_id"])){
		$json_data = '{
			"title":"Deleted!",
			"text":"You have successfully deleted a custom view",
			"type":"success"
		}';	}else{
		$json_data = '{
			"title":"Failed to delete custom view!",
			"text":"Custom view was not deleted",
			"type":"error"
		}';
	}
}
if(isset($_POST["article_id"])){
	if($crud->delete_data("articles_tbl"," SET article_status = 0 WHERE id=".$_POST["article_id"])){
		$json_data = '{
			"title":"Deleted!",
			"text":"You have successfully deleted an article",
			"type":"success"
		}';	}else{
		$json_data = '{
			"title":"Failed to delete article!",
			"text":"Article was not deleted",
			"type":"success"
		}';
	}
}
if(isset($_POST["article_category_id"])){
	if($crud->delete_data("article_categories_tbl"," SET category_status = 0 WHERE id=".$_POST["article_category_id"])){
		$json_data = '{
			"title":"Deleted!",
			"text":"You have successfully deleted an article category",
			"type":"success"
		}';	}else{
		$json_data = '{
			"title":"Failed to delete article category!",
			"text":"Article category was not deleted",
			"type":"success"
		}';
	}
}
if(isset($_POST["question_id"])){
	if($crud->delete_data("faqs_tbl"," SET question_status = 0 WHERE id=".$_POST["question_id"])){
		$json_data = '{
			"title":"Deleted!",
			"text":"You have successfully deleted a question",
			"type":"success"
		}';	}else{
		$json_data = '{
			"title":"Failed to delete question",
			"text":"Question was not deleted",
			"type":"error"
		}';
	}
}
if(isset($_POST["ticket_id"])){
	if($crud->delete_data("ticket_info_tbl"," SET visibility_status = 0 WHERE id=".$_POST["ticket_id"])){
		$json_data = '{
			"title":"Deleted!",
			"text":"You have successfully deleted a ticket",
			"type":"success"
		}';	}else{
		$json_data = '{
			"title":"Failed to delete ticket",
			"text":"Ticket was not deleted",
			"type":"error"
		}';
	}
}
echo $json_data;
