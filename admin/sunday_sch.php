<?php

include '../includes/session.php';

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

    <script type="text/javascript">
        function delete_id(id)
        {
            if(confirm('Sure to delete the record?'))
            {
                window.location.href='sunday_sch.php?delete_id='+id;
            }
        }
    </script>

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
                    <div class="col-sm-12 table-responsive content_divs" id="div_to_print">

                        <h3 align="center"><b>Sunday School Groups</b></h3><br>

                        <!--Retreving records from database-->

                        <?php
                        //Retreiving records from the database and display in results web page
                        require_once ('../includes/db_connect.php'); //call connect code

                        $get_sunday_sch = "select * from sunday_sch";

                        $run_sunday_sch = mysqli_query($connection, $get_sunday_sch);

                        $count_data = mysqli_num_rows($run_sunday_sch);

                        if($count_data==0){
                            echo "<h4 align='center' style='padding-bottom:10px;'><i> No records were found in the database! </i></h4>";
                        }
                        else{

                        echo "<table class='table table-hover text-center table-bordered' id='table_center'>"; 
                        echo "<thead>";
                        echo "<tr>"; 
                        echo "<td><b>ID</b></td>
                              <td><b>NAMES</b></td>
                              <td><b>STATUS</b></td>
                              <td class='dontprint' colspan='2'><b>ACTION</b></td>";
                        echo "</tr>"; 
                        echo "</thead>"; 
                        echo "<tbody>";

                        //fetch and loop records

                        $i = 0;

                        while ($row = mysqli_fetch_array($run_sunday_sch)) //fetch the rows
                        {

                        $i++;
                            
                        $id=$row['id']; //id to select the record to delete

                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$row['name']."</td>
                              <td>".$row['status']."</td>
                              <td class='dontprint'><a href='edit_sunday_sch.php?edit=$id' title='Edit'><button type='button' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-edit'></span> Edit</button></a></td> 
                              <td class='dontprint'><a href='javascript:delete_id($id)' title='Delete'><button type='button' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span> Delete</button></a></td>"; 

                        echo "</tr>";

                        }

                        echo "</tbody>"; 
                        echo "</table>";
                        }

                        ?>

                        <!--/Retreving records from database-->

                    </div>

                    <div class="col-sm-12 text-center" id="print_button">
                        <?php
                        if ($count_data==0) {
                            echo "";
                        }
                        else{
                            echo "<button type='button' class='btn btn-info' onclick='printPage()'><span class='glyphicon glyphicon-print'></span>  Print List</button>";
                        }
                        ?>
                        <a href="index.php?option=Add_Sunday_Grp" class="btn btn-primary btn-sm pull-right"> Add Sunday Group</a>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="../js/custom.min.js"></script>

    <script src="../js/jqBootstrapValidation.js"></script>

</body>

</html>

    <!--Delete code-->

    <?php
    require_once ('../includes/db_connect.php');

    if(isset($_REQUEST['delete_id'])){

    $id=$_REQUEST['delete_id']; //fetch the id of selected record

    $sunday_sch = "DELETE FROM sunday_sch WHERE id='$id'";  // execute the delete statement

    $run_sunday_sch = mysqli_query($connection, $sunday_sch); 

    if ($run_sunday_sch) // check if delete is successful
    {
    echo "<script>window.location='sunday_sch.php';</script>";
    }
    else
    {
    echo "<script>alert('Member not deleted.')</script>";

    echo "<script>window.location='sunday_sch.php'</script>";
    }
    }

    ?>