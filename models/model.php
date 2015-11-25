<?php
/* This  the Model class 
*It contains all the major fucntions used in the 
the implementation process.
*
*/
/**
@author Julateh Mulbah
*
*
*/
include_once("adb.php");
/**
*This class extends the database class.
*In the database there is the connection to the database.
*/
class model extends adb{
    /**
    *The add task function add a task to the database 
    @param taskid,tasktitle,taskdescp..........
    */
    function addtasks($taskid,$tasktitle,$taskdescp,$startdate,$enddate){
        $str_query="INSERT into task set              task_id='$taskid',task_Title='$tasktitle',task_description='$taskdescp',startdate='$startdate',enddate='$enddate'";
		$result=$this->query($str_query);
        return $result;
    }
    /**
    * This is the assigned task function.
    *It allows the supervisor to 
    */
    function assigntask($tid,$ttitle,$tdescrip,$stdat,$endat,$nuid){
        $str_query="INSERT into assignedt set task_id='$tid',task_title='$ttitle',task_description='$tdescrip', startdate='$stdat',enddate='$endat',nurse_id='$nuid'";
        $result=$this->query($str_query);
        return $result;
    }
    
function assigntasktoNurse($tid,$nuid){
        $str_query="INSERT into tasksassignedtonurse set taskid='$tid',nurseid='$nuid'";
        $result=$this->query($str_query);
        return $result;
}
}
?>