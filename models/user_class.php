<?php

/**
 * Including others files into this document
 */
include_once ( 'adb.php' );

/**
 * Creating an instance of other class in the include files
 */
class User extends adb
{
    
    /**
     * Constructor
     */
    function _construct ( )
    {
        $this->establish_connection ( );
    }//end of constructor
    
    /**
     * Destructor
     */
    function _destruct ( )
    {
        $this->close_connection ( );
    }//end of destructor
    
    
    /**
     * Function to allow user login
     * @param type $username
     * @param type $password
     * @return boolean
     */
    function user_login ( $username, $password )
    {
        $login_query = "select *
                                from system_login
                                join system_users
                                on system_users.user_id=system_login.user_id
                                and system_login.username='$username' 
                                and system_login.password=MD5('$password') 
                                limit 1";
       if ( !$this->query ( $login_query ) )
       {
           return false;
       }
       else
       {
          return $this->fetch ( );
       }
    }//end of add_new_task
        
    
    /**
     * Function to display created tasks
     * @return type Returning the result of the query
     */
    function user_display_created_tasks ( $user_id )
    {
       $display_query = "select task_id, task_description, task_title, user_fname, user_sname,
                                task_start_date, task_end_date
                                from system_tasks
                                join system_users
                                on system_tasks.user_id=system_users.user_id 
                                and system_tasks.user_id='$user_id'
                                order by task_id desc"; 
       return $this->query ( $display_query );
    }//admin_display_all_tasks ( )
    
    
   /**
     * Function to display ssigned tasks
     * @return type Returning the result of the query
     */
    function user_display_assigned_tasks ( $user_id )
    {
       $display_query = "select task_id, task_description, task_title, user_fname, user_sname,
                                task_start_date, task_end_date
                                from system_tasks
                                join system_users
                                on system_tasks.user_id=system_users.user_id 
                                and system_tasks.task_collaborator='$user_id'
                                order by task_id desc";
       try
       {
           return $this->query ( $display_query );
       } catch (Exception $ex) {
           
       }
    }//end of_user_display_tasks ( )
    
    
    /**
     * Function to preview a selected id
     * @param type $task_id The id of task to be previewed
     * @return type Returning the result of the query
     */
    function user_preview_task ( $task_id )
    {
        $preview_query = "select task_id, task_description, task_title, user_fname, user_sname, task_status,
                                    system_tasks.user_id, path, task_collaborator, task_start_date, task_end_date
                                    from system_tasks
                                    join system_users
                                    on system_users.user_id=system_tasks.user_id and system_tasks.task_id='$task_id'";
        return $this->query ( $preview_query );
    }//end of admin_preview_task ( $task_id )
    
    
    /**
     * Function to delete a task
     * @param type $task_id The id of the task to delete
     * @return type Returning the result of the query
     */
    function user_delete_task ( $task_id )
    {
        $delete_query = "delete from system_tasks where task_id='$task_id'";
        return $this->query ( $delete_query );
    }//end of admin_delete_task ( $task_id )
    
    
    /**
     * Function to add a new task
     * @param type $admin_id The user id of the admin
     * @return type Returning the result of the query
     */
    function user_add_new_task ( $task_title, $task_description, $user_id, $task_collaborator,
                                                    $task_start_date, $task_end_date )
    {
        $add_query = "insert into `system_tasks` ( `task_title`, `task_description`, `user_id`,"
                . " `task_collaborator`, `task_start_date`, `task_end_date` )"
                . "values ( '$task_title', '$task_description', '$user_id', '$task_collaborator', "
                . "'$task_start_date', '$task_end_date' )";
        return $this->query ( $add_query );        
    }//end of admin_add_new_task ( $user_id )
    
    
    /**
     * Function to allow user to select collaborator
     * @return type 
     */
    function user_select_collaborator ( $user_id )
    {
        $collaborator_query = "select user_fname, user_sname, system_users.user_id, user_type 
                                    from system_users 
                                    inner join system_login
                                    on system_login.user_id = system_users.user_id
                                    and system_login.user_type != 'admin' and system_users.user_id != '$user_id'";
        return $this->query ( $collaborator_query );
    }//end of user_select_collaborator ( )
    
    
    /**
     * Function to update a task
     * @param type $task_id
     * @param type $task_title
     * @param type $task_description
     * @param type $task_start_date
     * @param type $task_end_date
     * @return type Returning the result of the query
     */
    function user_update_task ( $task_id, $task_title, $task_description, $task_collaborator,
                                                $task_start_date, $task_end_date )
    {
        $update_query = "update system_tasks set system_tasks.task_title='$task_title',
                                   system_tasks.task_description='$task_description',
                                   system_tasks.task_collaborator='$task_collaborator',
                                   system_tasks.task_start_date='$task_start_date',
                                   system_tasks.task_end_date='$task_end_date'
                                   where system_tasks.task_id='$task_id'";
        return $this->query ( $update_query );
    }//end of update or edit task
    
    
    /**
     * Function to search for a task
     * @param type $search_text The text to be searched
     * @return type Returning the result obtained
     */
    function user_search_task ( $search_text, $user_id )
    {
        $search_query = "select task_id, task_description, task_title, user_fname, user_sname,
                                task_start_date, task_end_date
                                from system_tasks
                                join system_users
                                on system_tasks.user_id=system_users.user_id
                                and system_tasks.task_collaborator = '$user_id'
                                and system_tasks.task_title like '%$search_text%'
                                order by task_id desc";
        return $this->query ( $search_query );
    }//end of admin_search_task()
    
    
    /**
     * Function to search for a task
     * @param type $search_text The text to be searched
     * @return type Returning the result obtained
     */
    function user_search_created_task ( $search_text, $user_id )
    {
        $search_query = "select task_id, task_description, task_title, user_fname, user_sname,
                                task_start_date, task_end_date
                                from system_tasks
                                join system_users
                                on system_tasks.user_id=system_users.user_id
                                and system_tasks.user_id = '$user_id'
                                and system_tasks.task_title like '%$search_text%'
                                order by task_id desc";
        return $this->query ( $search_query );
    }//end of admin_search_task()
    
    
//  /**
//    * A function to get all the users
//    **/
//    function get_all_users ( )
//    {
//        $insert_query = "select * from system_users";
//        if ( !$this->query ( $str_sql ) )
//        {
//            return false;
//        }
//        else
//        {
//            return $this->fetch ( );
//        }
//    }//end of get_all_users()
    
//        /**
//     * Function to check nurse_id and nurse_password
//     * @return type Returning the result of the query
//     */
//    function user_display_tasks ( $user_id )
//    {
//       $display_query = "select task_id, task_description, task_title, user_fname, user_sname
//                                from system_tasks
//                                join system_users
//                                on system_tasks.user_id=system_users.user_id 
//                                and system_tasks.task_collaborator='$user_id'
//                                order by task_id desc";
//       return $this->query ( $display_query );
//    }//end of_user_display_tasks ( )
//    
//    
//    
//    /**
//     * Function to preview a selected id
//     * @param type $task_id The id of task to be previewed
//     * @return type Returning the result of the query
//     */
//    function user_preview_task ( $task_id )
//    {
//        $preview_query = "select task_id, task_description, task_title, user_fname, user_sname, system_tasks.user_id
//                                    from system_tasks
//                                    join system_users
//                                    on system_users.user_id=system_tasks.user_id and system_tasks.task_id='$task_id'";
//        return $this->query ( $preview_query );
//    }//end of user_preview_task ( $task_id )
//    
//    
//    /**
//     * Function to delete a task
//     * @param type $task_id The id of the task to delete
//     * @return type Returning the result of the query
//     */
//    function user_delete_task ( $task_id )
//    {
//        $delete_query = "delete from system_tasks where task_id='$task_id'";
//        return $this->query ( $delete_query );
//    }//end of user_delete_task ( $task_id )
//    
//    
//    /**
//     * Function to add a new task by the admin
//     * @param type $user_id The user id of the admin
//     * @return type Returning the result of the query
//     */
//    function user_add_new_task ( $task_title, $task_description, $admin_id )
//    {
//        $add_query = "insert into `system_tasks` ( `task_title`, `task_description`, `user_id` )"
//                . "values ( '$task_title', '$task_description', '$admin_id' )";
//        return $this->query ( $add_query );        
//    }//end of user_add_new_task ( $admin_id )
//    
//    /**
//     * 
//     * @param type $task_id
//     * @param type $task_title
//     * @param type $task_description
//     * @param type $task_start_date
//     * @param type $task_end_date
//     * @return type Returning the result of the query
//     */
//    function user_update_task ( $task_id, $task_title, $task_description )
//    {
//        $update_query = "update system_tasks set system_tasks.task_title='$task_title',
//                                   system_tasks.task_description='$task_description'
//                                   where system_tasks.task_id='$task_id'";
//        return $this->query ( $update_query );
//    }//end of update or edit task
        
    
        
}//end of class