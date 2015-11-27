<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
  $cmd = $_REQUEST[ 'cmd' ];

  switch ( $cmd )
  {
      case 'user_login':
          user_login ( );
          break;

      default:
          echo '{"result":0,status:"unknown command"}';
          break;
  }//end of switch

}

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
