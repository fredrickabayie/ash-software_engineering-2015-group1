<?php
	include_once ( "adb.php" );
class task extends adb
{	
	/**
	* Constructor for task
	**/
	function task (){}
	
	/**
	* A function to get the tasks for a particular nurse given her id
	**/
    
    
    function getTaskForNurse($nurseid){
        $select_query = "select taskid, task_title,task_description, task_start_date, task_end_date, name from nurses, tasks where tasks.nurseid = $nurseid and tasks.nurseid = nurse.nurseid";
        return $this->query( $select_query );
    }

}

?>