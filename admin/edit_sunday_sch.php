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

    <title>Sunday School - CMS</title>

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

                            $get_details = "select * from sunday_sch where id='$id'";

                            $run_details = mysqli_query($connection, $get_details);

                            $row = mysqli_fetch_array($run_details);

                            $name=$row['name'];
                            $status=$row['status'];
                        }

                        ?>

                        <!--/Retreving records from database-->

                        <!--Update code-->
                        <?php

                        $message=''; // Variable to store message

                        if(isset($_POST['post_data'])){

                            $update_id = $id;

                            $newname=$_POST['name'];
                            $newstatus=$_POST['status'];

                            $update_sunday_sch = "update sunday_sch set name='$newname', status='$newstatus' where id='$update_id'";

                            $run_update_sunday_sch = mysqli_query($connection, $update_sunday_sch);

                            if($run_update_sunday_sch) //confirm the group details were inserted into table
                            {
                                $message = "<p style='color: green;'>Group details updated successfully!</p>";
                            }
                            else{
                                $message = "Sorry, update failed. Please try again!";
                            }

                        }

                        ?>
                        <!--Update code-->

                        <div class="content_divs">
                        <h3 align="center"><b>Edit Group Details</b></h3><br>
                        <form action="" method="post" class="form-horizontal ws-validate" role="form">
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Sunday Group Name*</label>
                        <div class="col-sm-5"> 
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo "$name"; ?>" required="" pattern="[A-Za-z].{2,}" title="Can only contain letters and minimum of 3 characters">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Status*</label>
                        <div class="col-sm-5"> 
                        <select class="form-control" name="status" required="">
                            <option><?php echo "$status"; ?></option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="submit" value=" Save" name="post_data" class="btn btn-primary">
                        <a href="sunday_sch.php" class="btn btn-link" title="Back"> Back</a>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <span style="color:red;"><?php echo $message; ?></span>
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