<?php

include "../includes/db_connect.php";
$message=''; // Variable To Store Error Message

//receive the values from the form and assign them to variables
if(isset($_POST['post_data'])){

    $group_name=$_POST['group_name'];

    //check if user name already exists
    $check_grp = "select group_name from groups where group_name ='$group_name'";
    $run_check_grp = mysqli_query($connection, $check_grp);
    $row_grp = mysqli_num_rows($run_check_grp);

    // if user name exist generate error message
    if($row_grp == 1)
    {
    $message = "Sorry, group already exists. Please use a different Group Name!";
    }
    else
    {
    // insert group details into the table groups
    $register_grp = "insert into groups (group_name)
    values('$group_name')";

    $run_register_grp = mysqli_query($connection, $register_grp);

    if($run_register_grp) //confirm the member details were inserted into table
    {
    $message = "<p style='color: green;'>Success, Group added successfully!</p>";
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
<label for="username" class="col-sm-4 control-label">Group name*</label>
<div class="col-sm-5"> 
<input type="text" class="form-control" id="name" name="group_name" placeholder="Group name" autofocus="" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
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