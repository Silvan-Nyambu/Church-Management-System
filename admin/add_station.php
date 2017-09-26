<?php

include "../includes/db_connect.php";
$message=''; // Variable To Store Error Message

//receive the values from the form and assign them to variables
if(isset($_POST['post_data'])){

    $station_name=$_POST['station_name'];

    //check if user name already exists
    $check_station = "select station_name from stations where station_name ='$station_name'";
    $run_check_station = mysqli_query($connection, $check_station);
    $row = mysqli_num_rows($run_check_station);

    // if user name exist generate error message
    if($row == 1)
    {
    $message = "Sorry, station already exists. Please use a different station name!";
    }
    else
    {
    // insert group details into the table stations
    $register = "insert into stations (station_name)
    values('$station_name')";

    $run_register = mysqli_query($connection, $register);

    if($run_register) //confirm the member details were inserted into table
    {
    $message = "<p style='color: green;'>Success, station added successfully!</p>";
    }
    else
    {
    $message = "Sorry, registration failed. Please try again!";
    }
    }
}

?>


<div class="content_divs">
<h3 align="center"><b>Add New Station</b></h3><br>
<form action="" method="post" class="form-horizontal ws-validate" role="form">
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Station name*</label>
<div class="col-sm-5"> 
<input type="text" class="form-control" id="name" name="station_name" placeholder="Station name" autofocus="" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
</div>
</div>
<div class="form-group"> 
<div class="col-sm-offset-4 col-sm-8">
<input type="submit" value=" Save" name="post_data" class="btn btn-primary">
<a href="stations.php" class="btn btn-link" title="Cancel"> Cancel</a>
</div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
        <span style="color:red;"><?php echo $message; ?></span>
    </div>
</div>
</form>
</div>