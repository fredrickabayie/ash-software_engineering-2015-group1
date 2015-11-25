  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });


       $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
         
         function sendRequest(u){
        // Send request to server
        //u a url as a string
        //async is type of request
        // alert(u);
        var obj=$.ajax({url:u,async:false});

        // alert(obj);
        //Convert the JSON string to object
        var result=$.parseJSON(obj.responseText);
        // alert(result);
        return result;  //return object
        
     }

$(function(){
    $("#hid").click(function(){
        savetostask();
    });
});
         function savetotask(){
             alert("Clicked")
       var taskid=$("#task_id").val();
       var tasktitle=$("#task_title").val();
       var taskdescription=$("#textarea1").val();
       var startdate=$("#startdate").val();
       var enddate=$("#enddate").val();
             if(taskid=""){
                 alert("please enter task id.");
                 return;
             }
       var save="controller.php?cmd=1&taskid="+taskid+"&tasktitle="+tasktitle+"&taskdescp="+taskdescription+"&startdate="+startdate+"&enddate="+enddate;
       //prompt("url",save);
       var request = sendRequest(save);
       if(request.result==1){
        alert(request.message);
        return;
       }
       else{
        alert(request.message);
       }
    }
$(function(){
    $("#kid").click(function(){
        assignedta();
    });
});

function assignedta(){
  alert("entered");
    var taskid=$("#taskid").val();
    var tastitle=$("#tasktitle").val();
    var taskdescrip=$("#textarea").val();
    var startd=$("#stardate").val();
    var endate=$("#endat").val();
    var nurid=$("#nurseid").val();
    if(taskid==""){
       alert("enter task id");
  }
   else if (taskid.length<8){
       alert ("task id must be more than eight characters");
//        return;
//    } else if(/[^a-ZA-Z0-9_-]/.test(taskid)){
//        alert("your id should contain any of the follwing a,A,0-9");
//        return;
//    }else if(tastitle==""){
//        alert("please enter task title");
//        return;
//     }else if (taskdescrip==""){
//        alert("please enter task description");
//        return;
//        
//    }else if(startd==""){
//        alert("please enter start date for the task");
//        return;
//        
//    }else if(endate==""){
//        alert("please enter the end date");
//        return;
//        
//    }else if(nurid.length<8){
//        alert(" nurse id should be greater than 8 characeter");
//        return;
    }else{
        alert("save");
    var save="controller.php?cmd=2&tid="+taskid+"&ttitle="+tastitle+"&tdescrip="+taskdescrip+"&stdat="+startd+"&endate="+endate+"&nuid="+nurid;
        alert(save);
    var request=sendRequest("controller.php?cmd=2&tid="+taskid+"&ttitle="+tastitle+"&tdescrip="+taskdescrip+"&stdat="+startd+"&endate="+endate+"&nuid="+nurid);
        alert("jij "+request);
    if(request.result==1){
        alert(request.message);
        return;
    }else{
        alert(request.message);
        
    }
}
}