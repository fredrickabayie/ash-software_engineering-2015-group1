<!DOCTYPE html>
<html>
    <head><title>Add Modal</title></head>
     <!--<link type="text/css" rel="stylesheet" href="css/style.css">-->
    <body>
        <style>

.update_task_id
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
/*     box-shadow: none;
    border-style: none;*/
}

.update_task_title
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
/*     box-shadow: none;
    border-style: none;*/
}

.update_task_description
{
    padding-left: 2px;
    padding-right: 2px;
    font-family: 'Helvetica Neue', Helvetica, sans-serif;;
    font-size: 15px;
    border-bottom: 1px solid black;
    /*width: 370px;*/
    width: 100%;
    height: 135px;
    border-radius: 3px;
/*     box-shadow: none;*/
    /*border-style: none;*/
}
        </style>
        
     
        
        
        <div class="update" style="display: none; margin-top: 90px">
        <div class="showupdatepanel">
        <div>
        Select Collaborator: <select id="collaborator" class="collaborator">
            
        </select>
    </div><br>
        <div>
            <input style="display: none" class="update_task_id" id="update_task_id" name="update_task_id" type="text" placeholder="task id">
        </div><br> 
        <div>
            <input class="update_task_title" id="update_task_title" name="update_task_title" type="text" placeholder="task title">
        </div><br> 
        <div>
            <textarea class="update_task_description"  id="update_task_description" name="update_task_description" type="text" placeholder="task description" required="">
            </textarea>
        </div><br>
        
        <div>
            Start date: <input style="width:140px; height: 30px;" id="task_start_date" name="task_start_date" type="date" placeholder="start date" required="">
   
            End date: <input style="width:140px; height: 30px;" id="task_end_date" name="task_end_date" type="date" placeholder="end date" required="">
        </div><br>
        </div>
        </div>
</body>
</html>