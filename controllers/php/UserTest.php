<?php

require_once('User.php');

/**
 * This class is to model a user in the Nurse Task
 * Management System.
 *
 * @category   Tests
 * @package    com.softwareengineering.group1
 * @author     Abayie Fredrick <fredrick.abayie@ashesi.edu.gh>
 * @copyright  1998-2015 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id:$
 * @since      File available since Release 1.2.0
 */

/**
 * Created by PhpStorm.
 * User: fredrickabayie
 * Date: 15/12/2015
 * Time: 10:31
 */
class UserTest extends PHPUnit_Framework_TestCase
{

    /**
     * Function to test the user login query
     *
     */
    public function testUserLogin()
    {
        $userLogin = new User();
        $username = "fredrick.abayie";
        $password = "fredrick.abayie";

        $this->assertTrue($userLogin->userLogin($username,$password) !== false);
    }

    /**
     * Function to test the display user created tasks query
     *
     */
    public function testUserDisplayCreatedTasks()
    {
        $userDisplayCreatedTasks = new User();
        $userId = "1";

        $this->assertTrue($userDisplayCreatedTasks->userDisplayCreatedTasks($userId) !== false);
    }

    /**
     * Function to test preview a task query
     *
     */
    public function testUserPreviewTask()
    {
        $userPreviewTask = new User();
        $taskId = "4";

        $this->assertTrue($userPreviewTask->userPreviewTask($taskId) !== false);
    }

    /**
     * Function to test deleting of a task query
     *
     */
    public function testUserDeleteTask()
    {
        $userDeleteTask = new User();
        $taskId = "187";

        $this->assertTrue($userDeleteTask->userDeleteTask($taskId) !== false);
    }

}
