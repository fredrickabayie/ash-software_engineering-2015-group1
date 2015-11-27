<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">-->
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!--css-->
<link rel="stylesheet" href="../assets/stylesheets/dashboard.css" type="text/css">

<!-- materialize css -->
    <!-- <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"/> -->
<!--<link type="text/css" rel="stylesheet" href="../assets/materialize/css/materialize.min.css"  media="screen,projection">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">

<!--font awesome-->
<link type="text/css" rel="stylesheet" href="../assets/fontawesome/css/font-awesome.min.css"/>

<title>Sign in to SAFE</title>
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
<!-- <a class="waves-effect waves-light btn">Stuff</a> -->
<!--</form>-->

<div id="loginstatus" style="text-align: center; margin-top: 60px">

</div>

</div>
</div>

<!-- materialize -->
<!-- <script type="text/javascript" src="../assets/materialize/js/materialize.min.js"></script> -->

<!-- JQuery -->
<script type="text/javascript" src="../assets/javascripts/jquery-2.1.3.js"></script>

<!-- Login controller -->
<script type="text/javascript" src="../controllers/login_controller.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
</body>


</html>
