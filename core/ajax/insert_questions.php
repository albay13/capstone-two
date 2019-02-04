<?php
include '../init.php';
if(isset($_POST)){
	$data = array(
		"questions" => mysqli_real_escape_string($con,$_POST["question"]),
		"content" => mysqli_real_escape_string($con,$_POST["answer"]),
		"user_id" => mysqli_real_escape_string($con,$_SESSION["id"]),
		"question_status" => "1"
	);
	if($crud->insert_data('faqs_tbl',$data)){
		echo "You have successfully posted a Question";
	}else{
		echo 'false';
	}
}





?>