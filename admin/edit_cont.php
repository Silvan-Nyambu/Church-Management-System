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

    <title>Contributions - CMS</title>

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

                            $get_details = "select * from contributions where id='$id'";

                            $run_details = mysqli_query($connection, $get_details);

                            $row = mysqli_fetch_array($run_details);

                            $member_name=$row['member_name'];
                            $member_no=$row['member_no'];
                            $telephone=$row['telephone'];
                            $station=$row['station'];
                            $type=$row['type'];
                            $amount=$row['amount'];
                            $p_date=$row['p_date'];
                        }

                        ?>

                        <!--/Retreving records from database-->

                        <!--Update code-->
                        <?php

                        $message=''; // Variable to store message

                        if(isset($_POST['post_data'])){

                            $update_id = $id;

                            $newtype=$_POST['type'];
                            $newamount=$_POST['amount'];
                            $newp_date=$_POST['p_date'];

                            $update_data = "update contributions set type='$newtype', amount='$newamount', p_date='$newp_date' where id='$update_id'";

                            $run_update_data = mysqli_query($connection, $update_data);

                            if($run_update_data) //confirm the details were inserted into table
                            {
                                $message = "<p style='color: green;'>Details updated successfully!</p>";
                            }
                            else{
                                $message = "Sorry, update failed. Please try again!";
                            }

                        }

                        ?>
                        <!--Update code-->

                        <div class="content_divs">
                        <h3 align="center"><b>Edit Member Contributions</b></h3><br>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <span style="color:red;"><?php echo $message; ?></span>
                            </div>
                        </div>
                        <form action="" method="post" class="form-horizontal ws-validate" role="form">
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Full Names*</label>
                        <div class="col-sm-5"> 
                        <input type="text" class="form-control" id="name" name="names" value="<?php echo "$member_name"; ?>" readonly>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Member No*</label>
                        <div class="col-sm-5"> 
                        <input type="number" class="form-control" id="name" name="member_no" value="<?php echo "$member_no"; ?>" readonly>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Telephone No*</label>
                        <div class="col-sm-5"> 
                        <input type="number" class="form-control" id="name" name="telephone" value="<?php echo "$telephone"; ?>" readonly>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Contribution Type*</label>
                        <div class="col-sm-5"> 
                        <select class="form-control" name="type" required="">
                            <option><?php echo "$type"; ?></option>
                            <?php getTypes(); ?>
                        </select>
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Amount*</label>
                        <div class="col-sm-5"> 
                        <input type="number" class="form-control" id="name" name="amount" value="<?php echo "$amount"; ?>" required="">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <label for="username" class="col-sm-4 control-label">Payment Date*</label>
                        <div class="col-sm-5"> 
                        <input type="date" class="form-control" id="name" name="p_date" value="<?php echo "$p_date"; ?>" required="">
                        </div>
                        </div>
                        <div class="form-group"> 
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="submit" value=" Save" name="post_data" class="btn btn-primary">
                        <a href="contributions.php" class="btn btn-link" title="Back"> Back</a>
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