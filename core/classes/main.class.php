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
	
	
	
	


}

?>