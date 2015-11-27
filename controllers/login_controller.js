

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
