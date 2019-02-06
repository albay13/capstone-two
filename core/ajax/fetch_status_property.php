<?php
include '../init.php';
$id = $_POST["id"];
$query = $crud->fetch_data("SELECT * FROM status_tbl WHERE id = '$id'");
if($query){
	$row = mysqli_fetch_array($query);
	$json_data = '{
		"status_name":"'.$row["status_name"].'",
		"bgcolor":"'.$row["bg_color"].'",
		"fontcolor":"'.$row["text_color"].'"
	}';
	echo $json_data;
}

?>