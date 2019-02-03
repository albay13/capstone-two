<?php
class main{
	public $con;
	function __construct($con){
		$this->con = $con;
	}
	function priority_badge($priority){
		if($priority == "high"){
		    echo "<span style='text-transform:capitalize' class='badge badge-danger'>".$priority."</span>";
		}elseif($priority == "medium"){
		    echo "<span style='text-transform:capitalize' class='badge badge-warning'>".$priority."</span>";
		}else{
		    echo "<span style='text-transform:capitalize' class='badge badge-primary'>".$priority."</span>";
		}
	}
	function date_format($date){
		//E.g 28 Jan 2019, 6:09 AM
		$date_created = date_create($date);
    	$date_formatted = date_format($date_created,"j M Y h:i A");
    	return $date_formatted;
	}
	
	
	
	


}

?>