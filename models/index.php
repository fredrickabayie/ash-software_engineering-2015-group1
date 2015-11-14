<?php

/**
 * Including others files into this document
 */
include_once ( 'adb.php' );

/**
 * Creating an instance of other class in the include files
 */
class Login extends adb
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
    function user_login ( $username, $password )
    {
       $login_query = "select system_login.user_id, system_login.user_type, system_login.username "
               . "from system_login"
               . " where username='$username' and password=MD5('$password') limit 1";
       if ( !$this->query ( $login_query ) )
       {
           return false;
       }
       else
       {
          return $this->fetch ( );
       }
    }//end of add_new_task
    
        
}//end of class