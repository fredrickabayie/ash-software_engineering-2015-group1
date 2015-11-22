<?php
include_once("adb.php");
class model extends adb{
    function addtasks($task_id,$tasktitle,$taskdescrp,$startdate,$enddate){
        $str_query="INSERT into Task set     Task_id='$taskid',task_Title='$tasktitle',task_Description='$task_descp',start_date='$startdate',end_date='$enddate'";
		$result=$this->query($str_query);
        return $result;
    }
}


?>