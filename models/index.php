<?php
if(isset($_REQUEST['cmd'])){
    echo '{"result":0,message:"unknown command"}';
    exit();
    
}
$cmd=$_REQUEST['cmd'];
switch($cmd){
    case 1:
        addTask();
        break;
    case 2:
        assignTask();
}
function addTask(){

		include("adb.php");
		$obj=new adb();
		if(isset($_REQUEST['taskid'])&&(isset($_REQUEST['tasktitle'])))

	{

		$taskid=$_REQUEST['taskid'];
		$tasktitle=$_REQUEST['tasktile'];
		$taskdescp=$_REQUEST['taskdescp'];
		$startdate=$_REQUEST['startdate'];
        $enddate=$_REQUEST['enddate'];
		

		$str_query="INSERT into Task set Task_id='$taskid',task_Title='$tasktitle',taskdescp='$task_Description',startdate='$startdate',startdate'$enddate'";
		$result=$obj->query($str_query);
		if(!$result){
			echo '{"result":0,"message":"failed to add Task"}';
			return;
		}else {
			
			echo '{"result":1,"message":"sucessfully added Task"}';
			return ;

}
}
    function assignTask(){
        
    }
}
