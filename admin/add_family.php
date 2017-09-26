<?php

include "../includes/db_connect.php";
$message=''; // Variable To Store Error Message

//receive the values from the form and assign them to variables
if(isset($_POST['post_data'])){

    $family_name=$_POST['family_name'];

    //check if user name already exists
    $check_family = "select family_name from families where family_name ='$family_name'";
    $run_check_family = mysqli_query($connection, $check_family);
    $row_family = mysqli_num_rows($run_check_family);

    // if user name exist generate error message
    if($row_family == 1)
    {
    $message = "Sorry, family already exists. Please use a different Family Name!";
    }
    else
    {
    // insert group details into the table groups
    $register_family = "insert into families (family_name)
    values('$family_name')";

    $run_register_family = mysqli_query($connection, $register_family);

    if($run_register_family) //confirm the member details were inserted into table
    {
    $message = "<p style='color: green;'>Success, family added successfully!</p>";
    }
    else
    {
    $message = "Sorry, registration failed. Please try again!";
    }
    }
}

?>


<div class="content_divs">
<h3 align="center"><b>Add New Family</b></h3><br>
<form action="" method="post" class="form-horizontal ws-validate" role="form">
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Family name*</label>
<div class="col-sm-5"> 
<input type="text" class="form-control" id="name" name="family_name" placeholder="Family name" autofocus="" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
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