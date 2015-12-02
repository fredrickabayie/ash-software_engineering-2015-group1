$(document).ready(function(){
    $("#SearchButton").click(function(){
    	var tn = $("#tn").val();
    	var u = "../controllers/controller.php?cmd=1&tn="+tn;
    	var response = sendRequest(u);
    	if (response.result == 1){
    		var j = response.message.length;
    		var htmlString = "";
    		for (var i = 0; i<j; i++){
    			var taskid = response.message[i]['taskid'];
    			var nurseid = response.message[i]['nurseid'];
    			var task_title = response.message[i]['task_title'];
    			var task_description = response.message[i]['task_description'];
    			var task_start_date = response.message[i]['task_start_date'];
    			var task_end_date = response.message[i]['task_end_date'];
    			var details = taskid + " " + nurseid+ " " + task_title + " " + task_description + " " + task_start_date + " " + task_end_date;
    			
    			htmlString += "<tr><td>"+taskid+"</td><td>"+nurseid+"</td><td>"+task_title+"</td><td>"+task_description+"</td><td>"+task_start_date+"</td><td>"+task_end_date+"</td></tr>"
    		}
    	}
    	$("tbody").html(htmlString);
    });
});

function sendRequest(u){
				// Send request to server
				//u a url as a string
				//async is type of request
				var obj=$.ajax({url:u,async:false});
				//Convert the JSON string to object
				var result=$.parseJSON(obj.responseText);
				return result;	//return object
				
			}