<?php

include "../includes/db_connect.php";
$message=''; // Variable To Store Error Message

//receive the values from the form and assign them to variables
if(isset($_POST['post_data'])){

    $event_date=$_POST['event_date'];
    $event_time=$_POST['event_time'];
    $event_name=$_POST['event_name'];

    //check if user name already exists
    $check_event = "select event_name from events where event_date ='$event_date' AND event_time='$event_time'";
    $run_check_event = mysqli_query($connection, $check_event);
    $row_event = mysqli_num_rows($run_check_event);

    // if user name exist generate error message
    if($row_event == 1)
    {
    $message = "Sorry, event already exists. Please use a different event name/time!";
    }
    else
    {
    // insert group details into the table events
    $register_event = "insert into events (event_date, event_time, event_name)
    values('$event_date','$event_time','$event_name')";

    $run_register_event = mysqli_query($connection, $register_event);

    if($run_register_event) //confirm the member details were inserted into table
    {
    $message = "<p style='color: green;'>Success, event added successfully!</p>";
    }
    else
    {
    $message = "Sorry, registration failed. Please try again!";
    }
    }
}

?>


<div class="content_divs">
<h3 align="center"><b>Add New Group</b></h3><br>
<form action="" method="post" class="form-horizontal ws-validate" role="form">
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Event Date*</label>
<div class="col-sm-5"> 
<input type="Date" class="form-control" id="name" name="event_date" autofocus="" required="" min="<?php echo date('Y-m-d'); ?>">
</div>
</div>
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Event Time*</label>
<div class="col-sm-5"> 
<input type="Time" class="form-control" id="name" name="event_time" required="">
</div>
</div>
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Event Name*</label>
<div class="col-sm-5"> 
<input type="text" class="form-control" id="name" name="event_name" placeholder="Event Name" autofocus="" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
</div>
</div>
<div class="form-group"> 
<div class="col-sm-offset-4 col-sm-8">
<input type="submit" value=" Save" name="post_data" class="btn btn-primary">
<a href="events.php" class="btn btn-link" title="Cancel"> Cancel</a>
</div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
        <span style="color:red;"><?php echo $message; ?></span>
    </div>
</div>
</form>
</div>