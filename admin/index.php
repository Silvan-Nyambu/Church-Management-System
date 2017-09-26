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

    <title>CMS</title>

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

                <?php 

                @$opt=$_GET['option'];

                if($opt!="")
                {
                    if($opt=="Members")
                    {
                    include('members.php');
                    }
                    if($opt=="Add_Member")
                    {
                    include('add_member.php');
                    }
                    if($opt=="Add_Group")
                    {
                    include('add_group.php');
                    }
                    if($opt=="Add_Family")
                    {
                    include('add_family.php');
                    }
                    if($opt=="Profile")
                    {
                    include('profile.php');
                    }
                    if($opt=="Edit_Account")
                    {
                    include('edit_account.php');
                    }
                    if($opt=="Add_Sunday_Grp")
                    {
                    include('add_sunday_sch.php');
                    }
                    if($opt=="Add_Admin")
                    {
                    include('add_admin.php');
                    }
                    if($opt=="Add_Station")
                    {
                    include('add_station.php');
                    }
                    if($opt=="Add_Event")
                    {
                    include('add_event.php');
                    }
                    if($opt=="Add_Type")
                    {
                    include('add_type.php');
                    }
                    if($opt=="Add_Entry")
                    {
                    include('add_entry.php');
                    }
                    if($opt=="Member_No")
                    {
                    include('member_no.php');
                    }
                }
                else
                {
                    include 'content.php';
                    include 'outstations.php';
                }

                ?>

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
