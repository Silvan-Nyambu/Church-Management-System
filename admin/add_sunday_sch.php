<?php

include "../includes/db_connect.php";
$message=''; // Variable To Store Error Message

//receive the values from the form and assign them to variables
if(isset($_POST['post_data'])){

    $name=$_POST['name'];
    $status=$_POST['status'];

    //check if name already exists
    $check_sunday_sch = "select name from sunday_sch where name ='$name'";
    $run_check_sunday_sch = mysqli_query($connection, $check_sunday_sch);
    $row_sunday_sch = mysqli_num_rows($run_check_sunday_sch);

    // if user name exist generate error message
    if($row_sunday_sch == 1)
    {
    $message = "Sorry, group name already exists. Please use a different name!";
    }
    else
    {
    // insert group details into the table groups
    $register_sunday_sch = "insert into sunday_sch (name, status)
    values('$name','$status')";

    $run_register_sunday_sch = mysqli_query($connection, $register_sunday_sch);

    if($run_register_sunday_sch) //confirm the member details were inserted into table
    {
    $message = "<p style='color: green;'>Success, group added successfully!</p>";
    }
    else
    {
    $message = "Sorry, registration failed. Please try again!";
    }
    }
}

?>


<div class="content_divs">
<h3 align="center"><b>New Sunday School Group</b></h3><br>
<form action="" method="post" class="form-horizontal ws-validate" role="form">
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Sunday School Group name*</label>
<div class="col-sm-5"> 
<input type="text" class="form-control" id="name" name="name" placeholder="Sunday School Group Name" autofocus="" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
</div>
</div>
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Status*</label>
<div class="col-sm-5"> 
<select class="form-control" name="status" required="">
    <option value="">--Select</option>
    <option>Active</option>
    <option>Inactive</option>
</select>
</div>
</div>
<div class="form-group"> 
<div class="col-sm-offset-4 col-sm-8">
<input type="submit" value=" Save" name="post_data" class="btn btn-primary">
<a href="index.php" class="btn btn-link" title="Cancel"> Cancel</a>
</div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
        <span style="color:red;"><?php echo $message; ?></span>
    </div>
</div>
</form>
</div>