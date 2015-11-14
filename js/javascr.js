  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
       function sendRequest(u){
           var obj=$.ajax({url :u,async:false});
           var result=$.parseJSON(obj.resoponseText);
           return result;
           
       } 
function viewform(){
    var obj=sendRequest("addTask.html");
    
}