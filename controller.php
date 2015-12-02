<?php

if(!isset($_REQUEST['cmd'])){
	echo '{"result":0,message:"unknown command"}';
	exit();
}
$cmd=$_REQUEST['cmd'];
switch($cmd)
{
	case 1:
		add_nurse();	
		break;
	default:
		echo '{"result":0,message:"unknown command"}';
		break;
}


function add_nurse(){
    require_once ("nurse.php");
    $fname = $_REQUEST['firstname'];
    $sname = $_REQUEST['surname'];
    $age = $_REQUEST['age'];
    $sex = $_REQUEST['sex'];
    $department = $_REQUEST['department'];
    $obj = new nurse ();
    if($obj->add_nurse($fname,$sname,$age,$sex,$department)){
        $row = $obj-> fetch();
        echo '{"result":1 ,"nurse":[';
        echo json_encode($row);
    echo "]}";
    }
    else
    {           
        echo'{"result":0,"message:"error getting nurse details"}';

    
}
}
?>