<?php

include '../includes/session.php';
include '../includes/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Members - CMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="admin_panel">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'navbar.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>

                        <p class="pull-right" id='clockbox'></p>

                <?php 

                @$opt=$_GET['option'];

                if($opt=="")
                {
                    echo "
                        <ol class='breadcrumb'>
                            <li class='active'>
                                <i class='fa fa-dashboard'></i> Dashboard
                            </li>
                        </ol>
                    ";
                }

                ?>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-12 table-responsive" id="div_to_print">

                        <!--Retreving records from database-->

                        <?php

                        include "../includes/db_connect.php";

                        //receive the values from the form and assign them to variables
                        if(isset($_GET['edit'])){

                            $id = $_GET['edit'];

                            $get_details = "select * from members where member_id='$id'";

                            $run_details = mysqli_query($connection, $get_details);

                            $row = mysqli_fetch_array($run_details);

                            $names=$row['names'];
                            $member_no=$row['member_no'];
                            $email=$row['email'];
                            $telephone=$row['telephone'];
                            $station=$row['station'];
                            $group_name=$row['group_name'];
                            $baptism_date=$row['baptism_date'];
                            $confirmation_date=$row['confirmation_date'];
                            $gender=$row['gender'];
                            $marital_status=$row['marital_status'];
                            $family=$row['family'];
                        }

                        ?>

                        <!--/Retreving records from database-->

                        <!--Update code-->
                        <?php

                        $message=''; // Variable to store message

                        if(isset($_POST['post_data'])){

                            $update_id = $id;

                            $newnames=$_POST['names'];
                            $newmember_no=$_POST['member_no'];
                            $newemail=$_POST['email'];
                            $newtelephone=$_POST['telephone'];
                            $newstation=$_POST['station'];
                            $newgroup_name=$_POST['group_name'];
                            $newb_date=$_POST['b_date'];
                            $newc_date=$_POST['c_date'];
                            $newgender=$_POST['gender'];
                            $newmarital_status=$_POST['marital_status'];
                            $newfamily=$_POST['family'];

                            $update_member = "update members set names='$newnames', member_no='$newmember_no', email='$newemail', telephone='$newtelephone', station='$newstation', group_name='$newgroup_name', baptism_date='$newb_date', confirmation_date='$newc_date', gender='$newgender', marital_status='$newmarital_status', family='$newfamily' where member_id='$update_id'";

                            $run_update_member = mysqli_query($connection, $update_member);

                            if($run_update_member) //confirm the member details were inserted into table
                            {
                                $message = "<p style='color: green;'>Member details updated successfully!</p>";
                            }
                            else{
                                $message = "Sorry, update failed. Please try again!";
                            }

                        }

                        ?>
                        <!--Update code-->

                        <div class="content_divs">
                        <h3 align="center"><b>Edit Member Details</b></h3><br>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <span style="color:red;"><?php echo $message; ?></span>
                            </div>
                        </div>
                        <form action="" method="post" class="form-horizontal ws-validate" role="form">
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Full Names*</label>
                        <div class="col-sm-5"> 
                        <input type="text" class="form-control" id="name" name="names" value="<?php echo "$names"; ?>" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Member No*</label>
                        <div class="col-sm-5"> 
                        <input type="number" class="form-control" id="name" name="member_no" maxlength="10" value="<?php echo "$member_no"; ?>" required="">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="email" class="col-sm-4 control-label">Email address*</label>
                        <div class="col-sm-5"> 
                        <input type="email" class="form-control" id="firstname" name="email" value="<?php echo "$email"; ?>" required="" pattern ="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Must be in the form someone@example.com">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Telephone No*</label>
                        <div class="col-sm-5"> 
                        <input type="number" class="form-control" id="name" name="telephone" maxlength="10" value="<?php echo "$telephone"; ?>" required="">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Station*</label>
                        <div class="col-sm-5"> 
                        <select class="form-control" name="station" required="">
                            <option><?php echo "$station"; ?></option>
                            <?php getStations(); ?>
                        </select>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Group*</label>
                        <div class="col-sm-5"> 
                        <select class="form-control" name="group_name" required="">
                            <option><?php echo "$group_name"; ?></option>
                            <?php getGroups(); ?>
                        </select>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Baptism Date*</label>
                        <div class="col-sm-5"> 
                        <input type="date" class="form-control" id="name" name="b_date" value="<?php echo "$baptism_date"; ?>" required="">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Confirmation Date*</label>
                        <div class="col-sm-5"> 
                        <input type="date" class="form-control" id="name" name="c_date" value="<?php echo "$confirmation_date"; ?>" required="">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Gender*</label>
                        <div class="col-sm-5"> 
                        <select class="form-control" name="gender" required="">
                            <option><?php echo "$gender"; ?></option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Marital Status*</label>
                        <div class="col-sm-5"> 
                        <select class="form-control" name="marital_status" required="">
                            <option><?php echo "$marital_status"; ?></option>
                            <option>Single</option>
                            <option>Married</option>
                        </select>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Family*</label>
                        <div class="col-sm-5"> 
                        <select class="form-control" name="family" required="">
                            <option><?php echo "$family"; ?></option>
                            <?php getFamilies(); ?>
                        </select>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="submit" value=" Save" name="post_data" class="btn btn-primary">
                        <a href="members.php" class="btn btn-link" title="Back"> Back</a>
                        </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

            <hr>
            <footer class="main-footer">
                <?php include 'footer.php'; ?>
            </footer>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="../js-webshim/minified/polyfiller.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="../js/custom.min.js"></script>

    <script src="../js/jqBootstrapValidation.js"></script>

    <script> 
        // load and implement all unsupported features 
        webshims.polyfill('forms');
            
        // or only load a specific feature
        //webshims.polyfill('forms es5');
    </script>

</body>

</html>