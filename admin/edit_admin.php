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

    <title>Admins - CMS</title>

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

                            $get_details = "select * from admins where admin_id='$id'";

                            $run_details = mysqli_query($connection, $get_details);

                            $row = mysqli_fetch_array($run_details);

                            $names=$row['names'];
                            $email=$row['email'];
                        }

                        ?>

                        <!--/Retreving records from database-->

                        <!--Update code-->
                        <?php

                        $message=''; // Variable to store message

                        if(isset($_POST['post_data'])){

                            $update_id = $id;

                            $newnames=$_POST['names'];
                            $newemail=$_POST['email'];

                            $update_admin = "update admins set names='$newnames', email='$newemail' where admin_id='$update_id'";

                            $run_update_admin = mysqli_query($connection, $update_admin);

                            if($run_update_admin) //confirm the group details were inserted into table
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

                        if(isset($_POST['update_pwd'])){

                            $update_id = $id;

                            $newpassword=md5($_POST['password']);
                            $newpass_again = md5($_POST['pass_again']);

                            if($newpassword!=$newpass_again)
                            {
                                $message1 = "New password does not match!";
                            }
                            else{
                                $update_admin_pwd = "update admins set password='$newpassword' where admin_id='$update_id'";

                                $run_update_admin_pwd = mysqli_query($connection, $update_admin_pwd);

                                $message1 = "<p style='color: green;'>Admin password updated successfully!</p>";
                            }

                        }

                        ?>
                        <!--Update pwd code-->

                        <div class="content_divs">
                        <h3 align="center"><b>Edit Admin Details</b></h3><br>
                        <form action="" method="post" class="form-horizontal ws-validate" role="form">
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Names*</label>
                        <div class="col-sm-5"> 
                        <input type="text" class="form-control" id="name" name="names" value="<?php echo "$names"; ?>" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="email" class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-5"> 
                        <input type="email" required="" class="form-control" id="name" name="email" value="<?php echo "$email"; ?>" pattern ="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Must be in the form someone@example.com">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="submit" value=" Save" name="post_data" class="btn btn-primary">
                        <a href="admins.php" class="btn btn-link" title="Back"> Back</a>
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
                        <h3 align="center"><b>Change User Password</b></h3><br>

                        <form action="" method="post" class="form-horizontal ws-validate" role="form">

                        <div class="form-group"> 
                        <label for="inputPassword" class="col-sm-4 control-label">Enter New Password*</label>
                        <div class="col-sm-5">
                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="inputPassword" class="col-sm-4 control-label">Confirm New Password:</label>
                        <div class="col-sm-5">
                        <input type="password" class="form-control" id="password" name="pass_again" placeholder="Confirm New Password" required="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="submit" value="Change Password" name="update_pwd" class="btn btn-primary">
                        <a href="admins.php"><button type="button" class="btn btn-link"> Cancel</button></a>
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