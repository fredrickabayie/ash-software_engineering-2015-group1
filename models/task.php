<?php
include("adb.php");

class task extends adb{
	function searchTaskByName($taskName){
		$str_query = "SELECT *  from task where task_title like '%$taskName%'";
		if (!$this->query($str_query )){
			return false;
		}
		return true;
	}
}
?>