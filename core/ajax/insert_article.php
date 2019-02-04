<?php
include '../init.php';
if(isset($_POST)){
	$data = array(
		"article_title" => mysqli_real_escape_string($con,$_POST["article_title"]),
		"article_content" => mysqli_real_escape_string($con,$_POST["article_content"]),
		"article_category" => mysqli_real_escape_string($con,$_POST["article_category"]),
		"article_sub_category" => mysqli_real_escape_string($con,$_POST["sub_category"]),
		"user_id" => mysqli_real_escape_string($con,$_SESSION["id"]),
		"article_status" => "1"
	);
	if($crud->insert_data('articles_tbl',$data)){
		echo "You have successfully post an article";
	}else{
		echo 'false';
	}
}





?>