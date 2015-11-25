<?php
include("task.php");
if (!isset($_REQUEST['cmd'])){
	echo '{"result" : 0, "message" : "Unset Comand"}';
}
?>