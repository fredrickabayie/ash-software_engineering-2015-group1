<!DOCTYPE html>
<html>
    <head><title>Add Modal</title></head>
     <!--<link type="text/css" rel="stylesheet" href="css/style.css">-->
    <body>
        <style>

.task_title
{
    padding-left: 15px;
    padding-right: 15px;
    font-family: 'Helvetica Neue', Helvetica, sans-serif;;
    font-size: 15px;
    border-bottom: 1px solid black;
    /*width: 370px;*/
    width: 100%;
    height: 35px;
    border-top: none;
    border-left: none;
    border-right: none;
    border-radius: 10px;
/*     box-shadow: none;*/
    /*border-style: none;*/
}

.task_description
{
    /*padding-left: 2px;*/
    /*padding-right: 2px;*/
    font-family: 'Helvetica Neue', Helvetica, sans-serif;;
    font-size: 15px;
    /*border: 1px solid black;*/
    /*width: 370px;*/
    width: 100%;
    height: 135px;
    border-radius: 10px;
/*     box-shadow: none;*/
    /*border-style: none;*/
}
        </style>
        
         <div class="add" id="add" style="display: none">
             <div style="margin-top: 90px">
                 Select Collaborator: <select id="collaborator" class="collaborator" style="width:140px; height: 30px;">
               
            </select>
        </div><br>
         <div>
             Priority:&nbsp;<select id="priority" class="priority">
                <option value="hight">High</option>
                <option value="normal">Normal</option>
                <option value="low">Low</option>
            </select>
        </div><br>
            <div>
               <input class="task_title" id="task_title" name="task_title" type="text" placeholder="Add a task title" required="">
            </div><br>
        <div>
            <textarea class="task_description" id="task_description" name="task_description" type="text" placeholder="task description" required="">
            </textarea>
        </div><br>
        <div>
            Start date: <input style="width:140px; height: 30px;" id="task_start_date" name="task_start_date" type="date" placeholder="start date" required="">
   
            End date: <input style="width:140px; height: 30px;" id="task_end_date" name="task_end_date" type="date" placeholder="end date" required="">
        </div><br>
       
<!--        <div>
            <button class="add_button" id="add_button" type="button" name="add_button" onclick="insertTask ( )">Insert</button>
        </div><br>-->
        </div>
</body>
</html>