<?php
class main{
	public $con;
	function __construct($con){
		$this->con = $con;
	}
	function date_format($date){
		//E.g 28 Jan 2019, 6:09 AM
		$date_created = date_create($date);
    	$date_formatted = date_format($date_created,"j M Y h:i A");
    	return $date_formatted;
	}
	
	
	
	
	
	


}

?>