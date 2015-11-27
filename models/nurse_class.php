<?php

/**
 * Including others files into this document
 */
include_once ( 'adb.php' );

/**
 * Creating an instance of other class in the include files
 */
class Nurses extends adb
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
     * Function to check nurse_id and nurse_password
     */
    function nurse_login ( $nurse_id, $nurse_password )
    {
       $login_query = "select nurse_id, nurse_password from nurses where nurse_id='$nurse_id' and nurse_password='$nurse_password' limit 1"; 
       if ( !$this->query ( $login_query ) )
       {
           return false;
       }
       return $this->fetch ( );
    }//end of add_new_task
    
    	/**
    * A function to establish a connection
    **/
//    function add_nurse ( $name, $age, $sex, $department )
//    {
//        $insert_query = "insert into nurse set nurse_name='$name', age='$age', sex= '$sex', department = '$department'";
//        return $this->query ( $insert_query );
//    }
        
}