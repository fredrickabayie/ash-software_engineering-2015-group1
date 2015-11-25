<?php
include("adb.php");

class task extends adb{
	function searchTaskByName($taskName){
		$str_query = "SELECT *  from task where task_title like '%$taskName%'"
		if (!$this->query($str_query )){
			echo'{"result":0, "message": "Error Searching Task'.mysql_error().'"}';
			return false;
		}
		return true;
	}
}
?>