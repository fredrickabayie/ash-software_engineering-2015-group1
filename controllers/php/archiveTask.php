<?php

include_once 'Adb.php';


    class Archive extends adb {

        //Function to open or establish a connection
        function __construct()
        {
            parent::__construct();
        }

        //Function to close the mysql connection
        function __destruct()
        {
            parent::__destruct();
        }

        /**
         * Function to view all the tasks
         *
         * @param $nurseId The id of the nurse
         * @return bool Returns true when data is found and false otherwise
         */
        function viewTasks ( $nurseId ) {
            $viewQuery = "SELECT *
                          FROM `system_tasks`
                          WHERE `system_tasks.user_id`='$nurseId'";
            return $this->query($viewQuery);
        }

    }