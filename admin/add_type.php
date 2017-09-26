<?php

include "../includes/db_connect.php";
$message=''; // Variable To Store Error Message

//receive the values from the form and assign them to variables
if(isset($_POST['post_data'])){

    $contribution_name=$_POST['contribution_name'];

    //check if entry already exists
    $check_data = "select contribution_name from contribution_types where contribution_name ='$contribution_name'";
    $run_check_data = mysqli_query($connection, $check_data);
    $row_data = mysqli_num_rows($run_check_data);

    // if entry exists generate error message
    if($row_data == 1)
    {
    $message = "Sorry, category already exists. Please use a different name!";
    }
    else
    {
    // insert details into the table events
    $insert_data = "insert into contribution_types (contribution_name)
    values('$contribution_name')";

    $run_insert_data = mysqli_query($connection, $insert_data);

    if($run_insert_data) //confirm the details were inserted into table
    {
    $message = "<p style='color: green;'>Success, category added successfully!</p>";
    }
    else
    {
    $message = "Sorry, registration failed. Please try again!";
    }
    }
}

?>


<div class="content_divs">
<h3 align="center"><b>Add Contribution Type</b></h3><br>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
        <span style="color:red;"><?php echo $message; ?></span>
    </div>
</div>
<form action="" method="post" class="form-horizontal ws-validate" role="form">
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Contribution Name*</label>
<div class="col-sm-5"> 
<input type="text" class="form-control" id="name" name="contribution_name" placeholder="Contribution Type" autofocus="" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
</div>
</div>
<div class="form-group"> 
<div class="col-sm-offset-4 col-sm-8">
<input type="submit" value=" Save" name="post_data" class="btn btn-primary">
<a href="contribution_types.php" class="btn btn-link" title="Cancel"> Cancel</a>
</div>
</div>
</form>
</div>