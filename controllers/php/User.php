<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This is the model file for the user in the system. The file
 * contains all the needed functions for the a user in the
 * Nurse Task Management System
 *
 * PHP versions 5.5.29
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Controller
 * @package    com.softwareengineering.group1
 * @author     Abayie Fredrick <fredrick.abayie@ashesi.edu.gh>
 * @copyright  1998-2015 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id:$
 * @since      File available since Release 1.2.0
 */

/*
 * Including external files
 */
include_once('Adb.php');

/**
 * This class is to model a user in the Nurse Task
 * Management System.
 *
 * @category   Controller
 * @package    com.softwareengineering.group1
 * @author     Abayie Fredrick <fredrick.abayie@ashesi.edu.gh>
 * @copyright  1998-2015 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id:$
 * @since      File available since Release 1.2.0
 */
class User extends Adb
{

    /**
     * Constructor for the user class
     *
     */
    final public function __construct()
    {
        parent::Adb();
    }
//
//
//    /**
//     * Destructor for the user class
//     *
//     */
//    final public function __destruct()
//    {
//        parent::__destruct();
//    }


    /**
     * Function to allow user login
     *
     * @param String $username The username of the user
     * @param String $password The password of the user
     * @return boolean Results of the query (TRUE/FALSE)
     */
    final public function userLogin($username, $password)
    {
        $login_Query = "SELECT *
                        FROM system_login
                        JOIN system_users
                        ON system_users.user_id=system_login.user_id
                        AND system_login.username='$username'
                        AND system_login.password=MD5('$password')
                        limit 1";

        if (!$this->query($login_Query)) {
            return false;
        } else {
            return $this->fetch();
        }
    }


    /**
     * Function to display created tasks
     *
     * @param String $user_Id The user's identification number
     * @return boolean Results of the query (TRUE/FALSE)
     */
    final public function userDisplayCreatedTasks($user_Id)
    {
        $display_Query = "SELECT task_id, task_description, task_title, user_fname,
                          user_sname, task_start_date, task_end_date
                          FROM system_tasks
                          JOIN system_users
                          ON system_tasks.user_id=system_users.user_id
                          AND system_tasks.user_id='$user_Id'
                          ORDER BY task_id DESC";

        return $this->query($display_Query);
    }


    /**
     * Function to preview a selected task
     *
     * @param Integer $task_Id The id of task to be previewed
     * @return boolean Results of the query (TRUE/FALSE)
     */
    final public function userPreviewTask($task_Id)
    {
        $preview_Query = "SELECT task_id, task_description, task_title, user_fname, user_sname, task_status,
                          system_tasks.user_id, path, task_collaborator, task_start_date, task_end_date
                          FROM system_tasks
                          JOIN system_users
                          ON system_users.user_id=system_tasks.user_id
                          AND system_tasks.task_id='$task_Id'";

        return $this->query($preview_Query);
    }


    /**
     * Function to delete a task
     *
     * @param Integer $task_Id The id of the task to delete
     * @return Boolean Results of the query (TRUE/FALSE)
     */
    final public function userDeleteTask($task_Id)
    {
        $delete_Query = "DELETE FROM
                         system_tasks
                         WHERE task_id='$task_Id'";

        return $this->query($delete_Query);
    }


    /**
     * Function to update a task
     *
     * @param Integer $task_Id The task Id to be updated
     * @param String $task_Title The new title of the task
     * @param String $task_Description The new description of the task
     * @param String $task_Collaborator The new collaborators of the task
     * @param String $task_Start_Date The new start date of the task
     * @param String $task_End_Date The new end date of the task
     * @return Boolean Results of the query (TRUE/FALSE)
     */
    final public function userUpdateTask($task_Id, $task_Title, $task_Description,
                            $task_Collaborator, $task_Start_Date, $task_End_Date)
    {
        $update_Query = "UPDATE system_tasks
                         SET system_tasks.task_title='$task_Title',
                         system_tasks.task_description='$task_Description',
                         system_tasks.task_collaborator='$task_Collaborator',
                         system_tasks.task_start_date='$task_Start_Date',
                         system_tasks.task_end_date='$task_End_Date'
                         WHERE system_tasks.task_id='$task_Id'";

        return $this->query($update_Query);
    }

}