<div class="col-sm-12 table-responsive" id="div_to_print">

    <!--Retreving records from database-->

    <?php

    include "../includes/db_connect.php";

    //receive the values from the form and assign them to variables

    $get_details = "select * from admins where email='$user_check'";

    $run_details = mysqli_query($connection, $get_details);

    $row = mysqli_fetch_array($run_details);

    $names=$row['names'];
    $email=$row['email'];

    ?>

    <!--/Retreving records from database-->

    <!--Update code-->
    <?php

    $message=''; // Variable to store message

    if(isset($_POST['post_data'])){

        $newnames=$_POST['names'];
        $newemail=$_POST['email'];

        $update_admin = "update admins set names='$newnames', email='$newemail' where email='$user_check'";

        $run_update_admin = mysqli_query($connection, $update_admin);

        if($run_update_admin) //confirm the member details were inserted into table
        {
            $message = "<p style='color: green;'>Admin details updated successfully!</p>";
        }
        else{
            $message = "Sorry, update failed. Please try again!";
        }

    }

    ?>
    <!--Update code-->

    <!--Update pwd code-->
    <?php

    $message1=''; // Variable to store message

    if(isset($_POST['change_pass'])){

        $current_pass = md5($_POST['current_pass']);
        $new_pass = md5($_POST['new_pass']);
        $new_pass_again = md5($_POST['new_pass_again']);

        $sel_pass = "select * from admins where password='$current_pass' AND email='$user_check'";

        $run_pass = mysqli_query($connection, $sel_pass);

        $check_pass = mysqli_num_rows($run_pass);

        if($check_pass==0)
        {
            $message1 = "Your current password is wrong!";
        }
        else
        {
            if($new_pass!=$new_pass_again)
            {
                $message1 = "New password does not match!";
            }
            else
            {
                $update_admin = "update admins set password='$new_pass' where email='$user_check'";

                $run_admin = mysqli_query($connection, $update_admin);

                $message1 = "<p style='color: green;'>Your password was updated successfully!</p>";
            }
        }
    }

    ?>
    <!--Update pwd code-->

    <div class="content_divs">
    <h3 align="center"><b>Edit My Account</b></h3><br>
    <form action="" method="post" class="form-horizontal ws-validate" role="form">
    <div class="form-group"> 
    <label for="username" class="col-sm-4 control-label">Full Names*</label>
    <div class="col-sm-5"> 
    <input type="text" class="form-control" id="name" name="names" value="<?php echo "$names"; ?>" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
    </div>
    </div>
    <div class="form-group"> 
    <label for="email" class="col-sm-4 control-label">Email address*</label>
    <div class="col-sm-5"> 
    <input type="email" class="form-control" id="firstname" name="email" value="<?php echo "$email"; ?>" required="" pattern ="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Must be in the form someone@example.com">
    </div>
    </div>
    <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
    <input type="submit" value=" Save" name="post_data" class="btn btn-primary">
    <a href="index.php?option=Profile" class="btn btn-link" title="Back"> Back</a>
    </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-5">
            <span style="color:red;"><?php echo $message; ?></span>
        </div>
    </div>
    </form>

    <hr>

    <!--Change pwd form-->
    <h3 align="center"><b>Change Your Password</b></h3><br>

    <form action="" method="post" class="form-horizontal ws-validate" role="form">

    <div class="form-group"> 
    <label for="inputPassword" class="col-sm-4 control-label">Enter Current Password:</label>
    <div class="col-sm-5">
    <input type="password" class="form-control" id="password" name="current_pass" placeholder="Current Password" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
    </div>
    </div>
    <div class="form-group"> 
    <label for="inputPassword" class="col-sm-4 control-label">Enter New Password:</label>
    <div class="col-sm-5">
    <input type="password" class="form-control" id="password" name="new_pass" placeholder="New Password" required="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
    </div>
    </div>
    <div class="form-group"> 
    <label for="inputPassword" class="col-sm-4 control-label">Confirm New Password:</label>
    <div class="col-sm-5">
    <input type="password" class="form-control" id="password" name="new_pass_again" placeholder="Confirm New Password" required="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
    </div>
    </div>
    <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
    <input type="submit" value="Change Password" name="change_pass" class="btn btn-primary">
    <a href="index.php?option=Profile"><button type="button" class="btn btn-link"> Cancel</button></a>
    </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-5">
            <span style="color:red;"><?php echo $message1; ?></span>
        </div>
    </div>
    </form>
    </div>
</div>