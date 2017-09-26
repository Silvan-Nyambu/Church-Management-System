<div class='content_divs'>
<h3 align='center'><b>Add Member Contribution</b></h3><br>
<div class='form-group'>
    <div class='col-sm-offset-4 col-sm-5'>
        <span style='color:red;'> <?php echo $message; ?></span>
    </div>
</div>
<form action='' method='post' class='form-horizontal' role='form'>
<div class='form-group'> 
<label for='username' class='col-sm-4 control-label'>Full Names*</label>
<div class='col-sm-5'> 
<input type='text' class='form-control' id='name' name='member_name' value="<?php echo "$names"; ?>" readonly>
</div>
</div>
<div class='form-group'> 
<label for='username' class='col-sm-4 control-label'>Member No*</label>
<div class='col-sm-5'> 
<input type='number' class='form-control' id='name' name='member_no' value="<?php echo "$member_no"; ?>" readonly>
</div>
</div>
<div class='form-group'> 
<label for='username' class='col-sm-4 control-label'>Telephone No*</label>
<div class='col-sm-5'> 
<input type='number' class='form-control' id='name' name='telephone' value="<?php echo "$telephone"; ?>" readonly>
</div>
</div>
<div class='form-group'> 
<label for='username' class='col-sm-4 control-label'>Out Station*</label>
<div class='col-sm-5'> 
<input type='text' class='form-control' id='name' name='station' value="<?php echo "$station"; ?>" readonly>
</div>
</div>
<div class='form-group'> 
<label for='username' class='col-sm-4 control-label'>Contribution Type*</label>
<div class='col-sm-5'> 
<select class='form-control' name='contribution_type' required=''>
    <option value=''>--Select--</option>
    <?php getTypes(); ?>
</select>
</div>
</div>
<div class='form-group'> 
<label for='username' class='col-sm-4 control-label'>Amount*</label>
<div class='col-sm-5'> 
<input type='number' class='form-control' id='name' name='amount' placeholder='Amount' required=''>
</div>
</div>
<div class='form-group'> 
<label for='date' class='col-sm-4 control-label'>Payment Date*</label>
<div class='col-sm-5'> 
<input type='date' class='form-control' id='name' name='p_date' required=''>
</div>
</div>
<div class='form-group'> 
<div class='col-sm-offset-4 col-sm-8'>
<input type='submit' value='Save' name='post_data' class='btn btn-primary'>
<a href='contributions.php' class='btn btn-link' title='Cancel'> Cancel</a>
</div>
</div>
</form>
</div>