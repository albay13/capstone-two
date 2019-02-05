<?php
include '../init.php';
if(isset($_POST["id"])){
	$id = $_POST["id"];
	$fetch_criteria = $crud->fetch_data("SELECT * FROM custom_views_tbl WHERE id = '$id'");
	$row_criteria = mysqli_fetch_array($fetch_criteria);
	$query = "SELECT * FROM ticket_info_tbl ";
	if($row_criteria["status"] == "All" && $row_criteria["category"] == "All"){
		$order_by = $row_criteria["order_by"];
		$sort_by  = $row_criteria["sort_by"];
		$query    .= "ORDER BY '$order_by' '$sort_by'";
	}else if($row_criteria["status"] == "All"){
		$order_by = $row_criteria["order_by"];
		$sort_by  = $row_criteria["sort_by"];
		$category = $row_criteria["category"];
		$query    = "INNER JOIN ticket_tbl ON ticket_info_tbl.ticket_id = ticket_tbl.id WHERE ticket_tbl.ticket_category_id = '$category' ORDER BY '$order_by' '$sort_by' ";
	}else if($row_criteria["category"] == "All"){
		$order_by = $row_criteria["order_by"];
		$sort_by  = $row_criteria["sort_by"];
		$status   = $row_criteria["status"];
		$query    .= "INNER JOIN ticket_tbl ON ticket_info_tbl.ticket_id = ticket_tbl.id WHERE ticket_info_tbl.ticket_status = '$status' ORDER BY '$order_by' '$sort_by'";
	}else{
		$order_by = $row_criteria["order_by"];
		$sort_by  = $row_criteria["sort_by"];
		$status   = $row_criteria["status"];
		$category = $row_criteria["category"];
		$query    .="INNER JOIN ticket_tbl ON ticket_info_tbl.ticket_id = ticket_tbl.id WHERE ticket_info_tbl.ticket_status = '$status' AND ticket_tbl.ticket_category_id = '$category' ORDER BY '$order_by' '$sort_by'";
	}
	$result = $crud->fetch_data($query);
	$count = $crud->count_rows($query);
	$data = array();
	foreach ($result as $rows) {
		$sub_array   = array();
		$sub_array[] = $rows["ticket_title"];
		$sub_array[] = $rows["ticket_priority"];
		$sub_array[] = $rows["ticket_title"];
		$sub_array[] = $rows["ticket_title"];
		$sub_array[] = $rows["ticket_title"];
		$sub_array[] = $rows["ticket_title"];
		$data[]      = $sub_array;
    }
	$output = array(
		'draw'            => intval($_POST["draw"]),
		'recordsTotal'    => $count,
		'recordsFiltered' => $count,
		'data'            => $data
	);
	echo json_encode($output);
}
?>

