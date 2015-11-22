<?php
//if(isset($_REQUEST['cmd'])){
//    echo '{"result":0,message:"unknown command"}';
//    exit();
//    
//}

include_once("model.php");
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
			echo "failed to add Task".mysql_error();
			return;
		}else {
			echo '{"result":1,"message":"sucessfully added Task"}';
			return ;

}
}
    
}
    function assignTask(){
    	if(isset($_REQUEST['taskid'])&&(isset($_REQUEST['nurseid'])))
    	{
    		$taskid=$_REQUEST['taskid'];
    		$tasktitle=$_REQUEST['tasktitle'];
    		$taskdescp=$_REQUEST['taskdescp'];
    		$startdate=$_REQUEST['startdate'];
    		$enddate=$_REQUEST['enddate'];
    		$nurseid=$_REQUEST['nurseid'];


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
        $mytask->assignTask();
}
