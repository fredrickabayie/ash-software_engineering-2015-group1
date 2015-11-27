<?php

if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {
        case 1:
            task_preview ( );
            break;
        
        case 2:
            delete_task ( );
            break;
        
        case 3:
            add_task ( );
            break;
        
        case 4:
            update_task ( );
            break;
        
        case 5:
            display_tasks ( );
            break;
        
        case 6:
            search_task ( );
            break;
        
        case 7:
            user_login ( );
            break;
        
        case 8:
            delete_tasks ( );
            break;
        
        case 9:
            select_collaborator ( );
            break;
        
        case 10:
            display_created_task ( );
            break;
        
        case 11:
            search_created_tasks ( );
            break;
         
        default:
            echo '{"result":0,status:"unknown command"}';
            break;
    }//end of switch
    
}//end of if


/**
 * Function to get preview of a task
 */
function task_preview ( )
{
    if ( isset ( $_REQUEST [ 'task_id' ] ) )
    { 
        include '../models/user_class.php';
        
        $task_id = $_REQUEST [ 'task_id' ];
        
        $obj=new User ( );         
        if ( $obj->user_preview_task ( $task_id ) )
        {
            while ( $row = $obj->fetch ( ) )
            {
//                echo json_encode ( $row );
                echo '{"result":1, "task_title":"' .$row['task_title'].'",'
                        . '"task_id":"' .$row['task_id'].'",'
                       . '"user_fname":"' .$row['user_fname'].'",'
                        . '"user_sname":"' .$row['user_sname'].'",'
                        . '"user_picture":"' .$row['path'].'",'
                         . '"task_collaborator":"' .$row['task_collaborator'].'",'
                         . '"task_start_date":"' .$row['task_start_date'].'",'
                         . '"task_end_date":"' .$row['task_end_date'].'",'
                         . '"task_status":"' .$row['task_status'].'",'
                       . '"task_description":"' .$row['task_description'].'"}';
            }
        }
        else
        {
            echo '{"result":0, "status":"Failed to load the preview"}';
        }
    }
}//end of task_preview()


/**
 * Function to display all tasks
 */
function display_tasks ( )
{
    include '../models/user_class.php';
    $obj = new User ( );
    session_start();
    $user_id = $_SESSION['user_id'];
       
    if ( $obj->user_display_assigned_tasks ( $user_id ) )
    {
        $row = $obj->fetch ( );
        echo '{"result":1, "tasks": [';
        while ( $row )
        {
            echo '{"task_id": "'.$row ["task_id"].'", "task_title": "'.$row ["task_title"].'", 
            "task_description": "'.$row ["task_description"].'",  "user_sname": "'.$row ["user_sname"].'",
            "user_fname": "'.$row ["user_fname"].'"}';
            
            if ($row = $obj->fetch ( ) )   {
                    echo ',';
            }
        }
            echo ']}';
    }   else
    {
        echo '{"result":0,"status": "An error occured for select product."}';
    }
}//end of display_all_tasks()


/**
 * Function to delete a task
 */
function delete_task ( )
{
    if ( isset ( $_REQUEST [ 'task_id' ] ) )
    {
        include '../models/user_class.php';

        $task_id = $_REQUEST [ 'task_id' ];
        $obj = new User ( );

        if ( $obj->user_delete_task ( $task_id ) )
        {
            echo ' { "result":1, "status": "Successfully deleted" }';
        }
        else
        {
            echo ' { "result":0, "status": "Failed to delete" }';
        }
    }
}//end of delete_task ( )


/**
 * Function to add a new task
 */
function add_task ( )
{
    if ( isset ( $_REQUEST [ 'task_title' ] ) && isset ( $_REQUEST [ 'task_description' ] ) 
            && isset ( $_REQUEST [ 'user_id' ] ) && isset ( $_REQUEST [ 'task_collaborator' ] )
            && isset ( $_REQUEST [ 'task_start_date' ] ) && isset ( $_REQUEST [ 'task_end_date' ] ) )
    {
        include '../models/user_class.php';

        $task_title = $_REQUEST [ 'task_title' ];
        $task_description = $_REQUEST [ 'task_description' ];
        $user_id = $_REQUEST [ 'user_id' ];
        $task_collaborator = $_REQUEST ['task_collaborator'];
        $task_start_date = $_REQUEST ['task_start_date'];
        $task_end_date = $_REQUEST ['task_end_date'];

        $obj = new User ( );

        if ( $obj->user_add_new_task ( $task_title, $task_description, $user_id, $task_collaborator,
                $task_start_date, $task_end_date ) )
        {
            echo ' { "result":1, "status": "Successfully added a new task to the database" } ';
        }
        else
        {
             echo ' { "result":0, "status": "Failed to add a new task to the database" }';
        }
    }
}//end of add_task ( )


/**
 * Fucntion to update a task
 */
function update_task ( )
{
    if ( isset ( $_REQUEST [ 'update_task_id' ] ) && isset ( $_REQUEST [ 'update_task_description' ] )
            && isset ( $_REQUEST [ 'update_task_title' ] ) && isset ( $_REQUEST [ 'update_task_title' ] )
            && isset ( $_REQUEST [ 'task_start_date' ] ) && isset ( $_REQUEST [ 'task_end_date' ] ) )
    {
        include '../models/user_class.php';
        
        $task_title = $_REQUEST [ 'update_task_title' ];
        $task_description = $_REQUEST [ 'update_task_description' ];
        $task_id = $_REQUEST [ 'update_task_id' ];
        $task_collaborator = $_REQUEST['task_collaborator'];
        $task_start_date = $_REQUEST ['task_start_date'];
        $task_end_date = $_REQUEST ['task_end_date'];
        
        $obj = new User ( );
        
         if ( $obj->user_update_task ( $task_id, $task_title, $task_description, $task_collaborator,
                  $task_start_date, $task_end_date ) )
        {
            echo ' { "result":1, "status": "Successfully updated task" } ';
        }
        else
        {
             echo ' { "result":0, "status": "Failed to update task" }';
        }   
    }
}//end of update_task ( )


/**
 * Function to search for a task
 */
function search_task ( )
{
    if ( isset ( $_REQUEST [ 'search_text' ] ) )
    {
        include '../models/user_class.php';
        
        $search_text = $_REQUEST [ 'search_text' ];
        session_start();
        $user_id = $_SESSION['user_id'];
        
        $obj = new User ( );
        
        if ( $obj->user_search_task ( $search_text, $user_id ) )
        {
            $row = $obj->fetch ( );
            echo '{"result":1, "tasks": [';
            while ( $row )
            {
                echo json_encode ( $row );
                $row = $obj->fetch ( );
                if ( $row )   {
                        echo ',';
                }
            }
                echo ']}';
        }   else
        {
            echo '{"result":0,"status": "An error occured for select product."}';
        }
    }
}//end of search_task()


/**
 * Function for user to login
 */
function user_login ( )
{
    if ( isset ( $_REQUEST['username'] ) & isset ( $_REQUEST['password'] ) )
    {
        include_once '../models/user_class.php';
        $obj = new User ( );
        $username = $_REQUEST ['username'];
        $password = $_REQUEST ['password'];
        $row = $obj->user_login ( $username, $password );
        if ( !$row )
        {
           echo '{"result":0, "message":"Failed to login"}';
        }
        else
        {
//            echo json_encode ( $row );
            session_start ( );
            $user_type = $row['user_type'];
            if ( $user_type == 'admin' )
            {
                echo '{"result":1, "username":"'.$row['username'].'"}';
                $_SESSION ['user_type'] = $user_type;
                $_SESSION ['user_id'] = $row['user_id'];
//                header("Location: home.php");
//                exit ( );
            }
            else if ( $user_type == 'regular')
            {
                echo '{"result":1, "username":"'.$row['username'].'"}';
                $_SESSION ['user_type'] = $user_type;
                $_SESSION ['user_id'] = $row['user_id'];
                $_SESSION ['path'] = $row['path'];
                $_SESSION ['username'] = $row['username'];
//                header("Location: home.php");
//                exit ( );
            }
        }
    }
}//end of user_login


/**
 * Function to delete a task
 */
function delete_tasks ( )
{
    if ( isset ( $_REQUEST ['task_id' ] ) )
    {
        include_once '../models/user_class.php';
        $task_id = $_REQUEST [ 'task_id' ];
        $obj = new User ( );
                
        foreach ( $task_id as $delete_id )
        {
            if ( $obj->user_delete_task ( $delete_id ) )
            {
                echo '{"result":1, "status": "Deleted"}';
            }
            else
            {
                echo '{"result":0, "status":"Not Deleted"}';
            }
        }//end of foreach        
    }
    else
    {
        echo '{"result":0, "status":"Not Deleted"}';
    }
}//end of delete_tasks


/**
 * Function to select a collaborator
 */
function  select_collaborator ( )
{
    if ( isset ( $_REQUEST['user_id'] ) )
    {
        $user_id = $_REQUEST['user_id'];
//        session_start();
//        $user_id = $_SESSION['user_id'];
        include_once '../models/user_class.php';
        $obj = new User ( );
 
        if ( $obj->user_select_collaborator ( $user_id ) )
        {
            $row = $obj->fetch ( );
            echo '{"result":1, "collaborator": [';
            while ( $row )
            {
                echo json_encode ( $row );
                if ( $row = $obj->fetch ( ) )
                {
                    echo ',';
                }
            }
            echo ']}';
        }
        else
        {
            echo '{"result":0, "status":"failed to load collaborators"}';
        }
    }
}//end of select_collaborator


/**
 * Function to display created task by user
 */
function display_created_task ( )
{
    include '../models/user_class.php';
    $obj = new User ( );
    session_start();
    $user_id = $_SESSION['user_id'];
       
    if ( $obj->user_display_created_tasks ( $user_id ) )
    {
        $row = $obj->fetch ( );
        echo '{"result":1, "tasks": [';
        while ( $row )
        {
            echo '{"task_id": "'.$row ["task_id"].'", "task_title": "'.$row ["task_title"].'", 
            "task_description": "'.$row ["task_description"].'",  "user_sname": "'.$row ["user_sname"].'",
            "user_fname": "'.$row ["user_fname"].'"}';
            
            if ($row = $obj->fetch ( ) )   {
                    echo ',';
            }
        }
            echo ']}';
    }   else
    {
        echo '{"result":0,"status": "An error occured for select product."}';
    }
}//end of display_created_task()


/**
 * Function for user to search created tasks
 */
function search_created_tasks ( )
{
     if ( isset ( $_REQUEST [ 'search_text' ] ) )
    {
        include '../models/user_class.php';
        
        $search_text = $_REQUEST [ 'search_text' ];
        session_start();
        $user_id = $_SESSION['user_id'];
        
        $obj = new User ( );
        
        if ( $obj->user_search_created_task ( $search_text, $user_id ) )
        {
            $row = $obj->fetch ( );
            echo '{"result":1, "tasks": [';
            while ( $row )
            {
                echo json_encode ( $row );
                $row = $obj->fetch ( );
                if ( $row )   {
                        echo ',';
                }
            }
                echo ']}';
        }   else
        {
            echo '{"result":0,"status": "An error occured for select product."}';
        }
    }
}//end of search_created_tasks()


function sendMail ( )
{
    $admin = "chok.real@gmail.com";
    $mail = "fredrick.abayie@ashesi.edu.gh";
    $subject = "Mail sending first test";
    $comment = "good or bad";
    
    if ( mail($admin, $subject,  $comment, 'From'.$mail) )
    {
      echo '{"success"}';
    }
}