<?php
/* This  the controller class 
*It contains all the major fucntions used in the 
the implementation process.
*
*/
/**
@author Julateh Mulbah
*This class also include the model.php class where the addtask function is located.
*
*/

include_once("model.php");
/**
*This class extends the model class.
*/
class addingTask extends model{
    
/**
*This Method Add task to the application Database 
*
*/
function addTask(){
		if(isset($_REQUEST['taskid'])&&(isset($_REQUEST['tasktitle'])))

	{

		$taskid=$_REQUEST['taskid'];
		$tasktitle=$_REQUEST['tasktitle'];
		$taskdescp=$_REQUEST['taskdescp'];
		$startdate=$_REQUEST['startdate'];
        $enddate=$_REQUEST['enddate'];
		$result=$this->addtasks($taskid,$tasktitle,$taskdescp,$startdate,$enddate);
		if(!$result){
			echo '{"result":0,"message":"failed to assign task"}';
			return;
		}else {
			echo '{"result":1,"message":"sucessfully added Task"}';
			return ;

}
}
    
}
    
    function assignedtask(){
        if(isset($_REQUEST['tid']) && (isset($_REQUEST["ttitle"]))){
            $tid=$_REQUEST['tid'];
            $ttitle=$_REQUEST['ttitle'];
            $tdescrip=$_REQUEST['tdescrip'];
            $stdat=$_REQUEST['stdat'];
            $endat=$_REQUEST['endat'];
            $nuid=$_REQUEST['nuid'];
            $result=$this->assigntask($tid,$ttitle,$tdescrip,$stdat,$endat,$nuid);
            $result1=$this->assigntasktoNurse($tid,$nuid);
           
            if(!$result && !$result1){
                echo '{"result":0,"message":"failed to assign task"}';
                return;
            }else{
                echo
                    '{"result":1,"message":" Task was sucessfully assigned "}';
                return;
            }
        }
    }
}

$mytask = new addingTask();
$cmd=$_REQUEST['cmd'];
switch($cmd){
    case 1:
        $mytask->addTask();
        break;
    case 2:
        $mytask->assignedTask();
        break;
}
