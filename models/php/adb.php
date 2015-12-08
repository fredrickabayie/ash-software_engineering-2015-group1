<?php 
	class adb {
		var $conn;

		//constructor
		function __construct(){
			//connecting to database
			$this->connect();
		}

		//destructor
		function __destruct(){
			//cloding db connection
			$this->close();
		}

		/**
     	* Establishing database connection
     	* @return database handler
     	*/
     	function connect(){
     		include_once 'config.php';

     		//connecting to mysql database
     		$this->conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die(mysql_error());

     		//selecting database
     		mysql_select_db(DB_NAME) or die (mysql_error());

     		//returning connection resource
     		return $this->conn;
     	}
        
        
        function query($str_sql) {
            if ( !$this->connect()){
                return false;
            }
            
            $this->result = mysql_query($str_sql,$this->conn);
            return true;
        }
        
        
        /**
        *returns a row from a data set
        */
        function fetch ( )
        {
            return mysql_fetch_assoc ( $this->result );
        }

     	/**
     	*cloding database connection
     	*/

     	function close(){
     		//closing db connection
     		return mysql_close($this->conn);
     	}

	}
 ?>