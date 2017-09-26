<?php

include "../includes/db_connect.php";
$message=''; // Variable to store message

//receive the values from the form and assign them to variables
if(isset($_POST['post_data'])){

    $names=$_POST['names'];
    $email=$_POST['email'];
    $member_no=$_POST['member_no'];
    $telephone=$_POST['telephone'];
    $station_name=$_POST['station_name'];
    $group_name=$_POST['group_name'];
    $b_date=$_POST['b_date'];
    $c_date=$_POST['c_date'];
    $gender=$_POST['gender'];
    $marital_status=$_POST['marital_status'];
    $family=$_POST['family'];

    //check if user name already exists
    $check_user = "select member_no from members where member_no ='$member_no'";
    $run_check_user = mysqli_query($connection, $check_user);
    $row_user = mysqli_num_rows($run_check_user);

    // if user name exist generate error message
    if($row_user == 1)
    {
    $message = "Sorry, member already exists. Please use a different member number!";
    }
    else
    {
    // insert user details into the table members
    $register_member = "insert into members (names, member_no, email, telephone, station, group_name, baptism_date, confirmation_date, gender, marital_status, family)
    values('$names','$member_no','$email','$telephone', '$station_name', '$group_name','$b_date','$c_date','$gender','$marital_status','$family')";

    $run_register_member = mysqli_query($connection, $register_member);

    if($run_register_member) //confirm the member details were inserted into table
    {
    $message = "<p style='color: green;'>Success, Member added successfully!</p>";
    }
    else
    {
    $message = "Sorry, registration failed. Please try again!";
    }
    }
}

?>


<div class="content_divs">
<h3 align="center"><b>Add New Member</b></h3><br>
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
<label for="username" class="col-sm-4 control-label">Member No*</label>
<div class="col-sm-5"> 
<input type="number" class="form-control" id="name" name="member_no" maxlength="10" placeholder="Member Number" required="">
</div>
</div>
<div class="form-group"> 
<label for="email" class="col-sm-4 control-label">Email address*</label>
<div class="col-sm-5"> 
<input type="email" class="form-control" id="firstname" name="email" placeholder="Enter Email" required="" pattern ="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Must be in the form someone@example.com">
</div>
</div>
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Telephone No*</label>
<div class="col-sm-5"> 
<input type="number" class="form-control" id="name" name="telephone" maxlength="10" placeholder="Telephone Number" required="">
</div>
</div>
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Station*</label>
<div class="col-sm-5"> 
<select class="form-control" name="station_name" required="">
    <option value="">Select Station</option>
    <?php getStations(); ?>
</select>
</div>
</div>
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Group*</label>
<div class="col-sm-5"> 
<select class="form-control" name="group_name" required="">
    <option value="">Select Group</option>
    <?php getGroups(); ?>
</select>
</div>
</div>
<div class="form-group"> 
<label for="date" class="col-sm-4 control-label">Baptism Date*</label>
<div class="col-sm-5"> 
<input type="date" class="form-control" id="name" name="b_date">
</div>
</div>
<div class="form-group"> 
<label for="date" class="col-sm-4 control-label">Confirmation Date*</label>
<div class="col-sm-5"> 
<input type="date" class="form-control" id="name" name="c_date">
</div>
</div>
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Marital Status*</label>
<div class="col-sm-5"> 
<select class="form-control" name="marital_status" required="">
    <option value="">--Select--</option>
    <option>Married</option>
    <option>Single</option>
</select>
</div>
</div>
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Family*</label>
<div class="col-sm-5"> 
<select class="form-control" name="family" required="">
    <option value="">Select Family</option>
    <?php getFamilies(); ?>
</select>
</div>
</div>
<div class="form-group"> 
<label for="username" class="col-sm-4 control-label">Gender*</label>
<div class="col-sm-5"> 
<select class="form-control" name="gender" required="">
    <option value="">Select Gender</option>
    <option>Male</option>
    <option>Female</option>
</select>
</div>
</div>
<div class="form-group"> 
<div class="col-sm-offset-4 col-sm-8">
<input type="submit" value="Save" name="post_data" class="btn btn-primary">
<a href="index.php" class="btn btn-link" title="Cancel"> Cancel</a>
</div>
</div>
</form>
</div>