<?php

include "../includes/db_connect.php";
$message=''; // Variable to store message

//receive the values from the form and assign them to variables
if(isset($_POST['post_data'])){

    $names=$_POST['names'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    //check if user name already exists
    $check_user = "select email from members where email ='$email'";
    $run_check_user = mysqli_query($connection, $check_user);
    $row_user = mysqli_num_rows($run_check_user);

    // if user name exist generate error message
    if($row_user == 1)
    {
    $message = "Sorry, admin already exists. Please use a different email address!";
    }
    else
    {
    // insert user details into the table members
    $register_admin = "insert into admins (names, email, password)
    values('$names','$email','$password')";

    $run_register_admin = mysqli_query($connection, $register_admin);

    if($run_register_admin) //confirm the member details were inserted into table
    {
    $message = "<p style='color: green;'>Success, Admin added successfully!</p>";
    }
    else
    {
    $message = "Sorry, registration failed. Please try again!";
    }
    }
}

?>


<div class="content_divs">
<h3 align="center"><b>Add New Admin</b></h3><br>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
        <span style="color:red;"><?php echo $message; ?></span>
    </div>
</div>
<form action="" method="post" class="form-horizontal ws-validate" role="form">
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Full Names*</label>
<div class="col-sm-5"> 
<input type="text" class="form-control" id="name" name="names" placeholder="Full Names" autofocus="" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
</div>
</div>
<div class="form-group"> 
<label for="email" class="col-sm-4 control-label">Email address*</label>
<div class="col-sm-5"> 
<input type="email" class="form-control" id="firstname" name="email" placeholder="Enter Email" required="" pattern ="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Must be in the form someone@example.com">
</div>
</div>
<div class="form-group"> 
<label for="inputPassword" class="col-sm-4 control-label">Enter Password*</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
</div>
</div>
<div class="form-group"> 
<div class="col-sm-offset-4 col-sm-8">
<input type="submit" value=" Save" name="post_data" class="btn btn-primary">
<a href="admins.php" class="btn btn-link" title="Cancel"> Cancel</a>
</div>
</div>
</form>
</div>