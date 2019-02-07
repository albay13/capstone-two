<?php
include '../init.php';
if(isset($_POST["id"]) && $_POST["id"] != ''){
	$id = $_POST["id"];
	$fetch_criteria = $crud->fetch_data("SELECT * FROM custom_views_tbl WHERE id = '$id'");
	$row_criteria = mysqli_fetch_array($fetch_criteria);
	$query = "SELECT * FROM ticket_info_tbl ";
	if($row_criteria["status"] == "All" && $row_criteria["category"] == "All"){
		$order_by = $row_criteria["order_by"];
		$sort_by  = $row_criteria["sort_by"];
		$query    .= "WHERE visibility_status = '1' ORDER BY '$order_by' '$sort_by'";
	}else if($row_criteria["status"] == "All"){
		$order_by =$row_criteria["order_by"];
		$sort_by  = $row_criteria["sort_by"];
		$category = $row_criteria["category"];
		$query    = "INNER JOIN ticket_tbl ON ticket_info_tbl.ticket_id = ticket_tbl.id WHERE ticket_tbl.ticket_category_id = '$category' WHERE visibility_status = '1' ORDER BY '$order_by' '$sort_by' ";
	}else if($row_criteria["category"] == "All"){
		$order_by = $row_criteria["order_by"];
		$sort_by  = $row_criteria["sort_by"];
		$status   = $row_criteria["status"];
		$query    .= "INNER JOIN ticket_tbl ON ticket_info_tbl.ticket_id = ticket_tbl.id WHERE ticket_info_tbl.ticket_status = '$status' AND ticket_info_tbl.visibility_status = '1' ORDER BY '$order_by' '$sort_by'";
	}else{
		$order_by = $row_criteria["order_by"];
		$sort_by  = $row_criteria["sort_by"];
		$status   = $row_criteria["status"];
		$category = $row_criteria["category"];
		$query    .="INNER JOIN ticket_tbl ON ticket_info_tbl.ticket_id = ticket_tbl.id WHERE ticket_info_tbl.ticket_status = '$status' AND ticket_tbl.ticket_category_id = '$category' AND ticket_info_tbl.visibility_status = '1' ORDER BY '$order_by' '$sort_by'";
	}
	$crud->filter_table($query);
}else{
	$query = "SELECT * FROM ticket_info_tbl WHERE visibility_status = '1'";
	$crud->filter_table($query);
}

?>

