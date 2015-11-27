<?php
session_start();
if ( isset ( $_SESSION [ 'user_type' ] ) && isset ( $_SESSION [ 'user_id' ] )  )
{
    if ( $_SESSION [ 'user_type' ] == 'admin' )
    {
       echo "<input id='user_id' class='user_id' type='text' value='$_SESSION [ 'user_id']'>";
    }
    else{
        echo "yo";
    }
}
?>
<html>
    <head><title></title></head>
    <body><?php echo $_SESSION [ 'user_type' ];?></body>
</html>
