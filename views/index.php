<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="UTF-8">
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">-->
         <meta http-equiv="Pragma" content="no-cache">
         <meta http-equiv="Expires" content="-1">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sign in to SAFE</title>

        <!--jquery library-->
        <link rel="stylesheet" href="../assets/javascripts/jquery-2.1.3.js" type="text/javascript">

        <!--css-->
        <link rel="stylesheet" href="../assets/stylesheets/dashboard.css" type="text/css">

        <!--font awesome-->
        <link rel="stylesheet" href="../assets/stylesheets/font-awesome.min.css" type="text/css">
        <!--<link rel="stylesheet" href="../assets/stylesheets/font-awesome.css" type="text/css">-->
        <script src="../assets/javascripts/jquery-2.1.3.js"></script>
    </head>

    <body>
        <div id="background">  
            <div id="image">
                <!--<img src="../assets/img/illustration.jpg">-->
            </div>

            <div id="loginpanel" style="background-color: #F9F9F9">
                <div id="safe" style="margin-left: 55px; margin-top: 90px">
                   <h3>SAFE</h3>
                 </div>

                <div id="label" style="margin-top: 130px; margin-left: 60px; margin-bottom: 40px">
                     <p>Sign in with details provided by admin</p>
                </div>

                <!--<form action="index.php" method="POST" enctype="application/x-www-form-urlencoded">-->
                    <input type="text" placeholder="username" required="" class="username" id="username" name="username" value="" autocomplete="off">
                    <input type="password" placeholder="password" required="" class="password" id="password" name="password">
                    <input type="submit" value="Login" id="loginbutton">
                <!--</form>-->

                <div id="loginstatus" style="text-align: center; margin-top: 60px">
                    
                </div>

            </div>
        </div>

        <script>

//            Function to send a request
            function syncAjax ( u )
            {
                var obj = $.ajax ({url: u, async: false});
                var result = $.parseJSON ( obj.responseText );
                return result;
            }//end of syncAjax


            //function to make a request
            $( function ( )
            {
                $("#loginbutton").click( function ( )
                {
                    var username = $("#username").val();
                    var password = $("#password").val();
                   var url = "../controllers/user_controller.php?cmd=7&username="+username+"&password="+password; 
                   var obj = syncAjax ( url );
                   if ( obj.result === 1 )
                   {
                       $("#loginstatus").text(obj.username);
                      window.location.replace("home.php");
                   }
                   else 
                   {
                       $("#loginstatus").text(obj.message);
                   }
                });
            });
        </script>

    </body>

</html>