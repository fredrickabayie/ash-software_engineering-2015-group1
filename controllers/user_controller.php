<?php

if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {
        case 1:
            getTasksForNurse();
            break;        
        case 2:
            previewTask();
            break;
        default:
            echo '{"result":0,status:"unknown command"}';
            break;
    }//end of switch
    
}//end of if

function getTasksforNurse(){
    $nurseid = $_REQUEST['nurseid'];
    require_once("../models/task.php");
    $obj = new task();
    if($obj->getTasksForNurse($nurseid)){
        $row=$obj->fetch();
        echo '{"result":1 ,"tasks":[';
        while($row){
            echo json_encode($row);
            $row = $obj->fetch();
            if($row){
                echo ",";
            }
        }
    echo "]}";
    
    }
    else{
        echo '{"result":0,"message:"error getting products"}';
        
    }
}

